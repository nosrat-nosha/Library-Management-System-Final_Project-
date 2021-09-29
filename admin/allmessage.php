<?php include "./inc/header.php" ?>
<?php
  include "../classes/messageClass.php";
  $mk = new MessageClasses();

  include "../classes/bookClass.php";
  $bk = new BookClasses();


  $getMessages = $mk->getAllmessages();

?>
<div class="dashboadheader" id="maindash">
    <div class="dashnav">
      <div class="dashplace">
        <label for="nav-toggle">
          <span class="fas fa-bars"></span>
        </label>
        Message
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
        <ul class="list-group">
        <?php
          if (isset($getMessages) && $getMessages!=false) {
            while ($msg = $getMessages->fetch_assoc()) {
              
        ?>
            <?php
                    $userlist = $bk->getAllRequestedUserDetails($msg['fromId'],$msg['type']);
                    while ($list = $userlist->fetch_assoc()) {
                ?>
            <li class="list-group-item p-4 mb-3"><a href="message.php?id=<?php echo $list['id']; ?>&&type=<?php echo $msg['type']; ?>"><?php echo $list['name']; ?></a></li>
            <?php
                    }
                }
            ?>
        <?php
            }
        
        ?>
        </ul>          
        </div>

      </main>
      <?php include "./inc/footer.php" ?>