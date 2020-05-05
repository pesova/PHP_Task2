<?php session_start();
 require_once('Lib/header.php');?>
 <link rel="stylesheet" href="main.css">
     <title>Paybills</title>

<div class="container-fluid">
    <br>
        <p class="h3">PayBills</p>



        <form class="form w-100" action="paybillProcess.php" method="post">
                <div class="row">       
            
                    <div class="col-md-6">
                        <div class="form-group">
                        <label><b>FullName</b></label>
                        <input readonly type="text" name="Name" value=" <?php echo $_SESSION['fullname'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label><b>Email</b></label>
                            <input  readonly type="text" name="Email" value="<?php echo $_SESSION['Email'] ?>">
                        </div>
                    </div>
            <div class="containerr">
                <div>

                    <div class="bg-success">
                        <div class="panel-heading">
                            <i class="fa fa-money">
                            <p class="h5">Emergency Payment</p></i>
                        </div>

                        <div class="panel-body text-center">
                            <p><strong>N15000</strong></p>
                        </div>
                        
                    </div>

                    <div class="bg-secondary">
                        <p>Emergency Bus Services</p>
                        <p>Emergency Doctors Attention</p>        
                    </div>

                    <div class="">
                        <label for="" class="btn btn-danger btn-block" ><input type="radio" value="15000" name="options">Select Payment</label>
                    </div>
                </div>

                
                <div class="rounded">

                    <div class="bg-success">
                        <div class="panel-heading">
                            <i class="fa fa-money">
                            <p class="h5">To Meet A Doctor</p></i>
                        </div>

                        <div class="panel-body text-center">
                            <p><strong>N25000</strong></p>
                        </div>
                        
                    </div>

                    <div class="bg-secondary">
                        <p>This payment will be for all Doctors Surcharge</p>
                        <p>Medics given are free</p>
                        <p>Immediate Doctors Consultation</p>        
                    </div>

                    <div class="">
                        <label for="" class="btn btn-danger btn-block" ><input type="radio" value="25000" name="options">Select Payment</label>
                    </div>
                </div>

                <div>

                    <div class="bg-success">
                        <div class="panel-heading">
                            <i class="fa fa-money">
                            <p class="h5">Home Services</p></i>
                        </div>

                        <div class="panel-body text-center">
                            <p><strong>N20000</strong></p>
                        </div>
                        
                    </div>

                    <div class="bg-secondary">
                        <p>A doctor is Assigned for regular check up At your comfort.</p>
                        <p>Nurse is Assigned</p>        
                    </div>

                    <div class="">
                        <label for="" class="btn btn-danger btn-block" ><input type="radio" value="20000" name="options">Select Payment</label>
                    </div>
                </div>

                <div>

                    <div class="bg-success">
                        <div class="panel-heading">
                            <i class="fa fa-money">
                            <p class="h5">Medicine Purchase</p></i>
                        </div>

                        <div class="panel-body text-center">
                            <p><strong>N11000</strong></p>
                        </div>
                        
                    </div>

                    <div class="bg-secondary">
                        <p>Covers All Medicine</p>
                        <p>Free Medics for 1 Month</p>        
                    </div>

                    <div class="">
                        <label for="" class="btn btn-danger btn-block" ><input type="radio" value="11000" name="options">Select Payment</label>
                    </div>
                </div>

                <div>

                    <div class="bg-success">
                        <div class="panel-heading">
                            <i class="fa fa-money">
                            <p class="h5">Diagnostics</p></i>
                        </div>

                        <div class="panel-body text-center">
                            <p><strong>N12000</strong></p>
                        </div>
                        
                    </div>

                    <div class="bg-secondary">
                        <p>Covers all type of Diagnostics.</p>
                        <p>Free Body Checkup.</p>        
                    </div>

                    <div class="">
                        <label for="" class="btn btn-danger btn-block" ><input type="radio" value="12000" name="options">Select Payment</label>
                    </div>
                </div>

                <div>

                    <div class="bg-success">
                        <div class="panel-heading">
                            <i class="fa fa-money">
                            <p class="h5">Pregnancy Services</p></i>
                        </div>

                        <div class="panel-body text-center">
                            <p><strong>N10000</strong></p>
                        </div>
                        
                    </div>

                    <div class="bg-secondary">
                        <p>Patience Taken care for till delivery</p>
                        <p>Free Antenatal & Postnatal Tutorial</p>        
                    </div>

                    <div class="">
                        <label for="" class="btn btn-danger btn-block" ><input type="radio" value="10000" name="options">Select Payment</label>
                    </div>
                </div>

                <button class="btn btn-success" name="pay" type="submit">Pay</button>
            </div>

        </form>

    <br>
        <br>
        <a class="btn btn-primary btn-lg" href="patient.php">Dashboard</a>
</div>
    
 </html>