<?php
if(!isset($_SESSION['loggedIn'])){
  header("location: SignIn.php?login=expireded");
  exit();
}
?>


<?php require_once('Lib/header.php');?>
      <title>superAdmin</title>



<div class="container-fluid">



  <p class="lead display-4">This page is for the super Admin</p>

  <br>
  <br>
    <div class="">
      <a class="Register login  btn btn-secondary btn-lg" href="logout.php">Logout</a>

      <a class="Register login  btn btn-info btn-lg" href="Register.php">Add users</a>

      <a class="Register login  btn btn-info btn-lg" href="AllPatients.php">View Patients</a>

      <a class="Register login  btn btn-info btn-lg" href="AllStaffs.php">All Staffs</a>
    </div>
  </div>

<?php require_once('Lib/footer.php');?>
