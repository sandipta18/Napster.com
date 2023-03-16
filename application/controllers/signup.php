<?php 

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

  $GLOBALS['signup'] = true;
  $GLOBALS['signup_message'] = "Signed up succesfully";


}

// If validation has failed send error message
else{
 
  $GLOBALS['signup'] = false;
  $GLOBALS['signup_message'] = "Account alreay Exists";
}
}
else{

$GLOBALS['validate'] = false;
$GLOBALS['password_message'] = "Password not strong enough";
}

}
require_once './application/views/signup.php';
