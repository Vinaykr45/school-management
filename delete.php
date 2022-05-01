<?php
session_start();
 include "cong.php";

 $st_id = $_POST['delete'];
 $st_roll = $_POST['sdelete'];
 echo $st_roll;
 if($st_id){
     
 $sql = "DELETE FROM img WHERE id = {$st_id} ";
 $result = mysqli_query($link, $sql);
 
 /*if($result){
        $_SESSION['status'] = 'Data Deleted Successfuly';
        $_SESSION['status_code'] = 'success';
          header("location:dashboard.php");
      }
else{
  $_SESSION['status'] = 'Someting went Wrong';
  $_SESSION['status_code'] = 'error';
          header("location:dashboard.php");
      }*/
    }
    else
    {
      $sql1 = "DELETE FROM users WHERE rollno = '$st_roll' ";
      $result1 = mysqli_query($link, $sql1);
      
     /* if($result1){
        $_SESSION['status'] = 'Data Deleted Successfuly';
        $_SESSION['status_code'] = 'success';
               header("location:dashboard.php");
           }
     else{
      $_SESSION['status'] = 'Someting went Wrong';
      $_SESSION['status_code'] = 'error';
               header("location:dashboard.php");
           } */     
    }
 ?>

