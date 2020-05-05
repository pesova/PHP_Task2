<?php session_start();


   $Email  = $_POST['Email'];

   if(empty($Email)){
  
    header("location: forgot.php?forgot=empty");
    exit();
    }  else {
            
                //check if email is valid
                if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
                
                header("location: forgot.php?forgot=Emailerror");
                exit(); 
                }
                else{
    
                    $allUsers = scandir("db/users/"); 
                    $countAllUsers = count($allUsers);

                    //check if the user already exist.
                    for ($counter = 0; $counter < $countAllUsers ; $counter++) { 
                        $currentUser = $allUsers[$counter];
                
                        if ($currentUser == $Email . ".json") {


                            $token = ""; 
                            //generating random token
                            $Alphabets = ['a','b','c','d','e','f','A','B','C','D','E','F'];

                                for ($i=0; $i < 26 ; $i++) { 
                                    # getting random texts and adding to the token
                                    $random = mt_rand(0,count($Alphabets)-1);
                                    $token .= $Alphabets[$random];
                                }
                            

                            $subject = "Password Reset Link";
                            $Message = "A password reset have been initiated from you, if you did not initiate this reset, please ignore this message, otherwise visit: http://localhost:8080/HNGTask3/reset.php?token=".$token;
                            $headers = "From: no-reply@snh.org" . "\r\n" .
                            "CC: peso@snh.org";


                            file_put_contents("db/tokens/". $Email . ".json", json_encode(['token'=>$token]));


                          $checking = mail($Email,$subject,$Message,$headers);

                         // print_r($checking);
                         // die();
                                if ($checking) {
                                    //display success message

                                    header("location: forgot.php?forgot=codeSent");
                                }else{
                                    header("location: forgot.php?forgot=codeerror");
                                }
                            die();
                        }

                    }
        
                        header("location: forgot.php?forgot=Negative");
    
    
                }
            }