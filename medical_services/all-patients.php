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

                                    <th>Patients ID</th>
                                    <th>Name</th>
                                    <th>Last Name</th>
                                    <th>Date Of Birth</th>
                                    <th>Email </th>
                                    <th>Number</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <!-- <th>User Name</th>
                                            <th>Password</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../config/config.php';

                                $fetch_patient = "SELECT * FROM  patients";
                                $run_fetch_query = mysqli_query($connection, $fetch_patient);

                                while ($display_row = mysqli_fetch_array($run_fetch_query)) {


                                ?>

                                    <tr>

                                        <td><span class="list-name"><?php echo $display_row['P_ID']; ?></span></td>
                                        <td><?php echo $display_row['P_name']; ?></td>
                                        <td><?php echo $display_row['p_l_name']; ?></td>
                                        <td><?php echo $display_row['D_O_B']; ?></td>
                                        <td><?php echo $display_row['P_mail']; ?></td>
                                        <td><?php echo $display_row['P_phone']; ?></td>
                                        <td><?php echo $display_row['P_gender']; ?></td>
                                        <!-- <td>15 Jan 2019</td> -->
                                        <td><?php echo $display_row['P_address']; ?></td>
                                        <td>
                                        <a href="edit-patient.php?patient_id=<?php echo $display_row['P_ID']; ?>"><button type="button" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a>
                                        <a href="delete-patient.php?patient_delete_id=<?php echo $display_row['P_ID']; ?>"><button type="button" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button></a>
                                            
                                        
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