<?php session_start();

//require_once('functions/alert.php');
//require_once('functions/redirect.php');
//require_once('functions/token.php');
//require_once('functions/user.php');
$Email  = $_POST['Email'];
$Password  = $_POST['Password'];

$_SESSION['Email'] = $Email;

    

function find_user($Email = ""){
    //check the database if the user exsits
    if(!$Email){
        header("location: SignIn.php?error=user_not_set");
        die();
    } else{

    

    $allUsers = scandir("db/users/"); //return @array (2 filled)
    $countAllUsers = count($allUsers);

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {
       
        $currentUser = $allUsers[$counter];

        if($currentUser == $Email . ".json"){
          //check the user password.
            $userString = file_get_contents("db/users/".$currentUser);
            $userObject = json_decode($userString);
                       
            return $userObject;
          
        }        
        
    }

    return false;
}
}


    $currentUser = find_user($Email); 

    if($currentUser){
      //check the user Password.
        $userString = file_get_contents("db/users/".$currentUser->Email . ".json");
        $userObject = json_decode($userString);
        $passwordFromDB = $userObject->Password;

        $passwordFromUser = password_verify($Password, $passwordFromDB);
        
        if($passwordFromDB == $passwordFromUser){
            //redicrect to dashboard
            $_SESSION['loggedIn'] = $userObject->id; 
            $_SESSION['Email'] = $userObject->Email;
            $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
            $_SESSION['role'] = $userObject->designation;

            //checking user login date and time
             (getdate());

            $mydate = getdate(date("U"));

            $_SESSION['Time'] = "$mydate[hours]:$mydate[minutes]";
            $_SESSION['Date'] = "$mydate[weekday], $mydate[month] $mydate[mday] $mydate[year]";
            $dateTime = $_SESSION['Date'] ." ". $_SESSION['Time'];

            file_put_contents("db/Time/".  $_SESSION['Email'] . ".json", json_encode($dateTime));

            //redirecting to different page
            if ($userObject->designation == 'Patient') {
                header("location: patient.php");
            } else{
                header("location: medical.php");
            }
            
            //header("location: dashboard.php?success");
            
        } else{
            header("location: SignIn.php?error=wrongpass");
            die();
        }
      
    } else{
        header("location: SignIn.php?error=wrong");
        die();
        
    }        
    