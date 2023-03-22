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
  $content = htmlspecialchars($_POST['post-text'], ENT_QUOTES);
  $filePath = "public/assets/img/" . $imagename;
  move_uploaded_file($tempname, $filePath);


  $videoname= $_FILES['video']['name'];
  $path = "public/assets/video/".$videoname;
  $tmp_name= $_FILES['video']['tmp_name'];
  move_uploaded_file($tmp_name,$path);

  $audioname = $_FILES['audio']['name'];
  $audiopath = "public/assets/audio/" . $audioname;
  $tmp_name = $_FILES['audio']['tmp_name'];
  move_uploaded_file($tmp_name, $audiopath);

  if ($Object_user->makePost($_SESSION['name'], $content, $filePath,$_SESSION['filepath'],$path,$audiopath,$_SESSION['info'])) {
    header('Location: home');
  }


}
$array = $Object_user->getContent();
require_once './application/views/welcome.php';
?>
