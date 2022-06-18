<?php
include 'header.php';
include '../config/config.php';



//Fetching Data Accourding GET URL ID AND Flling Form To Edit 
if ($_GET['get_edit_id']) {



    $edit_id = $_GET['get_edit_id'];
    

    //fetching Data to Put IN form for Edit 
    $select_edit_query = "SELECT doctors.ID,doctors.Doc_name, doctors.Doc_l_name ,
doctors.Doc_mail,doctors.Doc_phone, doctors.Doc_picture,
 doctors.D_O_B,doctors.Gender,doctors.username,doctors.user_password, specailist.Specailist,specailist.SP_ID,
city.City_name,city.City_id FROM doctors LEFT JOIN specailist ON doctors.specailist = specailist.SP_ID 
LEFT JOIN city ON   doctors.city_name=city.City_id where ID={$edit_id} ";
    $result_fetch = mysqli_query($connection, $select_edit_query);
    $show_result = mysqli_fetch_array($result_fetch);
}


?>



<div id="main-content">


    <form action="update-doctors.php" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
            <!-- Page header section  -->
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <h1>Update Doctor </h1>

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
                                    <input type="hidden" name="id" value="<?php echo $show_result['ID']; ?>">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="<?php echo $show_result['Doc_name']; ?>" name="f_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="l_name" value="<?php echo $show_result['Doc_l_name']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group c_form_group">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <input type="text" name="date" class="form-control" value="<?php echo $show_result['D_O_B']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group c_form_group">
                                        <label>Gender <span class="text-danger">*</span></label>
                                        <select class="form-control show-tick" name="gender">
                                            <option dasabled><?php echo $show_result['Gender']; ?> </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group c_form_group">
                                        <label>Speciality <span class="text-danger">*</span></label>
                                        <select class="form-control show-tick " name="Speciality">
                                            <option value='<?php echo $show_result['SP_ID']; ?>'><?php echo $show_result['Specailist']; ?></option>
                                            <?php
                                            $find_sp = "SELECT *FROM specailist";
                                            $run_find_sp = mysqli_query($connection, $find_sp);

                                            while ($result = mysqli_fetch_array($run_find_sp)) {


                                            ?>
                                                <option value='<?php echo $result['SP_ID']; ?>'><?php echo $result['Specailist']; ?></option>

                                            <?php } ?>




                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group c_form_group">
                                        <label>City <span class="text-danger">*</span></label>
                                        <select class="form-control show-tick" name="city">
                                            <option selected value="<?php echo $show_result['City_id']; ?>"><?php echo $show_result['City_name']; ?></option>
                                            <?php
                                            include '../config/config.php';
                                            $query_select = "SELECT * FROM city";
                                            $query_select_check = mysqli_query($connection, $query_select);


                                            while ($show = mysqli_fetch_array($query_select_check)) {


                                            ?>

                                                <option value='<?php echo $show['City_id']; ?>'><?php echo $show['City_name']; ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Email Address<span class="text-danger">*</span></label>
                                        <input required class="form-control" type="email" name="mail" value='<?php echo $show_result['Doc_mail']; ?>'>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input required class="form-control" type="number" name="phone" value='<?php echo $show_result['Doc_phone']; ?>'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input  type="file" class="dropify" name="img" >
                                <div class="col-md-4 mt-2">
                                    <img style="border-radius: 30px;" src="upload/<?php echo $show_result['Doc_picture']; ?>" alt="Doctor Picture" width="300" height="300">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!---container-fluid END--->





        <!-- <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Patient's Account Information</h3>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group c_form_group">
                                <label>User Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="username">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group c_form_group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="pass">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group c_form_group">
                                <label>Confirm Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="pass1">
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div> -->



        <div class="col-sm-12 mb-4">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button type="submit" name="edit_cancel" class="btn btn-outline-secondary">Cancel</button>
        </div>
        </form>
</div>

<?php include 'footer.php'; ?>