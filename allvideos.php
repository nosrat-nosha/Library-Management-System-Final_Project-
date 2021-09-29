<?php include "./inc/header.php" ?>
<?php
  include "./classes/videoClass.php";
  $bk = new VideoClasses();
  $getVideo = $bk->getVideo();
?>
<div id="maindash" class="heremainpart">
  <section class="container mt-5 p-5">
    <!-- title  -->
    <div class="row">
      <h1 class="typetitle">Videos</h1>
    </div>

    <?php
        if (isset($getVideo) && $getVideo!=false) {
          while ($vid = $getVideo->fetch_assoc()) {
      ?>
    <div class="row d-flex shadow-lg my-5">
      <div class="col-lg-4 col-sm-12 p-4 m-0">
        <video width="320" height="240" controls>
          <source src="<?php echo str_replace("../",'',$vid['files']); ?>" >
        </video>
      </div>
      <div class="col-lg-8 col-sm-12 p-4">
        <h2 class="fw-bold mb-2"><?php echo $vid['title']; ?></h2>

        <p class="mt-4">
          <?php echo $vid['description']; ?>
        </p>
      </div>
    </div>
    <?php
          }
        }else{
          echo "No Data";
        }
      ?>

  </section>

</div>


<?php include "./inc/footer.php" ?>