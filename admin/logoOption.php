<?php include "inc/header.php" ?>

<?php

    if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])) {
        
        $insertLogo = $bc->insertLogoIntoDB($_POST,$_FILES);
    }

    if (isset($_GET['Delete']) && !empty($_GET['Delete'])) {
        $id = $_GET['Delete'];
        $deleteClient = $bc->deleteDataFromDB($id);
    }

?>



    <?php include "inc/sidebar.php" ?>

        <div id="right-panel" class="right-panel">

            <?php include "inc/secHeader.php" ?>

                <div class="breadcrumbs">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h2>UPDATE LOGO </h2>

                    <div class="row">
                        <div class="col-md-6 card">
                        <?php
                            if (isset($insertLogo)) {
                                
                        ?>
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                <span class="badge badge-pill badge-success">Success</span> <?php echo $insertLogo; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                                }
                            ?>
                            <form action="" method="POST" enctype="multipart/form-data" class="p-3">
                              <div class="form-group">
                                <label for="companyName">Company Name</label>
                                <input type="text" name="company" class="form-control" id="companyName" aria-describedby="companyName" placeholder="Enter Company Name">
                              </div>

                              <div class="form-group">
                                <label for="logoFile">Upload Logo</label>
                                <input type="file" name="logoImage" class="form-control" id="logoFile" placeholder="Upload Logo ">
                                <small id="emailHelp" class="form-text text-muted">SIZE: 172px X 55px</small>
                              </div>

                              <div class="form-group">
                                <label for="companyName">ALT Tag ( SEO PERPOUS )</label>
                                <input type="text" name="altText" class="form-control" id="companyName" aria-describedby="companyName" placeholder="Enter Company Name">
                              </div>

                              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-6 border">
                            <h3>LATEST LOGO AND COMPANY NAME</h3>
                            <?php
                            if (isset($deleteClient)) {
                                
                        ?>
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                <span class="badge badge-pill badge-success">Success</span> <?php echo $deleteClient; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="logoWraper">
                                <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">Compny</th>
                                          <th scope="col">Logo</th>
                                          <th scope="col">Actions</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                            $getlogo = $bc->getLogo();

                                            if ($getlogo) {
                                                while ($logo = $getlogo->fetch_assoc()) {
                                                   
                                      ?>
                                        <tr>
                                          <td><?php echo $logo['company']; ?></td>

                                          <td><img style="width:147px;height:44px;" src="<?php echo $logo['image']; ?>" alt="<?php echo $logo['company']; ?>"></td>

                                          <td>
                                            <a class="btn btn-danger" onclick="return confirm('Are you want to delete this!')" href="logoOption.php?Delete=<?php echo $logo['logoId']; ?> && md5($logo['logoId'];);">Delete</a>                                            
                                          </td>

                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>

<?php include "inc/footer.php" ?>