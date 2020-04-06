
<head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>medical</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="style.css">

  </head>

  <div class="medical">

        <h3>Dashboard</h3>

<hr>

<?php 

echo "<h1><p>This page is for medical</p></h1>";
?>

<br> <br>
<?php session_start();?>
 

<B>Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>), and your ID is <?php echo $_SESSION['loggedIn'] ?></b>

<?php (getdate());
echo "<br><br>";

$mydate = getdate(date("U"));
?>

    <pre>Logedd in Time:  <?php echo  $_SESSION['Time']?></pre>

  <pre>Logged in date: <?php echo  $_SESSION['Date']?></pre>


  <div class="logout">
    <a href="index.php">Home</a>
  </div>

  <div class="logout">
    <a href="logout.php">Logout</a>
  </div>
</div>

