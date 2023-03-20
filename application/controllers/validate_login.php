<?php

require_once './vendor/autoload.php';
use Database\Database;
use User\User;

$Object_database = new Database();
$Object_user = new User;
$_SESSION['message'] = "";
$_SESSION['Login'] = FALSE;
$GLOBALS['Login'] = FALSE;
if(isset($_POST['submit_login'])){

$Login = $Object_user->validate_login($_POST['username'],$_POST['password']);

if($Login){
  session_start();
  $_SESSION['Login'] = TRUE;
  $_SESSION['info'] = $_POST['username'];
  $_SESSION['name'] = $Object_user->Get_Name($_POST['username']);
  $GLOBALS['name'] =  $_SESSION['name'];
  $_SESSION['filepath'] = $Object_user->get_image($_SESSION['info']);
  $_SESSION['Bio'] = $Object_user->get_bio($_SESSION['info']);
  header('Location: home');
}
else {
  $GLOBALS['message'] = "Invalid Credentials";
  require_once './application/views/login.php';
}

}

?>
