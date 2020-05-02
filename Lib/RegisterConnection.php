<?php session_start();


$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email  = $_POST['Email'];
$Password  = $_POST['Password'];
$Gender  = $_POST['Gender'];
$designation  = $_POST['designation'];
$Department  = $_POST['Department'];

$_SESSION['Gender'] = $Gender;
$_SESSION['designation'] = $designation;



if(isset($_POST['submit'])){

//check if inputs are empty

    if(empty($FirstName) || empty($LastName) || empty($Email) || empty($Password) || empty($designation)){
  
        header("location: Register.php?signup=empty");
    exit();
    }      
        else{
        //check if inputs are valid

        if(!preg_match("/^[a-zA-Z]*$/", $FirstName) ||  !preg_match("/^[a-zA-Z]*$/", $LastName) || !preg_match("/^[a-zA-Z]*$/", $Department)){

            header("location: Register.php?signup=CharError");
            exit();
        }  
            else{

            //check if email is valid
            if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
                
            header("location: Register.php?signup=Email&FirstName=$FirstName&LastName=$LastName&designation=$designation");
            exit(); 
            }
                else{

                    $allUsers = scandir("db/users/"); //return @array (2 filled)
                    $countAllUsers = count($allUsers);
                    $newUserId = ($countAllUsers-1);

                    $userObject = [
                        'id'=>$newUserId,
                        'first_name'=>$FirstName,
                        'last_name'=>$LastName,
                        'Email'=>$Email,
                        'Password'=> password_hash($Password, PASSWORD_DEFAULT), //password hashing
                        'gender'=>$Gender,
                        'designation'=>$designation,
                        'department'=>$Department
                    ];
                    
                        file_put_contents("db/users/". $userObject['Email'] . ".json", json_encode($userObject));

                        header("location: SignIn.php?success");

                }
            }
        }
    }

        // user didnt click submit
            else{
            header("location: Register.php?signup=ClickRegister");
            exit();
        }
