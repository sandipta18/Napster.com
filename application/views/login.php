<?php 
require_once 'loader.html'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/register.css">
    <script src="../../public/assets/js/register.js"></script>
    <title>Welcome Homie</title>
</head>
<body>
    <section>
      <div class="container">
        <div class="user signinBx">
          <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
          <div class="formBx">
            <form enctype="multipart/form-data" id = "login_form" method="POST" action="welcome">
              <h2>Sign In</h2>
              <input type="text" name="username" placeholder="Username" />
              <input type="password" name="password" placeholder="Password" />
              <input type="submit" name="submit_login" value="Login" /><br>
              <?php
              if(isset($_SESSION['signup']) && $_SESSION['signup'] == true){
                echo "Signed Up";
              }
              elseif(isset($_SESSION['signup']) && $_SESSION['signup'] == false){
                echo "Already signed up";
              }
              ?>
              <p class="signup">
                Don't have an account ?
                <a class ="option" onclick="toggleForm();">Sign Up.</a>
              </p>
            </form>
          </div>
        </div>
        <div class="user signupBx">
          <div class="formBx">
            <form enctype="multipart/form-data" id = "signup_form" method="POST" action="registration">
              <h2>Create an account</h2>
              <input type="text" name="username" placeholder="Username" id='input_1' required/>
              <input type="email" name="email" placeholder="Email Address" id='input_2' required/>
              <input type="password" name="password" placeholder="Create Password" id='input_3' required/>
              <input type="password" name="confirmpassword" placeholder="Confirm Password" id='input_4' required/>
              <input type="submit" name="submit_register" value="Sign Up" />
           
              <p class="signup">
                Already have an account ?
                <a class ="option" onclick="toggleForm();">Sign in.</a>
              </p>
            </form>
          </div>
          <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
        </div>
      </div>
    </section>
  </body>
</html>
