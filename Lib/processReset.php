<?php session_start();

$token = $_POST['token'];
$Email  = $_POST['Email'];
$Password  = $_POST['Password'];

//$_SESSION['token'] = $token;
//$_SESSION['Email'] = $Email;

$allUsersToken = scandir("db/tokens/"); 

$countAllUsersToken = count($allUsersToken);

for ($counter = 0; $counter < $countAllUsersToken ; $counter++) { 
    $currentTokenFile = $allUsersToken[$counter];

    if ($currentTokenFile == $Email . ".json") {
        // checking if the tokens are the same
        $tokenContents = file_get_contents("db/tokens/".$currentTokenFile);
        $TokenObject = json_decode($tokenContents);
        $TokenFromDB = $TokenObject->token;
        
        if ($TokenFromDB == $token) {
            # do the password update            
                
            
                $allUsers = scandir("db/users/"); //checking the user doing the password reset
                $countAllUsers = count($allUsers);
            
                for ($counter = 0; $counter < $countAllUsers ; $counter++) {
                   
                    $currentUser = $allUsers[$counter];
            
                    if($currentUser == $Email . ".json"){
                      //check the user password.
                        $userString = file_get_contents("db/users/".$currentUser);
                        $userObject = json_decode($userString);

                        //changing the user Password.
                        $userObject->Password = password_hash($Password, PASSWORD_DEFAULT); 

                        unlink("db/users/".$currentUser);//file delete, user data deleted

                        file_put_contents("db/users/". $Email . ".json", json_encode($userObject));

                        //Telling User in Email that password has Reset Successfully
                        $subject = "Password Reset Successfully";
                        $Message = "Your Password On SNH Has been updated successfully, If you didnt Initiate the Password Visit snh.org and reset Your Password";
                        $headers = "From: no-reply@snh.org" . "\r\n" .
                        "CC: peso@snh.org";

                        $checking = mail($Email,$subject,$Message,$headers);

                        header("location: SignIn.php?Login=passwordResetSuccess");
                        die();
                     }

                }
                 header("location: forgot.php?forgot=ResetFail");
        }
    }
}