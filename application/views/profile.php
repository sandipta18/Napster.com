<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="profileone.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../public/assets/css/profilepage.css">
  <title>Profile Page</title>
</head>

<body>

  <div class="container">
    <div class="box">
    <h1>Update Profile</h1> 
    <div id="camera" class="camera">
    <?php 
        echo "<img src=" . $_SESSION['filepath'] . " height=200 width=250 />";
    ?>
    </div>
      <form enctype="multipart/form-data" method="POST" action="upload" class="form">
      <input class="textarea" type="text" name = "bio" id="bio"   value="<?php echo $_SESSION['Bio']; ?> "> 
    <span>
      <i class="fas fa-edit edit o"  ></i>
    </span>
        <input id="demo1" class="demo1" type="file" placeholder="Update Image" name="image" />
        <input type="submit" class="btn btn-primary submit" name="submit_upload">
      </form>
      <button class="btn btn-primary submit"> <a href="/home">Go back</a></button>
      <div class="message">
        <?php
        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          $_SESSION['message'] = "";
          unset($_SESSION['message']);
        }
        ?>
      </div>
    </div>
  </div>
</body>
<script src="../../public/assets/js/profile.js"></script>

</html>
<?php 
echo $_POST['bio'];
?>