<?php 
session_start();
require_once './vendor/autoload.php';
use Database\Database;

require_once './vendor/autoload.php';
use User\User;

$Object_database = new Database();
$Object_user = new User;


if(isset($_POST['submit_login'])){
$Login = $Object_user->Validate_Login($_POST['username'],$_POST['password']);

if($Login){
//   $_SESSION['Login'] = true;
  // header('Location : home');
  header('Location: ./application/views/welcome.php');
}
else{
  echo "error";
}
}
// echo "good";
// header('location : home');

?>