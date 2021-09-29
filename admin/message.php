<?php include "./inc/header.php" ?>
<?php
  include "../classes/messageClass.php";
  $bk = new MessageClasses();
  $id = $_GET['id'];
  $type = $_GET['type'];
  

  $getMessages = $bk->getAllmessage($id);

  if (isset($_POST['sendMessage']) && $_POST['msg'] !=null) {
      echo $msg = $_POST['msg'];
      echo $to = $id;
      echo $from = 0;
      echo $parentId = $_POST['parentId'];
      

      echo $insertMsg = $bk->AdmininsertMessage($to,$from,$msg,$parentId,$type);
  }

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
                if ($msg['fromId']==0) {
            ?>
                <li style="text-align:left;margin: 12px 10px;padding: 15px;border-bottom: 1px solid #ece8e8;">
                    <p><?php echo $msg['message'] ?></p>
                    <?php echo $msg['fromId']==0?'<span style="font-size:12px;color: #3d3d3c7d;">(me) </span>':''; ?>
                    <span style="font-size:12px;color: #3d3d3c7d;"><?php echo $msg['timeStamp'] ?></span>
                </li>
            <?php
                } else {
            ?>
                <li style="text-align:right;background:#DFD9D9;margin: 12px 10px;padding: 15px;border-bottom: 1px solid #ece8e8;">
                    <p><?php echo $msg['message'] ?></p>
                    <?php echo $msg['fromId']==0?'<span style="font-size:12px;color: #3d3d3c7d;">(me) </span>':''; ?>
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