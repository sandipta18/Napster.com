<?php


require_once './vendor/autoload.php';

use Database\Database;
use User\User;

$Object_database = new Database();
$Object_user = new User;
if(isset($_POST['submit'])){
  session_start();
  if(!$Object_user->samePassword($_SESSION['mail'], $_POST['password'])){
  if($Object_user->Validate_Password($_POST['password'])){
    $Object_user->update_password($_SESSION['mail'],$_POST['password']);
    session_destroy();
    $GLOBALS['updated'] = true;
    $GLOBALS['success'] = "Password Updated";
    require_once './application/views/login.php';
  }
  else {
    $GLOBALS['updated'] = false;
    $GLOBALS['error'] = "Set a valid password";
    session_destroy();
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
