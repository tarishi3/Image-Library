<?php include "includes/header.php"; ?>
<?php include "../classes/Category.php" ?>
  <div class="container-fluid" data-aos="fade" data-aos-delay="500">
    <div class="swiper-container images-carousel">

      <?php 

        if(!isset($_SESSION)){
          session_start();
        }

        
        for ($i=1; $i < 8; $i++) { 

          $name = Category::Get_Name($i);
          if(isset($_POST[$name])){

            $_SESSION['category'] = $name;
            $_SESSION['categoryId'] = $i;
            header('Location: picture-detail.php');
          }
          
        }
      ?>
        <div class="swiper-wrapper">
            <?php 

              for ($i=1; $i <= 7; $i++) { 
                $name = Category::Get_Name($i);
                echo "<div class='swiper-slide'>";
                echo "<div class='image-wrap'>";
                echo "<div class='image-info'>";
                echo "<h2 class='mb-3'>".$name."</h2>";
                echo "<form action='#'method='POST'>";
                echo "<input type='submit' name='".$name."' value='More Photos' class='btn btn-outline-white py-2 px-4'>";
                echo "</form>";
                echo "</div>";
                echo "<img src='images/img_".$i.".jpg' alt='Image'>";
                echo "</div>";
                echo "</div>";
              }

             ?>
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-scrollbar"></div>
    </div>
  </div>

  <?php include "includes/footer.php" ?> 
  </body>
</html>