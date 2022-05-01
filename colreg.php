<?php
include 'cong.php';

if (isset($_POST['submit'])){
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $fullname = mysqli_real_escape_string($link, $_POST['fullname']);
    $department = mysqli_real_escape_string($link, $_POST['department']);
    
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $email_err = " select * from col where email='$email'";
    $query = mysqli_query($link, $email_err);
    $emailconnt = mysqli_num_rows($query);

   $pass = password_hash($password, PASSWORD_DEFAULT);
   $cpass = password_hash($cpassword, PASSWORD_DEFAULT);

    $username_err = " select * from col where username='$username'";
    $query = mysqli_query($link, $username_err);
    $userconnt = mysqli_num_rows($query);
    
    

    if($emailconnt>0){
      echo "Email is alredy register";
    }
else{
      if($userconnt>0){
        echo "username is alredy register";
      }
    else{
      
     if($password === $cpassword){
      
        $insertquery = " insert into col(username,fullname,department,email,password) values( '$username','$fullname', '$department',  '$email', '$pass')";
        $iquery = mysqli_query($link, $insertquery);

      }
      if($iquery){
        
       header("Location:techlog.php");
      }
else{
        echo "password are not matching";
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
  <div class="row align-items-center">
  <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 text-center"  style="margin-top:25px; margin-bottom:30px">
    <div class="logo">
      <img src="./image/Gossner.png" alt="logo" class="img-fluid">
    </div>
    <form action="" method="POST" class="shadow p-5 bg-white rounded needs-validation" id="login" novalidate>
      <h3 class="fw-bolder fs-4 text-dark">College Registration</h3>
      <div class="tab">
      <label class="sr-only" for="validationCustomUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
        </div>
        <input type="text" class="form-control" name="username" id="validationCustomUsername" placeholder="Username" required>
      <div class="invalid-feedback">
        Please write a username.
      </div>
      </div>
    </div>
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
    <div class="tab">
    <select name="department" class="form-select" aria-label="Default select example" required>
  <option selected>Select Your Department</option>
  <option value="BCA">BCA</option>
  <option value="BBA">BBA</option>
  
  <div class="invalid-feedback">
        Please select your department.
      </div>
</select>
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
    <div class="tab">
      <label class="sr-only" for="inlineFormInputGrouppass">Password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
        </div>
        <input type="password" name="password" class="form-control" id="inlineFormInputGrouppass" placeholder="Password" required>
        <div class="invalid-feedback">
        Please write a password.
      </div>
      </div>
    </div>
    <div class="tab">
      <label class="sr-only" for="inlineFormInputGrouppass">confirm password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
        </div>
        <input type="password" name="cpassword" class="form-control" id="inlineFormInputGrouppass" placeholder="Confirm password" required>
        <div class="invalid-feedback">
        Please write a password.
      </div>
      </div>
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