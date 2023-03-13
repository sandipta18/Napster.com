<?php 
session_start();
require_once './vendor/autoload.php';
use Database\Database;

require_once './vendor/autoload.php';
use User\User;

$Object_database = new Database();
$Object_user = new User;
$_SESSION['message'] = "";
$_SESSION['Login'] = false;

if(isset($_POST['submit_login'])){
$Login = $Object_user->Validate_Login($_POST['username'],$_POST['password']);
if($Login){
  $_SESSION['Login'] = true;
  $_SESSION['name'] = $_POST['username'];
  require_once './application/views/welcome.php';
}
else{
$_SESSION['Login'] = false;
$_SESSION['message'] = "Error while logging in";
require_once './application/views/login.php';
}
}


?>