<?php include "./inc/header.php" ?>
<?php
      if (Session::get('Ulogin')== false && Session::get('Utype') == '') {

        echo "<script>window.location.href = 'index.php';</script>";
      }
?>
<?php
  
  $type = Session::get('Utype');
?>

<?php 

  if (isset($type) && $type=='Student') {
    echo "<h2>hdktdlytd ufflyufluyf</h2>";
    include "./inc/sbody.php";
  }elseif (isset($type) && $type=='Teacher') {
    include "./inc/tbody.php";
  }
  

?>



<?php include "./inc/footer.php" ?>