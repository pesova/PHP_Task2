<?php require_once('functions/alert.php');?>

<!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="style.css">

  </head>
  <body>

  <div>


        <div class="reg">
        <p class="lead"><strong>Welcome, Login</strong></p>
        </div>

        <div class="mainContainer">


         <form class="form" action="LoginConnection.php" method="POST">


            <br>


            <label><b>Email Address</b></label>
            <input <?php
            if(isset($_SESSION['Email'])){
                echo "value=" . $_SESSION['Email'];
            }
        ?>  type="text" name="Email"  placeholder="Enter Email">



            <br>

            <label><b>Password</b></label>
            <input type="Password" name="Password" value="" placeholder="Enter Password">

            <br>

            <button type="submit" name="submit">Sign In</button>


            <p>
                <a class = "respon" href="forgot.php">Forgot Password</a> <br>  <br>
                <a class = "respon" href="Register.php">Don't have an account? Register</a>
            </p>
         <br>


         </form>



        </div>

        <?php message(); ?>
<?php require_once('Lib/footer.php');?>
