<?php include "./inc/header.php" ?>
<?php
    include "../classes/assignmentClass.php";
    $bk = new AssignmentClasses();

  if ($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['id'])) {

    if ($_GET['id']!=null) {
        $editResult = $bk->editAssignmentIntoDB($_GET['id']);
    } else {
        echo "<script>window.location.href = '404.php';</script>";
    }
  }


  if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['editBook'])) {

    if ($_GET['id']!=null) {
        $updateBookResult = $bk->updateAssignmentIntoDB($_POST,$_FILES,$_GET['id']);
    } else {
        echo "<script>window.location.href = '404.php';</script>";
    }
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
            if (isset($updateResult)) {
              echo $updateResult;
            }
          ?>
          <?php
            if (isset($editResult)) {
                while ($book = $editResult->fetch_assoc()) {
            
          ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row formpart">
              <label for="type" class="col-md-2 col-sm-12 col-form-label">Type:</label>
              <div class="col-md-8 col-sm-12">
              <input type="text" class="form-control formclass" id="title" name="category" value="<?= isset($book['type']) ? $book['type'] : 'Assignment'; ?>" required>
              </div>
            </div>
            <div class="row formpart">
              <label for="title" class="col-md-2 col-sm-12 col-form-label">Title:</label>
              <div class="col-md-8 col-sm-12">
                <input type="text" class="form-control formclass" id="title" name="title" value="<?= isset($book['title']) ? $book['title'] : ''; ?>" required>
              </div>
            </div>
            <div class="row formpart">
              <label for="author" class="col-md-2 col-sm-12 col-form-label">Author:</label>
              <div class="col-md-8 col-sm-12">
                <input type="text" class="form-control formclass" id="author" name="author" value="<?= isset($book['author']) ? $book['author'] : ''; ?>" required>
              </div>
            </div>
            
              <div class="row formpart">
                <label for="description" class="col-md-2 col-sm-12 col-form-label">Description:</label>
                <div class="col-md-8 col-sm-12">
                    <textarea class="texthere formclass" id="description" name="description"  rows="5" required><?= isset($book['description']) ? $book['description'] : ''; ?></textarea>
                </div>
              </div>
              
              <div class="row formpart">
                <label for="cover" class="col-md-2 col-sm-12 col-form-label">Cover:</label>
                <div class="col-md-8 col-sm-12">
                  <input type="file" class="form-control formclass" id="cover" name="coverImgae" >
                </div>
              </div>
              <div class="row formpart">
                <label for="cover" class="col-md-2 col-sm-12 col-form-label">File:</label>
                <div class="col-md-8 col-sm-12">
                  <input type="file" accept="application/pdf" class="form-control formclass" id="fcover" name="fdocument" >
                </div>
              </div>
              <div class="row formpart">
                <input class="btn btncancel" type="reset" value="Cancel">
                <button class="btn btnsave" type="submit" name="editBook">Save</button>
              </div>

          </form>
          <?php
                    }
                }
          ?>
        </div>

      </main>
      <?php include "./inc/footer.php" ?>