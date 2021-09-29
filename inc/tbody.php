<?php
  include "./classes/profileClass.php";
  $bk = new UserProfile();
  $id = Session::get('Uid');
  $type = Session::get('Utype');
  $userResult = $bk->userProfile($id,$type);
?>
<?php
    if (isset($userResult)) {
        
        while ($user = $userResult->fetch_assoc()) {
            
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
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-book"></i><span>Manage Book</span><i
            class="fas fa-chevron-down ms-3 fa-xs"></i></a>
        <ul class="submenu collapse">
          <li><a class="nav-link" href="addbook.php">Add Book</a></li>
        </ul>
      </li>
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
      Profile
    </div>
  </div>
  <a class="nav-link" href="/"><i class="fas fa-home"></i> Home</a>
</div>

<main>
  <div class="container-fluid allitem" id="maindash">

    <div class="accountinfo">
      <div class="accountimg">
        <img src="<?php echo $user['cardImage'] ?>" alt="Profile">
      </div>

      <div class="activestatus">
        <div class="info">Account Info</div>
        <div class="status">Account Status - <?php echo $user['status']==1? '<span class="activeprofile">Active</span>':'<span class="badge badge-danger">Blocked</span>' ?></div>
      </div>
    </div>
    <table class="table table-hover">
    
    <tbody>
      <tr style="padding:20px;">
        <td>Name:</td>
        <td><?php echo $user['name'] ?></td>
      </tr>
      <tr style="padding:20px;">
        <td>Username:</td>
        <td><?php echo $user['username'] ?></td>
      </tr>
      <tr style="padding:20px;">
        <td>Email:</td>
        <td><?php echo $user['email'] ?></td>
      </tr>
      <tr style="padding:20px;">
        <td>Department:</td>
        <td><?php echo $user['department'] ?></td>
      </tr>
      <tr style="padding:20px;">
        <td>Designation:</td>
        <td><?php echo $user['designation'] ?></td>
      </tr>
      <tr style="padding:20px;">
        <td>Phone:</td>
        <td><?php echo $user['phone'] ?></td>
      </tr>
      <tr style="padding:20px;">
        <td>Address:</td>
        <td><?php echo $user['address'] ?></td>
      </tr>
      <tr style="padding:20px;">
        <td>Status:</td>
        <td><?php echo $user['status']==1? '<span class="activeprofile">Active</span>':'<span class="badge badge-danger">Blocked</span>' ?></td>
      </tr>
      
    </tbody>
  </table>

  </div>
</main>
<?php
        }
    }else {
        echo $userResult; 
    }
?>