<?php require_once('functions/alert.php');?>
<?php require_once('Lib/header.php');?>

<?php
if (!isset($_GET['token'])) {
    # they didnt get the token
    header("location: forgot.php?forgot=NoToken");
            exit();
}
?>

<h3>Forgot Password</h3>
   <p class="lead text-uppercase font-weight-bolder">Reset Password associated with your account</p>

   <form class="form" action="processReset.php" method="POST">
   <p>

    </p>

    <input type= "hidden" name = "token" value = "<?php echo $_GET['token'] ?>"/>
   <p>
        <label>Email</label><br />
        <input  type="text" name="Email" placeholder="Email"  />
    </p>
    <p>

    </p>

    <label><b>New Password</b></label>
            <input type="Password" name="Password" value="" placeholder="Enter Password">
            <br>

            <button type="submit">Reset Password</button>


           <?php ResetAlert(); //error Handler?>

   </form>

   <?php require_once('Lib/footer.php');?>
