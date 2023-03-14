<?php 


session_start();
require_once './vendor/autoload.php';

use Database\Database;
use User\User;

$Object_database = new Database();
$Object_user = new User;


if(isset($_POST['submit_register'])){

if($Object_user->Validate_Password($_POST['password'])){
$Signup = $Object_user->Signup_User($_POST['username'],$_POST['email'],$_POST['password'],$_POST['gender'],$_POST['bio']);
if($Signup){
  $_SESSION['signup'] = true;
  $_SESSION['signup_message'] = "Signed up succesfully";
  header('Location: /check');
  

}
else{
  $_SESSION['signup'] = false;
  $_SESSION['signup_message'] = "Account alreay Exists";
  header('Location: /check');
 
}
}
else{
$_SESSION['validate'] = false;
$_SESSION['password_message'] = "Password not strong enough";
header('Location: /check');
}

}
