<?php include "./inc/header.php" ?>
<?php
  include "../classes/bookClass.php";
  $bk = new BookClasses();
  $getBooks = $bk->getAllRequestedBooks();

  if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['borrowGrant'])) {
    $id = $_POST['id'];    
    $bid = $_POST['bid'];    
    $days = $_POST['days'];    
    $type =Session::get('Utype');    
    $updateBorrowReq = $bk->updateTheBorrowRequest($id,$bid,$days,$type);
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
                    <th scope="col">Book ID</th>
                    <th scope="col">By</th>
                    <th scope="col">Name</th>
                    <th scope="col">Depertment</th>
                    <th scope="col">phone</th>
                    <th scope="col">Grant For</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($getBooks) && $getBooks!=false) {
                  while ($book = $getBooks->fetch_assoc()) {
              ?>
                <tr>
                    <?php
                    $booklist = $bk->getAllRequestedBooksDetails($book['bookId']);
                    while ($list = $booklist->fetch_assoc()) {
                  ?>
                    <td data-label="Cover"><img src="<?php echo $list['addedBy']=='Teacher'?'../'.$list['image']:$list['image']; ?>" alt="<?php echo $list['title']; ?>">
                    </td>
                    <td data-label="Title"><a
                            href="bookde.php?id=<?php echo $list['id']; ?>"><?php echo $list['title']; ?></a></td>
                    <td data-label="Author"><?php echo $list['author']; ?></td>
                    <td data-label="Book ID"><?php echo $list['bookid']; ?></td>
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
                    <td><?php echo $list['phone']; ?></td>
                    <td data-label="Publish Year">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control" name="days" placeholder="3">
                                    <input type="hidden" name="id" value="<?php echo $book['userId'] ?>">
                                    <input type="hidden" name="bid" value="<?php echo $book['id'] ?>">
                                </div>
                                <div class="col">
                                    <button type="submit" style="float: left;padding: 0px 12px;" name="borrowGrant"><i
                                            class="fas fa-check-square"></i></button>
                                </div>
                            </div>
                        </form>
                    </td>
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