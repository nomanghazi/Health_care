<?php include 'header.php'; ?>


<div id="main-content">

<form action="" method="POST" enctype="multipart/form-data">

    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h1>Add New Doctor</h1>
                 
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
                                    <input  required      class="form-control" type="text" name="f_name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group c_form_group">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input  required      class="form-control" type="text" name="l_name">
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group c_form_group">
                                    <label>Date of Birth <span class="text-danger">*</span></label>
                                    <input  required    type="date" data-provide="datepicker" data-date-autoclose="true" class="form-control" name="date">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group c_form_group">
                                    <label>Gender <span class="text-danger">*</span></label>
                                    <select class="form-control show-tick " name="gender">
                                        <option value="">- Gender -</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group c_form_group">
                                    <label>Speciality <span class="text-danger">*</span></label>
                                    <select class="form-control show-tick " name="Speciality">
                                        <option value="">- Speciality -</option>
                                        <?php 
                                    
                                        include '../config/config.php';
                                    // if ($connection) {
                                    //     echo "<script> alert('connected'); </script>";
                                    // }else{
                                    //     echo "NOT";
                                    // }
                                    $query_select_specailist="SELECT * FROM specailist";
                                    $query_select_check1=mysqli_query($connection,$query_select_specailist);
                                    
                                    while ($show1=mysqli_fetch_array($query_select_check1)) {

                                   
                                    ?> 
                                       
                                        <option value='<?php echo $show1['SP_ID']; ?>'><?php echo $show1['Specailist']; ?></option>
                                       
                                        <?php } ?>

                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group c_form_group">
                                    <label>City <span class="text-danger">*</span></label>
                                    <select class="form-control show-tick" name="city">
                                     <option disabled selected>- City -</option>
                                    <?php 
                                    include '../config/config.php';
                                    $query_select="SELECT * FROM city";
                                    $query_select_check=mysqli_query($connection,$query_select);
                                   
                                    
                                    while ($show=mysqli_fetch_array($query_select_check)) {

                                   
                                    ?> 
                                       
                                        <option value='<?php echo $show['City_id']; ?>'><?php echo $show['City_name']; ?></option>
                                       
                                        <?php } ?>

                                        </select>
                                      
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group c_form_group">
                                    <label>Enter Your Email <span class="text-danger">*</span></label>
                                    <input  required    class="form-control" type="email" value="" name="mail">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group c_form_group">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input  required     class="form-control" type="number" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input  required      type="file" class="dropify" name="img">
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
<!---container-fluid END--->


    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Doctor's Account Information</h3>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group c_form_group">
                                <label>User Name <span class="text-danger">*</span></label>
                                <input  required      class="form-control" type="text" name="username">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group c_form_group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input  required      class="form-control" type="password" name="pass">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group c_form_group">
                                <label>Confirm Password <span class="text-danger">*</span></label>
                                <input  required      class="form-control" type="password" name="pass1">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            <button type="submit" class="btn btn-outline-secondary" name="cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!---Form END--->
</form>
<!---Form END--->


<!--maint Content END-->
</div>
<!--maint Content END-->

<?php
include '../config/config.php';
if (isset($_POST['cancel'])) {
    //header("location: http://localhost/health_care/medical_services/all-doctors.php");
    echo "<script>
    window.location = 'http://localhost/health_care/medical_services/all-doctors.php';
</script>";
}
if (isset($_POST['submit'])) {
    $f_name =$_POST['f_name'];
    $l_name =$_POST['l_name'];
    $date   =$_POST['date'];
    $gender =$_POST['gender'];
    $Speciality =$_POST['Speciality'];
    $city   =$_POST['city'];
    $mail   =$_POST['mail'];
    $phone  =$_POST['phone'];
    $username =$_POST['username'];
    $pass   =$_POST['pass'];
    $img_name =$_FILES['img']['name'];
    $img_temp_name =$_FILES['img']['tmp_name'];
    $img_type =$_FILES['img']['type'];
    $location="upload/";

    //file Type Being Check Is it supported Or Not 
    if ($img_type="img/jpg" || $img_type="img/jpeg" || $img_type="img/png")
    {
        //This Function Used To Moved The Image file To the Folder 
        if (move_uploaded_file($img_temp_name,$location.$img_name)) {
           $query="INSERT INTO doctors (ID, Doc_name, Doc_l_name,
            D_O_B, Gender, Doc_mail, Doc_phone, specailist,
             Doc_picture, city_name, username, user_password)
            VALUES (NULL, '$f_name', '$l_name', '$date', '$gender', '$mail','$phone',' $Speciality',
            '$img_name', '$city', '$username', '$pass')";
            $run_query_insert=mysqli_query($connection,$query);
            
            //Checking The Query Is it Running Or NOt 
            if ($run_query_insert) {
                echo "<script>window.location = 'http://localhost/health_care/medical_services/all-doctors.php';</script>";
               // header("location: http://localhost/health_care/medical_services/all-doctors.php");
            }
            else{
                echo "Query Feiled";
            }

        //img file moved Function END    
        }
    
        




    //End Of The Cheking File Extention    
    }
    else {
        echo 'Image Formate Not Supported';
    }


    
}
 include '../config/config.php'; 

?>


<?php include 'footer.php'; ?>