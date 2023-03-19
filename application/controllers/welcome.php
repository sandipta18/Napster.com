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


  $videoname= $_FILES['video']['name'];
  $path = "public/assets/video/".$videoname;
  $tmp_name= $_FILES['video']['tmp_name'];
  move_uploaded_file($tmp_name,$path);

  if ($Object_user->makePost($_SESSION['name'], $content, $filePath,$_SESSION['filepath'],$path)) {
    header('Location: home');
  }


}
$a=0;
$b=10;
if(isset($_POST['loadmore'])) {
$array = $Object_user->getContent($a,$b+10);
}
else{
  $array = $Object_user->getContent($a,$b);
}
// if (isset($loadmore)) {
//   $array = $Object_user->getContent($a, $b + 10);
// } else {
//   $array = $Object_user->getContent($a, $b);
// }
require_once './application/views/welcome.php';
?>
