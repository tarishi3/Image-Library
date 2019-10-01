<?php ob_start(); ?>
<?php include "includes/header.php"?>
<?php include "classes/Message.php"?>
<?php include "classes/User.php"?>

<div class="site-section" data-aos="fade">
    <div class="container-fluid">
      <?php
          if(isset($_POST["submit"])){
            
            $First_Name = $_POST["First_Name"];
            $Last_Name = $_POST["Last_Name"];
            $Email = $_POST["Email"];
            $Username = $_POST["Username"];
            $Password = $_POST["Password"]; 
            $Confirmed_Password = $_POST["Confirmed_Password"];
            
            if(User::Email_Exists($Email)){
              Message::Show("This email already exists ! Try again...", Message::$Full_Size, Message::$Error);
            }
            
            if(User::Username_Exists($Username )){
              Message::Show("This username already exists ! Try again...", Message::$Full_Size, Message::$Error);
            }
            
            if($Password != $Confirmed_Password){
              Message::Show("The password and its confirmation are not the same ! Try again...", Message::$Full_Size, Message::$Error);
            }
            if( empty($First_Name) || empty($Last_Name) || empty($Email) || 
                empty($Username) || empty($Password) || empty($Confirmed_Password))
            {
              Message::Show("Enter a value for each required field !", Message::$Full_Size, Message::$Error);
            }else{
              if(!User::Email_Exists($Email) && !User::Username_Exists($Username) && $Password == $Confirmed_Password )
              {
                $userObj = new User($First_Name, $Last_Name, $Email, $Username, $Password, 2);
                $userObj->Insert();
                Message::Show("Your account is successfully created !", Message::$Full_Size, Message::$Success);
              }
            }
            
          }
        ?>
      
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">Register</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <form action="#" method="POST">

                <div class="row form-group">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-black" >First Name <font color="red"><b>*</b></font></label>
                    <input type="text" name="First_Name" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="text-black">Last Name <font color="red"><b>*</b></font></label>
                    <input type="text" name="Last_Name" class="form-control">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-black" >Email <font color="red"><b>*</b></font></label> 
                    <input type="email" name="Email" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="text-black" >Username <font color="red"><b>*</b></font></label> 
                    <input type="text" name="Username" class="form-control">
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black">Password <font color="red"><b>*</b></font></label> 
                    <input type="password" name="Password" class="form-control">
                    
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black">Confirm Password <font color="red"><b>*</b></font></label> 
                    <input type="password" name="Confirmed_Password" class="form-control">
                    
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" name="submit" value="Register" class="btn btn-primary py-2 px-4 text-white">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <div>
                    	Already have an account?<a href="login.php"> Login</a> 
                    </div>
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