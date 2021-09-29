<?php include "./inc/header.php" ?>
<?php
    include "../classes/ebookClass.php";
    $bk = new EBookClasses();
  $getBooks = $bk->getBooks();

  if ($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['delete'])) {

    if ($_GET['delete']!=null) {
        $editBookResult = $bk->deleteReportIntoDB($_GET['delete']);
    } else {
        echo "<script>window.location.href = '404.php';</script>";
    }
  }
?>
<div class="dashboadheader" id="maindash">
    <div class="dashnav">
      <label for="nav-toggle">
        <span class="fas fa-bars"></span>
      </label>
      Book List
    </div>
    <a class="nav-link" href="home.html"><i class="fas fa-home"></i> Home</a>
  </div>


      <main>
        <div class="input-group maingroup">
            <input type="text" class=" form-control searchmain">
            <span class="searchicon"><i class="fas fa-search"></i></span>
          </div>

          <div class="table-responsive scroll">
            <table width="100%">
            <thead>
              <tr>
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">ISBN</th>
                <th scope="col">Publisher</th>
                <th scope="col">Edition</th>
                <th scope="col">Publish Year</th>
                <th scope="col">Actions</th>
  
              </tr>
            </thead>
            <tbody>
              <?php
                if ($getBooks) {
                  while ($book = $getBooks->fetch_assoc()) {
              ?>
              <tr>
                <td data-label="Cover"><img src="<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>"></td>
                <td data-label="Title"><a href="ebookde.php?id=<?php echo $book['id']; ?>"><?php echo $book['title']; ?></a></td>
                <td data-label="Author"><?php echo $book['author']; ?></td>
                <td data-label="ISBN"><?php echo $book['isbn']; ?></td>
                <td data-label="Publisher"><?php echo $book['publisher']; ?></td>
                <td data-label="Edition"><?php echo $book['edition']; ?></td>
                <td data-label="Publish Year"><?php echo $book['releaseDate']; ?></td>
                <td data-label="Publish Year">
                    <a class="btn btnsave" href="editebook.php?id=<?php echo $book['id']; ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btncancel" href="?delete=<?php echo $book['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php
                  }
                }
              ?>
            </tbody>
  
          </table>
          </div> 

      </main>
      <?php include "./inc/footer.php" ?>