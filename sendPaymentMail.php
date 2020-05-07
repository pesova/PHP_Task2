<?php
session_start();

if (isset($_GET['Payment']) == "success") {


    $allPayments = scandir("db/payments/"); 
    $countallPayments = count($allPayments);
    $newpaymentId = ($countallPayments-1);


    date_default_timezone_set("Africa/Lagos");
    $date = date('d M Y');
    $time = date('h:i:s A');

    $paymentObject = [
        'id'=>$newpaymentId,
        'FullName'=>$_SESSION['fullname'],
        'date' => $date,
        'time' => $time,
        'txRef' => $_SESSION['ref'],
        'Email'=>$_SESSION['Email'],
        'Amount'=> $_SESSION['payment'],
        'PaymentType'=>$_SESSION['MeetingType']
    ];

        //store user to database
    file_put_contents("db/payments/". $paymentObject['Email'].$newpaymentId . ".json", json_encode($paymentObject));
    

    //for sending Email
$subject = "Payment Successful";
$Message = "A payment have been initiated from you, Your payment with of Amount " . $_SESSION['payment'] . " for " . $_SESSION['MeetingType'] . "  Appointment booking was successful";
$headers = "From: no-reply@snh.org" . "\r\n" . "CC: peso@snh.org";


$sent = mail($_SESSION['Email'],$subject,$Message,$headers);
header("location: paid.php");
die();

}else{
    die('No email sent');
}

