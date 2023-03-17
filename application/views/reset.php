<?php 
require_once 'loader.html'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/assets/css/reset.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <title>Reset Password</title>
</head>

<body>
  <form enctype="multipart/form-data" method="POST" action="resetpassword" required>

    <p>
      <label for="password">Password</label>
      <input id="password" name="password" type="password" onkeypress="validatePassword()" onblur="removeBorder()">
      <span>Enter a password longer than 7 characters</span>
    </p>
    <p>
      <label for="confirm_password">Confirm Password</label>
      <input id="confirm_password" name="confirm_password" type="password">
      <span>Please confirm your password</span>
    </p>
    <p>
      <input id="submit" type="submit" value="SUBMIT" name="submit">
      </p>
      <div class="error">
      <?php
      if (isset($GLOBALS['updated'])) {
        if (($GLOBALS['updated']) == true) {
          echo $GLOBALS['success'];
        } else {
          echo $GLOBALS['error'];
        }
      }
      ?>
      </div>
    
  </form>


  <script src="../../public/assets/js/reset.js"></script>
</body>

</html>