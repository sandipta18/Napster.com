<?php
require_once 'loader.html'; 
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
              if (isset($GLOBALS['Login'])) {
                if ($GLOBALS['Login'] == false) {
                  if (isset($GLOBALS['message'])) {
                    echo $GLOBALS['message'];
                    $GLOBALS['message'] = "";
                    unset($GLOBALS['Login']);
                  } 
                }
              }
              elseif(isset($GLOBALS['updated'])){
                if($GLOBALS['updated'] == true){
                 echo '<span class="success">' . $GLOBALS["success"] . '</span>';
                }
              }
              ?>
               
            </div>
            <p class="signup">
              Don't have an account ?
              <a href="../../check" class="option">Sign Up.</a>
            </p>
            <p class="reset">
              Forgot your Password ?
              <a href="../../forgot" class="option2">Reset Password.</a>
            </p>
          </form>
        </div>
      </div>

    </div>
  </section>
</body>

</html>