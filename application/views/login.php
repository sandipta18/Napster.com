<?php
require_once 'loader.html'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/assets/css/login.css">
  <title>Welcome Homie</title>
  <style>

  </style>
</head>

<body>
  <section>
    <div class="container">
      <div class="user signinBx">
        <div class="imgBx">
          <img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" />

        </div>
        <div class="formBx">
          <form enctype="multipart/form-data" id="login_form" method="POST" action="welcome">
            <h2>Sign In</h2>
            <input type="email" name="username" placeholder="Email" required/>
            <input type="password" name="password" placeholder="Password" required/>
            <input type="submit" name="submit_login" value="Login" />
            <div id="error">
              <?php
              if (isset($_SESSION['Login'])) {
                if ($_SESSION['Login'] == false) {
                  if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['Login']);
                  } 
                }
              }
              ?>

            </div>
            <p class="signup">
              Don't have an account ?
              <a href="../../check" class="option">Sign Up.</a>
            </p>
          </form>
        </div>
      </div>

    </div>
  </section>
</body>

</html>