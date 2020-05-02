<?php session_start();

if(!isset($_SESSION['loggedIn'])){
  header("location: SignIn.php?login=expireded");
  exit();
}
?>


<?php require_once('Lib/header.php');?>
<head>

      <title>medical</title>
</head>

  <div class="container-fluid">

        <h3>Dashboard</h3>

<?php

echo "<h1><p>This page is for medical</p></h1>";
?>

<br> <br>



<B class="lead font-weight-bolder">Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>), and your ID is <?php echo $_SESSION['loggedIn'] ?></b>

<?php (getdate());
echo "<br><br>";

$mydate = getdate(date("U"));
?>

    <pre class="text-danger">Logedd in Time:  <?php echo  $_SESSION['Time']?></pre>

  <pre class="text-danger">Logged in date: <?php echo  $_SESSION['Date']?></pre>

  <br>
  <br>


  <div class="Action">

    <a class="btn btn-info" href="AllAppointments.php">All Appointments</a>

    <a class="btn btn-secondary" href="logout.php">Logout</a>
  </div>

</div>

<?php require_once('Lib/footer.php');?>
