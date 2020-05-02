<?php session_start();

//require_once('functions/alert.php');
//require_once('functions/redirect.php');
//require_once('functions/token.php');
require_once('functions/FindUser.php');


$Email  = $_POST['Email'];
$Password  = $_POST['Password'];

$_SESSION['Email'] = $Email;

    //find User (Function)
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
            if(isset($_POST['submit'])){

                $_SESSION['loggedIn'] = $_POST['submit'];

                if ($userObject->designation == 'Patient') {
                    header("location: patient.php");
                } elseif ($userObject->designation == 'Medical Team (MT)') {
                    header("location: medical.php");
                }elseif ($userObject->designation == 'SuperAdmin') {
                    header("location: superAdmin.php");
                }
                else{
                    header("location: SignIn.php?Login=UserNotFound");
                    die();
                }
            } else{
                header("location: SignIn.php?login=expired");
                exit();
            }
            
        
        //wrong user password
        } else{
            header("location: SignIn.php?Login=wrongpass");
            die();
        }

    } else{
        header("location: SignIn.php?Login=wrongUser");
        die();

    }
