

<?php
  include "./classes/userDetails.php";
  $bk = new UserLogin();

  if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['student'])) {
    
      $addUserResult = $bk->insertDataIntoDB($_POST,$_FILES,'Student');
    
    
  }
if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['teacher'])) {
    
      $addUserResult = $bk->insertDataIntoDB($_POST,$_FILES,'Teacher');
    
    
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


<style>
    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #ffffff;
        background-color: #3b478b;
        border-color: #dee2e6 #dee2e6 #fff;
    }
</style>
<div id="maindash" class="heremainpart">
    <section class="container nedpart">

        <!-- <div class="btn-group choosepart" role="group" aria-label="Basic outlined example">
        <a href="studentregistration.html"><button type="button" class="btn button-link">Student</button></a>
        <a href="teacherregistration.html"><button type="button" class="btn button-link active-button-link">Teacher</button></a>
        <a href="staffregistration.html"><button type="button" class="btn button-link">Staff</button></a>
      </div> -->
        <!-- login form  -->
        <section class="choosehere">

            <div class="btn-group choosepart">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-primary active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Student</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-primary" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Teacher</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-primary" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                            aria-selected="false">Staff</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?php
                    if (isset($addUserResult)) {
                    echo $addUserResult;
                    }
                ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="login-form">
                            <!-- name -->
                            <div class="row formpart">
                                <label for="name" class="col-md-2 col-sm-12 col-form-label">Name:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="username" class="col-md-2 col-sm-12 col-form-label">Username:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="username" name="username"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="department" class="col-md-2 col-sm-12 col-form-label">Department:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="department" name="department"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="batchno" class="col-md-2 col-sm-12 col-form-label">Batch No:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="number" class="form-control formclass" id="batchno" name="batchno"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="semester" class="col-md-2 col-sm-12 col-form-label">Semester:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="number" class="form-control formclass" id="semester" name="semester"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="examno" class="col-md-2 col-sm-12 col-form-label">Exam Roll:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="number" class="form-control formclass" id="examno" name="examno"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="registrationid" class="col-md-2 col-sm-12 col-form-label">Registration
                                    ID:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="registrationid"
                                        name="registrationid" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="idcard" class="col-md-2 col-sm-12 col-form-label">ID Card:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="file" accept="image/*" class="form-control formclass" id="idcard"
                                        name="idcard" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="validationdate" class="col-md-2 col-sm-12 col-form-label">Validation
                                    Date:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="date" class="form-control formclass" id="validationdate"
                                        name="validationdate" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="address" class="col-md-2 col-sm-12 col-form-label">Address:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="address" name="address"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="phonenumner" class="col-md-2 col-sm-12 col-form-label">Phone
                                    Number:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="number" class="form-control formclass" id="phonenumner" name="phone"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="profilepicture" class="col-md-2 col-sm-12 col-form-label">Profile
                                    Picture:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="file" accept="image/*" class="form-control formclass"
                                        id="profilepicture" name="image" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="email" class="col-md-2 col-sm-12 col-form-label">Email:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="email" class="form-control formclass" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="password" class="col-md-2 col-sm-12 col-form-label">Password:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="password" class="form-control formclass" id="password" name="password"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <button class="btn btnsave" type="submit" name="student">Register</button>
                            </div>
                            <div class="bottompart" onclick="location.href='login.html';">ALREADY HAVE AN ACCOUNT ?
                            </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="login-form">
                            <!-- name -->
                            <div class="row formpart">
                                <label for="name" class="col-md-2 col-sm-12 col-form-label">Name:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="username" class="col-md-2 col-sm-12 col-form-label">Username:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="username" name="username"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="department" class="col-md-2 col-sm-12 col-form-label">Department:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="department" name="department"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="designation" class="col-md-2 col-sm-12 col-form-label">Designation:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="designation"
                                        name="designation" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="idcard" class="col-md-2 col-sm-12 col-form-label">ID Card:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="file" accept="image/*" class="form-control formclass" id="idcard"
                                        name="idcard" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="validationdate" class="col-md-2 col-sm-12 col-form-label">Validation
                                    Date:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="date" class="form-control formclass" id="validationdate"
                                        name="validationdate" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="address" class="col-md-2 col-sm-12 col-form-label">Address:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="address" name="address"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="phonenumner" class="col-md-2 col-sm-12 col-form-label">Phone
                                    Number:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="tel" class="form-control formclass" id="phonenumner" name="phone"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="profilepicture" class="col-md-2 col-sm-12 col-form-label">Profile
                                    Picture:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="file" accept="image/*" class="form-control formclass"
                                        id="profilepicture" name="image" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="email" class="col-md-2 col-sm-12 col-form-label">Email:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="email" class="form-control formclass" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="password" class="col-md-2 col-sm-12 col-form-label">Password:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="password" class="form-control formclass" id="password" name="password"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <button class="btn btnsave" type="submit" name="teacher">Register</button>
                            </div>
                            <div class="bottompart" onclick="location.href='login.html';">ALREADY HAVE AN ACCOUNT ?
                            </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">..mmmm
                </div>
            </div>



        </section>
    </section>

</div>
<?php include "./inc/footer.php" ?>