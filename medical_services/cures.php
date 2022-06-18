<?php include 'header.php'; ?>




<div id="main-content">
    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-2 col-md-12 col-sm-12 ">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add New Cures</button>
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
                        <table class="table table-hover  ">
                            <thead>
                                <tr>
                                    
                                    <th>cures Name</th>
                                    <th>cures Discription </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$connection=mysqli_connect("localhost","root","","health_care") or  die("Connection failed : " . mysqli_connect_error());
$fetch_cures_table="SELECT *FROM cures";
$fetch_cures=mysqli_query($connection,$fetch_cures_table);

while ($display_cures=mysqli_fetch_array($fetch_cures)) {
                            
   ?>
                                <tr>
                                    <td class=""><?php echo $display_cures['C_name']; ?></td>
                                    <td  style="white-space:normal;"><?php echo $display_cures['C_description']; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></button>
                                        <button type="button" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button>
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


<!-- Modal -->

  <form action="" method="POST">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Cures To Database </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
       <div class="form-group row">
    <label class="col-sm-4 col-form-label">Cures Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="Cures Name" name="c_name">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Cures Discriptoin</label>
    <div class="col-sm-8">
      <input type="text" class="form-control text-area" placeholder="Cures Discriptoin" name="c_desc">
    </div>
  </div>
 
       
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">ADD</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php 

if (isset($_POST['submit'])) {
    $connection=mysqli_connect("localhost","root","","health_care") or  die("Connection failed : " . mysqli_connect_error());
  
  $name=$_POST['c_name'];
  $desc=$_POST['c_desc'];

  $cures_insert="INSERT INTO cures (C_id, C_name, C_description) 
  VALUES (NULL, '$name','$desc')";
  $run_query_cures=mysqli_query($connection,$cures_insert);
  if ($run_query_cures) {
    echo "<script>
    window.location = 'http://localhost/health_care/medical_services/cures.php';
</script>";
  }
  else{
      echo "Not ";
  }

}
?>

<?php include 'footer.php'; ?>