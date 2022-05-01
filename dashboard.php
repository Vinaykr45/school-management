<?php
session_start();  
if(empty($_SESSION['username'])){
  header("location: index.php");
  exit;}
include "cong.php";
$img = '';
$imgerr = '';
$clas = '';
$claserr = '';
$ext = '';
if(isset($_POST['submit'])){
  $heading = $_POST['heading'];
  $image = $_FILES['image'];

  $filename = $image['name'];
  $filepath = $image['tmp_name'];
  $fileerror = $image['error'];

  $file_ext = explode('.', $filename);
  $file_ext_check = strtolower(end($file_ext));
  $valid_file_ext = array('jpeg','png','jpg','pdf');

  if($fileerror == 0){
   
    if(in_array($file_ext_check, $valid_file_ext)){
    
    $destfile = 'uplode/'.$filename;

    move_uploaded_file($filepath, $destfile);

    $isertquery = " insert into img(heading, image) values('$heading','$destfile')";

    $query = mysqli_query($link,$isertquery);

    if($query){ 
      $img = true;
      //header("location:dashboard.php");
    }else{
      $imgerr = true;
      //echo "Something went wrong";
    }
   }
   else{
    $ext = true;
  }
  }
  

}

if(isset($_POST['class_add'])){
  $class = $_POST['class'];

  $insert = "INSERT INTO class(class_name) VALUE('$class')";
  $query1 = mysqli_query($link, $insert);

  if($query1){
    $clas = true;
    //header("location:dashboard.php");
  }
  else{
    $claserr =true;
    //header("location:dashboard.php");
  }

}

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0c1ab73b87.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    a{text-decoration: none;}
  </style>
  </head>
<body>

<!--navbar open-->
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="./image/Gossner.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">


        <ul class="navbar-nav ms-auto">
          <li class="nav-item active">
            <a class="nav-link " href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Courses</a>
              <div class="dropdown-menu">
               <a class="dropdown-item" href="bca.php">BCA</a>
               <a class="dropdown-item" href="bba.php">BBA</a>
              </div>
            </div>
           
          </li>
          <li class="nav-item">
            <a class="nav-link " href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="find-result.php">Result</a>
          </li>

          

          <li class="nav-item">
          <?php if( isset($_SESSION['rollno']) && !empty($_SESSION['rollno']) )
{
?>
     <div class="dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo "Hi".' '. $_SESSION['fullname']?> </a>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="admin.php">Profile</a>
               <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </div>
            <?php }else{ if( isset($_SESSION['username']) && !empty($_SESSION['username']) ) {?>
              <div class="dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo "Hi".' '. $_SESSION['fullname']?> </a>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="dashboard.php">Profile</a>
               <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </div>
<?php }else{ ?>
     <a class="nav-link" href="login.php">Student Login</a>
     <li class="nav-item">
     <a class="nav-link" href="techlog.php">College Login</a>
<?php 
}
} ?>
</li>
          </li>

          
        </ul>
      </div>

    </div>

  </nav>
<!--navbar close-->

<!--body-->
 

<!--modal student edit-->
<div class="modal fade" id="steditmodal" tabindex="-1" role="dialog" aria-labelledby="steditmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="steditmodalLabel">Update this Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
</div>
 <form action="edit.php" method="POST" id="login">
      <div class="modal-body">
      <div class="tab">
      <label class="sr-only" for="name">Full Name</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-user-tie"></i></div>
        </div>
        <input type="text" name="fullname" class="form-control" id="name" value="" placeholder="Full Name" required>
        <div class="invalid-feedback">
        Please write your full name.
      </div>
      </div>
    </div>
    
    <div class="tab">
      <label class="sr-only" for="roll">Roll No</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-list-ol"></i></div>
        </div>
        <input type="text" name="rollno" class="form-control" id="roll" placeholder="Roll No" required>
        <div class="invalid-feedback">
        Please write your roll no.
      </div>
      </div>
    </div>

   
   <div class="tab">
      <label class="sr-only" for="email">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
        </div>
        <input type="mail" name="email" class="form-control" id="email" placeholder="Email" required>
        <div class="invalid-feedback">
        Please write your Email.
      </div>
      </div>
    </div>
    <div class="tab text-left" style="text-align: left !important;">
      <label class="mb-1" for="dob"><b>Date of Brth</b></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
        </div>
        <input type="date" name="dob" class="form-control" id="dob" placeholder="DOB" required>
        <div class="invalid-feedback">
        Please write your Date of Birth.
      </div>
      </div>
    
    </div>
    <div class="tab">
     
    <select name="class" class="form-select" aria-label="Default select example" required>
  <option selected disabled>Select Your Class</option> 
  <?php
      
      $sql = "SELECT * FROM class";
      $row = mysqli_query($link, $sql);

      while($reslut = mysqli_fetch_assoc($row)){
      ?>
  <option value="<?php echo $reslut['class_id']?>"><?php echo $reslut['class_name']?></option>
  
  <?php
      }
      ?>
  <div class="invalid-feedback">
        Please select your department.
      </div>
</select>
    </div>
    
    <div class="button">
      <button type="submit" name="submit" class="btn w-100 submit_btn my-3 btn-primary">Update</button>
    </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!--modal-->


<!--modal for class-->
<div class="modal fade" id="classmodal" tabindex="-1" role="dialog" aria-labelledby="classmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modal-title-class ">Add Class</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="col-md d-flex align-items-center justify-content-center mt-4 mb-4">
        <form action="" method="post">
          <div class="form-group ">
          <label class="sr-only" for="class">Class</label>
          <div class="input-group">
            <div class="input-group-text"><i class="fa-solid fa-house"></i></div>
            <input type="text" name="class" class="form-control" id="class" placeholder="Enter Class Name">
          </div>
          </div>
          <br>
          <button type="submit" name="class_add" class="btn btn-primary w-100">Add</button>
          
        </form>
      </div>

    </div>
  </div>
</div>
<!--modal-->


<!--modal for subject-->
<div class="modal fade" id="subjectmodal" tabindex="-1" role="dialog" aria-labelledby="subjectmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modal-title-class ">Add Subject</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <?php
$sub = '';
$suberr = '';
if(isset($_POST['addsub'])){
    
$class = $_POST['class'];
$subject = $_POST['subject'];

    $insert = "INSERT INTO subject(class_id,subject_name) VALUE('$class','$subject')";
    $query = mysqli_query($link,$insert);

    if($query){
        $sub = true;
        //header("location:subject.php");
    }
    else{
       $suberr =true;
    }
}

?>

      <div class="conatainer">
   <div class="row">
      <div class="col-md d-flex align-items-center justify-content-center mt-4 mb-4">
          <form action="" method="POST">
          
    <select name="class" class="form-select" aria-label="Default select example" required>
 <option selected disabled>Select Your Class</option>
  <?php
      
      $sql = "SELECT * FROM class";
      $row = mysqli_query($link, $sql);

      while($reslut = mysqli_fetch_assoc($row)){
      ?>
  <option value="<?php echo $reslut['class_id']?>"><?php echo $reslut['class_name']?></option>
  
  
  <?php
      }?>
  
  <div class="invalid-feedback">
        Please select your department.
      </div>
      
</select>

<label for="subject"></label>
<div class="input-group">
    <div class="input-group-text"><i class="fa-solid fa-font"></i></div>
    <input name="subject" type="text" class="form-control" id="subject" placeholder="Enter Subject" required>
    <div class="invalid-feedback">
        Please Enter Subject.
      </div>
  </div>
<br>
<button name="addsub" class="btn btn-primary w-100">Add Subject</button>
          </form>
      </div>
   </div>
 </div>  

    </div>
  </div>
</div>
<!--modal-->


<div class="container">
    <div class="row">
      <!--left div-->
        <div class="col-lg-3 col-md-4 d-md-block my-3">
         <div class="card bg-com card-left bg-light">
         <ul class="nav nav-tab d-md-block d-none">
  <li class="nav-item">
    <a data-toggle="tab" class="nav-link active" aria-current="page" href="#dashboard"><i class="fa-solid fa-gauge mr-1"></i>Dashboard</a>
  </li>
  <li class="nav-item">
    <a data-toggle="tab" class="nav-link" href="#profile"><i class="fa-solid fa-user mr-1"></i>Profile</a>
  </li>
  <li class="nav-item">
          <a data-toggle="tab" class="nav-link" href="#student"><i class="fa-solid fa-users mr-1"></i>Students</a>
   </li>
 
  <li class="nav-item">
    <a data-toggle="tab" class="nav-link" href="#notice"><i class="fa-solid fa-circle-exclamation mr-1"></i>Notice</a>
  </li>
  <li class="nav-item">
    <a data-toggle="tab" class="nav-link" href="#result"><i class="fa-solid fa-square-poll-vertical mr-1"></i>Result</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket mr-1"></i>Logout</a>
  </li>
  
</ul>
         </div>
        </div>
<!--right div-->
<div class="col-lg-8 col-md-9 my-3 ">
  <div class="car">
    <div class="caborder-bottom mb-3">
      <ul class="nav nav-tabs d-md-none nav-fill">
        <li class="nav-item">
          <a data-toggle="tab" class="nav-link active" aria-current="page" href="#dashboard"><i class="fa-solid fa-gauge mr-1"></i></a>
        </li>
        <li class="nav-item">
          <a data-toggle="tab" class="nav-link" href="#profile"><i class="fa-solid fa-user mr-1"></i></a>
        </li>
        <li class="nav-item">
          <a data-toggle="tab" class="nav-link" href="#student"><i class="fa-solid fa-users mr-1"></i></a>
        </li>
        <li class="nav-item">
          <a data-toggle="tab" class="nav-link" href="#notice"><i class="fa-solid fa-circle-exclamation mr-1"></i></a>
        </li>
        <li class="nav-item">
          <a data-toggle="tab" class="nav-link" href="#result"><i class="fa-solid fa-square-poll-vertical mr-1"></i></a>
        </li>
        <li class="nav-item">
          <a  class="nav-link" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket mr-1"></i></a>
        </li>
        
      </ul>
    </div>

  <div class="card-body tab-content">
     <div class="tab-pane active" id="dashboard">
      <div class="col-md text-center">
      <h3><?php echo "Welcome".' '.$_SESSION['fullname'] ?></h3>
      <br>
        <h5>NOTICE BOARD</h5>
       <div class="notice">
          <table class="table">
            <thead class="thead-dark bg-dark text-light">
              <tr>
              <th>id</th>
              <th>Heading</th>
              <th>Image</th>
              <th>Delete</th>
              </tr>
            </thead>
           
         <?php 

         
         $selectquery = "select * from img";
         $query = mysqli_query($link, $selectquery);
  
         while($result = mysqli_fetch_array($query)){
           ?>
          <tbody>
              <tr>
                <td class="st_id"><?php echo $result['id']?></td>
                <td><?php echo $result['heading']?></td>
                <td><a href="<?php echo $result['image']?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo $result['image']?> " width="60" height="50"> </a></td>
                <td><button type="button" class="btn btn-danger deletebtn">Delete</button></td>
              </tr>
            </tbody>
        <?php
         }
         ?>
     
     </table>
       </div>
      </div>
     </div>
     <div class="tab-pane" id="profile">
       <div class="col-md d-flex align-item-center justify-content-center">
         <div class="child" style="width: 600px;">
     <table class="table table-md">
        <tr class="table-primary">
          <td>Name</td>
          <td><?php echo $_SESSION['fullname']?></td>
        </tr>
        <tr class="table-primary">
          <td>Username</td>
          <td><?php echo $_SESSION['username']?></td>
        </tr>
        <tr class="table-primary">
          <td>Department</td>
          <td><?php echo $_SESSION['department']?></td>
        </tr>
        <tr class="table-primary">
          <td>Email</td>
          <td><?php echo $_SESSION['email']?></td>
        </tr>

        </table>
        </div>
        </div>
    </div>
    <div class="tab-pane" id="notice">
    <h4 class="text-center">Add Notice</h4>
      <div class="parent-div d-flex align-items-center justify-content-center">
      <form class="shadow p-3 mb-5 bg-white rounded" action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail1">Heading</label>
    <div class="input-group">
      <div class="input-group-text"><i class="fa-solid fa-heading"></i></div>
    
    <input type="text" name="heading" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Heading">
    </div>
  </div>
  <br>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword1">Image</label>
    <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Image">
  </div>
  <br>
  <div class="d-flex align-items-center justify-content-center">
  <button type="submit" name="submit" class="btn w-100 btn-primary text-center">Upload</button>
  </div>
</form>
  
      </div>
    </div>

    <div class="tab-pane" id="student">
    <h4>Student Details</h4><hr>
    <div class="text-right d-flex flex-row-reverse">
    <a type="button" target="_blank" href="register.php" class="btn btn-primary mb-2 res">Add Student</a>
    </div>
      <div class="col-md d-flex align-items-center justify-content-center table-responsive">
        
        
         <table class="table text-center">
           <thead class="bg-dark text-light">
             <tr>
               <th>Student Name</th>
               <th>Roll No.</th>
               <th>Class</th>
               <th>DOB</th>
               <th>email</th>
               <th>Action</th>
               
             </tr>
           </thead>
           <tbody>
           <?php 




        $selectquery = "select * from users";
          $query = mysqli_query($link, $selectquery);

          while($result = mysqli_fetch_array($query)){
               ?>
               <tr>
                 <td><?php echo $result['fullname'] ?></td>
                 <td class="st_roll"><?php echo $result['rollno'] ?></td>
                 <td><?php
                 $selectquery1 = "select * from class";
                 $query1 = mysqli_query($link, $selectquery1);
                  
                 while($result1 = mysqli_fetch_array($query1)){
                   if($result['class_id'] == $result1['class_id']){
                     echo $result1['class_name'];
                   }
                  }
                 ?></td>
                 <td><?php echo $result['dob'] ?></td>
                 <td><?php echo $result['email'] ?></td>
                 <td><button type="button" name="edit" data-toggle="modal" data-target="#steditmodal" class="btn btn-primary res editbtn" style="font-size: 12px;"><i class="fa-solid fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger res deletebtn" style="font-size: 12px;"><i class="fa-solid fa-trash"></i></button></td>
               <!--  <td><button type="button" name="edit" data-toggle="modal" data-target="#steditmodal" class="btn btn-primary res editbtn">Edit</button></td>
                 <td><button type="button" data-toggle="modal" data-target="#stdeletemodal" class="btn btn-danger res deletebtn">Delete</button></td>
                -->
                </tr>
               <?php 
          } ?>
           </tbody>
         </table>
      </div>
    </div>

    <div class="tab-pane" id="result">

    <h4>Student Result Details</h4><hr>
      <div class="row text-center">
        <div class="col-4">
         <button type="button" data-toggle="modal" data-target="#classmodal" class="btn btn-primary res">Add Class</button>
        </div>
        <div class="col-4">
         <button data-toggle="modal" data-target="#subjectmodal" class="btn btn-primary res">Add Subject</button>
        </div>
        <div class="col-4">
         <a type="button" href="marks.php" target="_blank" class="btn btn-primary res">Add Marks</a>
        </div>
      </div>

      <div class="col d-flex align-items-center justify-content center my-4">
    
        <table class="table text-center">
           <thead class="bg-dark text-light">
             <tr>
               <th>Class</th>
               <th>Student Name</th>
               <th>Percentage</th>
             </tr>
           </thead>
           <tbody>
             <?php
             $res = "SELECT * FROM result";
             $row = mysqli_query($link, $res);

             while($resl = mysqli_fetch_assoc($row)){
             ?>
             <tr>
               <td>
              <?php 
               $res1 = "SELECT * FROM class";
               $row1 = mysqli_query($link, $res1);
  
               while($resl1 = mysqli_fetch_assoc($row1)){
                if($resl['class_id'] == $resl1['class_id']){
                  echo $resl1['class_name'];
                }
               }
               ?>
               </td> 
            
              <td>
              <?php 
               $res2 = "SELECT * FROM users";
               $row2 = mysqli_query($link, $res2);
  
               while($resl2 = mysqli_fetch_assoc($row2)){
                if($resl['student_id'] == $resl2['id']){
                  echo $resl2['fullname'];
                }
               }
               ?>
              </td>

              <td><?php echo $resl['result']?></td>

             </tr>
             <?php
            } ?>
           </tbody>
        </table>  
      </div>
    </div>

    
      
      </div>

  </div>

  </div>

</div>

    </div>
</div>

<!--body-->
 



<!--footer-->
<footer class="bg-dark text-white">
  <div class="container">
  <div class="row row-col-3" id="fot">
  <div class="col-md">
    <h5>REACH US</h5>
    <p>
  <i class="fa fa-map-marker"></i> &nbsp Gossner College Ranchi<br>
  &nbsp &nbsp Club Road, Ranchi - 834001 (Jharkhand) </p>
    <p> <i class="fa fa-phone"></i> &nbsp (0651) 2331635, 2331659 (off) </p> 
    <p>  <i class="fa fa-envelope"></i> <a href="mailto: gcranprincipal@gmail.com" style="color: white;"> &nbsp gcranprincipal@gmail.com</a> </p>
  </ul>
  </div>
  <div class="col-md">
    <h5>USEFUL RESOURCES</h5>
  <p><a href="https://www.ugc.ac.in/" style="color: white;">UGC</a></p>
  <p><a href="https://www.nirfindia.org/Home" style="color: white;">NIRF</a></p>
  <p><a href="https://www.inflibnet.ac.in/" style="color: white;">INFLIBNET</a></p>
  <p><a href="http://jharkhanduniversities.nic.in/login" style="color: white;">Chancellor Portal</a></p>
  </div>
  <div class="col-md">
    <h5>GET IN TOUCH</h5>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3662.912345378531!2d85.32375051444834!3d23.355190009676527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4e1a6703e0cf1%3A0xe90470de80c22839!2sGossner%20College%20Ranchi!5e0!3m2!1sen!2sin!4v1647171395088!5m2!1sen!2sin" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
  </div>
  </div>
  <div class="bg-black text-center" style="padding-bottom:auto;padding-top: 5px;">
    <p> &#169 All Copyright Reserved <a href="index.php" style="color: white;">My College</a> </p>
  </div>
  
  </footer>
  <!--footer-->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <!--script-->

<script>
  
</script>

<script>
  
  $(document).ready(function (){

    $('.deletebtn').on('click', function(e){
      e.preventDefault();
     
       var st_id = $(this).closest('tr').find('.st_id').text();
       var st_roll = $(this).closest('tr').find('.st_roll').text();
      // console.log(st_id);
       //$('#delete_id').val(st_id);
       swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    
    $.ajax({
   url : 'delete.php',
   type : "POST",
   data : {
     delete : st_id,
     sdelete : st_roll,  
   },
     success : function(result){
      swal("Data Deleted Successfully",{
      icon: "success",})
     .then((value) => {
     location.reload();
});
     }
   })

  }
});
       

    })
  })
</script>
<script>
  
  $(document).ready(function (){

    $('.deletebtn').on('click', function(e){
      e.preventDefault();
     
       var st_roll = $(this).closest('tr').find('.st_roll').text();
      // console.log(st_id);
       $('#stdelete_id').val(st_roll);

       

    })
  })
</script>

<script>
  
  $(document).ready(function (){

    $('.editbtn').on('click', function(e){
      e.preventDefault();
     
      $tr = $(this).closest('tr');

      var data =$tr.children("td").map(function(){
         return $(this).text();
      }).get();

       $('#name').val(data[0]);
       $('#roll').val(data[1]);
       $('#class').val(data[2]);
       $('#dob').val(data[3]);
       $('#email').val(data[4]);

    })
  })
</script>

<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
?>
<script>
  swal({
  title: "<?php echo $_SESSION['status']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code']; ?>",
  button: "Ok Done!",
});
</script>
 <?php 
 unset($_SESSION['status']);
}
 ?>

<?php 
if($img){?>
<script>
   setTimeout(function() {
        swal({
            title: "Success",
            text: "Notice Inserted Successfully!",
            icon: "success"
        }).then(function() {
            window.location = "dashboard.php";
        })
    }, 1000);
</script>';
</script>
<?php
}
 ?>

<?php 
if($imgerr){?>
<script>
   setTimeout(function() {
        swal({
            title: "Error",
            text: "Please Select JPEG and PDF!",
            icon: "error"
        }).then(function() {
            window.location = "dashboard.php";
        })
    }, 1000);
</script>';
</script>
<?php
}
 ?>

<?php 
if($clas){?>
<script>
   setTimeout(function() {
        swal({
            title: "Success",
            text: "Class Inserted Successfully!",
            icon: "success"
        }).then(function() {
            window.location = "dashboard.php";
        })
    }, 1000);
</script>';
</script>
<?php
}
 ?>

<?php 
if($claserr || $suberr){?>
<script>
   setTimeout(function() {
        swal({
            title: "Error",
            text: "Something went wrong please try after sometime!",
            icon: "error"
        }).then(function() {
            window.location = "dashboard.php";
        })
    }, 1000);
</script>';
</script>
<?php
}
 ?>

<?php 
if($ext){?>
<script>
   setTimeout(function() {
        swal({
            title: "Error",
            text: "Please Selcect only JPEG/PNG/PDF Files!",
            icon: "error"
        }).then(function() {
            window.location = "dashboard.php";
        })
    }, 1000);
</script>';
</script>
<?php
}
 ?>

<?php 
if($sub){?>
<script>
   setTimeout(function() {
        swal({
            title: "Success",
            text: "Subject Inserted Successfully!",
            icon: "success"
        }).then(function() {
            window.location = "dashboard.php";
        })
    }, 1000);
</script>';
</script>
<?php
}
 ?>

<!--script-->
</html>