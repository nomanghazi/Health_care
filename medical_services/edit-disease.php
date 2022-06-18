<?php include 'header.php';
if ($_GET['edit_disease_id']) {
    $id = $_GET['edit_disease_id'];
    $connection = mysqli_connect("localhost", "root", "", "health_care") or  die("Connection failed : " . mysqli_connect_error());
    $fetch_disease_for_eedit = "SELECT *FROM disease where D_id=$id";
    $fetch_disease_result = mysqli_query($connection, $fetch_disease_for_eedit);
    $fill_data = mysqli_fetch_array($fetch_disease_result);
}




?>

<div id="main-content">


    <form action="" method="post">
        <div class="container-fluid">
            <!-- Page header section  -->
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <h1>Edit Disease</h1>

                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label>Disease Name </label>
                                    <div class="form-group c_form_group">
                                    <input class="form-control" type="hidden" name="id" value="<?php echo $fill_data['D_id']; ?>">
                                        <input class="form-control" type="text" name="name" value="<?php echo $fill_data['D_name']; ?>">
                                    </div>
                                </div>
                                <!-- <div class="col-sm-6 ">
                                </div> -->
                            </div>

                            <div class="row">
                                <div class="col-sm-6 ">
                                    <label>Disease Discription</label>
                                    <div class="form-group c_form_group">
                                        <textarea name="desc" id="" cols="55" rows="6" ><?php echo $fill_data['D_description']; ?></textarea>
                                        <!-- <input class="form-control txt-area" type="text" name="l_name"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Update Disease </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>



<?php
if (isset($_POST['submit'])) {
    $idget=$_POST['id'];
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $query_edit_disease=mysqli_query($connection,"UPDATE disease SET D_name='{$name}',D_description='{$desc}' WHERE D_id=$idget");
    if ($query_edit_disease)
    {
        echo "<script>
            window.location='http://localhost/health_care/medical_services/diseases.php';
        </script>";
    }
}?>


<?php include 'footer.php'; ?>