<?php
session_start();

include 'cong.php';


$subject_id = $_POST['subject_data'];



$sql = "SELECT * FROM subject WHERE class_id=$subject_id";
$query = mysqli_query($link, $sql);

$output = '';

while($result = mysqli_fetch_assoc($query)){
  
    $output .= '<lable> <b>'.$result['subject_name'].'</b> <br>'.'</lable>'.'<input name="subject[]" id="sub" type="hidden"  value="'.$result['subject_id'].'">'.'<input name="marks[]" class="form-control mt-1 mb-2" type="number"  placeholder="Enter Marks of '.$result['subject_name'].'">';
}

echo $output;

//echo $_SESSION['studentid'];



?>