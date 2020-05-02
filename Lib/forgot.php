<?php session_start();?>
<?php require_once('functions/alert.php');?>
<?php require_once('Lib/header.php');?>


   <h3>Forgot Password</h3>
   <p class="lead text-uppercase font-weight-bolder">Provide the email address associated with your account</p>

   <form class="form" action="processforgot.php" method="POST">
   <p>

    </p>
   <p>
        <label>Email</label>
        <input

        <?php
        
            if(isset($_SESSION['Email'])){
                echo "value=" . $_SESSION['Email'];
            }
        ?>

            type="text" name="Email" placeholder="Email"  />
    </p>
    <p>
        <button type="submit">Send Reset Code</button>
    </p>




    <?php forgotAlert()  //error handlers?>
   </form>

<?php require_once('Lib/footer.php');?>
