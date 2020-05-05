<?php
session_start();

    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        $amount = $_SESSION['payment']; //Correct Amount from Server
        $currency = "NGN"; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK_TEST-67fafce6b4e43be48e3ebb9399d8afec-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
          // transaction was successful...



          $allPayments = scandir("db/payments/"); //return @array (2 filled)
                    $countallPayments = count($allPayments);
                    $newpaymentId = ($countallPayments-1);

                    $paymentObject = [
                        'id'=>$newpaymentId,
                        'FullName'=>$_SESSION['fullname'],
                        'Email'=>$_SESSION['Email'],
                        'Amount'=> $_SESSION['payment'],
                        'PaymentType'=>$_SESSION['MeetingType'],
                        'designation'=>$designation,
                        'department'=>$Department
                    ];


                     //store user to database
                     file_put_contents("db/users/". $paymentObject['Email'] . ".json", json_encode($paymentObject));
          header("location: paid.php?success");
        } else {
            //Dont Give Value and return to Failure page
            header("location: paymentFail.php?success");
        }
    }
        else {
      die('No reference supplied');
    }

?>