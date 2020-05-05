<?php require_once('Lib/header.php');?>

<title>All Appointments</title>
                <h2>  All Appointments</h2>



          <?php

             $allAppointments = scandir("db/Appointments/");
             $countAllAppointments = count($allAppointments);
        ?>

        <div class="table table-bordered table-hover table-responsive-sm">
             <table class="table-responsive-sm">
                 <thead class="thead-light ">
                  <tr class="col-sm-4">
                    <th><b>ID:</b></th>
                    <th><b>FullName:</b></th>
                    <th><b>Email:</b></th>
                    <th><b>Date:</b></th>
                    <th><b>Time:</b></th>
                    <th><b>Nature:</b></th>
                    <th class="col"><b>Initial Complaint:</b></th>
                    <th><b>Department:</b></th>
                  </tr>

                 </thead>



                   <?php
                    for ($counter = 2; $counter < $countAllAppointments ; $counter++) {
                      echo "<tr>";
                        echo "<!--run the printing all Appointments loop -->";
                          $currentAppointment = $allAppointments[$counter];

                            $AppointmentString = file_get_contents("db/Appointments/".$currentAppointment);
                            $AppointmentObject = json_decode($AppointmentString);


                            if ($AppointmentObject) {
                              // show patients only
                                $id = $AppointmentObject->id;
                                $Fullname = $AppointmentObject->FullName;
                                $email = $AppointmentObject->Email;
                                $Date = $AppointmentObject->Date;
                                $Time = $AppointmentObject->Time;
                                $Nature = $AppointmentObject->Nature;
                                $Complaint = $AppointmentObject->Complaint;
                                $department = $AppointmentObject->department;
       ?>
                               <td><?php  echo "$id" ?></td>
                               <td><?php  echo "$Fullname" ?></td>
                               <td><?php  echo "$email" ?></td>
                               <td><?php  echo "$Date" ?></td>
                               <td><?php echo "$Time" ?></td>
                               <td><?php  echo "$Nature" ?></td>
                               <td><?php  echo "$Complaint" ?></td>
                               <td><?php  echo "$department" ?></td>


                     <?php   } else {
                              // no Appointment
                              echo "No Appointment Available";
                            }
                    }
       ?>
                 </tr>
              </table>

            </div>

<br>

         <a class="login  btn btn-primary" href="medical.php">Dashboard</a>


<?php require_once('Lib/footer.php');?>
