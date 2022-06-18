<?php include 'header.php'; ?>

<div id="main-content">


    <form action="save-patient.php" method="post">
        <div class="container-fluid">
            <!-- Page header section  -->
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <h1>Create Patient</h1>

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
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="l_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group c_form_group">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" data-provide="datepicker" name="date" data-date-autoclose="true" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group c_form_group">
                                        <label>Gender <span class="text-danger">*</span></label>
                                        <select class="form-control show-tick" name="gender">
                                            <option value="">- Gender -</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Enter Your Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="mail">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group c_form_group">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="address">
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


<?php include 'footer.php'; ?>