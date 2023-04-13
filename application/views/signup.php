<?php
require_once 'loader.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#1d3041" />
  <link rel="stylesheet" href="../../public/assets/css/register.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="http://benalman.com/code/projects/jquery-throttle-debounce/jquery.ba-throttle-debounce.js"></script>
  <title>Signup Page</title>
</head>

<body>
  <form enctype="multipart/form-data" id="signup_form" method="POST" action="registration" class="signup" autocomplete="off">
    <h1 class="title">Create account</h1>


    <div class="signup__field">
      <input class="signup__input" type="text" name="username" id="username" required />
      <label class="signup__label" for="username">Username</label>
    </div>

    <div class="signup__field">
      <input class="signup__input" type="email" name="email" id="email" onblur="validateEmail()" required />
      <label class="signup__label" for="email">Email</label>
      <div id="error_email" class="error">
        Invalid Email
      </div>
      <span id="message"></span>
      <div id="error" class="error"></div>
    </div>

    <div class="signup__field">
      <input class="signup__input" type="password" name="password" id="password" onblur="validatePassword()" required />
      <label class="signup__label" for="password">Password</label>
      <div id="error_pass" class="error">
        Password must contain one special,upper,lower & numeric character
      </div>
    </div>
    <div class="gender_field">
      <label for="male">Male</label>
      <input type="radio" name="gender" id="male" value="male">
      <label for="female">Female</label>
      <input type="radio" name="gender" id="female" value="female">
      <label for="others">Others</label>
      <input type="radio" name="gender" id="others" value="others">
    </div>
    <div class="wrapper">
      <textarea spellcheck="false" placeholder="Enter Bio..." name="bio"></textarea>
    </div>
    <div class="popup" data-popup="popup-1">
      <div class="popup-inner">
        <h2>Terms and Conditions</h2>
        <div class="popup-scroll">
          <p>
            Privacy on internet is a myth my friend. But we promise we won't exploit you hehe.
            We use cookie to offer you top notch experience. Please accept for optimal performance bruv.
          </p>
        </div>
        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
      </div>
    </div>
    <div class="wrapper ">
      <input id="checkbox" type="checkbox" value="clicked" name="cookie" />
      <label for="checkbox"> I agree to these <a href="#" data-popup-open="popup-1" class="button">Terms and Conditions</a>.</label>
    </div>
    <button name="submit_register" id="btn">Sign up</button>
    <h2 class="signin">Already have an account? <a href="/login">Sign in</a></h2>
    <div class="message" id="hideMeAfter5Seconds">

      <?php
      if (isset($GLOBALS['email_validate']) && $GLOBALS['email_validate'] == false) {
        echo $GLOBALS['validate_message'];
        unset($GLOBALS['validate']);
        unset($GLOBALS['password']);
      }

      if (isset($GLOBALS['validate']) && $GLOBALS['validate'] == false) {
        echo $GLOBALS['password_message'];
        unset($GLOBALS['validate']);
        unset($GLOBALS['password']);
      }

      ?>
      <?php
      if (isset($GLOBALS['signup']) && $GLOBALS['signup'] == false) {
        echo $GLOBALS['signup_message'];
        unset($GLOBALS['signup_message']);
        unset($GLOBALS['signup']);
      } elseif (isset($GLOBALS['signup']) && $GLOBALS['signup'] == true) {
        echo '<span class="success">' . $GLOBALS["signup_message"] . '</span>'; ?>
        <span><a class="redirect" href="/">Login Now</a></span>
      <?php
        unset($GLOBALS['signup_message']);
        unset($GLOBALS['signup']);
      }

      ?>
    </div>
  </form>
</body>
<script src="../../public/assets/js/register.js"></script>

</html>
