  <!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Sign up</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="style.css">
      
      

     
      <script src="main.js"></script>
      </head>
      <body>
    
    <div class="mainContainer">

    <body>
        <div>
         <a  class="startng" href="index.php">StartNG Hospital</a>
        </div>

        <hr>

        <div class="reg">
        <p><strong>Welcome, Please Register</strong></p>
        </div>
    
         <form class="form" action="RegisterConnection.php" method="POST">
            
         <?php 
         if(isset($_GET['FirstName'])){
             $FirstName = $_GET['FirstName'];
             echo '<label><b>FirstName</b></label>
             <input type="text" name="FirstName" value="'.$FirstName.'" placeholder="Enter FirstName">';
         }
         else{
             echo '<label><b>FirstName</b></label>
             <input type="text" name="FirstName" value="" placeholder="Enter FirstName">';
         }


         if(isset($_GET['LastName'])){
            $LastName = $_GET['LastName'];
            echo '<label><b>LastName</b></label>
            <input type="text" name="LastName" value="'.$LastName.'" placeholder="Enter LastName">';
        }
        else{
            echo '<label><b>LastName</b></label>
            <input type="text" name="LastName" value="" placeholder="Enter LastName">';
        }
         ?>
                     
            <br>
            <?php

            if(isset($_GET['Email'])){
            $Email = $_GET['Email'];
            echo '<label><b>Email</b></label>
            <input type="text" name="Email" value="'.$Email.'" placeholder="Enter Email">';
        }
            else{
            echo '<label><b>Email</b></label>
            <input type="text" name="Email" value="" placeholder="Enter Email">';
        }
            ?>

            <br>

            <label><b>Password</b></label>
            <input type="Password" name="Password" value="" placeholder="Enter Password">

            <br>
            <label for=""><b>Gender</b></label>  <br>
            <select id="select" name="Gender" id="Gender">
                <option value="">Select One</option>
                <option <?php              
            if(isset($_SESSION['Gender']) && $_SESSION['Gender'] == 'Male'){
            echo "selected";                                                           
            }                
        ?>
                >Male</option>


                <option <?php              
            if(isset($_SESSION['Gender']) && $_SESSION['Gender'] == 'Female'){
            echo "selected";                                                           
            }                
        ?>
                >Female</option>
            </select>

      <br>

            <label><b>Designation</b></label><br />
            <select id="select" name="designation" >

                <option value="">Select One</option>
                <option 
        <?php              
            if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
            echo "selected";                                                           
            }                
        ?>
                >Medical Team (MT)</option>
                
                <option 
                <?php              
                if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
            echo "selected";                                                           
            }                
                ?>
                  >Patient</option>
                 </select>

            <br>


        <?php

            if(isset($_GET['Department'])){
            $Email = $_GET['Department'];
            echo '<label><b>Department</b></label>
            <input type="text" name="Department" value="'.$Department.'" placeholder="Enter Department">';
        }
        else{
            echo '<label><b>Department</b></label>
            <input type="text" name="Department" value="" placeholder="Enter Department">';
        }


        ?>

                       
            <br>
            
            <button type="submit" name="submit">Sign Up</button>
         
            <p>
                    <a href="forgot.php">Forgot Password</a><br /> <br>
                    <a href="Signin.php">Already have an account? Login</a>
            </p>
        
    </div>
 
        
        <?php
        //error handlers
        if(!isset($_GET['signup'])){
            exit();
        }
        else{
            $signupcheck = $_GET['signup'];

            if($signupcheck == "empty"){
                echo "<p class='error'>Fill in fields!</p>";
                exit();
            }
            elseif($signupcheck == "CharError"){
                echo "<p class='error'>You used invalid characters</p>";
                exit();
            }
            elseif($signupcheck == "Email"){
                echo "<p class='error'>Fill in valid email</p>";
                exit();
            }
            elseif($signupcheck == "success"){


                echo "<p class='success'>You have signed up</p>";
                
                exit();
            }
        }

        ?>
       
        </form>
    </body>

    </html>