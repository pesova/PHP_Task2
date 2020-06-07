<?php session_start();


$FullName = $_POST['Name'];
$Email  = $_POST['Email'];
$Date  = $_POST['date'];
$Time  = $_POST['Time'];
$Nature  = $_POST['Nature'];
$Complaint  = $_POST['Complaint'];
$Department  = $_POST['Department'];



if(isset($_POST['submit'])){


                    $allAppointments = scandir("db/Appointments/");
                    $countAllAppointments = count($allAppointments);
                    $newAppoinmtmentId = ($countAllAppointments-1);

                    $AppointmentObject = [
                        'id'=>$newAppoinmtmentId,
                        'FullName'=>$FullName,
                        'Email'=>$Email,
                        'Date'=> $Date,
                        'Time'=>$Time,
                        'Nature'=>$Nature,
                        'Complaint'=>$Complaint,
                        'department'=>$Department
                    ];

                        file_put_contents("db/Appointments/". $AppointmentObject['Email'] . ".json", json_encode($AppointmentObject));

                        header("location: patient.php?Appointment=success");

                }
        // user didnt click submit
            else{
          header("location: BookAppointment.php?Appointment=error");
            exit();
        }
