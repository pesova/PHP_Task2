<?php
session_start();


if (isset($_POST['pay'])) {
    $FullName = $_SESSION['fullname'];
    $Email = $_SESSION['Email'];
    $payment = $_POST['options'];
}else{

    header("location: index.php?nopaymentaccess");
}

//checking for Payment Type
      if ($payment == "15000") {
        $_SESSION['MeetingType'] = "Emergency Payment";
      }
      elseif ($payment == "25000") {
        $_SESSION['MeetingType'] = "To Meet A Doctor";
      }
      elseif ($payment == "20000") {
        $_SESSION['MeetingType'] = "Home Services";
      }
      elseif ($payment == "11000") {
        $_SESSION['MeetingType'] = "Medicine Purchase";
      }
      elseif ($payment == "12000") {
        $_SESSION['MeetingType'] = "Diagnostics";
      }
      elseif ($payment == "10000") {
        $_SESSION['MeetingType'] = "Pregnancy Services";
      }
      else{
        header("location: paybills.php?noPayment");
        exit();
      }

$_SESSION['payment'] = $payment;

//generating textref Token
            $token = ""; 
                    //generating random token
                    $Alphabets = ['a','b','c','d','e','f','A','B','C','D','E','F'];

                        for ($i=0; $i < 15 ; $i++) { 
                            # getting random texts and adding to the token
                            $random = mt_rand(0,count($Alphabets)-1);
                            $token .= $Alphabets[$random];
                        }

//integrated rave code

$curl = curl_init();

$customer_email = $Email;
$amount = $payment;  
$currency = "NGN";
$txref = $token; // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK_TEST-64cf9ece82cbfc584035d24c932587cd-X"; // get your public key from the dashboard.
$redirect_url = "http://localhost:8080/HNGTask3-WithFunctions/paySuccess.php";



curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,
 
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}



// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);