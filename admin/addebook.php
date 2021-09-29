<?php include "./inc/header.php" ?>
<?php
  include "../classes/ebookClass.php";
  $bk = new EBookClasses();

  if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['addBook'])) {
    
      $addBookResult = $bk->insertEBookIntoDB($_POST,$_FILES);
    
    
  }
?>
<div class="dashboadheader" id="maindash">
    <div class="dashnav">
      <div class="dashplace">
        <label for="nav-toggle">
          <span class="fas fa-bars"></span>
        </label>
        Add Book
      </div>
    </div>
    <a class="nav-link" href="home.html"><i class="fas fa-home"></i> Home</a>
  </div>


      <main>
        <div class="input-group maingroup">
            <input type="text" class=" form-control searchmain">
            <span class="searchicon"><i class="fas fa-search"></i></span>
        </div>
        <div class="container-fluid dashboard">
          <?php
            if (isset($addBookResult)) {
              echo $addBookResult;
            }
          ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row formpart">
              <label for="type" class="col-md-2 col-sm-12 col-form-label">Type:</label>
              <div class="col-md-8 col-sm-12">
              <input type="text" class="form-control formclass" id="type" name="category" value="Ebook" required>
              <input type="hidden" class="form-control formclass" id="user" name="user" value="Admin">
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
                    
                </div>
              </div>
              <div class="row formpart">
                <label for="cover" class="col-md-2 col-sm-12 col-form-label">Cover:</label>
                <div class="col-md-8 col-sm-12">
                  <input type="file" accept="image/*" class="form-control formclass" id="cover" name="coverImgae" >
                </div>
              </div>
              <div class="row formpart">
                <label for="cover" class="col-md-2 col-sm-12 col-form-label">File:</label>
                <div class="col-md-8 col-sm-12">
                  <input type="file" accept="application/pdf" class="form-control formclass" id="cover" name="fdocument" >
                </div>
              </div>
              <div class="row formpart">
                <input class="btn btncancel" type="reset" value="Cancel">
                <button class="btn btnsave" type="submit" name="addBook">Save</button>
              </div>

          </form>
        </div>

      </main>
      <?php include "./inc/footer.php" ?>