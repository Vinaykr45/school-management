<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Program</title>
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
          <li class="nav-item active">
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
  <section>
    
    <div class="container" id="syllabus">
      <div class="row row-col-2">
      <div class="col-md-8">
      <h2 class="bg-primary text-center text-white sy-head " style="padding: 5px;">BCA (Bachelor of Computer Application)</h2>
      <div class="mu-latest" style="background-color:#f8f8f8;">
         <h2 class="mu-head"><strong>BCA Program Information</strong></h2>
         <table class="table">
           <tbody>
             <tr>
               <th style="color:#000; font-size:13px;">BCA Eligibility:</th>
               <td style="color:#000; font-size:13px;">10+2 from any recognized Board</td>
             </tr>
             <tr>
              <th style="color:#000; font-size:13px;">BCA Duration:</th>
              <td style="color:#000; font-size:13px;">3 Years</td>
            </tr>
            <tr>
              <th style="color:#000; font-size:13px;">BCA Intake:</th>
              <td style="color:#000; font-size:13px;">100</td>
            </tr>
           </tbody>
         </table>
         <h2 class="mu-head" style="margin-top: 50px;"><strong>BCA Program Objective</strong></h2>
         <p style="text-align: justify;">Our BCA programme at Gosser College, Ranchi provides graduates with the skills and knowledge to take on appropriate professional positions upon graduation.
           It also assists the graduates to attain leadership positions and successfully pursue post graduate studies and research in the field. Different core areas of Computer Applications that are covered by our 
           curriculum include programming, networking, web designing, information management and human computer interaction. The programme is designed in such a way that a graduate develops a practical understanding 
           of the technologies and acquires expertise for a successful career.</p>

      </div>
        <div class="accordion" id="accordionExample">
          <h2 style="font-size: 25px; margin-top: 20px;margin-bottom: 15px;">BCA Syllabus</h2>
            <div class="card card-1">
              <div class="card-header card-hd" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" >
                    BCA SEMESTER 1
                  </button>
                </h2>
              </div>
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body card-bd ">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Subject</th>
                        <th>L</th>
                        <th>T</th>
                        <th>P</th>
                        <th scope="col" style="text-align: center;">Credit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td width="105">3C.101</td>
                        <td width="291">Computer Fundamentals</td>
                        <td>3</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">3</td>
                        </tr>
                        <tr>
                        <td width="105">3C.102</td>
                        <td width="291">Fundamentals of Computer Programming</td>
                        <td>3</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">3</td>
                        </tr>
                        <tr>
                        <td width="105">3C.131</td>
                        <td width="291">Principles of Management</td>
                        <td>4</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">4</td>
                        </tr>
                        <tr>
                        <td width="105">3C.104</td>
                        <td width="291">Software Constructs and Tools</td>
                        <td>4</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">4</td>
                        </tr>
                        <tr>
                        <td width="105">3C.103</td>
                        <td width="291">Mathematical Foundation for Computer Science</td>
                        <td>4</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">4</td>
                        </tr>
                        <tr>
                        <td width="105">40B.104</td>
                        <td width="291">Communication Skills</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">2</td>
                        </tr>
                        <tr>
                        <td width="105">3CP.101</td>
                        <td width="291">MS-Office Lab</td>
                        <td>0</td>
                        <td>0</td>
                        <td>2</td>
                        <td style="text-align: center;">1</td>
                        </tr>
                        <tr>
                        <td width="105">3CP.102</td>
                        <td width="291">C Programming Lab</td>
                        <td>0</td>
                        <td>0</td>
                        <td>2</td>
                        <td style="text-align: center;">1</td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td>20</td>
                        <td>0</td>
                        <td>4</td>
                        <td style="text-align: center;">22</td>
                        </tr>
                        </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="card card-1">
              <div class="card-header card-hd" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" >
                    BCA SEMESTER 2
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body card-bd">
                <table class="table">
                  <thead class="table-head">
                    <tr>
                      <th scope="col">Code</th>
                        <th scope="col">Subject</th>
                        <th>L</th>
                        <th>T</th>
                        <th>P</th>
                        <th scope="col" style="text-align: center;">Credit</th>
                    </tr>
                    <tbody>
                      <tr>
                        <td width="105">3C.153</td>
                        <td width="291">Data Structure &amp; Algorithms</td>
                        <td>3</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">3</td>
                        </tr>
                        <tr>
                        <td width="105">3C.154</td>
                        <td width="291">Operating Systems</td>
                        <td>4</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">4</td>
                        </tr>
                        <tr>
                        <td width="105">3C.152</td>
                        <td width="291">Computer Architecture</td>
                        <td>4</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">4</td>
                        </tr>
                        <tr>
                        <td width="105">3C.182</td>
                        <td width="291">Discrete Mathematics</td>
                        <td>4</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">4</td>
                        </tr>
                        <tr>
                        <td width="105">40B.153</td>
                        <td width="291">Professional Skills</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td style="text-align: center;">2</td>
                        </tr>
                        <tr>
                        <td width="105">3CP.153</td>
                        <td width="291">Data Structure Lab</td>
                        <td>0</td>
                        <td>0</td>
                        <td>2</td>
                        <td style="text-align: center;">1</td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td>17</td>
                        <td>0</td>
                        <td>2</td>
                        <td style="text-align: center;">18</td>
                        </tr>
                    </tbody>
                  </thead>
                </table> 
                </div>
              </div>
            </div>
            <div class="card card-1">
              <div class="card-header card-hd" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" >
                    BCA SEMESTER 3
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body card-bd">
                 <table class="table">
                   <thead>
                    <tr>
                      <th scope="col">Code</th>
                        <th scope="col">Subject</th>
                        <th>L</th>
                        <th>T</th>
                        <th>P</th>
                        <th scope="col" style="text-align: center;">Credit</th>
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                      <td width="105">3C.201</td>
                      <td width="291">Object Oriented Programming with C++</td>
                      <td>3</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">3</td>
                      </tr>
                      <tr>
                      <td width="105">3C.202</td>
                      <td width="291">Database Management Systems</td>
                      <td>3</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">3</td>
                      </tr>
                      <tr>
                      <td width="105">3C.203</td>
                      <td width="291">Software Engineering Techniques</td>
                      <td>4</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">4</td>
                      </tr>
                      <tr>
                      <td width="105">3C.221</td>
                      <td width="291">E-Commerce</td>
                      <td>4</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">4</td>
                      </tr>
                      <tr>
                      <td width="105">14B.201</td>
                      <td width="291">Disaster Management</td>
                      <td>3</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">0</td>
                      </tr>
                      <tr>
                      <td width="105">40B.203</td>
                      <td width="291">Leader and Management Skills</td>
                      <td>2</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">2</td>
                      </tr>
                      <tr>
                      <td width="105">3CP.202</td>
                      <td width="291">Database Management Systems Lab</td>
                      <td>0</td>
                      <td>0</td>
                      <td>2</td>
                      <td style="text-align: center;">1</td>
                      </tr>
                      <tr>
                      <td width="105">3CP.201</td>
                      <td width="291">Object Oriented Programming with C++ Lab</td>
                      <td>0</td>
                      <td>0</td>
                      <td>2</td>
                      <td style="text-align: center;">1</td>
                      </tr>
                      <tr>
                      <td></td>
                      <td><strong>Total</strong></td>
                      <td>19</td>
                      <td>0</td>
                      <td>4</td>
                      <td style="text-align: center;">18</td>
                      </tr>
                   </tbody>
                 </table>
                </div>
              </div>
            </div>
            <div class="card card-1">
              <div class="card-header card-hd" id="headingFour">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" >
                    BCA SEMESTER 4
                  </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body card-bd">
                 <table class="table">
                   <thead>
                    <tr>
                      <th scope="col">Code</th>
                        <th scope="col">Subject</th>
                        <th>L</th>
                        <th>T</th>
                        <th>P</th>
                        <th scope="col" style="text-align: center;">Credit</th>
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                      <td width="105"><strong>COURSE CODE</strong></td>
                      <td width="291"><strong>COURSE TITLE</strong></td>
                      <td width="21"><strong>L</strong></td>
                      <td width="14"><strong>T</strong></td>
                      <td width="16"><strong>P</strong></td>
                      <td style="text-align: center;" width="41"><strong>Credit</strong></td>
                      </tr>
                      <tr>
                      <td width="105">3C.273</td>
                      <td width="291">Computer Graphics</td>
                      <td>3</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">3</td>
                      </tr>
                      <tr>
                      <td width="105">3C.271</td>
                      <td width="291">Data Communication</td>
                      <td>4</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">4</td>
                      </tr>
                      <tr>
                      <td width="105">3C.251</td>
                      <td width="291">Unix and Shell Programming</td>
                      <td>3</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">3</td>
                      </tr>
                      <tr>
                      <td width="105">3C.272</td>
                      <td width="291">Numerical Analysis  and Statistical Methods</td>
                      <td>4</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">4</td>
                      </tr>
                      <tr>
                      <td width="105">3C.274</td>
                      <td width="291">Python Programming</td>
                      <td>3</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">3</td>
                      </tr>
                      <tr>
                      <td width="105">40B.252</td>
                      <td width="291">Universal Human Values</td>
                      <td>2</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">2</td>
                      </tr>
                      <tr>
                      <td width="105">3CP.273</td>
                      <td width="291">Computer Graphics Lab</td>
                      <td>0</td>
                      <td>0</td>
                      <td>2</td>
                      <td style="text-align: center;">1</td>
                      </tr>
                      <tr>
                      <td width="105">3C.274P</td>
                      <td width="291">Python Programming Lab</td>
                      <td>0</td>
                      <td>0</td>
                      <td>2</td>
                      <td style="text-align: center;">1</td>
                      </tr>
                      <tr>
                      <td width="105">3CP.251</td>
                      <td width="291">Unix and Shell Programming Lab</td>
                      <td>0</td>
                      <td>0</td>
                      <td>2</td>
                      <td style="text-align: center;">1</td>
                      </tr>
                      <tr>
                      <td></td>
                      <td><strong>Total</strong></td>
                      <td>19</td>
                      <td>0</td>
                      <td>6</td>
                      <td style="text-align: center;">22</td>
                      </tr>
                   </tbody>
                 </table>
                </div>
              </div>
            </div>
            <div class="card card-1">
              <div class="card-header card-hd" id="headingfive">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefive" >
                    BCA SEMESTER 5
                  </button>
                </h2>
              </div>
              <div id="collapsefive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body card-bd">
                 <table class="table">
                   <thead>
                    <tr>
                      <th scope="col">Code</th>
                        <th scope="col">Subject</th>
                        <th>L</th>
                        <th>T</th>
                        <th>P</th>
                        <th scope="col" style="text-align: center;">Credit</th>
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                      <td width="105">3C.301</td>
                      <td width="291">Programming in Java</td>
                      <td>3</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">3</td>
                      </tr>
                      <tr>
                      <td width="105">3C.322</td>
                      <td width="291">Internet and Website Management</td>
                      <td>4</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">4</td>
                      </tr>
                      <tr>
                      <td>6.304</td>
                      <td width="291">Digital Signal Processing</td>
                      <td>4</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">4</td>
                      </tr>
                      <tr>
                      <td width="105">3C.323</td>
                      <td width="291">Cloud Computing</td>
                      <td>4</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">4</td>
                      </tr>
                      <tr>
                      <td width="105">3C.324</td>
                      <td width="291">Soft Computing</td>
                      <td>4</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">4</td>
                      </tr>
                      <tr>
                      <td width="105">40B.401</td>
                      <td width="291">Seminar in Executive Communication</td>
                      <td>2</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">0</td>
                      </tr>
                      <tr>
                      <td width="105">3CP.301</td>
                      <td width="291">Programming in Java Lab</td>
                      <td>0</td>
                      <td>0</td>
                      <td>2</td>
                      <td style="text-align: center;">1</td>
                      </tr>
                      <tr>
                      <td></td>
                      <td><strong>Total</strong></td>
                      <td>21</td>
                      <td>0</td>
                      <td>2</td>
                      <td style="text-align: center;">20</td>
                      </tr>
                   </tbody>
                 </table>
                </div>
              </div>
            </div>
            <div class="card card-1">
              <div class="card-header card-hd" id="headingsix">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsesix" >
                    BCA SEMESTER 6
                  </button>
                </h2>
              </div>
              <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordionExample">
                <div class="card-body card-bd">
                 <table class="table">
                   <thead>
                    <tr>
                      <th scope="col">Code</th>
                        <th scope="col">Subject</th>
                        <th>L</th>
                        <th>T</th>
                        <th>P</th>
                        <th scope="col" style="text-align: center;">Credit</th>
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                      <td width="105">3C.351</td>
                      <td width="291">Technique of Artificial Intelligence</td>
                      <td>3</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">3</td>
                      </tr>
                      <tr>
                      <td>9.152</td>
                      <td width="291">Environmental Studies</td>
                      <td>4</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">4</td>
                      </tr>
                      <tr>
                      <td width="105">40B.451</td>
                      <td width="291">Human Values &amp; Ethics</td>
                      <td>2</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">0</td>
                      </tr>
                      <tr>
                      <td>6.304</td>
                      <td width="291">Digital Signal Processing</td>
                      <td>4</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">4</td>
                      </tr>
                      <tr>
                      <td width="105">3C.395</td>
                      <td width="291">Project</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td style="text-align: center;">8</td>
                      </tr>
                      <tr>
                      <td width="105">3CP.351</td>
                      <td width="291">AI using Python Lab</td>
                      <td>0</td>
                      <td>0</td>
                      <td>1</td>
                      <td style="text-align: center;">1</td>
                      </tr>
                      <tr>
                      <td></td>
                      <td><strong>Total</strong></td>
                      <td>13</td>
                      <td>0</td>
                      <td>1</td>
                      <td style="text-align: center;">20</td>
                      </tr>
                   </tbody>
                 </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="dep" style="border: 1px solid rgb(236, 231, 231); border-radius: 5px";>
          <h4 class="bg-primary text-white text-center" style="margin-top: 20px;padding: 5px;margin-bottom: 15px;">Our Department</h4>
          <p><a href="bca.html">Department of BCA</a></p>
          <hr>
          <p><a href="bba.html">Department of BBA</a></p>
          </div>
          <br>

        </div>
      </div>   
    </div>
  </section>

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