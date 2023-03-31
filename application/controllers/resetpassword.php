<?php

require_once './vendor/autoload.php';

use Database\Database;
use User\User;

$objectDatabase = new Database();
$objectUser = new User;
if(isset($_POST['submit'])){
  session_start();
  if(!$objectUser->samePassword($_SESSION['mail'], $_POST['password'])){
  if($objectUser->Validate_Password($_POST['password'])){
    $objectUser->update_password($_SESSION['mail'],$_POST['password']);
    session_destroy();
    $GLOBALS['updated'] = true;
    $GLOBALS['success'] = "Password Updated";
    require_once './application/views/reset.php';
  }
  else {
    $GLOBALS['updated'] = false;
    $GLOBALS['error'] = "Set a valid password";
    require_once './application/views/reset.php';
  }
  }
  else {
    $GLOBALS['samePass'] = true;
    $GLOBALS['passMessage'] = "You are entering a already used password";
    require_once './application/views/reset.php';
  }
}


?>
