<?php
//Configuration File 
include '../config/config.php';
if ($_GET['patient_delete_id']) {
    $patient_delete_id=$_GET['patient_delete_id'];
    $remove="DELETE FROM patients WHERE P_ID=$patient_delete_id";
    $remove_query=mysqli_query($connection,$remove);
  if ($remove_query) {
       echo "<script>
    window.location = 'http://localhost/health_care/medical_services/all-patients.php';
    alert('Patient Deleted Successfylly'); 
</script>";
  }
else{
    echo "<script>
    alert('Couldn't Delete Successfylly'); 
    window.location = 'http://localhost/health_care/medical_services/all-patients.php';
    
</script>";
}
}
?>