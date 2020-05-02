<?php require_once('Lib/header.php');?>
    <title>All Staffs</title>


                <h2>  All Staffs</h2>

                <div class="table table-bordered table-hover table-responsive-sm">
                     <table class="table-responsive-sm">
                         <thead class="thead-light ">
                          <tr class="">
                            <th><b>ID</b></th>
                            <th><b>FirstName</b></th>
                            <th><b>LastName</b></th>
                            <th class="col"><b>Email</b></th>
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
                 echo "<!--run the printing all staffs loop -->";
                   $currentUser = $allUsers[$counter];

                     $userString = file_get_contents("db/users/".$currentUser);
                     $userObject = json_decode($userString);


                     if ($userObject->designation == 'Medical Team (MT)') {
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
                        // not staff
                        echo " ";
                      }
                    }
 ?>

                         </tr>
                       </table>
                     </div>
         <a class="login  btn btn-primary" href="superAdmin.php">Dashboard</a>

<?php require_once('Lib/footer.php');?>
