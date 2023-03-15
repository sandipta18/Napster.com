<?php 
session_start();
require_once './vendor/autoload.php';
use Database\Database;

require_once './vendor/autoload.php';
use User\User;

$Object_database = new Database();
$Object_user = new User;
$_SESSION['message'] = "";
$_SESSION['Login'] = FALSE;

if(isset($_POST['submit_login'])){

$Login = $Object_user->Validate_Login($_POST['username'],$_POST['password']);
if($Login){
  $_SESSION['Login'] = TRUE;
  $_SESSION['info'] = $_POST['username'];
  $_SESSION['name'] = $Object_user->Get_Name($_POST['username']);
  header('Location: home');
}
else{
$_SESSION['message'] = "Invalid Credentials";
header('Location: /');
}
}


?>