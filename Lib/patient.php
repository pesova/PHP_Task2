<?php session_start();

if(!isset($_SESSION['loggedIn'])){
  header("location: SignIn.php?login=expireded");
  exit();
}
?>


<?php require_once('functions/alert.php');?>
<?php require_once('Lib/header.php');?>

      <title>patient</title>


  <body>
    <div class="patient">

      <br>

    <h3 class="nav-item">Dashboard</h3>

    <?php

    echo "<h1><p>This page is for Patient</p></h1>"
    ?>
    <br>
    <div class="patient">

    



    <B>Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>), and your ID is <?php echo $_SESSION['loggedIn'] ?></b>

    <?php (getdate());
    echo "<br><br>";

    $mydate = getdate(date("U"));
    ?>

    <pre class="text-danger">Logedd in Time:  <?php echo  $_SESSION['Time']?></pre>

    <pre class="text-danger">Logged in date: <?php echo  $_SESSION['Date']?></pre>

    <br>
    <br>

    <div class="Action">
        <a class="login  btn btn-primary" href="index.php">Home</a>

        <a class="login  btn btn-info" href="BookAppointment.php">Book Appointment</a>

        <a class="login  btn btn-info" href="Paybills.php">Paybills</a>
        
        <a class="login  btn btn-secondary" href="logout.php">Logout</a>
      </div>

   
<?php Appointment(); ?>
    </div>

<?php require_once('Lib/footer.php');?>
