<?php
session_start();  

include "cong.php";

if(empty($_SESSION['rollno'])){
  header("location: index.php");
  exit;

if(isset($_POST['submit'])){
  $heading = $_POST['heading'];
  $image = $_FILES['image'];

  $filename = $image['name'];
  $filepath = $image['tmp_name'];
  $fileerror = $image['error'];

  if($fileerror == 0){
    $destfile = 'uplode/'.$filename;

    move_uploaded_file($filepath, $destfile);

    $isertquery = " insert into img(heading, image) values('$heading','$destfile')";

    $query = mysqli_query($link,$isertquery);

    if($query){
      echo "Inserted Successfuly";
      header("location:dashboard.php");
    }else{
      echo "Something went wrong";
    }
  }

}

if(isset($_POST['class_add'])){
  $class = $_POST['class'];

  $insert = "INSERT INTO class(class_name) VALUE('$class')";
  $query1 = mysqli_query($link, $insert);

  if($query1){
    echo "class insert sucessfuly";
    header("location:dashboard.php");
  }
  else{
    echo "someting went wrong";
    header("location:dashboard.php");
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
    <title>Student Dashboard</title>
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
            <a class="nav-link" target="_blank" href="https://rzp.io/l/BjTqRGv"><i class="fa-solid fa-bag-shopping mr-1"></i>Payment</a>
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
            <a class="nav-link" target="_blank" href="https://rzp.io/l/BjTqRGv"><i class="fa-solid fa-bag-shopping"></i></a>
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
       <div class="notice-board">
       <div class="ntboar">
        
       <?php 
      
       $selectquery = "select * from img";
       $query = mysqli_query($link, $selectquery);

       while($result = mysqli_fetch_array($query)){
         ?>
       <p><a href="<?php echo $result['image'] ?>" target="_blank"><?php echo $result['heading'] ?></a></p>
      <?php
       }
       ?>
   </div>
     </div>
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
          <td>Roll No</td>
          <td><?php echo $_SESSION['rollno']?></td>
        </tr>
        <tr class="table-primary">
          <td>Date of Birth</td>
          <td><?php echo $_SESSION['dob']?></td>
        </tr>
        <tr class="table-primary">
          <td>Email</td>
          <td><?php echo $_SESSION['email']?></td>
        </tr>

        </table>
        </div>
        </div>
    </div>
    
    

    <div class="tab-pane" id="result">

    <h4>Student Result Details</h4><hr>
      <div class="row text-center">
        

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
             $stid = $_SESSION['id'];
             $res = "SELECT * FROM result WHERE student_id = '$stid'";
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
  
  $(document).ready(function (){

    $('.deletebtn').on('click', function(e){
      e.preventDefault();
     
       var st_id = $(this).closest('tr').find('.st_id').text();
      // console.log(st_id);
       $('#delete_id').val(st_id);

       

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
 
<!--script-->
</html>