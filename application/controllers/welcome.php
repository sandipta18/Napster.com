<?php 

require_once './vendor/autoload.php';
session_start();

use User\User;



$Object_user = new User;

if (isset($_POST['submit'])) {
 
  $imagename = $_FILES['post-img']['name'];
  $tempname = $_FILES['post-img']['tmp_name'];
  $imagesize = $_FILES['post-img']['size'];
  $imagetype = $_FILES['post-img']['type'];
  $content = $_POST['post-text'];
  $filePath = "public/assets/img/" . $imagename;
  move_uploaded_file($tempname, $filePath);
  if ($Object_user->makePost($_SESSION['name'], $content, $filePath,$_SESSION['filepath'])) {
    header('Location: home');
  } 
  // echo "hello world";
  
}
$array = $Object_user->getContent();
require_once './application/views/welcome.php';
?>