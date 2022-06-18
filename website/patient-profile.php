<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['patient_user'])) {
    header("location: $host/health_care/website/");
}
$connection = mysqli_connect("localhost", "root", "", "health_care") or  die("Connection failed : " . mysqli_connect_error());
$get_id = $_SESSION['userid'];
$profile = mysqli_query($connection, "SELECT * FROM patients   WHERE P_ID={$get_id}");
$show_profile = mysqli_fetch_array($profile);







//Appointment Table

$appointment = mysqli_query($connection, "SELECT * FROM appointment
LEFT JOIN city ON city.City_id=appointment.city  LEFT JOIN doctors ON doctors.ID=appointment.Doctor_id 
LEFT JOIN patients ON patients.P_ID=appointment.patient where patient= {$get_id}");



?>



<!DOCTYPE html>
<html lang="en">

<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="css/profile.css">

    <title>Profile</title>
</head>

<body>


    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="images/logo1.png" alt="" />

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-head">
                        <br><br>
                        <h3>
                            <?php echo $show_profile['P_name'] . " " . $show_profile['p_l_name'];
                             ?>
                        </h3>
                      
                        <br><br><br><br><br>
                        <ul class="nav nav-tabs">
                            <li class="nav-item ">
                                <a class="nav-link active">About</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" /> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        View Appointment
                    </button>

                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Appointment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Appointment ID</th>
                                        <th scope="col">Patient Name</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Appointment Date </th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                   
                                    while ($show_appointement = mysqli_fetch_array($appointment)) {

                                    // if (mysqli_num_rows($show_appointement)<1) {
                                    //     echo '<div class="alert alert-warning" role="alert">
                                    //     No Appointment Avalable Right Now !
                                    //   </div> ';
                                    //   echo "hello";
                                    // }

                                    ?>

                                        <tr>

                                            <th scope="row"><?php echo $show_appointement['A_ID']; ?> </th>
                                            <td><?php echo $show_appointement['P_name']; ?></td>
                                            <td><?php echo $show_appointement['D_O_B']; ?></td>
                                            <td><?php echo $show_appointement['A_Date']; ?></td>
                                            <td><?php echo $show_appointement['meeting_time']; ?></td>
                                            <td><?php echo $show_appointement['Status']; ?></td>
                                             
                                        </tr>

                                    <?php }  
                                    //  else{
                                        
                                    // }   ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                  
                </div>







                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>PatientUser Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $show_profile['P_ID']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $show_profile['P_name']." ".$show_profile['P_name']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $show_profile['P_mail']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $show_profile['P_phone']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $show_profile['P_address']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $show_profile['Username']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Password</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $show_profile['pass']." "; ?> <span style="text-decoration:underline;color:black; cursor:pointer;" data-toggle="modal" data-target="#exampleModal">Edit Password</span></p> 
                                    <a href="" ></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>

 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-sm">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update The Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post">
          <div class="form-group ">
             
                  <label for="input" class="form-label">Change Password</label>
                   <input type="text" class="form-control " name="password_edit" required> 
                 </div>  
                  
                  <button type="submit" name="password_btn" class="btn btn-primary"  >Save changes</button>
          </form>
          <?php 
          if (isset($_POST['password_btn'])) {

              $pass_edit=mysqli_query($connection,"UPDATE patients SET pass='{$_POST['password_edit']}' where P_ID={$get_id}");
          if ($pass_edit) {
           
          }
          
          }
         
          ?>
        </div> 
      
      </div>
      
    </div>
  </div>
</div>



</body>

</html>