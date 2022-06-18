<?php include 'header.php';
error_reporting(0);
include '../config/config.php';
$fetch_city = mysqli_query($connection, "SELECT * FROM city");



?>

<div id="main-content">
    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-2 col-md-12 col-sm-12 ">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#citymodal">Add New City</button>

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
                                <input type="text" class="form-control" placeholder="Search City">
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
                                    <th>#</th>
                                    <th>City Name</th>
                                    <th>Zip Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               // $sno = 0;
                                while ($show_city = mysqli_fetch_array($fetch_city)) {
                                    //$sno = $sno + 1;
                                ?>
                                    <tr>

                                        <td><span class="list-name"><?php echo $show_city['City_id'] ?></span></td>
                                        <td><?php echo $show_city['City_name'] ?></td>
                                        <td><?php echo $show_city['City_zipcode'] ?></td>
                                        <td>
                                        <a href="?delete_id=<?php echo $show_city['City_id'] ?>" onclick="show()"><button type="button" class="btn btn-default btn-sm delete" title="Delete" id=''><i class="fa fa-trash-o"></i></button></a>
                                            
                                        </td>
                                    </tr>
                                <?php }   ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<form action="" method="post">

    <div class="modal fade" id="citymodal" tabindex="-1" role="dialog" aria-labelledby="citymodalTitle" aria-hidden="true">
        <div class="modal-dialog " role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New City </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label ">City Name</label>
                        <div class="col-sm-8 ">
                            <input type="text" class="form-control" placeholder="City Name" name="city_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Zip Code</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-area" placeholder="Zip Code" name="zip_code">
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Create</button>
                </div>
            </div>
        </div>
    </div>

</form>


<?php
include '../config/config.php';
if (isset($_POST['submit'])) {
    $city_name = $_POST['city_name'];
    $zip_code = $_POST['zip_code'];
    $insert_city = mysqli_query($connection, "INSERT INTO city (City_id, City_name, City_zipcode)
     VALUES (NULL, '$city_name', '$zip_code')");
    if ($insert_city) {
        echo "<script>   
        window.location='http://localhost/health_care/medical_services/cities.php';
        </script>";
    }
}


if ($_GET['delete_id']) {
    $del_id=$_GET['delete_id'];
    $del=mysqli_query($connection,"DELETE FROM city WHERE City_id=$del_id");
    if ($del) {
        echo "<script>   
        window.location='http://localhost/health_care/medical_services/cities.php';
        </script>";
    }
}

?>




<?php include 'footer.php'; ?>


<script>
    //Modal PopUp Delete Script
    //         deletes = document.getElementsByClassName('delete');
    // Array.from(deletes).forEach((element) => {
    //   element.addEventListener("click", (e) => {
    //     console.log("edit ");
    //     sno = e.target.id.substr(1);

    //     if (confirm("Are you sure you want to delete this Product !")) {
    //       console.log("yes");
    //       window.location = `/health_care/medical_services/cities.php?delete=${sno}`;
    //       // TODO: Create a form and use post request to submit a form
    //     }
    //     else {
    //       console.log("no");
    //     }
    //   })
    // })
   
</script>