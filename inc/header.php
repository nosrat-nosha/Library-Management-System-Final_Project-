<?php   
    include "lib/session.php";
    Session::init();

    date_default_timezone_set('Asia/Dhaka');

    if (isset($_GET['logout'])) {
      if ($_GET['logout']=='logout') {
      Session::set('Ulogin','false');
      Session::set('Utype',null);
      session_unset();
      echo "<script>window.location.href = 'index.php';</script>";
      }
  }
?>

<?php include './config/config.php'; ?>
<?php include './lib/database.php'; ?>
<?php include './helpers/formats.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>

  <!-- Poppins Font -->
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

  <!-- ======= Icons used for dropdown (you can use your own) ======== -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <!-- Main CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

  <div class="main-section">

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
      <div class="container landheader">
        <nav class="navbar navbar-expand-lg adminnav">
          <div class="container-fluid">
            <div class="navbar-brand adminlogo">
              <img src="./assets/img/GBlogo.png" alt="/GBlogo">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse mainmenu" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="services.html">Services</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Resources
                  </a>
                  <ul class="dropdown-menu beforesign" aria-labelledby="navbarDropdown">
                  <?php
                      if (Session::get('Ulogin') ==false && Session::get('Utype') == '') {
                  ?>
                    <li>
                      The Library Has Collections Of 1000+ Materials Including Videos, Research Paper, Journal And Many
                      More. New Item Also Been Adding Sequentially. To Access Full Power Of Gono Bishwabidyalay Online
                      Library.</br>
                      Please <a href="register.php"
                        class="sign">Sign Up</a>
                    </li>
                    <?php
                        }else{
                    ?>

                    <li><a class="dropdown-item" href="allbook.php">Book</a></li>
                    <li><a class="dropdown-item" href="allebook.php">Ebook</a></li>
                    <li><a class="dropdown-item" href="alljournal.php">Journal</a></li>
                    <li><a class="dropdown-item" href="allthesis.php">Thesis</a></li>
                    <li><a class="dropdown-item" href="allassignment.php">Assignment</a></li>
                    <li><a class="dropdown-item" href="allreport.php">Report</a></li>
                    <li><a class="dropdown-item" href="allvideos.php">Videos</a></li>
                    <li><a class="dropdown-item" href="allgallery.html">Gallery</a></li>
                    <li><a class="dropdown-item" href="allcddvd.html">CD/DVD</a></li>
                    <?php
                        }
                    ?>
                  </ul>
                </li>
                <li class="nav-item">
                  <?php
                      if (Session::get('Ulogin') ==false && Session::get('Utype') == '') {
                  ?>
                  <a class="nav-link"  href="register.php">Ask Librarian</a>
                  <?php
                        }else{
                    ?>
                  <a class="nav-link"  href="allmessage.php">Ask Librarian</a>
                  <?php
                        }
                    ?>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="staffall.html" tabindex="-1" aria-disabled="true">Staff</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
                    <input type="text" class="searchbox" placeholder="Search">
                  </a>
                </li>
                <div class="signlogup">
                  <a href="register.php">Sign Up</a>
                  /
                  <ul>
                  <li class="nav-item">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false" style="padding:0">Login</a>
                  <ul class="dropdown-menu" style="left: 88%; margin:0;">
                    <li><a class="dropdown-item" href="login.php?type=Student">As Student</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="login.php?type=Teacher">As Teacher</a></li>
                  </ul>
                </li>
                </ul>
                </div>

              </ul>
            </div>
            <?php
                if (Session::get('Ulogin') ==false && Session::get('Utype') == '') {
            ?>
            <div class="signlog">
              <ul class="nav justify-content-end">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">Login</a>
                  <ul class="dropdown-menu" style="left: 88%; margin:0;">
                    <li><a class="dropdown-item" href="login.php?type=Student">As Student</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="login.php?type=Teacher">As Teacher</a></li>
                  </ul>
                </li>
                <li class="nav-item">

                </li>
              </ul>
              <!-- <a href="chooseregister.html">Sign Up</a>
              /
              <a href="login.html">Log In</a> -->

            </div>
            <?php
                }else{
            ?>

            <div class="iconsall dropdown">
              <i class="fas fa-user" style="color:white;margin-right:20px" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
            <ul class="dropdown-menu profilelogout" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="?logout=logout">Log Out</a></li>
              <li></li>
            </ul>
          </div>
  
          <div class="iconsall messages">
            <div class="panel panel-default">
              <div class="panel-body">
                <!-- Single button -->
                <div class="btn-group pull-right top-head-dropdown">
                    <i class="fas fa-bell" style="color:white" id="dropdownMenutyy" data-bs-toggle="dropdown" aria-expanded="false"><span class="notifycount">3+</span></i>
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
                    <div class="loader-topbar"></div>
                   </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <?php
                }
          ?>
          </div>
        </nav>
      </div>
    </header>

    <!-- ==================== HEADER END ===================== -->