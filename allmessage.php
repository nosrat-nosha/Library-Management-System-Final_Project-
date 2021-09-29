<?php include "./inc/header.php" ?>
<?php
    include "./classes/messageClass.php";
    $bk = new MessageClasses();
    $type =Session::get('Utype');
    $id =Session::get('Uid');
    $getMessages = $bk->getAllmessage($id);

    if (isset($_POST['sendMessage']) && $_POST['msg'] !=null) {
        echo $msg = $_POST['msg'];
        echo $to = 0;
        echo $from = $id;
        echo $parentId = $_POST['parentId'];
        

        echo $insertMsg = $bk->insertMessage($to,$from,$msg,$parentId,$type);
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

    <!-- Message Open Section Start -->

    <h3 class="start">Start Conversation</h3>
    <div class="texthereall">
    <ul>
            <?php
                if (isset($getMessages) && $getMessages!=false) {
                    
                    while ($msg=$getMessages->fetch_assoc()) {
                      $GLOBALS['z'] =$msg['parrentId']
                        
            ?>
            <?php
                if ($msg['fromId']==$id) {
            ?>
                <li style="text-align:left;margin: 12px 10px;padding: 15px;border-bottom: 1px solid #ece8e8;">
                    <p><?php echo $msg['message'] ?></p>
                    <?php echo $msg['toId']==0?'<span style="font-size:12px;color: #3d3d3c7d;">(me) </span>':''; ?>
                    <span style="font-size:12px;color: #3d3d3c7d;"><?php echo $msg['timeStamp'] ?></span>
                </li>
            <?php
                } else {
            ?>
                <li style="text-align:right;background:#DFD9D9;margin: 12px 10px;padding: 15px;border-bottom: 1px solid #ece8e8;">
                    <p><?php echo $msg['message'] ?></p>
                    <?php echo $msg['toId']==0?'<span style="font-size:12px;color: #3d3d3c7d;">(me) </span>':''; ?>
                    <span style="font-size:12px;color: #3d3d3c7d;"><?php echo $msg['timeStamp'] ?></span>
                </li>
            <?php
                    
                }
                
            ?>
            
            
            <?php
                
                    }
                }
            ?>
        </ul>
    </div>

    <div class="typesend">
      <form action="" method="POST">
        <div class="input-group">
          <input type="hidden" name="parentId" value="<?php echo $z ?>">
          <input type="text" class="form-control type" style="height:50px;" placeholder="Type Message..." name="msg" aria-label="Type Message..."
            aria-describedby="addon-wrapping">
          <button type="submit" name="sendMessage" class="input-group-text send" id="addon-wrapping"><i class="fas fa-paper-plane"></i></button>
        </div>
      </form>
    </div>
  </div>

  <!-- Message Open Section End -->

  </div>
</main>
<?php include "./inc/footer.php" ?>