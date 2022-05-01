<?php
session_start();
include 'cong.php';

$class_id = $_POST['class_data'];

$sql = "SELECT * FROM users WHERE class_id=$class_id";
$query = mysqli_query($link, $sql);

$output = ' <option selected disabled>Select Student Name</option>';

while($result = mysqli_fetch_assoc($query)){
    $output .= '<option value="'.$result['id'].'">'.$result['fullname'].'</option>';
   }
echo $output;



?>
