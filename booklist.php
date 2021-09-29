<?php include "./inc/header.php" ?>
<?php
  include "./classes/bookClass.php";
  $bk = new BookClasses();
  $getBooks = $bk->getBooksTeacher();

  if ( isset($_GET['delete'])) {

    if ($_GET['delete']!=null) {
        echo $editBookResult = $bk->deleteTeachersBookIntoDB($_GET['delete']);
    } else {
        echo "<script>window.location.href = '404.php';</script>";
    }
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
        <a class="nav-link" href="#"><i class="fas fa-book"></i><span>My List</span><i
            class="fas fa-chevron-down ms-3 fa-xs"></i></a>
        <ul class="submenu collapse">
          <!-- <li><a class="nav-link" href="allitem.html">All Item</a></li> -->
          <li><a class="nav-link" href="booklist.php">All Books</a></li>
          <li><a class="nav-link" href="wishlist.html">Wishlist</a></li>
        </ul>
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
  <div class="table-responsive scroll">
            <table width="100%">
            <thead>
              <tr>
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">ISBN</th>
                <th scope="col">Book ID</th>
                <th scope="col">Publisher</th>
                <th scope="col">Number of Copy</th>
                <th scope="col">Edition</th>
                <th scope="col">Publish Year</th>
                <th scope="col">Actions</th>
  
              </tr>
            </thead>
            <tbody>
              <?php
                if (isset($getBooks) && $getBooks!=false) {
                  while ($book = $getBooks->fetch_assoc()) {
              ?>
              <tr>
                <td data-label="Cover"><img src="<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>"></td>
                <td data-label="Title"><a href="bookde.php?id=<?php echo $book['id']; ?>"><?php echo $book['title']; ?></a></td>
                <td data-label="Author"><?php echo $book['author']; ?></td>
                <td data-label="ISBN"><?php echo $book['isbn']; ?></td>
                <td data-label="Book ID"><?php echo $book['bookid']; ?></td>
                <td data-label="Publisher"><?php echo $book['publisher']; ?></td>
                <td data-label="Number of Copy"><?php echo $book['quantity']; ?></td>
                <td data-label="Edition"><?php echo $book['edition']; ?></td>
                <td data-label="Publish Year"><?php echo $book['releaseDate']; ?></td>
                <td data-label="Publish Year">
                    <a class="btn btnsave" href="editbook.php?id=<?php echo $book['id']; ?>"><i class="fas fa-edit" style="width:10rem"></i></a>
                    <a class="btn btncancel" href="?delete=<?php echo $book['id']; ?>"><i class="fas fa-trash-alt" style="width:10rem"></i></a>
                </td>
              </tr>
              <?php
                  }
                }else{
                  echo "No Data";
                }
              ?>
            </tbody>
  
          </table>
          </div>
  </div>
</main>

      <?php include "./inc/footer.php" ?>