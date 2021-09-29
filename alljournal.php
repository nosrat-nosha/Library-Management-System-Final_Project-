<?php include "./inc/header.php" ?>
<?php
  include "./classes/journalClass.php";
  $bk = new JournalClasses();
  $getBooks = $bk->getJournal();
?>

<div id="maindash" class="heremainpart">
  <section class="container-fluid extramainpart typeshere">
    <!-- title  -->
    <div class="row">
      <h1 class="typetitle">Journal</h1>
    </div>
    <!-- book-list  -->
    <!-- book row-1  -->
    <div class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-2">
      <!-- col-1  -->
      <?php
        if (isset($getBooks) && $getBooks!=false) {
          while ($book = $getBooks->fetch_assoc()) {
      ?>
      <div class="col cardpl">
        <div class="card shadow">
          <img src="<?php echo str_replace("../",'',$book['image']); ?>" alt="Book Cover">
          <div class="card-body">
            <p class="card-text">
              <div class="booktitle"><?php echo $book['title']; ?></div>
              <div class="booksubtitle">by <span class="booksubtitlegreen"><?php echo $book['author']; ?></span> </div>
              <p class="booketype"><span><i class="fas fa-book-open"></i></span> <?php echo $book['type']; ?></p>
              <div class="">
              <a href="<?php echo str_replace("../",'',$book['files']); ?>" class="downloadhere">Download</a>
              <a href="<?php echo str_replace("../",'',$book['files']); ?>" class="downloadhere">Read</a>
                <a href="wishlist.html" class="wish"><i class="fas fa-folder-plus fa-lg"></i></a>
              </div>
            </p>
          </div>
        </div>
      </div>
      <?php
          }
        }else{
          echo "No Data";
        }
      ?>

    </div>
  </section>
</div>




<!-- Footer Section -->

<footer class="bottomfooter fullbottomfooter">
  <div class="container">
    <img src="../img/GBlogo.png" alt="GBlogo">
    <hr>
    <div class="row">
      <div class="col-lg-4 col-sm-6 leftlink">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faq.html">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="policy.html">Privacy Policy</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-4 col-sm-6 sociallink">
        <div class="follow">Follow Us On :</div>
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
        <a href=""><i class="fab fa-facebook-f"></i></a>
      </div>
      <div class="col-lg-4 col-sm-12 footeraddress">
        <div class="connect">Connect With Gono Bishwabidyalay</div>
        <a href="https://www.gonouniversity.edu.bd/" class="gbhome">GB Home</a>
        <div class="areaaddress">
          Nolam, P.O. Mirzanagar Via Savar Cantonment, Ashulia, Savar, Dhaka-1344
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="underfooter fullunderfooter">
  <div class="container">
    © GB Library All Right Reserved | Website by CSE 24.
    <a href="#maindash" class="uparrow"><i class="fas fa-arrow-up"></i></a>
  </div>
</div>
<!-- ==================== FOOTER END ===================== -->

<!-- Ask Librarian -->
<!-- Approve Modal -->
<div class="modal fade" id="askLibrarian" tabindex="-1" aria-labelledby="askLibrarianLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content askcontent">
      <div class="mainaskcontent">
        <div class="modal-header askheader">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body askbody"></div>
        <div class="modal-footer typesend askfoter">
          <div class="input-group">
            <input type="text" class="form-control type" placeholder="Type Message..." aria-label="Type Message..."
              aria-describedby="addon-wrapping">
            <span class="input-group-text send" id="addon-wrapping"><i class="fas fa-paper-plane"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- JS file here -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="../js/main.js"></script>
</body>

</html>