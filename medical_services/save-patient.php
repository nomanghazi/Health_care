<?php  

$connection=mysqli_connect("localhost","root","","health_care") or  die("Connection failed : " . mysqli_connect_error());
if (isset($_POST['Cancel'])) {
header("location: http://localhost/health_care/medical_services/all-patients.php");
}

if (isset($_POST['submit'])) {
$name=$_POST['name'];
$l_name=$_POST['l_name'];
$date=$_POST['date'];
$gender=$_POST['gender'];
$mail=$_POST['mail'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$username=$_POST['username'];
$pass=$_POST['pass'];
$insert_patient="INSERT INTO patients 
(P_ID, P_name, p_l_name, P_gender, D_O_B, P_mail, P_phone, P_address, Username, pass) 
VALUES (NULL, '$name', '$l_name', '$gender', '$date', '$mail', '$phone', '$address', '$username', '$pass') ";  

$run_insert_query=mysqli_query($connection,$insert_patient);
if ($run_insert_query) {
    //header("location: http://localhost/health_care/medical_services/all-patients.php");
    echo "<script>
    window.location = 'http://localhost/health_care/medical_services/all-patients.php';
</script>";
}
else{
    echo "query faield";
}



}

?>