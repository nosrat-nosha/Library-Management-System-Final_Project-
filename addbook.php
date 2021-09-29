<?php include "./inc/header.php" ?>
<?php
      if (Session::get('Ulogin')== false && Session::get('Utype') == '') {

        echo "<script>window.location.href = 'index.php';</script>";
      }
?>
<?php
  include "./classes/bookClass.php";
  $bk = new BookClasses();

  if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['addBook'])) {
    
      $addBookResult = $bk->insertBookIntoDB($_POST,$_FILES);
    
    
  }
?>

<div class="sidebar">
  <div class="sidebar-brand">
    <div class="profilehere" onclick="location.href='profile.php';">
      <img src="<?php echo Session::get('Uimage') ?>" alt="<?php echo Session::get('Uuser') ?>">

    </div>
    <div class="namepart">
      <div class="sidename"><?php echo Session::get('Uuser') ?></div>
      <div class="sideusername"><?php echo "@".Session::get('Uname') ?></div>
    </div>
  </div>
  <div class="sidebarmenu">
    <ul class="nav" id="nav_accordion">
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-book"></i><span>Resource List</span><i
            class="fas fa-chevron-down ms-3 fa-xs"></i></a>
        <ul class="submenu collapse">
          <li><a class="nav-link" href="allbook.php">Book</a></li>
          <li><a class="nav-link" href="allebook.php">Ebook</a></li>
          <li><a class="nav-link" href="alljournal.php">Journal</a></li>
          <li><a class="nav-link" href="allthesis.php">Thesis</a></li>
          <li><a class="nav-link" href="allassignment.php">Assignment</a></li>
          <li><a class="nav-link" href="allreport.php">Report</a></li>
          <li><a class="nav-link" href="allvideos.php">Videos</a></li>
          <li><a class="nav-link" href="allgallery.html">Gallery</a></li>
          <li><a class="nav-link" href="allcddvd.html">CD/DVD</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php" aria-current="page"><i class="fas fa-bars"></i><span>Profile</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-book"></i><span>Manage Book</span><i
            class="fas fa-chevron-down ms-3 fa-xs"></i></a>
        <ul class="submenu collapse">
          <li><a class="nav-link" href="addbook.php">Add Book</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-book-half"></i><span>Issue Status</span><i
            class="fas fa-chevron-down ms-3 fa-xs"></i></a>
        <ul class="submenu collapse">
          <li><a class="nav-link" href="issued.html">Issued</a></li>
          <li><a class="nav-link" href="borrowed.html">Borrowed</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="returnstatus.html" aria-current="page"><i class="fas fa-book-open"></i><span>Return
            Status</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="requestbook.html" aria-current="page"><i class="bi bi-journals"></i><span>Request
            Book</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="message.html" aria-current="page"><i
            class="fas fa-envelope"></i><span>Message</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="editprofile.html" aria-current="page"><i class="fas fa-bars"></i><span>Edit
            Profile</span></a>
      </li>
    </ul>

  </div>
</div>
<div class="dashboadheader">
  <div class="dashnav">
    <div class="dashplace">
      <label for="nav-toggle">
        <span class="fas fa-bars"></span>
      </label>
      Profile
    </div>
  </div>
  <a class="nav-link" href="home.html"><i class="fas fa-home"></i> Home</a>
</div>

<main>
  <div class="container-fluid allitem" id="maindash">

    
    <?php
            if (isset($addBookResult)) {
              echo $addBookResult;
            }
          ?>
          <form id="formD" action="" method="POST" enctype="multipart/form-data">
            <div class="row formpart">
              <label for="type" class="col-md-2 col-sm-12 col-form-label">Type:</label>
              <div class="col-md-8 col-sm-12">
              <input type="text" class="form-control formclass" id="type" name="category" value="Book" required>
              <input type="hidden" class="form-control formclass" id="user" name="user" value="Teacher">
              </div>
            </div>
            <div class="row formpart">
              <label for="title" class="col-md-2 col-sm-12 col-form-label">Title:</label>
              <div class="col-md-8 col-sm-12">
                <input type="text" class="form-control formclass" id="title" name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : ''; ?>" required>
              </div>
            </div>
            <div class="row formpart">
              <label for="author" class="col-md-2 col-sm-12 col-form-label">Author:</label>
              <div class="col-md-8 col-sm-12">
                <input type="text" class="form-control formclass" id="author" name="author" value="<?= isset($_POST['author']) ? $_POST['author'] : ''; ?>" required>
              </div>
            </div>
            <div class="row formpart">
              <label for="bookid" class="col-md-2 col-sm-12 col-form-label">Book ID:</label>
              <div class="col-md-8 col-sm-12">
                <input type="number" class="form-control formclass" id="bookid" name="bookid" value="<?= isset($_POST['bookid']) ? $_POST['bookid'] : ''; ?>" required>
              </div>
            </div>
            <div class="row formpart">
                <label for="numberofcopy" class="col-md-2 col-sm-12 col-form-label">Number of Copy:</label>
                <div class="col-md-8 col-sm-12">
                  <input type="number" class="form-control formclass" id="numberofcopy" name="numberofcopy" value="<?= isset($_POST['numberofcopy']) ? $_POST['numberofcopy'] : ''; ?>" required>
                </div>
              </div>
              <div class="row formpart">
                <label for="Edition" class="col-md-2 col-sm-12 col-form-label">Edition:</label>
                <div class="col-md-8 col-sm-12">
                  <input type="text" class="form-control formclass" id="Edition" name="Edition" value="<?= isset($_POST['Edition']) ? $_POST['Edition'] : ''; ?>" >
                </div>
              </div>
              <div class="row formpart">
                <label for="description" class="col-md-2 col-sm-12 col-form-label">Description:</label>
                <div class="col-md-8 col-sm-12">
                    <textarea class="texthere formclass" id="description" name="description"  rows="5" required><?= isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
                </div>
              </div>
              <div class="row formpart">
                <label for="detail" class="col-md-2 col-sm-12 col-form-label">Detail:</label>
                <div class="col-md-8 col-sm-12">
                    <input type="text" class="form-control formclass" id="Edition" placeholder="Publisher:" name="publisher" value="<?= isset($_POST['publisher']) ? $_POST['publisher'] : ''; ?>" required>
                    <input type="number" class="form-control formclass" id="Edition" placeholder="ISBN:" name="isbn" value="<?= isset($_POST['isbn']) ? $_POST['isbn'] : ''; ?>" required>
					          <input type="text" class="form-control formclass" id="Edition" placeholder="Release Date:" name="releaseDate" value="<?= isset($_POST['releaseDate']) ? $_POST['releaseDate'] : ''; ?>" onfocus="(this.type='date')" required>
                    <!-- <textarea name="description" class="texthere formclass" id="description" rows="5" required></textarea> -->
                </div>
              </div>
              <div class="row formpart">
                <label for="cover" class="col-md-2 col-sm-12 col-form-label">Cover:</label>
                <div class="col-md-8 col-sm-12">
                  <input type="file" accept="image/*" class="form-control formclass" id="cover" name="coverImgae" required>
                </div>
              </div>
              <div class="row formpart">
                <input class="btn btncancel" type="reset" value="Cancel" style="width:10rem">
                <button class="btn btnsave" type="submit" name="addBook">Save</button>
              </div>

          </form>

  </div>
</main>



<?php include "./inc/footer.php" ?>