<?php  
session_start();
session_unset();
session_destroy();
?>

<?php require_once('Lib/header.php');?>

      <title>Home</title>


<div class="container">
    <h1 id ="H1">Welcome to SNG: Hospital for the ignorant</h1>



    <p class="lead display-4">This is a specialist hospital to cure ignorance!</p>
    <p class="lead display-4">Come as you are, it is completely free!</p>

    <br><br>
    <p>
        <a class="login  btn btn-primary btn-lg" href="SignIn.php">Login</a>
        <a class="Register login  btn btn-secondary btn-lg" href="Register.php">Register</a>
    </p>
    <br>
</div>

<?php require_once('Lib/footer.php');?>
