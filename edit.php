<?php 
session_start();
include 'cong.php';

$st_roll = $_POST['rollno'];
$st_name = $_POST['fullname'];
$st_email = $_POST['email'];
$st_class = $_POST['class'];
$st_dob = $_POST['dob'];


$sql = "UPDATE users SET fullname = '$st_name', class_id = '$st_class', rollno = '$st_roll', dob = '$st_dob', email = '$st_email' WHERE rollno = '$st_roll' ";
$query = mysqli_query($link, $sql);

if($query){
    $_SESSION['status'] = 'Data Updated Successfuly';
    $_SESSION['status_code'] = 'success';
    header("location:dashboard.php");
}
else{
    $_SESSION['status'] = 'Someting went Wrong';
    $_SESSION['status_code'] = 'error';
    header("location:dashboard.php");
}

?>