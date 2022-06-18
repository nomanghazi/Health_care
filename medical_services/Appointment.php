<?php include 'header.php'; ?>

<div id="main-content">
            <div class="container-fluid">
                <!-- Page header section  -->
                <div class="block-header">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-12 col-sm-12 ">
                        <a href="http://localhost/health_care/medical_services/add-patient.php" class="btn btn-primary ">Add New Patient</a>
                           
                        </div>
                        <div class="col-lg-10 col-md-12 col-sm-12 text-lg-right">
                            <div class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">
                                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0 hidden-xs">
                                    <p class="text-muted mb-1">Fever</p>
                                    <h5 class="mb-0">214</h5>
                                </div>
                                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                                    <p class="text-muted mb-1">Cholera</p>
                                    <h5 class="mb-0">206</h5>
                                </div>
                                <div class="pr-4 mb-2 mb-xl-0">
                                    <p class="text-muted mb-1">Malaria</p>
                                    <h5 class="mb-0">420</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="body">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Patients">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="search-mail"><i class="icon-magnifier"></i></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>                                       
                                            <th>Appointment ID</th>
                                            <th>Patients Name</th>
                                            <th>DOctor Name</th>
                                            <th>Date </th>
                                            <th>Timing</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$connection = mysqli_connect("localhost", "root", "", "health_care") or  die("Connection failed : " . mysqli_connect_error());
//Appointment Table

$appointment = mysqli_query($connection, "SELECT * FROM appointment
LEFT JOIN city ON city.City_id=appointment.city  LEFT JOIN doctors ON doctors.ID=appointment.Doctor_id LEFT JOIN patients ON patients.P_ID=appointment.patient  ");





 
    while ($show_appointement = mysqli_fetch_array($appointment)) {


?>

        <tr>
            <th scope="row"><?php echo $show_appointement['A_ID']; ?> </th>
            <td><?php echo $show_appointement['P_name']; ?></td>
            <td><?php echo $show_appointement['D_O_B']; ?></td>
            <td><?php echo $show_appointement['A_Date']; ?></td>
            <td><?php echo $show_appointement['metting_time']; ?></td>
            <td ><a href="" <?php if($show_appointement['status']=='pending'){ echo 'style="background-color:#e8c24f; color:#000000; border-radius:10%; padding:5px;"'; } elseif($show_appointement['status']=='Aproved')
            { echo 'style="background-color:#2df50a; color:#000000; border-radius:10%; padding:5px;"';} ?> >
            <?php echo $show_appointement['status']; ?></a></td>
            
             <td><a href="aprove?app_edit_id=<?php echo $show_appointement['A_ID']; ?>"><button type="button" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a>
             <a href="aprove?app_edit_id=<?php echo $show_appointement['A_ID']; ?>"><button type="button" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button></a>
          </td>
        </tr>

<?php } ?>
 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
        









<?php include 'footer.php'; ?>