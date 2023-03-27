<?php
session_start();
if ($_SESSION['Login'] == FALSE) {
  session_destroy();
  header('location: /');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../../public/assets/css/navbar.css">
  <script src="../../public/assets/js/home.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<div class="navigation">
  <ul>
    <li>
      <a href="/home">
        <span class="icon"><i class="fa-solid fa-house"></i></span>
        <span class="title">Home</span>
      </a>
    </li>
    <li>
      <a href="/profile">
        <span class="icon"><i class="fa-solid fa-user"></i></span>
        <span class="title">
        <?php echo $_SESSION['name']; ?>'s Profile
        </span>
      </a>
    </li>
    <li>
      <a>
        <span class="icon" onclick="darkmode()"><i class="fa-solid fa-moon" id="icon"></i></span>
        <span class="title" id="mode">Dark Mode</span>
      </a>
    </li>
    <li>
      <a href="/signout">
        <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
        <span class="title">SignOut</span>
      </a>
    </li>

  </ul>
</div>

</html>
