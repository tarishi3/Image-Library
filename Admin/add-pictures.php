<?php ob_start(); ?>
<?php include "includes/header.php"?>
<?php include "../classes/Message.php"?>
<?php include "../classes/Picture.php"?>
<?php include "../classes/Category.php";
  $Category_ID = 0;
?>

<div class="site-section" data-aos="fade">
    <div class="container-fluid">
      <?php

          if(isset($_POST["submit"])){
            
            $Title = $_POST["Title"];
            $Image = $_POST["Image"];
            $Category = $_POST["Category"];
            
          }
        ?>
      
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">Add Images</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <form action="#" method="POST">

                <div class="row form-group">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-black" >Title <font color="red"><b>*</b></font></label>
                    <input type="text" name="Title" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="text-black">Add Image <font color="red"><b>*</b></font></label>
                    <input type="file" name="Image" class="form-control">
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black">Category <font color="red"><b>*</b></font></label> 
                    <select name='Category'>
                      <option value = '0'>None </option>
                      <?php 
                          for($i=1; $i<=7; $i++){
                             $category = Category::Get_Name($i);
                           echo "<option value=\"$i\" ";
                        
                                      if($Category_ID == $i){echo "selected"; }
                                echo ">$category</option>";
                            }
                      ?>
                    </select>
                    
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" name="submit" value="Add" class="btn btn-primary py-2 px-4 text-white">
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
    
      </div>
    </div>
  </div>
<?php include "includes/footer.php" ?> 
  </body>
</html>