<?php

session_start();
require_once './vendor/autoload.php';
use Database\Database;
use User\User;

$Object_database = new Database();
$Object_user = new User;

$_SESSION['upload_succesful'] = false;
// Facilitating image upload 
if (isset($_POST['submit_upload'])) {
  
  $imagename = $_FILES['image']['name'];
  $tempname = $_FILES['image']['tmp_name'];
  $imagesize = $_FILES['image']['size'];
  $imagetype = $_FILES['image']['type'];
  if($imagename) {
  // Calling function Validate_Image to validate the image entered by user
  if ($Object_user->Validate_Image($imagename, $imagesize, $imagetype)) {
    // If image upload is succesfull storing the image in local directory
    // as well as inside the database
    $filePath = "public/assets/img/" . $imagename;
    move_uploaded_file($tempname, $filePath);
    $Object_user->Upload_Image($filePath, $_SESSION['info']);
    $_SESSION['message'] = "Profile Updated";
    $_SESSION['upload_succesful'] = true;
    $_SESSION['filepath'] = $Object_user->get_image($_SESSION['info']);
    header('Location: profile');
  } else {
    $_SESSION['message'] = $Object_user->message;
    header('Location: profile');
  }
}

else{
  $bio = $_POST['bio'];
  $name = $_POST['name'];
  $Object_user->Upload_bio($bio,$_SESSION['info']);
  $Object_user->upload_name($name,$_SESSION['info']);
  $_SESSION['Bio'] = $Object_user->get_bio($_SESSION['info']);
  $_SESSION['name'] = $Object_user->Get_Name($_SESSION['info']);
  header('Location: profile');
}
}

?>