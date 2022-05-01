<?php
session_start();
include 'cong.php';

if (isset($_POST['submit'])){
   
    $fullname = mysqli_real_escape_string($link, $_POST['fullname']);
    $rollno = mysqli_real_escape_string($link, $_POST['rollno']);
    $gender = mysqli_real_escape_string($link, $_POST['gender']);
    $class = mysqli_real_escape_string($link, $_POST['class']);
    $dob = mysqli_real_escape_string($link, $_POST['dob']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $email_err = " select * from users where email='$email'";
    $query = mysqli_query($link, $email_err);
    $emailconnt = mysqli_num_rows($query);

    
    $roll_err = " select * from users where rollno='$rollno'";
    $query = mysqli_query($link, $roll_err);
    $rollconnt = mysqli_num_rows($query);
    

    if($emailconnt>0){
      echo "Email is alredy register";
    }
else{
      if($rollconnt>0){
        echo "rollno is alredy register";
      }
    
  elseif($email_err == 0 && $roll_err ==0) {

        $insertquery = " insert into users(fullname,rollno,gender,email,class_id,dob) values('$fullname', '$rollno', '$gender', '$email','$class','$dob')";
        $iquery = mysqli_query($link, $insertquery);
      
        if($iquery){
          $_SESSION['status'] = 'Student Registered Successfuly';
          $_SESSION['status_code'] = 'success';
          header("Location:dashboard.php");
         }
   else{
           echo "Something went Wrong";
         }


      }
  
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
          <li class="nav-item">
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
<section class="wrapper">
<div class="container">
  <div class="row d-flex align-items-center justify-content-center">
  <div class="col-md-6 text-center"  style="margin-top:25px; margin-bottom:30px">
    <div class="logo">
      <img src="./image/Gossner.png" alt="logo" class="img-fluid">
    </div>
    <form action="" method="POST" class="shadow p-5 bg-white rounded needs-validation" id="login" novalidate>
      <h3 class="fw-bolder fs-4 text-dark">Register to Gossner College</h3>
      
    <div class="tab">
      <label class="sr-only" for="inlineFormInputGroupfullname">Full Name</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-user-tie"></i></div>
        </div>
        <input type="text" name="fullname" class="form-control" id="inlineFormInputGroupfullname" placeholder="Full Name" required>
        <div class="invalid-feedback">
        Please write your full name.
      </div>
      </div>
    </div>
    <div class="row">
    <div class="col-md-7 tab">
      <label class="sr-only" for="inlineFormInputGrouprollno">Roll No</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-list-ol"></i></div>
        </div>
        <input type="text" name="rollno" class="form-control" id="inlineFormInputGrouprollno" placeholder="Roll No" required>
        <div class="invalid-feedback">
        Please write your roll no.
      </div>
      </div>
    </div>

     <div class="col-md gen" id="gender">
        <label for="myField" class="control-label fw-bolder">Gender:</label>

           <label class="radio-inline">
               <input type="radio" name="gender" value="Male" required> Male
           </label>

           <label class="radio-inline">
               <input type="radio" name="gender" value="Female" > Female
           </label>
           <div class="invalid-feedback">
        Please choose a gender.
      </div>
     </div>
   </div>
   
   <div class="tab">
      <label class="sr-only" for="inlineFormInputGroupmail">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
        </div>
        <input type="mail" name="email" class="form-control" id="inlineFormInputGroupmail" placeholder="Email" required>
        <div class="invalid-feedback">
        Please write your Email.
      </div>
      </div>
    </div>
    <div class="tab text-left" style="text-align: left !important;">
      <label class="mb-1" for="inlineFormInputGroupmail"><b>Date of Brth</b></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
        </div>
        <input type="date" name="dob" class="form-control" id="inlineFormInputGroupmail" placeholder="DOB" required>
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
      }?>
  <div class="invalid-feedback">
        Please select your department.
      </div>
</select>
    </div>
    

    
    
    
    <div class="button">
      <button type="submit" name="submit" class="btn w-100 submit_btn my-3 btn-primary">Register</button>
    </div>
                
    </form>
  </div>
  </div>
</div>
</section>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

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
  
</html>