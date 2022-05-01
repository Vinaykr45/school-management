<?php 
session_start();
include 'cong.php';

$student_id = $_POST['student_data'];

$output = '';


$output .='<input type="hidden" name="stdata" value="'.$student_id.'"">';
echo $output;




?>