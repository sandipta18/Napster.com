<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/assets/css/register.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

  <title>Signup Page</title>
</head>

<body>
  <form enctype="multipart/form-data" id="signup_form" method="POST" action="registration" class="signup" autocomplete="off">
    <h1>Create account</h1>
    <h2>Already have an account? <a href="/login">Sign in</a></h2>

    <div class="signup__field">
      <input class="signup__input" type="text" name="username" id="username" required />
      <label class="signup__label" for="username">Username</label>
    </div>

    <div class="signup__field">
      <input class="signup__input" type="email" name="email" id="email" onkeyup="validateEmail()" required />
      <label class="signup__label" for="email">Email</label>
      <div id="error" class="error"></div>
    </div>

    <div class="signup__field">
      <input class="signup__input" type="password" name="password" id="password" onkeyup="validatePassword()" required />
      <label class="signup__label" for="password">Password</label>
      <div id="error_pass" class="error"></div>
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
      <textarea spellcheck="false" placeholder="Enter Bio..." name="bio" required></textarea>
    </div>
    <button name="submit_register" id="btn">Sign up</button>
    <div class="message">

      <?php
      if (isset($_SESSION['validate']) && $_SESSION['validate'] == false) {
        echo $_SESSION['password_message'];
        unset($_SESSION['validate']);
        unset($_SESSION['password']);
      }
      ?>
      <?php
      if (isset($_SESSION['signup']) && $_SESSION['signup'] == false) {
        echo $_SESSION['signup_message'];
        unset($_SESSION['signup_message']);
        unset($_SESSION['signup']);
      } elseif (isset($_SESSION['signup']) && $_SESSION['signup'] == true) {
        echo '<span class="success">' . $_SESSION["signup_message"] . '</span>';
        unset($_SESSION['signup_message']);
        unset($_SESSION['signup']);
      }

      ?>
    </div>
  </form>
</body>
<script src="../../public/assets/js/register.js"></script>

</html>