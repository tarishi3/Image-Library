<?php include "includes/header.php"; ?>
<?php include "../classes/Pictures.php" ;
  
          if(!isset($_SESSION)){
            session_start();
          }
?>

  <div class="site-section"  data-aos="fade">
    <div class="container-fluid">
      
      <div class="row justify-content-center">
        
        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 ">
              <?php echo '<h2 class="site-section-heading text-center">'.$_SESSION['category'].' Gallery</h2>'; ?>
            </div>
          </div>
        </div>
    
      </div>
      <div class="row" id="lightgallery">
      <?php 
            $array = Pictures::ReadPictures();
            Pictures::display_detail($array, $_SESSION['categoryId'], $_SESSION['User_ID']);
      ?>
      </div>
    </div>
  </div>

  <?php include "includes/picture-footer.php"; ?> 
    
  </body>
</html>