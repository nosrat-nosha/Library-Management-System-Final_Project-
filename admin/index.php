<?php   
    include "../lib/session.php";
    // // Session::checkLogin();

    date_default_timezone_set('Asia/Dhaka');
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/database.php'; ?>
<?php include '../helpers/formats.php'; ?>
<?php include '../classes/logoClass.php'; ?>

<?php
    $bc= new LogoClasses();
    $af= new Format();
?>
<?php
    if (Session::get('Alogin') != true) {
        echo "<script>window.location.href = 'login.php';</script>";
    }

    if (isset($_GET['action'])) {
        if ($_GET['action']=='logout') {
          Session::set('Alogin','false');
          unset($_SESSION['adminEmail']);
          echo "<script>window.location.href = 'login.php';</script>";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

    <!-- Poppins Font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- ======= Icons used for dropdown (you can use your own) ======== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>


        <div class="maintop fullmaintop">
          <div class="topcontact">
            <div class="gbmail">
              <i class="fas fa-envelope"></i><span>admin@gonouniversity.edu.bd</span>
            </div>
            <div class="gbcontact">
              <i class="fas fa-phone"></i>
              <span>01677697759</span>
            </div>
          </div>
            <a href="" class="catalog">OPAC</a>
        </div>
  
  <!-- ==================== HEADER START ===================== -->
  <header id="mainheader" class="topheader fulltopheader">
      <div class="container">
        <nav class="navbar navbar-expand-lg adminnav">
          <div class="container-fluid">
            <div class="navbar-brand adminlogo">
              <img src="./assets/img//GBlogo.png" alt="/GBlogo">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse mainmenu" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="home.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="services.html">Services</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Resources
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="allbook.html">Book</a></li>
                    <li><a class="dropdown-item" href="allebook.html">Ebook</a></li>
                    <li><a class="dropdown-item" href="alljournal.html">Journal</a></li>
                    <li><a class="dropdown-item" href="allthesis.html">Thesis</a></li>
                    <li><a class="dropdown-item" href="allassignment.html">Assignment</a></li>
                    <li><a class="dropdown-item" href="allreport.html">Report</a></li>
                    <li><a class="dropdown-item" href="allvideos.html">Videos</a></li>
                    <li><a class="dropdown-item" href="allgallery.html">Gallery</a></li>
                    <li><a class="dropdown-item" href="allcddvd.html">CD/DVD</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Ask Librarian</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="staffall.html" tabindex="-1" aria-disabled="true">Staff</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="profile.html" tabindex="-1" aria-disabled="true">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
                    <input type="text" class="searchbox" placeholder="Search">
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="landing.html" tabindex="-1" aria-disabled="true">Log Out</a>
                </li>
              </ul>
            </div>
  
              <div class="icongroup">
                <div class="iconsall searchbar">
                  <input type="text" class="searchbox" placeholder="Search">
                  <div class="searchicon">
                    <i class="fas fa-search headersearch"></i>
                  </div>
                </div>
            
                <div class="iconsall dropdown">
                    <i class="fas fa-user" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                  <ul class="dropdown-menu profilelogout" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="?action=logout">Log Out</a></li>
                  </ul>
                </div>



  
                <div class="messages">
  
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <!-- Single button -->
                      <div class="btn-group pull-right top-head-dropdown">
                          <i class="fas fa-bell" id="dropdownMenutyy" data-bs-toggle="dropdown" aria-expanded="false"><span class="notifycount">3+</span></i>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenutyy">
                          <li>
                            <a href="#" class="top-text-block">
                              <div class="top-text-heading">You have <b>3 new themes</b> trending</div>
                              <div class="top-text-light">15 minutes ago</div>
                            </a> 
                          </li>
                          <li>
                            <a href="#" class="top-text-block">
                              <div class="top-text-heading">New asset recommendations in <b>Gaming Laptop</b></div>
                              <div class="top-text-light">2 hours ago</div>
                            </a> 
                          </li>
                          <li>
                            <a href="#" class="top-text-block">
                              <div class="top-text-heading">New asset recommendations in <b>5 themes</b></div>
                              <div class="top-text-light">4 hours ago</div>
                            </a> 
                          </li>
                          <li>
                            <a href="#" class="top-text-block">
                              <div class="top-text-heading">Assets specifications modified in themes</div>
                              <div class="top-text-light">4 hours ago</div>
                            </a> 
                          </li>
                          <li>
                            <a href="#" class="top-text-block">
                              <div class="top-text-heading">We crawled <b>www.dell.com</b> successfully</div>
                              <div class="top-text-light">5 hours ago</div>
                            </a> 
                          </li>
                          <li>
                            <a href="#" class="top-text-block">
                              <div class="top-text-heading">Next crawl scheduled on <b>10 Oct 2016</b></div>
                              <div class="top-text-light">6 hours ago</div>
                            </a> 
                          </li>
                          <li>
                            <a href="#" class="top-text-block">
                              <div class="top-text-heading">You have an update for <b>www.dell.com</b></div>
                              <div class="top-text-light">7 hours ago</div>
                            </a> 
                          </li>
                          <li>
                            <a href="#" class="top-text-block">
                              <div class="top-text-heading"><b>"Gaming Laptop"</b> is now trending</div>
                              <div class="top-text-light">7 hours ago</div>
                            </a> 
                          </li>
                          <li>
                            <a href="#" class="top-text-block">
                              <div class="top-text-heading">New asset recommendations in <b>Gaming Laptop</b></div>
                              <div class="top-text-light">7 hours ago</div>
                            </a> 
                          </li>
                         <li>
                          <div class="loader-topbar"></div>
                         </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </nav>
      </div>
    </header>
  
  <!-- ==================== HEADER END ===================== -->



<div id="maindash" class="heremainpart">
    <div class="homeafter">
        <!-- search icon  -->
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-12">
                    <div class="input-group search-dropdown">
                      <button class="btn dropdown-toggle selectsearchall" type="button" data-bs-toggle="dropdown" aria-expanded="false">All</button>
                        <ul class="dropdown-menu selectdrop">
                          <li><a class="dropdown-item" href="#">AUTHOR</a></li>
                          <li><a class="dropdown-item" href="#">BOOK</a></li>
                          <li><a class="dropdown-item" href="#">TITLE</a></li>
                          <li><a class="dropdown-item" href="#">ISBN</a></li>
                          <li><a class="dropdown-item" href="#">KEYWORD</a></li>
                        </ul>
                        <input type="text" class="form-control selectsearchhere" aria-label="Text input with dropdown button">
                        <button type="button" data-bs-toggle="dropdown" aria-expanded="false" class="btn selectsearchicon">
                            <i class="fas fa-search"></i>
                        </button>
                      </div>

                </div>
            </div>
        </section>


         <!-- carousul slider -->
        
        <div class="container">
          <div class="carousul-header">
            <div class="row justify-content-center">
              <div class="slider-h1">Browse By Categories</div>
            </div>
        </div>
             <section class="customer-logos slider">
                <div class="slide" onclick="location.href='allbook.html';"><img src="./assets/img//book.png"><p class="slidetext">Book</p></div>
                <div class="slide" onclick="location.href='allebook.html';"><img src="./assets/img//ebook.png"><p class="slidetext">Ebook</p></div>
                <div class="slide" onclick="location.href='alljournal.html';"><img src="./assets/img//journal.png"><p class="slidetext">Journal</p></div>
                <div class="slide" onclick="location.href='allthesis.html';"><img src="./assets/img//thesis.png"><p class="slidetext">Thesis</p></div>
                <div class="slide" onclick="location.href='allassignment.html';"><img src="./assets/img//assignment.png"><p class="slidetext">Assignment</p></div>
                <div class="slide" onclick="location.href='allreport.html';"><img src="./assets/img//report.png"><p class="slidetext">Report</p></div>
                <div class="slide" onclick="location.href='allvideos.html';"><img src="./assets/img//video.png"><p class="slidetext">Video</p></div>
                <div class="slide" onclick="location.href='allgallery.html';"><img src="./assets/img//gallery.png"><p class="slidetext">Gallery</p></div>
                <div class="slide" onclick="location.href='allcddvd.html';"><img src="./assets/img//cd.png"><p class="slidetext">CD/DVD</p></div>
             </section>
          </div>
        
            <!-- main section  -->
            <div class="mid">
                <!-- NEW ARRIVAL  -->
                <section class="container">
                  <div class="row justify-content-center">
                    <div class="col-md-7 col-sm-5 event-background">
                      <div class="event-text">NEW ARRIVAL</div>
                    </div>
                  </div>
                </section>
                <section class="container">
                    <div class="row align-items-center arrivalitem">
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <img src="../img//book-cover.jpg" class="arrivepic" alt="New Arrival Book">
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <img src="../img//book-cover.jpg" class="arrivepic" alt="New Arrival Book">
                       </div>
                       <div class="col-lg-2 col-md-4 col-sm-6">
							<img src="../img//book-cover.jpg" class="arrivepic" alt="New Arrival Book">
                       </div>
                       <div class="col-lg-2 col-md-4 col-sm-6">
							<img src="../img//book-cover.jpg" class="arrivepic" alt="New Arrival Book">
                       </div>
                       <div class="col-lg-2 col-md-4 col-sm-6">
							<img src="../img//book-cover.jpg" class="arrivepic" alt="New Arrival Book">
						</div>
					   <div class="col-lg-2 col-md-4 col-sm-6">
							<img src="../img//book-cover.jpg" class="arrivepic" alt="New Arrival Book">
					   </div>
					</div>
                </section>
                <!-- gono publication -->
                <section class="container firstcorner">
                    <div class="row publication-img">
                        <div class="col-lg-4 publiccorner">
                            <div class="public2corner">
                              <div class="cornertitle">Gono Publications</div>
                              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no</p>
                            </div>
                        </div>
                    </div>
                </section>
                 <!-- bongobondhu corner -->
                 <section class="container">
                    <div class="row d-flex justify-content-end publication-img">
                        <div class="col-lg-4 publiccorner">
                            <div class="public2corner">
                              <div class="cornertitle">Bangabandhu Corner</div>
                              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Library Collections -->
                <section class="container library-collection">
                    <div class="row justify-content-center ">
                        <div class="col-lg-4 col-sm-12">
                            <div class="collectionhere">Library Collections</div>
                        </div>
                    </div>
                    <div class="row mt-5 justify-content-center">
                        <section class="customer-logos slider">
                          <div class="slide">
                            <div class="collectioncount">200+</div>
                            <p>Book</p>
                          </div>
                          <div class="slide">
                            <div class="collectioncount">200+</div>
                            <p>Ebook</p>
                          </div>
                          <div class="slide">
                            <div class="collectioncount">200+</div>
                            <p>Journal</p>
                          </div>
                          <div class="slide">
                            <div class="collectioncount">200+</div>
                            <p>Thesis</p>
                          </div>
                          <div class="slide">
                            <div class="collectioncount">200+</div>
                            <p>Assignment</p>
                          </div>
                          <div class="slide">
                            <div class="collectioncount">200+</div>
                            <p>Report</p>
                          </div>
                          <div class="slide">
                            <div class="collectioncount">200+</div>
                            <p>Videos</p>
                          </div>
                          <div class="slide">
                            <div class="collectioncount">200+</div>
                            <p>Images</p>
                          </div>
                          <div class="slide">
                            <div class="collectioncount">200+</div>
                            <p>CD/DVD</p>
                          </div>
                       </section>
                    </div>
                </section>
            </div>
    </div>
</div>

    
    <!-- Footer Section -->

    <footer class="bottomfooter fullbottomfooter">
        <div class="container">
          <img src="../img/GBlogo.png" alt="GBlogo">
          <hr>
          <div class="row">
            <div class="col-lg-4 col-sm-6 leftlink">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="about.html">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="faq.html">FAQ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="policy.html">Privacy Policy</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-4 col-sm-6 sociallink">
              <div class="follow">Follow Us On :</div>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="col-lg-4 col-sm-12 footeraddress">
              <div class="connect">Connect With Gono Bishwabidyalay</div>
              <a href="https://www.gonouniversity.edu.bd/" class="gbhome">GB Home</a>
              <div class="areaaddress">
                Nolam, P.O. Mirzanagar Via Savar Cantonment, Ashulia, Savar, Dhaka-1344
              </div>
            </div>
          </div>
        </div>
      </footer>
        <div class="underfooter fullunderfooter">
          <div class="container">
              © GB Library All Right Reserved | Website by CSE 24. 
              <a href="#maindash" class="uparrow"><i class="fas fa-arrow-up"></i></a>
          </div>
        </div>
<!-- ==================== FOOTER END ===================== -->











<!-- JS file here -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



<script>
    $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<script src="./assets/js/main.js"></script>

     
</body>
</html>