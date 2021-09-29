<?php include "./inc/header.php" ?>
<?php
  include "./classes/bookClass.php";
  $bk = new BookClasses();

 echo $type =Session::get('Utype');
 echo $id =Session::get('Uid');
  $getBooks = $bk->getAllHistory($id,$type);

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
      <?php
        if (Session::get('Utype')=='Teacher') {
          
      ?>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-book"></i><span>Manage Book</span><i
            class="fas fa-chevron-down ms-3 fa-xs"></i></a>
        <ul class="submenu collapse">
          <li><a class="nav-link" href="addbook.php">Add Book</a></li>
        </ul>
      </li>
      <?php
          
        }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="returnstatus.php" aria-current="page"><i class="fas fa-book-open"></i><span>All Request</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="allhistory.php" aria-current="page"><i class="bi bi-journals"></i><span>All History</span></a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="issuelist.php" aria-current="page"><i class="bi bi-journals"></i><span>Issued Book</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="allmessage.php" aria-current="page"><i class="fas fa-envelope"></i><span>Message</span></a>
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
      Return Status
    </div>
  </div>
  <a class="nav-link" href="/"><i class="fas fa-home"></i> Home</a>
</div>

<main>
  <div class="container-fluid allitem" id="maindash">

    <div class="items">
      <div class="itmestitle">
        <img src="../img/returnstatus.png" alt="" srcset=""></br>
        Return Status
      </div>
    </div>
    <div class="table-responsive scroll">
      <table width="100%" class="table-bordered">
        <thead>
          <tr>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Type</th>
            <th scope="col">Issue Date</th>
            <th scope="col">Expire Date</th>
            <th scope="col">Condition</th>
            <th scope="col">Due</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
                if (isset($getBooks) && $getBooks!=false) {
                  while ($book = $getBooks->fetch_assoc()) {
              ?>
          <tr>

            <?php

                    $date = new DateTime($book['borrowDate']);

                    $date->modify('+'.$book['forDays'].' day');

                    $returndate = $date->format('Y-m-d');
                    $tDate = date('Y-m-d');

                    // echo gettype($returndate);
                    $today  = new DateTime($tDate);
                    $returndate2 = new DateTime($returndate);

                    $interval = $today->diff($returndate2);

                    
                    $booklist = $bk->getAllRequestedBooksDetails($book['bookId']);

                    while ($list = $booklist->fetch_assoc()) {

                  ?>
                      <td data-label="Cover"><img src="<?php echo $list['addedBy']!='Teacher'? str_replace('../','',$list['image']) :$list['image']; ?>" alt="<?php echo $list['title']; ?>">
                      </td>
                      <td data-label="Title"><?php echo $list['title']; ?></td>
                      <td data-label="Author"><?php echo $list['author']; ?></td>
                      <td data-label="Book ID"><?php echo $list['type']; ?></td>
                      <?php
                          }
                      ?>
                      <td><?php echo $book['borrowDate']; ?></td>
                      <td><?php echo $returndate; ?></td>
                      <td><?php echo $today>$returndate2?'<span class="badge bg-danger">Expired</span>':'<span class="badge bg-success">Clean</span>'  ?></td>
                      <td><?php echo $today>$returndate2?$interval->d*20:0  ?></td>
                      <td>
                        <?php 
                          if ($book['status']==1) {
                            
                        ?>
                        <span class="btn wishremove allitembtn">Borrowed</span>
                        <?php  
                          }elseif($book['status']==2){ 
                        ?>
                        <span class="btn allitembtn">Returnning</span>
                        <?php
                          }elseif($book['status']==3){ 
                        ?>
                        <span class="btn previewbtn">Returned</span>
                        <?php
                          }
                        ?>
                      </td>

                    </tr>
                    <?php
                                
                              }
                          }else{
                              echo "No Book Request Found";
                          }
                        ?>

        </tbody>
      </table>
    </div>

  </div>
</main>
<?php include "./inc/footer.php" ?>