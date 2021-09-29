<?php include "./inc/header.php" ?>
<?php
  include "./classes/bookClass.php";
  $bk = new BookClasses();
  $getBooks = $bk->getBooks();
?>
<div id="maindash" class="heremainpart">
  <section class="container-fluid extramainpart typeshere">
    <!-- title  -->
    <div class="row">
      <h1 class="typetitle">BOOK</h1>
    </div>
    <!-- book-list  -->
    <!-- book row-1  -->
    <div class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-2">
      <!-- col-1  -->
      <?php
        if (isset($getBooks) && $getBooks!=false) {
          while ($book = $getBooks->fetch_assoc()) {
      ?>
      <div class="col cardpl">
        <div class="card shadow">
          <img src="<?php echo str_replace("../",'',$book['image']); ?>" alt="Book Cover">
          <div class="card-body">
            <p class="card-text">
              <div class="booktitle"><a href="bookde.php?id=<?php echo $book['id']; ?>"><?php echo $book['title']; ?></a></div>
              <div class="booksubtitle">by <span class="booksubtitlegreen"><?php echo $book['author']; ?></span> </div>
              <p class="booketype"><span><i class="fas fa-book-open"></i></span> <?php echo $book['type']; ?></p>
              <div class="">
                <a href="bookde.php?id=<?php echo $book['id']; ?>" class="downloadhere">Borrow</a>
                
              </div>
            </p>
          </div>
        </div>
      </div>
      <?php
          }
        }else{
          echo "No Data";
        }
      ?>
    </div>
  </section>
</div>
<?php include "./inc/footer.php" ?>