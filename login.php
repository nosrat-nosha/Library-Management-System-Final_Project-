
<?php
  include "./classes/userDetails.php";
  $bk = new UserLogin();

  if (isset($_GET['type'])) {

    if ($_GET['type']!=null) {
      if ($_SERVER['REQUEST_METHOD']=="POST") {
        $type = $_GET['type'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $addUserResult = $bk->userlogin($email,$pass,$type);      
      }
        
    } else {
        echo "<script>window.location.href = '404.php';</script>";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In </title>
    
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
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Resources
                </a>
                <ul class="dropdown-menu beforesign" aria-labelledby="navbarDropdown">
                  <li>
                    The Library Has Collections Of 1000+ Materials Including Videos, Research Paper, Journal And Many More. New Item Also Been Adding Sequentially. To Access Full Power Of Gono Bishwabidyalay Online Library.</br>
                    Please <a href="login.html" class="log">Login</a> Or <a href="chooseregister.html" class="sign">Sign Up</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#askLibrarian" href="">Ask Librarian</a>
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
                <a href="chooseregister.html">Sign Up</a>
                /
                <a href="login.html">Log In</a>
              </div>

            </ul>
          </div>

          <div class="signlog">
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
        <?php
          if (isset($addUserResult)) {
            echo $addUserResult;
          }
        ?>
        <form action="" method="POST">
          <div class="login-form">
            <div class="row formpart">
              <label for="email" class="col-md-2 col-sm-12 col-form-label">Email:</label>
              <div class="col-md-8 col-sm-12">
                <input type="email" class="form-control formclass" id="email" name="email" required>
              </div>
            </div>
            <div class="row formpart">
              <label for="password" class="col-md-2 col-sm-12 col-form-label">Password:</label>
              <div class="col-md-8 col-sm-12">
                <input type="password" class="form-control formclass" id="password" name="password" required>
              </div>
            </div>
            <div class="row formpart">
              <div class="form-check formcheckhere">
                <!-- <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label text-md-end fs-4 ms-2 log_in-text" for="gridCheck">
                  Keep me signed in
                </label> -->
              </div>
            </div>
            <div class="row formpart">
              <input class="btn btnsave" onclick="location.href='home.html';" type="submit" value="Log in">
            </div>
          </div>
        </form>

      </section>
    </div>
</div>
</section>
</div>

<?php include "./inc/footer.php" ?>