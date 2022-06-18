<?php include 'header.php'; ?>


<div id="main-content">
            <div class="container-fluid">
                <!-- Page header section  -->
                <div class="block-header">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <h5> Hi Welcomeback </h5>
                          
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
                            <div class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">
                            <div class="border-right pr-4 mr-4 mb-2 mb-xl-0 hidden-xs">
                                    <p class="text-muted mb-1">Appointment <span id="mini-bar-chart3" class="mini-bar-chart"></span></p>
                                    <h5 class="mb-0">29</h5>
                                </div>
                                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0 hidden-xs">
                                    <p class="text-muted mb-1">Checkup <span id="mini-bar-chart2" class="mini-bar-chart"></span></p>
                                    <h5 class="mb-0">220</h5>
                                </div>
                             
                                <div class="mb-3 mb-xl-0">
                                    <p class="text-muted mb-1">Opration <span id="mini-bar-chart1" class="mini-bar-chart"></span></p>
                                    <h5 class="mb-0">23</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                include '../config/config.php';
                $count="SELECT * FROM doctors";
                $check_count=mysqli_query($connection,$count);
                $total=mysqli_num_rows($check_count);

                //Fetchi total Number OF Rows .
                $count1="SELECT * FROM patients";
                $check_count1=mysqli_query($connection,$count1);
                $total_patient=mysqli_num_rows($check_count1);

                $count2="SELECT * FROM appointment";
                $check_count2=mysqli_query($connection,$count2);
                $total_appointment=mysqli_num_rows($check_count2);
                
                ?>
                <div class="row clearfix">
              
                    <div class="col-12">
                        <div class="card theme-bg gradient">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card">
                                            <div class="body">
                                                <div>Total Doctors</div>
                                                <div class="mt-3 h1"><?php echo $total;  ?></div>
                                                <div class="d-flex">
                                                    <div class="mr-3">1.78% <i class="fa fa-caret-down"></i></div>
                                                    <span>Last year</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <!-- <div class="col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="body">
                                                <div>Total Nurses</div>
                                                <div class="mt-3 h1">2,652</div>
                                                <div class="d-flex">
                                                    <div class="mr-3">13.78% <i class="fa fa-caret-down"></i></div>
                                                    <span>Last year</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card">
                                            <div class="body">
                                                <div>Total Patients</div>
                                                <div class="mt-3 h1"> <?php echo $total_patient;  ?></div>
                                                <div class="mt-3 h1"></div>
                                                <div class="d-flex">
                                                    <div class="mr-3">5.78% <i class="fa fa-caret-down"></i></div>
                                                    <span>Last year</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card">
                                            <div class="body">
                                                <div>Total Department</div>
                                                <div class="mt-3 h1"><?php echo $total_appointment;  ?></div>
                                                <div class="d-flex">
                                                    <div class="mr-3">6.78% <i class="fa fa-caret-down"></i></div>
                                                    <span>Last year</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>         
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row clearfix">
                    <div class="col-12">
                        <div class="section_title">
                            <div class="mr-3">
                                <h3>Overview</h3>
                                <small>Statistics, Predictive Analytics Data Visualization, Big Data Analytics, etc.</small>
                            </div>
                            <div>
                                <div class="btn-group mb-3">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">14 March 2020</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);">Today’s</a>
                                            <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">This Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last 12 Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Custom Dates</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-default"><i class="fa fa-send"></i> <span class="hidden-md">Report</span></button>
                                    <button type="button" class="btn btn-default"><i class="fa fa-file-pdf-o"></i> <span class="hidden-md">Export</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row clearfix row-deck">
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>This Year's Hospital Revenue</h2>
                                <small class="text-muted font-12">It is the period time a user is actively engaged with your website, page or app, etc</small>
                                <ul class="header-dropdown dropdown">
                                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                        <ul class="dropdown-menu theme-bg gradient">
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="d-flex flex-row">
                                    <div class="pb-3">
                                        <h5 class="mb-0">$1,056</h5>
                                        <small class="text-muted font-11">Expenses</small>
                                    </div>
                                    <div class="pb-3 pl-4 pr-4">
                                        <h5 class="mb-0">$3,098</h5>
                                        <small class="text-muted font-11">Total Profit</small>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-sm btn-default">Day</button>
                                            <button type="button" class="btn btn-sm btn-default">Week</button>
                                            <button type="button" class="btn btn-sm btn-primary theme-bg gradient">Month</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="flotChart" class="flot-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>List By Country</h2>
                                <small class="font-12">The total number of Page Impressions within the date range</small>
                            </div>
                            <div class="body">
                                <div class="d-flex flex-row">
                                    <div class="pb-3">
                                        <h5 class="mb-0">2,356</h5>
                                        <small class="text-muted font-11">New Patients</small>
                                    </div>
                                    <div class="pb-3 pl-4 pr-4">
                                        <h5 class="mb-0">1,898</h5>
                                        <small class="text-muted font-11">Old Patients</small>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-sm btn-default">W</button>
                                            <button type="button" class="btn btn-sm btn-default">M</button>
                                            <button type="button" class="btn btn-sm btn-primary theme-bg gradient">Y</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart-bar-rotated" style="height: 300px"></div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row clearfix row-deck">
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Doctors Availability</h2>
                                <ul class="header-dropdown dropdown">
                                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                        <ul class="dropdown-menu theme-bg gradient">
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body table-responsive">
                                <table class="table table-hover">
									<thead>
										<tr>
											<th>Doctor</th>
											<th>Speciality</th>
											<th>Availability</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Michelle</td>
											<td>Dental</td>
											<td>
												<span class="badge badge-success">Available</span>
											</td>
										</tr>
										<tr>
											<td>Jason</td>
											<td>Ortho</td>
											<td>
												<span class="badge badge-warning">On Leave</span>
											</td>
										</tr>
										<tr>
											<td>David</td>
											<td>Skin</td>
											<td>
												<span class="badge badge-danger">Not Available</span>
											</td>
										</tr>
										<tr>
											<td>Angelica </td>
											<td>Dental</td>
											<td>
												<span class="badge badge-success">Available</span>
											</td>
                                        </tr>
                                        <tr>
											<td>Michelle</td>
											<td>Dental</td>
											<td>
												<span class="badge badge-success">Available</span>
											</td>
										</tr>
										<tr>
											<td>Jason</td>
											<td>Ortho</td>
											<td>
												<span class="badge badge-warning">On Leave</span>
											</td>
										</tr>
									</tbody>
                                </table>
                                <a href="#" target="_blank" class="btn btn-secondary btn-block">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Appointments Status</h2>
                            </div>
                            <div class="body">
                                <div id="chart-donut-d" style="height: 200px"></div>
                                <div class="mt-2">
                                    <div class="form-group">
                                        <label class="d-block">Cancelled <span class="float-right">2,098</span></label>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%; background-color: #2c83b6;"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Completed <span class="float-right">1,002</span></label>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%; background-color: #a5d8a2;"></div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="d-block">Pending <span class="float-right">780</span></label>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%; background-color: #9367b4;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Death & Recovery rate</h2>
                                <ul class="header-dropdown dropdown">
                                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                        <ul class="dropdown-menu theme-bg gradient">
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="d-flex flex-row">
                                    <div class="pb-3">
                                        <h5 class="mb-0">356</h5>
                                        <small class="text-muted font-11">Death</small>
                                    </div>
                                    <div class="pb-3 pl-4 pr-4">
                                        <h5 class="mb-0">698</h5>
                                        <small class="text-muted font-11">Recovery</small>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-sm btn-default">D</button>
                                            <button type="button" class="btn btn-sm btn-primary theme-bg gradient">W</button>
                                            <button type="button" class="btn btn-sm btn-default">M</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart-bar-stacked" style="height: 320px"></div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="row clearfix row-deck">
                    <div class="col-lg-5 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Organic Visits & Conversions</h2>
                                <ul class="header-dropdown dropdown">
                                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                        <ul class="dropdown-menu theme-bg gradient">
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="d-flex flex-row">
                                    <div class="pb-3">
                                        <h5 class="mb-0">$356</h5>
                                        <small class="text-muted font-11">Rate</small>
                                    </div>
                                    <div class="pb-3 pl-4 pr-4">
                                        <h5 class="mb-0">$198</h5>
                                        <small class="text-muted font-11">Value</small>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-sm btn-default">Day</button>
                                            <button type="button" class="btn btn-sm btn-default">Week</button>
                                            <button type="button" class="btn btn-sm btn-primary theme-bg gradient">Month</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="world-map-markers" class="jvector-map" style="height: 200px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="header">
                                <h2>Overall Hospital Rating</h2>
                            </div>
                            <div class="body">
                                <div class="d-flex align-items-end">
                                    <h2 class="mb-0">4.3</h2>
                                    <div class="ml-2 mr-2">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <div class="avatar-list avatar-list-stacked mt-3">
                                    <img class="avatar avatar sm" src="assets/images/xs/avatar5.jpg" data-toggle="tooltip" title="" data-original-title="Avatar">
                                    <img class="avatar avatar sm" src="assets/images/xs/avatar6.jpg" data-toggle="tooltip" title="" data-original-title="Avatar">
                                    <img class="avatar avatar sm" src="assets/images/xs/avatar1.jpg" data-toggle="tooltip" title="" data-original-title="Avatar">
                                    <img class="avatar avatar sm" src="assets/images/xs/avatar4.jpg" data-toggle="tooltip" title="" data-original-title="Avatar">
                                </div>
                                <ul class="list-group list-group-flush ratings font-13 mt-3">
                                    <li class="list-group-item">
                                        <div>5.0</div>
                                        <div class="stars ml-2 mr-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="ml-auto">
                                            <span>4,178</span>
                                            <span class="font-10">58%</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div>4.0</div>
                                        <div class="stars ml-2 mr-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="ml-auto">
                                            <span>2,091</span>
                                            <span class="font-10">28%</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div>3.0</div>
                                        <div class="stars ml-2 mr-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="ml-auto">
                                            <span>984</span>
                                            <span class="font-10">15%</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div>2.0</div>
                                        <div class="stars ml-2 mr-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="ml-auto">
                                            <span>430</span>
                                            <span class="font-10">8%</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div>1.0</div>
                                        <div class="stars ml-2 mr-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="ml-auto">
                                            <span>307</span>
                                            <span class="font-10">18%</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="header">
                                <h2>Users Overview</h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <label class="mb-0 font-13">New Patient</label>
                                        <h4 class="font-22 font-weight-bold">2,025</h4>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0 font-13">Return Patient</label>
                                        <h4 class="font-22 font-weight-bold">1,254</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="d-block">New Patient <span class="float-right">77%</span></label>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Return Patients <span class="float-right">50%</span></label>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Engagement <span class="float-right">23%</span></label>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                    </div>
                                </div>
                                <small class="font-12">The total number of Page Impressions within the date range<a href="">View more</a></small>
                            </div>
                        </div>
                    </div>
                </div> -->
                
            </div>
        </div>


<?php include 'footer.php'; ?>