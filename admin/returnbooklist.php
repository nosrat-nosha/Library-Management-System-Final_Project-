<?php include "./inc/header.php" ?>
<?php
  include "../classes/bookClass.php";
  $bk = new BookClasses();
  $getBooks = $bk->getAllReturnedReqBooks();

  if (isset($_GET['id']) && $_GET['id']!=null) {
    $id = $_GET['id'];
    $bk->acceptReturnedReqBooks($id);

  }

?>
<div class="dashboadheader" id="maindash">
    <div class="dashnav">
        <label for="nav-toggle">
            <span class="fas fa-bars"></span>
        </label>
        Book List
    </div>
    <a class="nav-link" href="/"><i class="fas fa-home"></i> Home</a>
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
                    <th scope="col">By</th>
                    <th scope="col">Name</th>
                    <th scope="col">Depertment</th>
                    <th scope="col">Borrowed</th>
                    <th scope="col">Grant For</th>
                    <th scope="col">Deu</th>
                    <th scope="col">Status</th>

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
                    <td data-label="Cover"><img src="<?php echo $list['addedBy']=='Teacher'?'../'.$list['image']:$list['image']; ?>" alt="<?php echo $list['title']; ?>">
                    </td>
                    <td data-label="Title"><a
                            href="bookde.php?id=<?php echo $list['id']; ?>"><?php echo $list['title']; ?></a></td>
                    <td data-label="Author"><?php echo $list['author']; ?></td>
                    <?php
                    }
                ?>
                    <?php
                    $userlist = $bk->getAllRequestedUserDetails($book['userId'],$book['userType']);
                    while ($list = $userlist->fetch_assoc()) {
                ?>
                    <td><img src="<?php echo '../'.$list['image']; ?>" alt="<?php echo $list['name']; ?>"></td>
                    <td><?php echo $list['name']; ?></td>
                    <td><?php echo $list['department']; ?></td>
                    <td><?php echo $book['borrowDate']; ?></td>
                    <td><?php echo $returndate; ?></td>
                    <td><?php echo $today>$returndate2?$interval->d*20:0  ?></td>
                    <td><a href="?id=<?php echo $book['id']; ?>"><span class="badge bg-success">Accept</span></a></td>
                    
                </tr>
                <?php
                        }
                    }
                }else{
                    echo "No Book Request Found";
                }
              ?>
            </tbody>

        </table>
    </div>

</main>
<?php include "./inc/footer.php" ?>