<?php ob_start(); ?>
<?php include "includes/header.php"?>
<?php include "classes/Message.php"?>
<?php include "classes/User.php"?>

<div class="site-section" data-aos="fade">
    <div class="container-fluid">

    	<?php
				
				if(!isset($_SESSION)){
					session_start();
				}		
				if(isset($_POST["submit"])){
					
						$Username = $_POST["Username"];
						$Password = $_POST["Password"]; 
						
						if( User::Login($Username, $Password) ){
							$_SESSION['Username'] = $Username;
							$_SESSION['User_ID']  = User::Get_ID($Username);
							$_SESSION['Role_ID']  = User::Get_Role($Username);
							//SAVE LOGIN IN COOKIE
							if (isset($_POST["Remember_Me"]) ){
								$expiration = time() + (60*60*24*365);//365 days
								setcookie('Cookie_Username', $_POST["Username"], $expiration);
								setcookie('Cookie_Password', $_POST["Password"], $expiration);
							}
							
							if($_SESSION['Role_ID'] == 1){
								header('Location: Admin/index.php');
							}else
							if($_SESSION['Role_ID'] == 2){
								header('Location: Customer/index.php');
							}
						}else{
							Message::Show("Your Username and Password do not match with our records !", Message::$Full_Size, Message::$Error);
						}
						
					}
					
					$Cookie_Username = '';
					$Cookie_Password = '';
					if(isset($_COOKIE["Cookie_Username"]) && $_COOKIE["Cookie_Password"]){
						$Cookie_Username = $_COOKIE["Cookie_Username"];
						$Cookie_Password = $_COOKIE["Cookie_Password"];
					}
				?>
      
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">Login</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <form action="#" method="POST">

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black" for="email">Username <font color="red"><b>*</b></font></label> 
                    <input type="text" name="Username" class="form-control">
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black" for="subject">Password <font color="red"><b>*</b></font></label> 
                    <input type="password" name="Password" class="form-control">
                    
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <input type="checkbox" name="Remember_Me" > Remember Me
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" name="submit" value="Login" class="btn btn-primary py-2 px-4 text-white">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <div>
                    	Don't have an account?<a href="register.php"> Register</a> 
                    </div>
                    <div><a href="reset-password.php">Forgot your password?</a></div>
                  </div>
                </div>

                <div class="space-section"></div>
    
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