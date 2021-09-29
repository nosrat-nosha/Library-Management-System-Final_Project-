<?php include "./inc/header.php" ?>


<?php
  include "../classes/borrowClass.php";
  $brk = new BorrowClass();

  include "../classes/userListClass.php";
  $ulk = new UserListClasses();

  include "../classes/bookClass.php";
  $bk = new BookClasses();
  $getbk = $bk->getBooks();
  

  include "../classes/ebookClass.php";
  $ebk = new EBookClasses();
  $getebk = $ebk->getBooks();

  include "../classes/assignmentClass.php";
  $ac = new AssignmentClasses();
  $assn = $ac->getAssignment();

  include "../classes/videoClass.php";
  $vk = new VideoClasses();
  $getvd = $vk->getVideo();

  include "../classes/journalClass.php";
  $jk = new JournalClasses();
  $getjk = $jk->getJournal();

  include "../classes/reportClass.php";
  $rk = new ReportClasses();
  $getrk = $rk->getReport();

  include "../classes/thisisClass.php";
  $tk = new ThisisClasses();
  $gettk = $tk->getThisis();



  $getBooks = $bk->getBooks();

  if ($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['delete'])) {

    if ($_GET['delete']!=null) {
        $editBookResult = $bk->deleteBookIntoDB($_GET['delete']);
    } else {
        echo "<script>window.location.href = '404.php';</script>";
    }
  }
?>
<div class="dashboadheader">
    <div class="dashnav">
      <div class="dashplace">
        <label for="nav-toggle">
          <span class="fas fa-bars"></span>
        </label>
        Dashboard
      </div>
    </div>
    <a class="nav-link" href="home.html"><i class="fas fa-home"></i> Home</a>
</div>


      <main id="maindash">
        <div class="input-group maingroup">
            <input type="text" class=" form-control searchmain">
            <span class="searchicon"><i class="fas fa-search"></i></span>
        </div>
        <div class="container-fluid dashboard">
            <h3>Resource List</h3>
            <div class="row">

                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='booklist.php';">
                      <div class="listall">
                        <div>
                          <div class="count"><?php echo mysqli_num_rows($getbk) ?></div>
                          <span>Book</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/book.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='ebooklist.html';">
                    <div class="listall">
                      <div>
                        <div class="count"><?php echo mysqli_num_rows($getebk) ?></div>
                        <span>Ebook</span>
                      </div>
                      <div>
                        <span class="demoicon">
                          <img src="../img/ebook.png" alt="" srcset="">
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='journallist.html';">
                      <div class="listall">
                        <div>
                          <div class="count"><?php echo mysqli_num_rows($getjk) ?></div>
                          <span>Journal</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/journal.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='thesislist.html';">
                      <div class="listall">
                        <div>
                          <div class="count"><?php echo mysqli_num_rows($gettk) ?></div>
                          <span>Thesis</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/thesis.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='assignmentlist.html';">
                      <div class="listall">
                        <div>
                          <div class="count"><?php echo mysqli_num_rows($assn) ?></div>
                          <span>Assignment</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/assignment.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='reportlist.html';">
                      <div class="listall">
                        <div>
                          <div class="count"><?php echo mysqli_num_rows($getrk) ?></div>
                          <span>Report</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/report.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='videolist.html';">
                      <div class="listall">
                        <div>
                          <div class="count"><?php echo mysqli_num_rows($getvd) ?></div>
                          <span>Videos</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/video.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='gallerylist.html';">
                      <div class="listall">
                        <div>
                          <div class="count">50</div>
                          <span>Images</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/gallery.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='cddvdlist.html';">
                      <div class="listall">
                        <div>
                          <div class="count">50</div>
                          <span>CD/DVD</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/cd.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
            </div>

            <h3>Pending</h3>
            <div class="row">
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='';">
                      <div class="listall">
                        <div>
                          <div class="count"><?php 
                            $st = $ulk->pendingUserList('Student');
                            $tt = $ulk->pendingUserList('Teacher');

                            if ($st != false) {
                              $sCount = mysqli_num_rows($st);
                            }else{
                              $sCount=0;
                            }

                            if ($tt != false) {
                              $tCount = mysqli_num_rows($tt);
                            }else{
                              $tCount=0;
                            }

                            echo  $sCount+ $tCount
                          ?></div>
                          <span>Users</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/users.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='issuerequest.html';">
                      <div class="listall">
                        <div>
                          <div class="count"><?php echo $brk->borrowedRequest() ?></div>
                          <span>Issue Request</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/issue-request.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='borrowed.html';">
                    <div class="listall">
                      <div>
                        <div class="count"><?php echo $brk->borrowedRequestAccepted() ?></div>
                        <span>Borrowed</span>
                      </div>
                      <div>
                        <span class="demoicon">
                          <img src="../img/issue-book.png" alt="" srcset="">
                        </span>
                      </div>
                    </div>
                </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='returnrequest.html';">
                      <div class="listall">
                        <div>
                          <div class="count"><?php echo $brk->returnRequest() ?></div>
                          <span>Return Request</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/return-request.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='requestedbook.html';">
                      <div class="listall">
                        <div>
                          <div class="count"><?php echo $brk->returnRequestAccepted() ?></div>
                          <span>Returned Book</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/requested book.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12" onclick="location.href='message.html';">
                      <div class="listall">
                        <div>
                          <div class="count">50</div>
                          <span>Messages</span>
                        </div>
                        <div>
                          <span class="demoicon">
                            <img src="../img/message.png" alt="" srcset="">
                          </span>
                        </div>
                      </div>
                  </div>
            </div>
        </div>

      </main>
<?php include "./inc/footer.php" ?>