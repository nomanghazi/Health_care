<?php
//header File 
include 'header.php';
//Configuration File 
include '../config/config.php';

$fetchdoctor = "SELECT *From doctors";
$fetchdoctor_query = mysqli_query($connection, $fetchdoctor);


?>



<div id="main-content">
    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12">

                    <a href="http://localhost/health_care/medical_services/add-doctor.php" class="btn btn-primary">Register a New Doctor</a>

                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
                    <div class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">
                        <div class="border-right pr-4 mr-4 mb-2 mb-xl-0 hidden-xs">
                            <p class="text-muted mb-1">Permanent</p>
                            <h5 class="mb-0">214</h5>
                        </div>
                        <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                            <p class="text-muted mb-1">Contract</p>
                            <h5 class="mb-0">206</h5>
                        </div>
                        <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                            <p class="text-muted mb-1">Total</p>
                            <h5 class="mb-0">420</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="row clearfix">
          

                    <?php

                    while ($display = mysqli_fetch_array($fetchdoctor_query)) {

                    ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="header">
                                    <ul class="header-dropdown dropdown">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                            <ul class="dropdown-menu theme-bg gradient vivify fadeIn">
                                                <li><a href="" data-toggle="modal" data-target="#remove">Profile Details</a></li>
                                                <li><a href="http://localhost/health_care/medical_services/edit-doctors.php?get_edit_id=<?php echo $display['ID']; ?>">Edit</a></li>
                                                <li><a href="?get_id_rem=<?php echo $display['ID']; ?>" >Delete</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                               



                                <div class="body text-center">
                                    <div class="circle">
                                        <img class="rounded-circle" width="130" height="130" src="upload/<?php echo $display['Doc_picture'];  ?>" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0"><?php echo $display['Doc_name'] . " " . $display['Doc_l_name'];  ?></h6>
                                    <span><?php echo $display['Doc_mail']; ?></span>
                
                                    <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-slack"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                    <a href="?get_id=<?php echo $display['ID']; ?>#" >
                                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModalCenter"> View Profile </button>
                                    </a>
                                </div>

                            </div>
                        </div>

                    <?php }   ?>



                </div>
            </div>
        </div>



    </div>
</div>

<!-- Small modal -->
<!--=======Modal Body END========--->
<!-- <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-body ">
    <strong>Do you want To Delete This Record ??</strong>
      </div>
      <?php echo $_GET['get_id_rem']; ?>
      
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancle</button>
       <?php 
        $fetch_query=("SELECT * FROM doctors where ID={$_GET['get_id_rem']}");
        $sql_query=mysqli_query($connection,$fetch_query);
        $ft=mysqli_fetch_array($sql_query);  ?>
        <a href="?get_id_rem=<?php echo $ft['ID']; ?>" > <button type="submit" class="btn btn-danger" name="Delete" >Delete</button></a>
        
      </div>
    </div>
  </div>
</div> -->




<!--medium Cenral  Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-center " id="exampleModalLongTitle">Profile Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php 
            if ($_GET['get_id']) {
            $get=$_GET['get_id'];

          /*  
            "SELECT * FROM doctors
        */

            $fetch_profile=("SELECT doctors.Doc_name, doctors.Doc_l_name ,
            doctors.Doc_mail,doctors.Doc_phone, doctors.Doc_picture,
             doctors.D_O_B,doctors.Gender,doctors.username,doctors.user_password, specailist.specailist,
            city.City_name FROM doctors LEFT JOIN specailist ON doctors.specailist = specailist.SP_ID 
            LEFT JOIN city ON   doctors.city_name=city.City_id where ID='$get' ");  
            $fetch_profile_result=mysqli_query($connection,$fetch_profile);
            $display_profile=mysqli_fetch_array($fetch_profile_result);
           
        }   
           
            
            
            
            ?>

            <div class="modal-body">
                <div class="col-lg-12 col-md-6">
                    <div class="card ">

                        <div class="body text-center">
                         
                        <div class="circle">
                                        <img class="rounded-circle" width="130" height="130" src="upload/<?php echo $display_profile['Doc_picture'];  ?>" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0"><?php echo $display_profile['Doc_name'] . " " . $display_profile['Doc_l_name'];  ?></h6>
                                    <span><?php echo $display_profile['Doc_mail']; ?></span>
                            <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                            <li><a class="p-3" target="_blank" href="#"><i class="fa fa-skype"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a class="p-3" target="_blank" href="#"><i class="fa fa-dribbble"></i></a></li>
                                        </ul>
                        </div>

                       
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-8">
                            <strong class="col-sm-4 col-form-label"><?php echo $display_profile['Gender']; ?></strong>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Date Of Birth</label>
                            <div class="col-sm-8">
                            <strong class="col-sm-4 col-form-label"><?php echo $display_profile['D_O_B']; ?></strong>
                            </div>
                        </div>
                      
                       
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Specailist</label>
                                <div class="col-sm-8">
                                <strong class="col-sm-4 col-form-label"><?php  echo $display_profile['specailist']; ?></strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Phone Number</label>
                                <div class="col-sm-8">
                                <strong class="col-sm-4 col-form-label"><?php echo $display_profile['Doc_phone']; ?></strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">City</label>
                                <div class="col-sm-8">
                                <strong class=" col-form-label"><?php echo $display_profile['City_name']; ?></strong>
                                </div>
                            </div>

                          

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Edit Profile</button>
                    </div>
                </div>
            </div>

        </div>







<!---=================== Modal For Deletting Record ===================-->
<!-- <div class="modal fade remove" id="remove" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createLabel">Removing The Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <!--=======Modal Body Start========--->
     
      <!-- <div class="modal-body ">
    <strong>Do you want To Delete This Record ??</strong>
      </div> -->
      <!--=======Modal Body END========--->
       <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancle</button>
       <?php 
        $fetch_query=("SELECT * FROM doctors");
        $sql_query=mysqli_query($connection,$fetch_query);
        $ft=mysqli_fetch_array($sql_query);  ?>
        <a href="?get_id_rem=<?php echo $ft['ID']; ?>" > <button type="submit" class="btn btn-danger" name="Delete" >Delete</button></a>
        
      </div>

    </div>
  </div>
</div> -->




<?php
if ($_GET['get_id_rem']) {
    $get_id_rem=$_GET['get_id_rem'];
    $remove="DELETE FROM doctors WHERE ID=$get_id_rem";
    $remove_query=mysqli_query($connection,$remove);
  
    echo "<script>
    window.location = 'http://localhost/health_care/medical_services/all-doctors.php';
    alert('Deleted Successfylly'); 
</script>";

}

?>

        <?php include 'footer.php'; ?>