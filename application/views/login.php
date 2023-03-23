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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Welcome Homie</title>
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
            <input type="email" name="username" placeholder="Email" id="email" onkeypress="validateEmail()" onblur="removeBorder()" required />
            <span id="check"></span>
            <span class="eye">
              <input type="password" name="password" placeholder="Password" id="password" onkeypress="validatePassword()" required onblur="removeBorder()" />
              <i class="fa fa-eye eye" aria-hidden="true" onclick="toggleFunction()"></i></span>
            <input type="submit" name="submit_login" value="Login" id="button" />
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
              ?>

            </div>
            <p class="signup">
              Don't have an account ?
              <a href="../../check" class="option">Sign Up.</a>
            </p>
            <p class="reset">
              Forgot your Password ?
              <a href="../../forgot" class="option2">Reset Now.</a>
            </p>
            <p class="signup">
              Continue with <a href="" class="google"><i class="fa-brands fa-google icon"></i></a> instead ?
            </p>
          </form>
        </div>
      </div>

    </div>
  </section>
</body>

</html>
<script src="public/assets/js/login.js"></script>
