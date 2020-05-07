<?php
session_start();
include_once('Lib/header.php');
require_once('functions/alert.php');
require_once('functions/getter.php');

?>
<section>
    <div id="table">
        <a class="btn btn-outline-danger" href="medical.php" style="margin: 20px">&#x2190; Back</a>
        <?php

        $rows = AllTransactions();
        if ($rows !== '') {
        ?>
            <table class="table table-bordered">
                <caption>
                    Payments Table </caption>
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Patient Email</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">Transaction Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Transaction ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $rows;
                    ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>payment Made Yet</p>
        <?php } ?>

    </div>
</section>