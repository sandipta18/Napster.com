<?php 


session_start();
require_once './vendor/autoload.php';

use Database\Database;
use User\User;

$Object_database = new Database();
$Object_user = new User;


if(isset($_POST['submit_register'])){

// Calling function Validate_Password to validate the password entered
// by user. Password must contain 8 characters, in which there should be one
// special character and one upper case and one lower case character

if($Object_user->Validate_Password($_POST['password'])){


// If validation is succesfull store data inside the database and send a message
$Signup = $Object_user->Signup_User($_POST['username'],$_POST['email'],$_POST['password'],$_POST['gender'],$_POST['bio']);
if($Signup){
  $_SESSION['signup'] = true;
  $_SESSION['signup_message'] = "Signed up succesfully";
  header('Location: /check');
  

}

// If validation has failed send error message
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
