<?php 

include '../config/config.php';

if (isset($_POST['edit_cancel'])) {
    //header("location: http://localhost/health_care/medical_services/all-doctors.php");
    echo "<script>
    window.location = 'http://localhost/health_care/medical_services/all-doctors.php';
</script>";
}
if (isset($_POST['submit'])) {
    $id=$_POST['id'];
    $f_name =$_POST['f_name'];
    $l_name =$_POST['l_name'];
    $date   =$_POST['date'];
    $gender =$_POST['gender'];
    $Speciality =$_POST['Speciality'];
    $city   =$_POST['city'];
    $mail   =$_POST['mail'];
    $phone  =$_POST['phone'];
    $img_name =$_FILES['img']['name'];
    $img_temp_name =$_FILES['img']['tmp_name'];
    $img_type =$_FILES['img']['type'];
    $location="upload/";

    //file Type Being Check Is it supported Or Not 
    if ($img_type="img/jpg" || $img_type="img/jpeg" || $img_type="img/png")
    {
        //This Function Used To Moved The Image file To the Folder 
        if (move_uploaded_file($img_temp_name,$location.$img_name)) {
         $query="UPDATE doctors SET Doc_name='{$f_name}', Doc_l_name='{$l_name}',
            D_O_B='{$date}', Gender='{$gender}', Doc_mail='{$mail}', Doc_phone={$phone},
             specailist={$Speciality},
             Doc_picture='{$img_name}', city_name={$city} WHERE ID={$id}";
           
            $run_query_insert=mysqli_query($connection,$query);

            //Checking The Query Is it Running Or NOt 
            if ($run_query_insert) {
                echo "<script>
    window.location = 'http://localhost/health_care/medical_services/all-doctors.php';
</script>";
               // header("location: http://localhost/health_care/medical_services/all-doctors.php");
            }
            else{
                echo "Query Feiled";
            }

        //img file moved Function END    
        }

    //End Of The Cheking File Extention    
    }
    else {
        echo 'Image Formate Not Supported';
    }
}

?>