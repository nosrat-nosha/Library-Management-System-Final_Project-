<?php include "./inc/header.php" ?>
<?php
  include "../classes/thisisClass.php";
  $bk = new ThisisClasses();
  $getBooks = $bk->editThisisIntoDB($_GET['id']);
?>
        <div id="maindash" class="heremainpart">
          <section class="container extramainpart">
              <div class="row">
                <div class="col-lg-9">
                <?php
                  if (isset($getBooks)) {
                    while ($book = $getBooks->fetch_assoc()) {
                ?>
                  <div class="row">
                    <div class="mediaheader col-md-4 col-sm-12">
                        <img class="mediaimg" src="<?php echo $book['image'] ?>" alt="">
                    </div>
                    <div class="Ebook-1_content col-md-7 col-sm-12 leftpadd">
                      <div class="herebooktitle"><?php echo $book['title'] ?></div>
                      <div class="herebooksubtitle">
                        by <span class="byauthor"><?php echo $book['author'] ?></span></div>
                        <div class="hereparts">
                          <p class="oritype"><span><i class="fas fa-book"></i></span> Thesis</p>
                          <a href="#" class="btn previewbtn" tabindex="-1" role="button" aria-disabled="true">Preview</a>
                        </div>
                      
                     <!-- E-bbok describ  -->
                   <div class="E-book_1-describ">
                      <a href="" class="E-book_1-describtion nowthis" href="" disabled>Description</a> 
                   </div>
                   <hr class="describe-hr">
                   
                   <!-- national bestseller  -->
                   <div class="herebookdes"><?php echo $book['title'] ?></div>
                   <p><?php echo $book['description'] ?></p>
                    </div>
                  </div>
                  <?php
                          }
                      }
                  ?>
                </div>

                <div class="col-lg-2 resourcesidebar">
                    <div class="resources-title">Resources</div>
                   <ul class="Ebook-1_resources">
                    <li><a href="allbook.html">Book</a></li>
                    <li><a href="allebook.html">Ebook</a></li>
                    <li><a href="alljournal.html">Journal</a></li>
                    <li><a class="typesub" href="allthesis.html">Thesis</a></li>
                    <li><a href="allassignment.html">Assignment</a></li>
                    <li><a href="allreport.html">Report</a></li>
                    <li><a href="allvideos">Videos</a></li>
                    <li><a href="allgallery.html">Gallery</a></li>
                    <li><a href="allcddvd.html">CD/DVD</a></li>
                   </ul>
                </div>
              </div>
          </section>

           <!-- second  row  -->
           <section class="container">
            <!-- comment  -->
            <div class="row">
                <div class="col-lg-12">
                  <div class="write-review">Review</div>
                </div>
            </div>

          <!-- review 1  -->
          <div class="reviewuser">
            <div class="o-media o-mediamiddle">
              <div class="o-mediaimg">
                <img src="../img/wentworth-miller.jpg" alt="">
                <div class="reviewpername">Dominic Curlf</div>
                <div class="reviewperdate">22.04.2020</div>
              </div>
                
              <div class="o-mediabody">
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
              </div><!-- /o-media__body -->
            </div><!-- /o-media -->
          </div>

          <!-- review 2  -->
          <div class="reviewuser">
            <div class="o-media o-mediamiddle">
              <div class="o-mediaimg">
                <img src="../img/wentworth-miller.jpg" alt="">
                <div class="reviewpername">Dominic Curlf</div>
                <div class="reviewperdate">22.04.2020</div>
              </div>
                
              <div class="o-mediabody">
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
              </div><!-- /o-media__body -->
            </div><!-- /o-media -->
          </div>

        </section>
      </div>

      <?php include "./inc/footer.php" ?>