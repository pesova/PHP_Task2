  
   <h3>Forgot Password</h3>
   <p>Provide the email address associated with your account</p>

   <form action="processforgot.php" method="POST">
   <p>
        
    </p>
   <p>
        <label>Email</label><br />
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
   </form>
    
