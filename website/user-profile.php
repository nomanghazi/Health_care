<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['doc_user_name'])) {
    header("location: $host/health_care/website/");
}
$connection = mysqli_connect("localhost", "root", "", "health_care") or  die("Connection failed : " . mysqli_connect_error());
$get_id = $_SESSION['doc_id'];
$profile = mysqli_query($connection, "SELECT * FROM doctors LEFT JOIN Specailist
 ON doctors.specailist=Specailist.SP_ID LEFT JOIN city ON city.City_id=doctors.city_name WHERE ID={$get_id}");
$show_profile = mysqli_fetch_array($profile);







//Appointment Table

$appointment = mysqli_query($connection, "SELECT * FROM appointment
LEFT JOIN city ON city.City_id=appointment.city  LEFT JOIN doctors ON doctors.ID=appointment.Doctor_id LEFT JOIN patients ON patients.P_ID=appointment.patient where Doctor_id= {$get_id}");




?>



<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <img src="../medical_services/upload/<?php echo $show_profile['Doc_picture']; ?>" alt="Doctor Picture" />

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-head">
                        <br><br>
                        <h1>
                            <?php echo $show_profile['Doc_name'] . " " . $show_profile['Doc_l_name'];

                            ?>

                        </h1>
                        <h4 class="text-primary">

                            <?php echo $show_profile['Specailist'];
                            // echo $show_appointement['City_name'];
                            ?>
                        </h4>
                        <br><br><br><br><br>
                        <ul class="nav nav-tabs">
                            <li class="nav-item ">
                                <a class="nav-link active">About</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="button" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" data-toggle="modal" data-target="#user_edit" />
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Appointment
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
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php





                                    if ($appointment > 0) {
                                        while ($show_appointement = mysqli_fetch_array($appointment)) {


                                    ?>

                                            <tr>
                                                <th scope="row"><?php echo $show_appointement['A_ID']; ?> </th>
                                                <td><?php echo $show_appointement['P_name']; ?></td>
                                                <td><?php echo $show_appointement['D_O_B']; ?></td>
                                                <td><?php echo $show_appointement['A_Date']; ?></td>
                                                <td><?php echo $show_appointement['meeting_time']; ?></td>
                                                <td ><a href="" <?php if($show_appointement['status']=='pending'){ echo 'style="background-color:#e8c24f; color:#000000; border-radius:10%; padding:5px;"'; } elseif($show_appointement['status']=='Aproved'){ echo 'style="background-color:#2df50a; color:#000000; border-radius:10%; padding:5px;"';} ?> >
                                                <?php echo $show_appointement['status']; ?></a></td>
                                                <td><a href="aprove?app_edit_id=<?php echo $show_appointement['A_ID']; ?>"> Edit </a></td>
                                            </tr>

                                    <?php }
                                    } else {
                                        echo '<div class="alert alert-warning" role="alert">
                                        No Appointment Avalable Right Now !
                                      </div> ';
                                    }

                                    ?>

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
                    <div class="profile-work">
                        <p>Degree(2016) </p>
                        <a href=""><i class="fa fa-facebook"></i>   Facebook</a><br />
                        <a href=""><i class="fa  fa-instagram "></i>   Instagram</a><br />
                        <a href=""><i class="fa fa-twitter "></i>   Twitter</a><br />
                      
                    </div>
                </div>







                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $show_profile['ID']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $show_profile['Doc_name']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $show_profile['Doc_mail']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p> <?php echo $show_profile['Doc_phone']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $show_profile['Specailist']; ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>


    <?php


    if (isset($_SESSION['doc_id'])) {

        $edit_id = $_SESSION['doc_id'];


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

    ?>

    <!--============== Modal for EDIT Doctor ================-->
    <div class="modal fade" id="user_edit" tabindex="-1" role="dialog" aria-labelledby="user_editLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="user_editLabel">Update Doctor </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <form  method="post" >
                <div class="modal-body">

                    <div id="main-content">


                       
                            <div class="container-fluid">
                               

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
                                                        <input  type="hidden"   name="img" value="<?php echo $show_result['Doc_picture']; ?>">
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group c_form_group">
                                                            <label>User Name<span class="text-danger">*</span></label>
                                                            <input required class="form-control" type="text" name="username" value='<?php echo $show_result['username']; ?>'>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group c_form_group">
                                                            <label>Password <span class="text-danger">*</span></label>
                                                            <input required class="form-control" type="password" name="password" value='<?php echo $show_result['user_password']; ?>'>
                                                        </div>
                                                      
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div> 
                    </div>
                </div>
                

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                </div>
            
            </form>
                
            </div>
        </div>
    </div>



<!-- Appoint Ment Edit Modal  -->
<button type="button" class="btn btn-primary" >
  
</button>

<!-- Modal -->
<div class="modal fade" id="appointment" tabindex="-1" role="dialog" aria-labelledby="appointmentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="appointmentLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>







    <?php 

 

 
if (isset($_POST['submit'])) {
    $id=$_POST['id'];
    $f_name =$_POST['f_name'];
    $l_name =$_POST['l_name'];
    $date   =$_POST['date'];
    $gender =$_POST['gender'];
    $Speciality =$_POST['Speciality'];
    $city   =$_POST['city'];
    $mail   =$_POST['mail'];
    $phone  =$_POST['phone'];
    $img_name =$_POST['img'];
    $username =$_POST['username'];
    $password =$_POST['password'];

     

    
         $query="UPDATE doctors SET Doc_name='{$f_name}', Doc_l_name='{$l_name}',
            D_O_B='{$date}', Gender='{$gender}', Doc_mail='{$mail}', Doc_phone={$phone},
             specailist={$Speciality},
             Doc_picture='{$img_name}', city_name={$city},username='{$username}',user_password='{$password}' WHERE ID={$id}";
           
            $run_query_insert=mysqli_query($connection,$query);

            //Checking The Query Is it Running Or NOt 
//             if ($run_query_insert) {
//                 echo "<script>
//     window.location = 'http://localhost/health_care/';
// </script>";
//                // header("location: http://localhost/health_care/medical_services/all-doctors.php");
//             }
//             else{
//                 echo "Query Feiled";
//             } 
     
}

?>
</body>

</html>