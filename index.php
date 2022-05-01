<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>My School</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/0c1ab73b87.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  
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

<!--Share-->
<ul class="ct-socials">
  <li>
    <a href="#" target="_blank" class="twitter-btn"><i class="fab fa-twitter"></i></a>
  </li>
  <li>
    <a href="#" target="_blank" class="facebook-btn"><i class="fab fa-facebook"></i></a>
  </li>
 
  <li>
    <a href="/" target="_blank" class="linkedin-btn"><i class="fab fa-linkedin"></i></a>
  </li>
  <li>
    <a href="/" target="_blank" class="whatsapp-btn"><i class="fab fa-whatsapp"></i></a>
  </li>
</ul>
<script src="script.js"></script>
<!--Share-->
<!--image slider open-->
<div class="container">
  
<div id="myslider" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="./image/banner1.jpg" alt="first" class="d-block w-100 " >
  </div>
  <div class="carousel-item ">
    <img src="./image/banner4.jpg" alt="first" class="d-block w-100">
  </div>
  <div class="carousel-item">
    <img src="./image/banner5.jpg" alt="first" class="d-block w-100">
  </div>
  </div>
<a href="#myslider" class="carousel-control-prev" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a href="#myslider" class="carousel-control-next" role="button" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>

</div>
<!--image slider close-->
<!--Marquee-->
<div class="container">
<marquee id="mar" behavior="scroll" direction="left" scrollamount='5' onmouseover='this.stop()' onmouseout='this.start()'><ul> <li><a class="move" href="#">PG 2020-22 Orientation Class</a></li>
  <li><a class="move" href="#">PG 2020-22 Admission</a></li>
</ul></marquee>
</div>
<!--Marquee-->
<!--Wlecome-->
<section id="welc">
<div class="container" id="wel">
  <div class="welcome">
    <h2>Wlecome to My College</h2>
    <p>Gossner College was established in November, 1971 by our Founder Principal Rt. Reverend Dr. Nirmal Minz. Gossner College is a Minority College, affiliated to Ranchi University and is managed by Gossner Evangelical Lutheran Church (GELC) of Chotanagpur and Assam.</p>

    <p>  Our mission is to provide the vista of university education to the deserving students coming from socially, economically backward and underprivileged communities of this region, particularly the Scheduled Tribes, Scheduled Castes and other Backward Communities. Preference is given to students from these communities. However, since the college is situated in the heart of Ranchi (Jharkhand, India), students of other communities and regions may also apply.
       </p>

  </div>

</div>
</section>
<!--Wlecome-->
<!--Notice-->
<section id="course">
<div class="container" id="notice" >
  <div class="row">
    <div class="col-md" >
      <img src="./image/open-book.png" alt="" class="board">
      <h4>OUR PROGRAMS</h4>
      <p>The University offers Diplomas, Undergraduate Degrees, Postgraduate Degrees and Doctoral programs in different disciplines.</p>
    <a href="#" role="button" class="butto">Read More</a>
    
    </div>
<div class="col-md">
  <img src="./image/school.png" alt="" class="board">
  <h4>MY CAMPUS LIFE</h4>
  <p>My Campus life is the overall aspect of being a student; meaning that it goes beyond what we learn in the classroom.</p>
  <a href="#" role="button" class="butto">Read More</a>
</div>
<div class="col-md">
  <img src="./image/calendar.png" alt="" class="board">
  <h4>NEWS & EVENTS</h4>
  <p>All the latest activities at the Jharkhand Rai University Campus captured by the Media Houses, catch a glimpse here…</p>
  <a href="#" role="button" class="butto">Read More</a>
</div>
</div>
  

</div>
</section>
<!--Notice-->
<!--Counter up-->
<h3 class="head">OUR FACTS</h3>
<section id="con"> 
<div class="container" id="count">
  
<div class="row row-col-4">
  <div class="bd-1 col-md">
    <i class="fa fa-solid fa-book"></i>
    <div class="counter">500</div>
    <p>PLUS PROJECT</p>
  </div>
  <div class="bd-2 col-md">
    <i class="fa fa-solid fa-user"></i>
    <div class="counter">4500</div>
    <p>PLUS STUDENTS</p>
  </div>
  <div class="bd-3 col-md">
    <i class="fa fa-solid fa-flask"></i>
    <div class="counter">50</div>
    <p>MODERN LAB</p>
  </div>
  <div class=" col-md">
    <i class="fa fa-solid fa-trophy"></i>
    <div class="counter">50</div>
    <p>AWARDS</p>
  </div>

</div>

</div>
</section>
<script>
  $('.counter').each(function () {
      $(this).prop('Counter',0).animate({
          Counter: $(this).text()
      }, {
        
        //chnage count up speed here
          duration: 4000,
          easing: 'swing',
          step: function (now) {
              $(this).text(Math.ceil(now));
          }
      });
  });
  </script>
<!--Counter up-->
<!--notice board-->
<div class="container" id="not">
  <div class="row row-col-2">
    <div class="col-md">
      <h2>NOTICE BOARD</h2>
     <div class="notice-board">
       <marquee behavior="scroll" direction="up" scrollamount='5' onmouseover='this.stop()' onmouseout='this.start()' class="ntboard">
        
       <?php 
       include 'cong.php';
       
       $selectquery = "select * from img";
       $query = mysqli_query($link, $selectquery);

       while($result = mysqli_fetch_array($query)){
         ?>
       <p><a href="<?php echo $result['image'] ?>" target="_blank"><?php echo $result['heading'] ?></a></p>
      <?php
       }
       ?>
   
       </marquee>
     </div>
    </div>
<div class="col-md cm" id="pri">
  <div class="head1">
  <div class="hi1">
<h2>Principal's Message</h2>
</div>
<h5>Dear Students,</h5>
 <p> As the Principal of one of the better institutions in Eastern India, I feel greatly privileged in welcoming you all to the college website. Gossner College was established with the mission and vision to create a supportive and inclusive atmosphere for the students of the region where their potential could be explored and ethically groomed for a better future. As we enter into the new academic year filled with hope and dreams of scaling new heights, I wish to reiterate that the well qualified, experienced, committed and efficient teaching faculty will prepare you to excel in whatever you do, be it studies, sports or any field of your choice...</p>
<p> <br>  Professor Incharge/Principal <br>
  Prof. Elani Purty</p>
</div>
  </div>
</div>
</div>
<!--notice board-->
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

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62318caca34c2456412b4943/1fu8or12s';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


</footer>
<!--footer-->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
</html>
