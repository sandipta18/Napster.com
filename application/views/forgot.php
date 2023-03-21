<?php
require_once 'loader.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Recovery Window</title>
  <link rel="stylesheet" href="../../public/assets/css/forgot.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <div class="container">
    <div class="demo-flex-spacer"></div>
    <form enctype="multipart/form-data" action="reset" method="POST" class="webflow-style-input">
      <input name="mail" type="email" id="email" placeholder="What's your email?" required></input>
      <button type="submit" name="submit"><i class="fa-solid fa-arrow-right"></i></button>
    </form>
    <span class="error">
      <?php
      if (isset($GLOBALS['error'])) {
        echo $GLOBALS['error'];
      }
      ?>
    </span>
    <button class="back"><a href="/login" class="back">Go back</a></button>
    <div id="check"></div>
    <div class="demo-flex-spacer"></div>

  </div>

</body>

</html>
<script src="public/assets/js/forgot.js"></script>
