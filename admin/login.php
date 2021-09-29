<?php include '../classes/adminDetails.php' ?>

<?php
  $al = new AdminLogin();
  if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['login'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    
      $isLogedIn = $al->adminlogin($email,$pass);
    
    
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In </title>

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
      <div class="container">
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
                  <a class="nav-link active" aria-current="page" href="landing.html">Home</a>
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
                    <li>
                      The Library Has Collections Of 1000+ Materials Including Videos, Research Paper, Journal And Many
                      More. New Item Also Been Adding Sequentially. To Access Full Power Of Gono Bishwabidyalay Online
                      Library.</br>
                      Please <a href="login.html" class="log">Login</a> Or <a href="chooseregister.html"
                        class="sign">Sign Up</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Ask Librarian</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="staffall.html" tabindex="-1" aria-disabled="true">Staff</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
                    <input type="text" class="searchbox" placeholder="Search">
                  </a>
                </li>
                <li class="nav-item signlogup">
                  <a href="chooseregister.html">Sign Up</a>
                  /
                  <a href="login.html">Log In</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Log Out</a>
                </li>


              </ul>
            </div>

            <div class="signlog">
              <a href="chooseregister.html">Sign Up</a>
              /
              <a href="login.html">Log In</a>
            </div>

          </div>
        </nav>
      </div>
    </header>

    <!-- ==================== HEADER END ===================== -->


    <div id="maindash" class="heremainpart">
      <section class="container extramainpart">
        <div class="nedpart">

          <div class="logintext">Log in</div>
          
          <section class="choosehere">
          <span style="color: red;text-align: center;width: 100%;display: block;">
            <?php
            //error handler
            if (isset($isLogedIn)) {
              // showing the error for empty field
              echo $isLogedIn;
            }
          ?>
          </span>
            <form action="" method="POST">
              <div class="login-form">
                <div class="row formpart">
                  <label for="email" class="col-md-2 col-sm-12 col-form-label">Email:</label>
                  <div class="col-md-8 col-sm-12">
                    <input type="email" class="form-control formclass" name="email" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="row formpart">
                  <label for="password" class="col-md-2 col-sm-12 col-form-label">Password:</label>
                  <div class="col-md-8 col-sm-12">
                    <input type="password" class="form-control formclass" id="password" name="password" placeholder="password">
                  </div>
                </div>
                <!-- <div class="row formpart">
                <div class="form-check formcheckhere">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label text-md-end fs-4 ms-2 log_in-text" for="gridCheck">
                    Keep me signed in
                  </label>
                </div>
              </div> -->
                <div class="row formpart">
                  <button type="submit" class='btn btnsave' name="login">Log in</button>
                </div>
              </div>
            </form>
          </section>
        </div>
    </div>
    </section>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="./assets/js/main.js"></script>

</body>

</html>