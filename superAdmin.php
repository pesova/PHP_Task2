<?php session_start();


if(!isset($_SESSION['loggedIn'])  || $_SESSION['Medical'] !== 'SuperAdmin'){
  header("location: SignIn.php?login=expireded");
  exit();
}

require_once('Lib/header.php');?>
      <title>superAdmin</title>



<div class="container-fluid">



  <p class="lead display-4">This page is for the super Admin</p>

  <br>
  <br>
    <div class="">
      <a class="Register login  btn btn-secondary btn-lg m-1" href="logout.php">Logout</a>

      <a class="Register login  btn btn-info btn-lg m-1" href="Register.php">Add users</a>

      <a class="Register login  btn btn-info btn-lg m-1" href="AllPatients.php">View Patients</a>

      <a class="Register login  btn btn-info btn-lg m-1" href="AllStaffs.php">All Staffs</a>
    </div>
     <br><br>
  </div>


<?php
require_once('functions/getter.php');

?>
<section>
    <div id="table">
      <br>
      <p class="h4">All Payments</p>
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
        }
                    ?>
                </tbody>
            </table>

    </div>
</section>

<?php require_once('Lib/footer.php');?>
