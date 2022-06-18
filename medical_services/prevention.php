<?php include 'header.php'; ?>




<div id="main-content">
    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-2 col-md-12 col-sm-12 ">
                    <!-- Modal Button to Show -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add Prevention </button>
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
                                    <th>Picture </th>
                                    <th>Prevention Name</th>
                                    <th>Prevention Discription </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $connection = mysqli_connect("localhost", "root", "", "health_care") or  die("Connection failed : " . mysqli_connect_error());
                                $fetch_prevention = "SELECT *FROM prevention";
                                $fetch_prevention = mysqli_query($connection, $fetch_prevention);

                                while ($display_prevention = mysqli_fetch_array($fetch_prevention)) {

                                ?>
                                    <tr>
                                        <td>
                                            <img src="upload/<?php echo $display_prevention['P_image']; ?>" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar rounded-circle" data-original-title="Avatar Name">
                                        </td>
                                        <td class=""><?php echo $display_prevention['P_name']; ?></td>
                                        <td style="white-space:normal;"> <?php echo $display_prevention['P_description']; ?>
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

<form action="" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Prevention To Database </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Prevention Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Disease Name" name="p_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Prevention Discriptoin</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control text-area" placeholder="Disease Discriptoin" name="p_desc">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Prevention Picture</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="p_image">
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


if (isset($_POST['submit'])) {
    $connection = mysqli_connect("localhost", "root", "", "health_care") or  die("Connection failed : " . mysqli_connect_error());

    $name = $_POST['p_name'];
    $desc = $_POST['p_desc'];
    $img_name = $_FILES['p_image']['name'];
    $img_type = $_FILES['p_image']['type'];
    $img_temp = $_FILES['p_image']['tmp_name'];

    if ($img_type = "p_image/jpg" || $img_type = "p_image/jpeg" || $img_type = "p_image/png") {
        if (move_uploaded_file($img_temp, "upload/" . $img_name)) {
            $insert_diseases = "INSERT INTO  prevention (P_id, P_name, P_description, P_image)
         VALUES (NULL,'$name','$desc','$img_name')";
            $run_insert_disease = mysqli_query($connection, $insert_diseases);
            if ($run_insert_disease) {
                echo "<script>
           window.location = 'http://localhost/health_care/medical_services/prevention.php';
       </script>";
            }
        }

        //check Formate    
    }
}




?>



<?php include 'footer.php'; ?>