<?php include "includes/header.php" ?>
<?php include "../classes/Pictures.php" ?>

  <div class="site-section"  data-aos="fade">
    <div class="container-fluid">
      
      <div class="row justify-content-center">
        
        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">Wallpapers</h2>
            </div>
          </div>
        </div>
    
      </div>
      <div class="row" id="lightgallery">
      <?php 

          $img_array = Pictures::ReadPictures();
          Pictures::Display_Pictures($img_array);
      ?>
      </div>
    </div>
  </div>

  <?php include "includes/footer.php"; ?> 
    
  </body>
</html>