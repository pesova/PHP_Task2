<?php session_start();?>
<?php require_once('functions/alert.php');?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">

    </head>
 <body>

      <h2>   Book Appointment</h2>



      <form class="form" action="AppointmentProcess.php" method="post">

        <label><b>FullName</b></label>
                   <input readonly type="text" name="Name" value=" <?php echo $_SESSION['fullname'] ?>">

                   <br><br>

                   <label><b>Email</b></label>
                     <input  readonly type="text" name="Email" value="<?php echo $_SESSION['Email'] ?>">

                     <br>
                     <br>

                <label><b>Date of Appointment</b></label>
                  <input type="date" name="date" value=""required>

                  <br>
                  <br>

                  <label><b>Time</b></label>
                  <input type="time" name="Time" value="" required>

                  <br>


                  <label><b>Nature Of Appointment</b></label>  <br>
                  <select id="select" name="Nature" id="Gender">
                      <option value="">Select One</option>
                      <option>Purchase</option>
                      <option>Complaint</option>
                      <option>Health Services</option>
                  </select>

            <br><br>

            <label><b>Initial Complaint</b></label>
            <br>
            <textarea name="Complaint" rows="6" cols="80" placeholder="Enter Your Request Here" required></textarea>

            <br><br>

                  <label><b>Department</b></label>
                  <input type="text" name="Department" value="" placeholder="Enter Department" required>

                  <br>

                  <button type="submit" name="submit">Book Appointment</button>

                  <p>
                          <a href="patient.php">Cancle Appointment</a><br /> <br>
                  </p>




      </form>
<?php Appointment(); ?>

<?php require_once('Lib/footer.php');?>
