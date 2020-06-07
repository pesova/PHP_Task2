<?php

function PatientPaymentHistory($Email)
{
    $rows = '';
    $rowcount = 0;
    $payments = scandir('db/payments/');
    $num = count($payments);
    for ($i = 2; $i < $num; $i++) {
        $currentPayment = json_decode(file_get_contents('db/payments/' . $payments[$i]));
        // print_r($user);
        if ($currentPayment->Email == $Email) {
            $rowcount++;
            $rows .= "
             <tr>
                <th scope='row'>$rowcount</th>
                <td>$currentPayment->Amount</td>
                 <td>$currentPayment->PaymentType</td>
                <td>$currentPayment->date</td>
                <td>$currentPayment->time</td>
                <td>$currentPayment->txRef</td>
            </tr>
            ";
        }
    }

    return $rows;
}


//All transactions

function AllTransactions()
{
    $rows = '';
    $rowcount = 0;
    $payments = scandir('db/payments/');
    $num = count($payments);
    for ($i = 2; $i < $num; $i++) {
        $currentPayment = json_decode(file_get_contents('db/payments/' . $payments[$i]));
        // print_r($user);
        $rowcount++;
        $rows .= "
             <tr>
                <th scope='row'>$rowcount</th>
                <td>$currentPayment->Email</td>
                 <td>$currentPayment->Amount</td>
                   <td>$currentPayment->PaymentType</td>
                <td>$currentPayment->date</td>
                <td>$currentPayment->time</td>
                <td>$currentPayment->txRef</td>
            </tr>
            ";
    }

    return $rows;
}