<?php
include '../config/config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("location: $host/medical_services/login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Health | Care</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/animate-css/vivify.min.css">

    <link rel="stylesheet" href="assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="assets/vendor/c3/c3.min.css" />
    <!-- <link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css"> -->
    <link rel="stylesheet" href="assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css" />
    <script src="https://use.fontawesome.com/5a78773268.js"></script>


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/mooli.min.css">

</head>

<body>

    <div id="body" class="theme-green">
        <!-- Page Loader -->

        <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="mt-3"><img src="assets/images/icon.svg" width="40" height="40" alt="Mooli"></div>
            <p>Please wait...</p>        
        </div>
    </div> -->

        <!-- Theme Setting -->
        <div class="themesetting">
            <a href="javascript:void(0);" class="theme_btn"><i class="fa fa-gear fa-spin"></i></a>
            <ul class="list-group">
                <li class="list-group-item">
                    <ul class="choose-skin list-unstyled mb-0">
                        <li data-theme="green" class="active">
                            <div class="green"></div>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                        </li>
                        <li data-theme="timber">
                            <div class="timber"></div>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                        </li>
                        <li data-theme="amethyst">
                            <div class="amethyst"></div>
                        </li>
                    </ul>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Light Sidebar</span>
                    <label class="switch sidebar_light">
                        <input type="checkbox" checked="">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Gradient</span>
                    <label class="switch gradient_mode">
                        <input type="checkbox" checked="">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Dark Mode</span>
                    <label class="switch dark_mode">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>RTL version</span>
                    <label class="switch rtl_mode">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </li>
            </ul>
        </div>

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>

        <div id="wrapper">

            <!-- Page top navbar -->
            <nav class="navbar navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-left">
                        <div class="navbar-btn">
                            <a href="http://localhost/health_care/medical_services/dashboard.php"><img src="assets/images/logo1.png" alt="Mooli Logo" class="img-fluid logo"></a>
                            <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-align-left"></i></button>
                        </div>
                    </div>
                    <div class="navbar-right">
                        <div id="navbar-menu">
                            <ul class="nav navbar-nav">
                                <li><a href="javascript:void(0);" class="right_note icon-menu" title="Right Menu">Notes</a></li>
                                <li class="dropdown hidden-xs">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">Create</a>
                                    <div class="dropdown-menu pb-0 mt-0">
                                        <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Doctor</a>
                                        <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Patient</a>
                                        <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Report</a>
                                    </div>
                                </li>
                                <li class="dropdown hidden-xs">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="notification-dot msg">4</span>
                                    </a>
                                    <ul class="dropdown-menu right_chat email mt-0 animation-li-delay">
                                        <li class="header theme-bg gradient mt-0 text-light">You have 4 New eMail</li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="media">
                                                    <img class="media-object " src="assets/images/xs/avatar4.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="name">Dr. James Wert <small class="float-right font-12">Just now</small></span>
                                                        <span class="message">Update GitHub</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="media">
                                                    <img class="media-object" src="assets/images/xs/avatar1.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="name">Dr. Folisise Chosielie <small class="float-right font-12">12min ago</small></span>
                                                        <span class="message">New Messages</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="media">
                                                    <img class="media-object" src="assets/images/xs/avatar5.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="name">As.Louis Henry <small class="float-right font-12">38min ago</small></span>
                                                        <span class="message">Design bug fix</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="media mb-0">
                                                    <img class="media-object" src="assets/images/xs/avatar2.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="name">Dr. Debra Stewart <small class="float-right font-12">2hr ago</small></span>
                                                        <span class="message">Fix Bug</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <i class="fa fa-bell-o"></i>
                                        <span class="notification-dot info">4</span>
                                    </a>
                                    <ul class="dropdown-menu feeds_widget mt-0 animation-li-delay">
                                        <li class="header theme-bg gradient mt-0 text-light">You have 4 New Notifications</li>
                                        <li>
                                            <a href="#">
                                                <div class="mr-4"><i class="fa fa-check text-red"></i></div>
                                                <div class="feeds-body">
                                                    <h4 class="title text-danger">Issue Fixed <small class="float-right text-muted font-12">9:10 AM</small></h4>
                                                    <small>WE have fix all Design bug with Responsive</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="mr-4"><i class="fa fa-user text-info"></i></div>
                                                <div class="feeds-body">
                                                    <h4 class="title text-info">New User <small class="float-right text-muted font-12">9:15 AM</small></h4>
                                                    <small>I feel great! Thanks team</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="mr-4"><i class="fa fa-question-circle text-warning"></i></div>
                                                <div class="feeds-body">
                                                    <h4 class="title text-warning">Server Warning <small class="float-right text-muted font-12">9:17 AM</small></h4>
                                                    <small>Your connection is not private</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="mr-4"><i class="fa fa-thumbs-o-up text-success"></i></div>
                                                <div class="feeds-body">
                                                    <h4 class="title text-success">2 New Feedback <small class="float-right text-muted font-12">9:22 AM</small></h4>
                                                    <small>It will give a smart finishing to your site</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="hidden-xs"><a href="javascript:void(0);" id="btnFullscreen" class="icon-menu"><i class="fa fa-arrows-alt"></i></a></li>
                                <li><?php echo $_SESSION["username"]; ?><a href="http://localhost/health_care/medical_services/logout.php" class="icon-menu"><i class="fa fa-power-off"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="recent_searche" style="display: none;">

                    </div>
            </nav>
            <!-- Main left sidebar menu -->
            <div id="left-sidebar" class="sidebar light_active">
                <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-angle-left"></i></a>
                <div class="navbar-brand">
                    <a href="http://localhost/health_care/medical_services/dashboard.php"><img src="assets/images/logo1.png" alt="Mooli Logo" class="img-fluid logo"><span>Health-Care</span></a>
                    <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="fa fa-close"></i></button>
                </div>
                <div class="sidebar-scroll">
                    <div class="user-account">
                        <div class="user_div">
                            <img src="assets/images/user.png" class="user-photo" alt="User Profile Picture">
                        </div>
                        <div class="dropdown">
                            <span>Welcome</span>
                            <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Dr. Alan Green</strong></a>
                            <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                                <li><a href="dr-profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                                <li><a href="app-inbox.html"><i class="fa fa-envelope"></i>Messages</a></li>
                                <li><a href="setting.html"><i class="fa fa-gear"></i>Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="http://localhost/health_care/medical_services/logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <nav id="left-sidebar-nav" class="sidebar-nav">
                        <ul id="main-menu" class="metismenu animation-li-delay">
                            <li class="header">Hospital</li>
                            <li class=""><a href="http://localhost/health_care/medical_services/dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                            <li>
                                <a href="#Doctors" class="has-arrow"><i class="fa fa-user-md"></i><span>Doctors</span></a>
                                <ul>
                                    <li><a href="http://localhost/health_care/medical_services/all-doctors.php">All Doctors</a></li>
                                    <li><a href="http://localhost/health_care/medical_services/add-doctor.php">Add Doctors</a></li>

                                    <li><a href="http://localhost/health_care/medical_services/doctor-schedule.php">Doctors Schedule</a></li>
                                </ul>
                            </li>
                            <li>
                            <a href="http://localhost/health_care/medical_services/all-patients.php"><i class="fa fa-user-circle-o"></i><span>Patients</span></a>
                            <li><a href="http://localhost/health_care/medical_services/diseases.php"><i class="fa fa-snowflake-o"></i> <span>Diseases</span></a></li>
                            <li><a href="http://localhost/health_care/medical_services/prevention.php"><i class="fa fa-heartbeat"></i> <span>Prevention</span></a></li>
                            <li><a href="http://localhost/health_care/medical_services/cures.php"><i class="fa fa-thermometer-half"></i> <span>Cureses</span></a></li>
                            <li><a href="http://localhost/health_care/medical_services/Appointment.php"><i class="fa fa-calendar"></i> <span>Appointment</span></a></li>
                            <li><a href="http://localhost/health_care/medical_services/cities.php"><i class="fa fa-calendar"></i> <span>Cities</span></a></li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Right bar chat  -->
            <div id="rightbar" class="rightbar">
                <div class="slim_scroll">
                    <div class="chat_list">
                        <form>
                            <div class="input-group c_input_group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-magnifier"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                        <div class="body">
                            <ul class="nav nav-tabs3 white mt-3 d-flex text-center">
                                <li class="nav-item flex-fill"><a class="nav-link active show" data-toggle="tab" href="#chat-Users">Chat</a></li>
                                <li class="nav-item flex-fill"><a class="nav-link" data-toggle="tab" href="#chat-Groups">Groups</a></li>
                                <li class="nav-item flex-fill"><a class="nav-link mr-0" data-toggle="tab" href="#chat-Contact">Contact</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane vivify fadeIn active show" id="chat-Users">
                                    <ul class="right_chat list-unstyled mb-0 animation-li-delay">
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Louis Henry <small class="text-muted font-12">10 min</small></span>
                                                    <span class="message">How do you do?</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Debra Stewart <small class="text-muted font-12">15 min</small></span>
                                                    <span class="message">I was wondering...</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Lisa Garett <small class="text-muted font-12">18 min</small></span>
                                                    <span class="message">I've forgotten how it felt before</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Folisise Chosielie <small class="text-muted font-12">23 min</small></span>
                                                    <span class="message">Wasup for the third time like...</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar3.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Marshall Nichols <small class="text-muted font-12">27 min</small></span>
                                                    <span class="message">But we’re probably gonna need a new carpet.</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Debra Stewart <small class="text-muted font-12">38 min</small></span>
                                                    <span class="message">It’s not that bad...</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Lisa Garett <small class="text-muted font-12">45 min</small></span>
                                                    <span class="message">How do you do?</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane vivify fadeIn" id="chat-Groups">
                                    <ul class="right_chat list-unstyled mb-0 animation-li-delay">
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Apolog Hospital<small class="text-muted font-12">10 min</small></span>
                                                    <span class="message">How do you do?</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Family Groups <small class="text-muted font-12">18 min</small></span>
                                                    <span class="message">I've forgotten how it felt before</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Friends holic <small class="text-muted font-12">23 min</small></span>
                                                    <span class="message">Wasup for the third time like...</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">New Hospital <small class="text-muted font-12">45 min</small></span>
                                                    <span class="message">How do you do?</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane vivify fadeIn" id="chat-Contact">
                                    <ul class="right_chat list-unstyled mb-0 animation-li-delay">
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Dr. John Smith <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                                    <span class="message">johnsmith@info.com</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Merri Diamond <small class="text-muted"><i class="fa fa-heart"></i></small></span>
                                                    <span class="message">hermanbeck@info.com</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Dr. Louis Henry <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                                    <span class="message">maryadams@info.com</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Andrew Patrick <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                                    <span class="message">mikethimas@info.com</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar3.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Claire Peters <small class="text-muted"><i class="fa fa-heart"></i></small></span>
                                                    <span class="message">clairepeters@info.com</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Pro. Debra Stewart <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                                    <span class="message">It’s not that bad...</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Dr. Lisa Garett <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                                    <span class="message">eringonzales@info.com</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">MD. Louis Henry <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                                    <span class="message">susiewillis@info.com</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Debra Stewart <small class="text-muted"><i class="fa fa-star"></i></small></span>
                                                    <span class="message">johnsmith@info.com</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stiky note div  -->
            <div class="sticky-note">
                <a href="javascript:void(0);" class="right_note"><i class="fa fa-close"></i></a>
                <div class="form-group c_form_group">
                    <label>Write your note here</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter here...">
                        <div class="input-group-append"><button class="btn btn-dark btn-sm" type="button">Add</button></div>
                    </div>
                </div>
                <div class="note-body">
                    <div class="card note-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="font-10 text-muted">12 Apr 2020</span>
                            </div>
                            <div>
                                <a href="javascript:void(0);" class="star"><i class="fa fa-star-o"></i></a>
                                <a href="javascript:void(0);" class="delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <div class="note-detail">
                            <span>Commit code on github branch development</span>
                        </div>
                    </div>
                    <div class="card note-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="font-10 text-muted">12 Apr 2020</span>
                            </div>
                            <div>
                                <a href="javascript:void(0);" class="star active"><i class="fa fa-star-o"></i></a>
                                <a href="javascript:void(0);" class="delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <div class="note-detail">
                            <span>Meeting with client for new project.</span>
                        </div>
                    </div>
                    <div class="card note-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="font-10 text-muted">12 Apr 2020</span>
                            </div>
                            <div>
                                <a href="javascript:void(0);" class="star"><i class="fa fa-star-o"></i></a>
                                <a href="javascript:void(0);" class="delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <div class="note-detail">
                            <span>making this the first true generator on the Internet</span>
                        </div>
                    </div>
                    <div class="card note-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="font-10 text-muted">12 Apr 2020</span>
                            </div>
                            <div>
                                <a href="javascript:void(0);" class="star"><i class="fa fa-star-o"></i></a>
                                <a href="javascript:void(0);" class="delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <div class="note-detail">
                            <span>it look like readable English. Many desktop publishing</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main body part  -->