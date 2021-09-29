<?php include "./inc/header.php" ?>
<?php
  include "./classes/bookClass.php";
  include "./classes/borrowClass.php";
  $bk = new BookClasses();
  $bb = new BorrowClass();


  if (isset($_GET['id'])) {
    $getBooks = $bk->editBookIntoDB($_GET['id']);
  }
  


  if (isset($_GET['book']) && isset($_GET['user']) && isset($_GET['bname'])) {
      echo $bookId =$_GET['book'];
      echo $userId =$_GET['user'];
      echo $bookName =$_GET['bname'];
      echo $type =Session::get('Utype');


      $borrowBook = $bb->borrowBook($bookId,$userId,$bookName,$type);
  }
?>

 

<div class="dashboadheader">
  <div class="dashnav">
    <div class="dashplace">
      <label for="nav-toggle">
        <span class="fas fa-bars"></span>
      </label>
      Profile
    </div>
  </div>
  <a class="nav-link" href="/"><i class="fas fa-home"></i> Home</a>
</div>

<main>
  <div class="container-fluid allitem" id="maindash">
  <div class="table-responsive scroll">
  <?php        
          if (isset($borrowBook)) {
            if ($borrowBook==false) {
              echo "<script>alert('Book Already Borroed or Requested')</script>";
              echo "<script>javascript:history.go(-1)</script>";

            }elseif ($borrowBook==true) {
              echo "<script>alert('Book Borrow request Sent Successfully')</script>";
              echo "<script>javascript:history.go(-1)</script>";
            }else {
              echo $borrowBook;
            }
          }

          if (isset($getBooks)) {
            while ($book = $getBooks->fetch_assoc()) {
        ?>
        <div class="row">
          <div class="mediaheader col-md-4 col-sm-12">
            <img class="mediaimg" src="<?php echo str_replace("../",'',$book['image']); ?>" alt="">
          </div>
          <div class="Ebook-1_content col-md-7 col-sm-12 leftpadd">
            <div class="herebooktitle"><?php echo $book['title'] ?></div>
            <div class="herebooksubtitle">
              by <span class="byauthor"><?php echo $book['author'] ?></span></div>
            <div class="hereparts">
              <p class="oritype"><span><i class="fas fa-book-open"></i></span> <?php echo $book['type'] ?></p>
              <?php
                if (Session::get('Ulogin')==true) {
                  
              ?>
              <a href="?book=<?php echo $book['id'] ?>&&user=<?php echo Session::get('Uid') ?>&&bname=<?php echo $book['title'] ?>" class="btn previewbtn" tabindex="-1" role="button" aria-disabled="true">Borrow This Book</a>
              <?php
                }else{
              ?>
              <a href='' class="btn previewbtn" disabled>Login To Borrow This Book</a>
              <?php
                }
              ?>
            </div>

            <!-- E-bbok describ  -->
            <div class="E-book_1-describ">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Detail</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent" style="margin-top:20px">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <hr class="describe-hr">
                <?php echo $book['description'] ?>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <span class="">Edition :</span> <span class="publishaer ms-2"><?php echo $book['edition'] ?></span><br>
                    <span class="">Publisher :</span> <span class="publishaer ms-2"><?php echo $book['publisher'] ?></span>
                    <hr class="detail-hr">
                    <p><span>ISBN :</span> <span><?php echo $book['isbn'] ?></span></p>
                    <p><span>Release Date :</span> <span class=""><?php echo $book['releaseDate'] ?></span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
                }
            }
        ?>
          </div>
  </div>
</main>

      <?php include "./inc/footer.php" ?>