<?php 



require_once './vendor/autoload.php';
use Database\Database;

require_once './vendor/autoload.php';
use User\User;

$Object_database = new Database();
$Object_user = new User;


if(isset($_POST['submit_register'])){
$Signup = $Object_user->Signup_User($_POST['username'],$_POST['email'],$_POST['password']);

if($Signup){
  $_SESSION['signup'] = true;
}
else{
  $_SESSION['signup'] = false;
}
require_once './application/views/login.php';

}

?>