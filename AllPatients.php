<?php require_once('Lib/header.php');?>
    <title>All Staffs</title>

                <h2>  All Patients</h2>

                <div>
                     <table class="table table-bordered table-hover table-responsive-sm">
                         <thead class="thead-light ">
                          <tr class="col">
                            <th><b>ID</b></th>
                            <th><b>FirstName</b></th>
                            <th><b>LastName</b></th>
                            <th><b>Email</b></th>
                            <th><b>Gender</b></th>
                            <th><b>Designation</b></th>
                            <th><b>Department</b></th>
                          </tr>

                         </thead>

          <?php

             $allUsers = scandir("db/users/");
             $countAllUsers = count($allUsers);



             for ($counter = 2; $counter < $countAllUsers ; $counter++) {
               echo "<tr>";
                 echo "<!--run the printing all patients loop -->";

                   $currentUser = $allUsers[$counter];

                     $userString = file_get_contents("db/users/".$currentUser);
                     $userObject = json_decode($userString);


                     if ($userObject->designation == 'Patient') {
                       // show patients only
                         $id = $userObject->id;
                         $first_name = $userObject->first_name;
                         $last_name = $userObject->last_name;
                         $email = $userObject->Email;
                         $gender = $userObject->gender;
                         $designation = $userObject->designation;
                         $department = $userObject->department;

    ?>
                        <td><?php  echo "$id" ?></td>
                        <td><?php  echo "$first_name" ?></td>
                        <td><?php  echo "$last_name" ?></td>
                        <td><?php  echo "$email" ?></td>
                        <td><?php echo "$gender" ?></td>
                        <td><?php  echo "$designation" ?></td>
                        <td><?php  echo "$department" ?></td>
<?php
                     } else {
                       // not patients
                       echo " ";
                     }
                   }
?>

                        </tr>
                      </table>
                    </div>

                    <br>
                    <br>

         <a class="login  btn btn-primary" href="superAdmin.php">Dashboard</a>
<?php require_once('Lib/footer.php');?>
