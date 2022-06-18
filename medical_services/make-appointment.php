<?php include 'header.php'; 
$connection=mysqli_connect("localhost","root","","health_care");
$appointment=mysqli_query($connection,"SELECT * FROM city");

?>

<div id="main-content">
            <div class="container-fluid">
                          <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                    <div class="col-sm-6">
                                        <label>First Name </label>
                                        <div class="form-group c_form_group">
                                            
                                            <input class="form-control" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6"><label>Last Name </label>
                                        <div class="form-group c_form_group">
                                            
                                            <input class="form-control" type="text" value="">
                                        </div>
                                    </div>
                                
                                <div class=" clearfix">
                                  
                                    <div class="col-sm-6"><label>Phone  </label>
                                        <div class="form-group c_form_group">
                                            
                                            <input class="form-control" type="number" value="">
                                        </div>
                                    </div>
                                  
                                    <div class="col-sm-6"> 
                                        <label>Select City <span class="text-danger">*</span></label>
                                        <div class="form-group c_form_group">
                                          <select name="" class="form-control show-tick">
                                              <option value="1">Select City</option>
                                              <?php
                                              while ($city=mysqli_fetch_array($appointment)) {
                                                
                                              ?>
                                              <option value="<?php echo $city['City_id']; ?> "><?php echo $city['City_name']; ?> </option>
                                              <?php } ?>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6"> 
                                        <label>Select Doctor <span class="text-danger">*</span></label>
                                        <div class="form-group c_form_group">
                                          <select name="" class="form-control show-tick">
                                              <option value="">Noman </option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
             
            </div>
        </div>

<?php include 'footer.php'; ?>