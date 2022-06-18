<?php
error_reporting(0);
session_start();

?>
<?php

$connection = mysqli_connect("localhost", "root", "", "health_care") or  die("Connection failed : " . mysqli_connect_error());

//Login Form Submition
if (isset($_POST['login'])) {

    $user_type = $_POST['usertype'];
    $username = $_POST['l_username'];
    $password = $_POST['l_password'];

    if ($user_type=='2') {

        $userlogin = "SELECT P_ID,P_name,p_l_name,Username,pass,P_mail FROM patients 
        WHERE Username='{$username}' AND pass='{$password}'";
        $login_query = mysqli_query($connection, $userlogin);
        if (mysqli_num_rows($login_query) > 0) {
             $user = mysqli_fetch_assoc($login_query);
                session_start();
                $_SESSION["userid"]=$user['P_ID'];
                $_SESSION["patient_user"]=$user['Username'];
                $_SESSION["P_name"] = $user['P_name'];
                $_SESSION["P_l_name"] = $user['p_l_name'];
                $_SESSION["mail"] = $user['P_mail'];

                echo "<script> 
                 window.location=' http://localhost/health_care/website';
                        </script>";
                //header("location: http://localhost/health_care/index.php");

            
        }
         else {

            echo "<script> alert('User Name Or password is incerrect');</script>";
        }
    }

    //If the User Select Doctor AND Patient from dropdown
    elseif($user_type=='1'){
        $doctor_login=mysqli_query($connection,"SELECT * FROM doctors 
        WHERE username='{$username}' AND user_password='{$password}'");
        if (mysqli_num_rows($doctor_login)>0) {
           while($fetch_doc_details_to_make_session=mysqli_fetch_assoc($doctor_login)){
            session_start();
            $_SESSION["doc_id"]=$fetch_doc_details_to_make_session['ID'];
            $_SESSION["doc_name"]=$fetch_doc_details_to_make_session['Doc_name'];
            $_SESSION["doc_l_name"]=$fetch_doc_details_to_make_session['Doc_l_name'];
            $_SESSION["doc_user_name"]=$fetch_doc_details_to_make_session['username'];
            
            echo "<script> 
            window.location=' http://localhost/health_care/website';
            </script>";
        } 
        }
        else {

            echo "<script> alert('User Name Or password is incerrect');</script>";
        }
        
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>


    </style>


    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>Medila - Medical Treatment & Health Care Landing Page Template</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="css/login.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="images/favicon.html">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- ICONS -->
    <link rel="stylesheet" href="css/ilmosys-icon.css">
    <link rel="stylesheet" href="css/icons/fontawesome/css/style.css">
    <link rel="stylesheet" href="css/icons/style.css">
    <link rel="stylesheet" href="css/icons/icon2/style.css">
    <link rel="stylesheet" href="js/vendors/swipebox/css/swipebox.min.css">



    <!-- THEME / PLUGIN CSS -->
    <link rel="stylesheet" href="js/vendors/slick/slick.css">
    <link rel="stylesheet" href="css/style1.css">


</head>



<body id="page-top">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <p>Request Send Successfully</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>

                </div>
            </div>
        </div>
    </div> -->
    <div class="body">
        <!-- HEADER -->
        <header>

            <nav class="navbar-inverse navbar-lg navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="intro.html" class="navbar-brand brand"><img src="images/logo1.png" alt="logo"></a>
                    </div>

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left navbar-contact">
                            <li>
                                <a href="#"><span class="icon-call"></span>+923343503781</a>
                            </li>
                        </ul>

                        <?php   if(isset($_SESSION['doc_user_name'])){
                            $username=$_SESSION['doc_user_name'];
                            $doc_id=$_SESSION["doc_id"];
                            echo "<ul class='nav navbar-nav navbar-right'>
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#home'>Home</a>
                            </li>
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#'>About</a>
                            </li>
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#services'>Diseases & Prevention</a>
                            </li>
                        
                            <!-- <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#features'>Features</a>
                            </li> -->
                        
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#services'>Services</a>
                            </li>
                        
                        
                        
                        
                        
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#contact-info'>Contact</a>
                            </li>
                            
                            <li class='dropdown mm-menu ' style='margin-top: -3%; margin-right:-70px; position:absolute;'>
                        
                            <a class='page-scroll col-sm-4' href='user-profile.php?user_id={$doc_id}'><i class='ilmosys-user col-sm-8' style='font-size: 20px;'></i>$username</a>
                            </li>
                            
                            <li class='dropdown mm-menu ' style='margin-top: -3%; margin-left:10px; position:absolute;'>
                            
                            <a class='page-scroll  col-sm-4' href='logout.php'><i class='ilmosys-power-2  col-sm-4 ' style='font-size: 20px;'></i>Logout</a>
                            </li>
                            
                            ";
                            
                        }
                          
                                                  
                     elseif(isset($_SESSION['patient_user'])){
                            $patient_username=$_SESSION['patient_user'];
                            $patient_id=$_SESSION['userid'];
                            echo "<ul class='nav navbar-nav navbar-right'>
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#home'>Home</a>
                            </li>
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#'>About</a>
                            </li>
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#services'>Diseases & Prevention</a>
                            </li>
                        
                            <!-- <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#features'>Features</a>
                            </li> -->
                        
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#services'>Services</a>
                            </li>
                        
                        
                        
                        
                        
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#contact-info'>Contact</a>
                            </li>
                            
                            <li class='dropdown mm-menu ' style='margin-top: -3%; margin-right:-70px; position:absolute;'>
                        
                            <a class='page-scroll col-sm-4' href='patient-profile.php?user_id={$patient_id}'><i class='ilmosys-user col-sm-8' style='font-size: 20px;'></i>$patient_username</a>
                            </li>
                            
                            <li class='dropdown mm-menu ' style='margin-top: -3%; margin-left:10px; position:absolute;'>
                            
                            <a class='page-scroll  col-sm-4' href='logout.php'><i class='ilmosys-power-2  col-sm-4 ' style='font-size: 20px;'></i>Logout</a>
                            </li>
                            
                            ";
                            
                            
                        }
                        else{
                            echo "<ul class='nav navbar-nav navbar-right'>
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#home'>Home</a>
                            </li>
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#'>About</a>
                            </li>
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#services'>Diseases & Prevention</a>
                            </li>
                        
                            <!-- <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#features'>Features</a>
                            </li> -->
                        
                            <li class='dropdown mm-menu'>
                                <a class='page-scroll' href='#services'>Services</a>
                            </li>      <li class='dropdown mm-menu'>
                            <a class='page-scroll' href='#contact-info'>Contact</a>
                        </li>
                        <li class='dropdown mm-menu'>
                        <a class='page-scroll' href='#' data-toggle='modal' data-target='.bd-example-modal-lg'>Registration</a>
                        </li>
                        <li class='dropdown mm-menu'>
                        <a class='page-scroll' href='#' data-toggle='modal' data-target='#exampleModal'>Login</a>
                        </li>
                        </ul>
                  
                ";
                        }
                            
                            
                            
                            ?>





                        <!-- <ul class="nav navbar-nav navbar-right">


                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#home">Home</a>
                            </li>
                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#">About</a>
                            </li>
                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#">Diseases & Prevention</a>
                            </li>

                        

                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#services">Services</a>
                            </li>





                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#contact-info">Contact</a>
                            </li> -->

                         <!--===========Doctor Session =============  -->
                            <?php  
                           
                                ?>
  <!-- <li class="dropdown mm-menu   " style="margin-top: -3%; margin-right:-70px; position:absolute;">

<a class="page-scroll col-sm-4" href="user-profile.php?user_id=<?php // echo $_SESSION['doc_id']; ?>"><i class="ilmosys-user col-sm-8" style="font-size: 20px;"></i> <?php echo $_SESSION['doc_user_name']; ?></a>
</li>

<li class="dropdown mm-menu " style="margin-top: -3%; margin-left:10px; position:absolute;">

<a class="page-scroll  col-sm-4" href="logout.php"><i class="ilmosys-power-2  col-sm-4 " style="font-size: 20px;"></i>Logout</a>
</li>
 -->

                        <?php   
                            ///if(!$_SESSION['doc_user_name']){
                            ?>
                                <!-- <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#" data-toggle="modal" data-target=".bd-example-modal-lg">Registration</a>
                            </li>
                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#" data-toggle="modal" data-target="#exampleModal">Login</a>
                            </li> -->

                            <?php //}
                           //session_start();
                           // if (!$_SESSION['patient_user'] == true) {
                            ?>
                                <!-- <li class="dropdown mm-menu">
                                    <a class="page-scroll" href="#" data-toggle="modal" data-target=".bd-example-modal-lg">Registration</a>
                                </li>
                                <li class="dropdown mm-menu">
                                    <a class="page-scroll" href="#" data-toggle="modal" data-target="#exampleModal">Login</a>
                                </li> -->

                            <?php//  }
                           // if ($_SESSION['patient_user'] == true) {
                            ?>
                                <!-- <li class="dropdown mm-menu   " style="margin-top: -3%; margin-right:-70px; position:absolute;">

                                    <a class="page-scroll col-sm-4" href="user-profile.php?user_id=<?php //echo $_SESSION['userid']; ?>"><i class="ilmosys-user col-sm-8" style="font-size: 20px;"></i> <?php //echo $_SESSION['patient_user']; ?></a>
                                </li>

                                <li class="dropdown mm-menu " style="margin-top: -3%; margin-left:10px; position:absolute;">

                                    <a class="page-scroll  col-sm-4" href="logout.php"><i class="ilmosys-power-2  col-sm-4 " style="font-size: 20px;"></i>Logout</a>
                                </li> -->



                            <?php// } ?>

                        <!-- </ul> -->

                    </div>
                </div>

            </nav>

        </header>

        <!-- Large modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">


                        <div class="row justify-content-center">
                            <div class="col-md-8">

                                <form class="form-horizontal" method="POST" role="form">

                                    <div class="form-group">
                                        <label for="firstName" class="col-sm-3 control-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="lastName" placeholder="Last Name" class="form-control" autofocus name="l_name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="birthDate" class="col-sm-3 control-label">Date of Birth*</label>
                                        <div class="col-sm-9">
                                            <input type="date" id="birthDate" class="form-control" name="date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">Email* </label>
                                        <div class="col-sm-9">
                                            <input type="email" id="email" placeholder="Email" class="form-control" name="email" name="mail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                                        <div class="col-sm-9">
                                            <input type="phoneNumber" id="phoneNumber" placeholder="Phone number" class="form-control" name="phone">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneNumber" class="col-sm-3 control-label">Address </label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Address" class="form-control" name="address">

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Gender</label>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" value="Female" name="gender">Female
                                                    </label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" value="Male" name="gender">Male
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <div class="">
                                            <label>Account Information</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-3 control-label">User Name</label>
                                            <div class="col-sm-9">
                                                <input type="texst" id="password" placeholder="Username" class="form-control" name="username">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-3 control-label">Password*</label>
                                            <div class="col-sm-9">
                                                <input type="password" id="password" placeholder="Password" class="form-control" name="pass">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                                            <div class="col-sm-9">
                                                <input type="password" id="password" placeholder="Password" class="form-control" name="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="submit">Create</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <img src="images/side.png" style="width:100%; height:600px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!--Login Modal -->
        <div class="modal fade wrapper fadeInDown" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="formContent">
                    <div class="fadeIn first">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 128 128" style=" fill:#000000;">
                            <path d="M24.3 104.1c-.8 1.4-.3 3.3 1.1 4.1.5.3 1 .4 1.5.4 1 0 2.1-.5 2.6-1.5C36.6 94.7 49.8 87 64 87c4.7 0 9.4.8 13.8 2.5.3.1.7.2 1 .2 1.2 0 2.4-.7 2.8-2 .6-1.6-.2-3.3-1.8-3.9C74.8 82 69.5 81 64 81 47.6 81 32.4 89.9 24.3 104.1zM64 27c-12.7 0-23 10.3-23 23s10.3 23 23 23 23-10.3 23-23S76.7 27 64 27zM64 67c-9.4 0-17-7.6-17-17s7.6-17 17-17 17 7.6 17 17S73.4 67 64 67zM118 85c0-7.7-6.3-14-14-14s-14 6.3-14 14v9h-1c-2.8 0-5 2.2-5 5v7c0 11 9 20 20 20s20-9 20-20v-7c0-2.8-2.2-5-5-5h-1.1c0-.2.1-.3.1-.5V85zM107 111.7c0 1.7-1.3 3-3 3s-3-1.3-3-3v-5.2c0-1.7 1.3-3 3-3s3 1.3 3 3V111.7zM96 94v-9c0-4.4 3.6-8 8-8s8 3.6 8 8v8.5c0 .2 0 .3.1.5H96z"></path>
                        </svg>
                    </div>

                    <!-- Login Form -->
                    <form method="POST">
                        <label>Select User Type</label>
                        <select class="form-control form-group fadeIn second  f-input input-field " style="width: 50%;margin-left:10%; " name="usertype" id="" required>
                            <option value="1">Doctor</option>
                            <option value="2">Patient</option>
                        </select>
                        <input type="text" id="login" class="fadeIn second" name="l_username" placeholder="login" required>
                        <input type="text" id="password" class="fadeIn third" name="l_password" placeholder="password" required>
                        <input type="submit" class="fadeIn fourth" value="Log In" name="login">
                    </form>

                    <!-- Remind Passowrd -->
                    <div id="formFooter">
                        <a class="underlineHover" href="#">Forgot Password?</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- INTRO -->
        <div id="home" class="intro intro1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row center-content">
                    <div class="col-sm-10">
                        <h2>We made your medical<br>treatment easy</h2>
                        <p>In a world where medicine is over-specialized, it is sometimes difficult to obtain
                        liable information or to quickly access the right doctors suited to your health problem 
                        dolorum veritatis ea odio dolor emque.</p>
                        <div class="row">
                            <div class="col-md-10">
                                <ul class="features-list">
                                    <li>
                                        <i class="ilmosys-microscope"></i>
                                        <h5>Laboratory services</h5>
                                    </li>

                                    <li>
                                        <i class="ilmosys-x-ray"></i>
                                        <h5>Radiology and X-ray facility</h5>
                                    </li>

                                    <li>
                                        <i class="ilmosys-ambulance"></i>
                                        <h5>Ambulance Services</h5>
                                    </li>

                                    <li>
                                        <i class="ilmosys-clinic"></i>
                                        <h5>Ward/ Indoor facility</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br><br>

                     <?php if(!$_SESSION['doc_user_name']==true){ ?>       
                    <div class="col-sm-5 col-md-7">
                        <?php
                        //   
                        //   $_SESSION["patient_user"] = $user['Username'];
                        //   $_SESSION["P_name"] = $user['P_name'];
                        //   $_SESSION["P_l_name"] = $user['p_l_name'];
                        //   =$user['P_mail'];
                        //session_start();
                        if (isset($_POST['appointment'])) {
                            if ($_SESSION['patient_user'] == true) {
                                $id = $_SESSION["userid"];
                                $name = $_SESSION['p_name'];
                                $email = $_SESSION["mail"];
                                $city = $_POST['city'];
                                $doctor_id = $_POST['doctor'];
                                $date = $_POST['date'];
                                $make_appointment_for_patient = mysqli_query($connection, "INSERT INTO appointment (A_ID, A_specialist,
                Doctor_id, patient, city, A_Date, metting_time, status)
                VALUES (NULL, '2', '$doctor_id', '$id', '$city', '$date', '', 'Pending')");
                                if ($make_appointment_for_patient) {


                                    echo '<script>alert("hello")</script>';
                                }
                            }
                        }

                        // if (isset($_POST['appointment'])) {

                        // if ($_SESSION['patient_user']==false) {
                        //     $_SESSION["login_first"]="Please login First";
                        //     }
                        // }
                        // else {
                        //    echo '';

                        // }
                        echo '<form   method="post"> 
                        <div class="intro-form" id="join-us-form contact-form">
                            <h4>make Appointment</h4>';
                        if (isset($_POST['appointment'])) {
                            if (!$_SESSION['patient_user'] == true) {
                                echo '<p style="color:red;">Please Login First </p>';


                                // echo "<script> 
                                //     alert('<div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
                                //     <div class='toast-header'>

                                //       <strong class='mr-auto'>Bootstrap</strong>
                                //       <small class='text-muted'>11 mins ago</small>
                                //       <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
                                //         <span aria-hidden='true'>&times;</span>
                                //       </button>
                                //     </div>
                                //     <div class='toast-body'>
                                //       Hello, world! This is a toast message.
                                //     </div>
                                //     </div>');
                                //    </script>";
                            }
                        }

                        ?>


                        <div id="join-us-results"></div>

                        <!-- Form -->

                        <div class="form-group">
                            <input type="text" name="first_name" id="first_name" class="form-control f-input input-field" placeholder="First Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" id="last_name" class="form-control f-input input-field" placeholder="Last Name" />
                        </div>
                        <!-- <div class="form-group">
                                <input type="text" name="email" class="form-control f-input input-field" placeholder="Email" />
                            </div> -->
                        <div class="form-group">
                            <input type="text" name="phone" maxlength="15" class="form-control f-input input-field" placeholder="Phone" />
                        </div>
                        <select name="city" id="" class="form-control form-group  f-input input-field">
                            <option>Select City</option>
                            <?php
                            $make_appointment = mysqli_query($connection, "SELECT * FROM city");
                            while ($make_app = mysqli_fetch_array($make_appointment)) {
                                echo "<option name='op' value='{$make_app['City_id']}'>{$make_app['City_name']}</option>";
                            }


                            ?>


                        </select>
                        <select name="doctor" id="" class="form-control form-group  f-input input-field">
                            <option value="" selected>Select Doctor</option>
                            <?php
                            $doctors_fetch = mysqli_query($connection, "SELECT * FROM  doctors");
                            while ($doc = mysqli_fetch_array($doctors_fetch)) {
                                echo "<option value='{$doc['ID']}'>{$doc['Doc_name']}</option>";
                            }
                            ?>
                        </select>
                        <div class="form-group">
                            <input type="date" name="date" id=" " class="form-control f-input input-field" placeholder="Last Name" />
                        </div>
                        <button type="submit" class="btn btn-block btn-lg btn-primary" id="submit_btn" name="appointment" onclick="modalfunction()">Make an Appointment</button>
                     
                    </form></div>
                            <?php } ?>

                    <div id="sendingMessage" class="statusMessage">
                        <p><i class="fa fa-spin fa-cog"></i> Sending your message. Please wait...</p>
                    </div>

                    <div id="successMessage" class="successmessage">
                        <p><span class="success-ico"></span> Thanks for sending your message! We'll get back to you shortly.</p>
                    </div>
                    <div id="failureMessage" class="errormessage">
                        <p><span class="error-ico"></span> There was a problem sending your message. Please try again.</p>
                    </div>
                    <div id="incompleteMessage" class="statusMessage">
                        <p><i class="fa fa-warning"></i> Please complete all the fields in the form before sending.</p>
                    </div>

                </div>





            </div>

        </div>
    </div>
    </div>




    <div id="stats2" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="stats2-info">
                        <i class="ilmosys-business-manwoman"></i>
                        <p><span class="count">5500</span></p>
                        <h2>Healthy Clients</h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="stats2-info">
                        <i class="ilmosys-doctor"></i>
                        <p><span class="count">85</span></p>
                        <h2>Proffesional Doctors</h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="stats2-info">
                        <i class="ilmosys-ambulance"></i>
                        <p><span class="count">30</span></p>
                        <h2>Ambulance</h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="stats2-info">
                        <i class="ilmosys-hospital-2"></i>
                        <p><span class="count">200</span></p>
                        <h2>Rooms</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ABOUT -->
    <div id="features" class="container">
        <div class="about-inline text-center">
            <div class="container">
                <p>- FEATURES -</p>
                <h3>Check out some of our professional<br> features! </h3>
            </div>
        </div>


        <!-- INFO CONTENT -->
        <div class="info-content">
            <div class="container">
                <div class="row center-content">
                    <div class="col-md-8 text-center">
                        <img src="images/services/3.jpg" class="pull-right img-responsive" alt="Services" style="width: 925px;height:500px;">
                    </div>
                    <div class="col-md-4">
                        <h3>Our Features </h3>
                        <ul class="list">
                            <li><i class="icon-check"></i> Short-term nursing services..</li>
                            <li><i class="icon-check"></i> Physical therapy.</li>
                            <li><i class="icon-check"></i>Occupational therapy..</li>
                            <li><i class="icon-check"></i>MSpeech language pathology..</li>
                            <li><i class="icon-check"></i>Medical social work..</li>
                        </ul>
                        <div class="space30"></div>
                        <a href="#" class="btn btn-lg btn-primary">Learn More <i class="icon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <br> <br><br>

        <!-- INFO CONTENT -->
        <div class="info-content">
            <div class="container">
                <div class="row center-content">
                    <div class="col-md-4">
                        <h3>Watch youtube video and get details of our center. </h3>
                        <ul class="list">
                            <li><i class="icon-check"></i> The healthcare system offers four broad.</li>
                            <li><i class="icon-check"></i> health promotion, disease prevention</li>
                            <li><i class="icon-check"></i>diagnosis and treatment, and rehabilitation</li>
                            <li><i class="icon-check"></i>Morbi sed orci a tortor bibendum finibus vitae.</li>
                            <li><i class="icon-check"></i>Nam sed sem quis nisi faucibus tempor.</li>
                        </ul>
                        <div class="space30"></div>
                        <a href="#" class="btn btn-lg btn-primary">Learn More <i class="icon-arrow-right"></i></a>
                    </div>
                    <div class="col-md-8 text-center">
                        <!-- YouTube -->
                        <div class="video">
                            <iframe src="https://www.youtube.com/embed/CJbG0TS2d2A?rel=0&amp;showinfo=0" height="315" width="560"></iframe>
                        </div>
                        <!-- End YouTube -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space100"></div>

    <!-- INFO CONTENT -->
    <div class="info-content2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Honesty is the best policy.</h3>
                    <div class="space10"></div>
                    <p>We communicate honestly. No hidden fees, no surprises, no upsells! Only honest work and trustworthy staff.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- SERVICES -->
    <section id="services" class="services bg-light">
        <div class="container">

            <div class="about-inline text-center">
                <p>- SERVICES -</p>
                <h3>Our Medical Service </h3>
                <p>We're different from typical health checkup center. We're out to create magic. The goal is to WOW you with outstanding treatment.</p>
            </div>

            <div class="services-s5 row">
                <div class="col-md-3">
                    <div class="service-content">
                        <i class="ilmosys-astronaut"></i>
                        <h4>Robotic Surgery</h4>
                        <p>Find out how today’s physicians are using the technologyare using the technology </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-content">
                        <i class="ilmosys-women"></i>
                        <h4>Women’s Care</h4>
                        <p>Tracee Cornforth is a freelance writer   Learn about our editorial process sollic itudin urna interdum.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-content">
                        <i class="ilmosys-virus-2"></i>
                        <h4>Cancer Services</h4>
                        <p>You are not alone. Cancer Services is the Triad's   cancer and has served cancer patients</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-content">
                        <i class="ilmosys-first-aid"></i>
                        <h4>Emergency Services</h4>
                        <p>Diabetes Wellness Center Pakistan, Lahore, Pakistan. 16669 likes · 14 talking about this · 36 were here.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="space50"></div>
                    <div class="service-content">
                        <i class="ilmosys-medicine-2"></i>
                        <h4>Wellness Center</h4>
                        <p>Diabetes Wellness Center Pakistan, Lahore, Pakistan. 16669 likes · 14 talking about this · 36 were here interdum.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="space50"></div>
                    <div class="service-content">
                        <i class="ilmosys-hospital-2"></i>
                        <h4>Orthopaedic & Spine Institute</h4>
                        <p>Brain Check Up assesses the brain's mental activity and performance. Using the computerized EEG devices, it is checked whether the brain.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="space50"></div>
                    <div class="service-content">
                        <i class="ilmosys-brain-3"></i>
                        <h4>Barin Checkup</h4>
                        <p>Brain Check Up assesses the brain's mental activity and performance. Using the computerized EEG devices, it is checked whether the brain</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="space50"></div>
                    <div class="service-content">
                        <i class="ilmosys-heart"></i>
                        <h4>Heart Care Services</h4>
                        <p> activity and performance. Using the computerized EEG devices, it is checked whether the brainurna interdum.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- TESTIMONIALS -->
    <div id="reviews">

        <div class="container">
            <div class="about-inline text-center">
                <p>- REVIEWS -</p>
                <h3>Read what our past patients said <br> about our medical center. </h3>
            </div>

            <!-- TESTIMONIALS -->
            <div class="testimonials-white">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="quote2">
                            <div>
                                <i class="icon2-bubble"></i>
                                <p>From the telephone appointment system to seeing a GP, my experience has been flawless. All the team from reception, telephone and nursing staff are polite, thorough and cheerful, which in itself is comforting.</p>
                                <span class="author">Mark Dave - Teacher</span>
                            </div>

                            <div>
                                <i class="icon2-bubble"></i>
                                <p>Medical Surgery in my opinion has to be one of the best in the area. I have never had a problem getting to see a doctor or getting through from the telephone. All the Doctors here are very good and very considerate
                                    and more importantly very efficient .</p>
                                <span class="author">John Doe - Business Men</span>
                            </div>

                            <div>
                                <i class="icon2-bubble"></i>
                                <p>I'm simply extremely satisfied with the quality and level of care received from Medical Centre not only to myself, but also my children and an elderly relative. excellent work</p>
                                <span class="author">Jackina Doe - House Wife</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space100"></div>
        </div>
    </div>
    <!-- TESTIMONIALS -->

 

    <!-- PARALLAX -->
    <section class="text-center">


        <!-- ELEMENTS - CALL TO ACTION -->
        <div class="cta-wrap">
            <div class="container">
                <div class="col-md-12">
                    <h1>Hurry up! and get <br> <u>Free</u> treatment for <span> first 50 person</span></h1>
                    <p>Limited time offer for this month. No credit card required.</p>
                    <a href="#home" class="page-scroll btn btn-primary">Make an Appointment</a>
                </div>
            </div>
        </div>
    </section>

    <!-- GOOGLE MAP -->
    <div class="google-map">
        <div class="container-fluid no-padding">
            <div id="map"></div>
        </div>
    </div>

    <!-- CONTACT INFO -->
    <div id="contact-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="c-info">
                        <h5><b>Call Us</b></h5>
                        <p>(080) 123 456 7890</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="c-info">
                        <h5><b>Email</b></h5>
                        <p><a href="">Health-care@domain.com</a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="c-info">
                        <h5><b>Address</b></h5>
                        <p>Aptech Shara-e-Faisal Karachi</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="c-info">
                        <h5><b>WEBSITE</b></h5>
                        <p><a href=""> www.domain.com</a></p>
                    </div>
                </div>


            </div>
        </div>
    </div>



    <!-- FOOTER -->
    <footer class="footer2" id="footer2">
        <div class="container">
            <div class="row">

                <div class="col-md-3 footerP">
                    <h5>RELATED LINKS</h5>
                    <ul>
                        <li>
                            <a href="#">
                                <p>About Us</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Why Buy With Us?</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Our Team</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Contact Us</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3 footerP">
                    <h5>OTHER LINKS</h5>
                    <ul>
                        <li>
                            <a href="#">
                                <p>Register</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Forum</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Affiliate</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>FAQ</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3 footerP">
                    <h5>RELATED LINKS</h5>
                    <ul>
                        <li>
                            <a href="#">
                                <p>About Us</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Why Buy With Us?</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Our Team</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Contact Us</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3 footerP">
                    <h5>About Us</h5>
                    <p>Mauris feugiat erat tellus.Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                    <h5>Social</h5>
                    <div class="footer-social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-dribbble"></a>
                        <a href="#" class="fa fa-google-plus"></a>
                        <a href="#" class="fa fa-linkedin"></a>
                        <a href="#" class="fa fa-instagram"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    </div>

    <?php

    $connection = mysqli_connect("localhost", "root", "", "health_care") or  die("Connection failed : " . mysqli_connect_error());
    if (isset($_POST['Cancel'])) {
        header("location: http://localhost/health_care/website/");
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $l_name = $_POST['l_name'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $insert_patient = "INSERT INTO patients 
(P_ID, P_name, p_l_name, P_gender, D_O_B, P_mail, P_phone, P_address, Username, pass) 
VALUES (NULL, '$name', '$l_name', '$gender', '$date', '$mail', '$phone', '$address', '$username', '$pass') ";

        $run_insert_query = mysqli_query($connection, $insert_patient);
        if ($run_insert_query) {
            //header("location: http://localhost/health_care/medical_services/all-patients.php");
            echo "<script>
    window.location = 'http://localhost/health_care/website/index.php#services';
</script>";
        } else {
            echo "query faield";
        }
    }

    ?>

    <!-- JAVASCRIPT =============================-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/vendors/slick/slick.min.js"></script>
    <script src="js/vendors/jquery.easing.min.js"></script>
    <script src="js/vendors/stellar.js"></script>
    <script src="js/vendors/isotope/isotope.pkgd.js"></script>
    <script src="js/vendors/swipebox/js/jquery.swipebox.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/vendors/mc/jquery.ketchup.all.min.js"></script>
    <script src="js/vendors/mc/main.js"></script>
    <script src="js/vendors/contact.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="js/vendors/gmap.js"></script>

</body>

</html>