<?php
include 'header.php';
include '../config/config.php';
$fetch_patient = "SELECT * FROM  patients Where P_ID={$_GET['patient_id']}";

$run_fetch_query = mysqli_query($connection, $fetch_patient);

$display_row = mysqli_fetch_array($run_fetch_query);


?>

<div id="main-content">


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container-fluid">
            <!-- Page header section  -->
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <h1>Update Patient</h1>

                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input type="hidden" name="id"  value="<?php echo $display_row['P_ID'];?>">
                                        <input class="form-control" type="text" name="name" value="<?php echo $display_row['P_name'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="l_name" value="<?php echo $display_row['p_l_name'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group c_form_group">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <input type="text" name="date" value="<?php echo $display_row['D_O_B'];?>" data-date-autoclose="true" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group c_form_group">
                                        <label>Gender <span class="text-danger">*</span></label>
                                        <select class="form-control show-tick" name="gender">
                                            <option  value="<?php echo $display_row['P_gender'];?>"><?php echo $display_row['P_gender'];?></option>
                                            
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Email Address<span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="mail" value="<?php echo $display_row['P_mail'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="phone" value="<?php echo $display_row['P_phone'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="address" value="<?php echo $display_row['P_address'];?>">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Patient's Account Information</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group c_form_group">
                                    <label>User Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="username" value="<?php echo $display_row['Username'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group c_form_group input-group" id="show_hide_password">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input class="form-control" id="myInput" type="password" name="pass" value="<?php echo $display_row['pass'];?>">
                                    <i class="icon-eye" onclick="myFunction()"></i>
                                    
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group c_form_group">
                                    <label>Confirm Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="pass1">
                                     <i class="icon-eye" onclick="myFunction()"></i>
                                    
                                </div>
                            </div> -->
                            <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <button type="submit" name="Cancel" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<script>

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>

<?php 

$connection=mysqli_connect("localhost","root","","health_care") or  die("Connection failed : " . mysqli_connect_error());
if (isset($_POST['Cancel'])) {
header("location: http://localhost/health_care/medical_services/all-patients.php");
}

if (isset($_POST['submit'])) {
$name=$_POST['name'];
$l_name=$_POST['l_name'];
$date=$_POST['date'];
$gender=$_POST['gender'];
$mail=$_POST['mail'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$username=$_POST['username'];
$pass=$_POST['pass'];
$insert_patient="UPDATE  patients SET P_name='{$name}',p_l_name='{$l_name}',P_gender='{$gender}',
D_O_B='{$date}',P_mail='{$mail}',P_phone='{$phone}',P_address='{$address}',Username='{$username}',
pass='{$pass}' WHERE P_ID='{$_POST['id']}'";  

$run_insert_query=mysqli_query($connection,$insert_patient);
if ($run_insert_query) {
    //header("location: http://localhost/health_care/medical_services/all-patients.php");
    echo "<script>
    window.location = 'http://localhost/health_care/medical_services/all-patients.php';
</script>";
}
else{
    echo "Query FFFF";
}



}

?>


<?php include 'footer.php'; ?>