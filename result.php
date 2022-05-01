<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
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
          <li class="nav-item active">
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

<?php 
include 'cong.php';

$rollno = $_POST['rollno'];
$class = $_POST['class'];

$sql = "SELECT * FROM users INNER JOIN class ON users.class_id = class.class_id WHERE users.rollno='$rollno' AND class.class_id='$class'";
$result = mysqli_query($link, $sql);
 
$row = mysqli_fetch_assoc($result);
$student = $row['id'];
$roll = $row['rollno'];

if($rollno=$roll){

?>

<!--body-->
<section class="section" id="printarea" >
 <div class="conatainer" >
   <div class="row  my-4">
     <div class="col d-flex align-items-center justify-content-center"><p><img src="image/Gossner.png" ></p> 
  </div>
    <div class="d-flex align-items-center justify-content-center" style="margin-top: -10px; margin: bottom -10px;"> <p><h5>(Examination Department)</h5></p></div>
    
     
   </div>
   <div class="row d-flex justify-content-center my-1">
  
      <div class="col-md-8" >
      <table  class="table text-center table-hover table-bordered tb" border="1" width="100%" style="border-color: black !important;">
       <thead>
         <tr>
         <th>Name Of Student</th>
         <th>Roll No</th>
         <th>Gender</th>
         </tr>
       </thead>
       <tbody>
         <tr>
         <?php
         foreach($result as $row){
         ?>
        <td><?php echo $row['fullname'] ?></td>
         <td><?php echo $rollno ?></td>
         <td><?php echo $row['gender'] ?></td>
         </tr>
         <tr>
         <td><?php echo "<b> Class : &nbsp;&nbsp;</b>".' '.$row['class_name'] ?></td>
         <td colspan="2"><b>Collage :</b>&nbsp;&nbsp; Gossner College</td>
         </tr>
      
        </tbody>
  
  <?php 
 
  }
  ?>
    </table>
  <table class="table text-center table-hover table-bordered tb" style="border-color: black !important; margin-top:-15px;">
  <thead>
    <tr>
      <th>S/No</th>
      <th>Subject</th>
      <th>Marks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
     $no = 1; 
     
      $marlk = "SELECT * FROM marks INNER JOIN subject ON marks.subject_id=subject.subject_id WHERE marks.student_id = '$student' ";
      $query = mysqli_query($link, $marlk);
      while($marks = mysqli_fetch_assoc($query)){
        //$mar = $marks['marks'];
        //$total+=$mar;
      
    ?>
    
      <td><?php echo $no ?></td>
      <td><?php echo $marks['subject_name'] ?></td>
      <td><?php echo $marks['marks'] ?></td>
      </tr>
    
    <?php
     $no++; 
      }?>
      <tr>
      <td colspan="3" > <p id="table_mark">
      
     <b style="word-spacing: 2px !important;"> Result </b>
     <?php 
    $marl2 = "SELECT * FROM marks WHERE student_id = '$student' ";
    $quer2 = mysqli_query($link, $marl2);
    while($mark2 = mysqli_fetch_assoc($quer2)){
      $mark1 = $mark2['marks'];
    }

     if( $mark1 > 32) {
        echo "PASS";
     }
     else{
       echo "FAIL";
     }
    
     ?>
  
   <b style="word-spacing: 2px !important;"> Percentage </b>
    <?php 
    $marl1 = "SELECT * FROM result WHERE student_id = '$student' ";
    $quer1 = mysqli_query($link, $marl1);
    while($mark = mysqli_fetch_assoc($quer1)){
     echo $mark['result']."%";
    }
     ?>
   
     <b style="word-spacing: 2px !important;"> Total </b>
    <?php 
    $marl = "SELECT SUM(marks) AS sum FROM marks WHERE student_id = '$student' ";
    $quer = mysqli_query($link, $marl);
    while($mark = mysqli_fetch_assoc($quer)){
     echo $mark['sum'];
    }
     ?>

</p>
    </td>

      </tr>
  
      <td colspan="3" align="center"> <button type="button" id="printButton" class="btn" ><i class="fa-solid fa-print fa-2x"></i></button></td>
  </tbody>
  

      </table>
 
     </div>
     
   </div>
 </div>
 </section>
 <div class="conatiner" >
   <div class="row ">
     <div class="col d-flex align-items-center justify-content-center">
     <?php 
}
else{
  $n = true;
}?>
     
  </div>
   </div>

</div>
<!--body-->

<!--footer-->
<footer class="bg-dark text-white">
  <div class="container-fluid">
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
  <script src="js.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

  function print() {
	printJS({
    printable: 'printarea',
    type: 'html',
    targetStyles: ['*']
 })
}

document.getElementById('printButton').addEventListener ("click", print)
  /*  var printwin = window.open("");
  printwin.document.write(document.getElementById("printarea").innerHTML);
  printwin.stop();
  printwin.print();
  printwin.close();
*/
  


</script>


<?php 
if($n){?>
<script>
   setTimeout(function() {
        swal({
            title: "Error",
            text: "No Result Found !",
            icon: "error"
        }).then(function() {
            window.location = "find-result.php";
        })
    }, 100);
</script>';
</script>
<?php
}
 ?>


</html>