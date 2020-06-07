<?php

function find_user($Email = ""){
    //check the database if the user exsits
    if(!$Email){
        header("location: SignIn.php?Login=user_not_set");
        die();
    } else{

    

    $allUsers = scandir("db/users/"); //return @array (2 filled)
    $countAllUsers = count($allUsers);

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {
       
        $currentUser = $allUsers[$counter];

        if($currentUser == $Email . ".json"){
          //check if the user exist.
            $userString = file_get_contents("db/users/".$currentUser);
            $userObject = json_decode($userString);
                       
            return $userObject;
            return $currentUser;
          
        }        
        
    }

    return false;
}
}