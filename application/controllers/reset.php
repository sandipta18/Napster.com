<?php 
require_once './vendor/autoload.php';

use Database\Database;
use User\User;

$Object_database = new Database();
$Object_user = new User;
if(isset($_POST['submit'])){
if($Object_user->account_exists($_POST['mail'])){
  require_once 'mailer.php';
  require_once './application/views/otp.php';
}
else{
  $GLOBALS['error'] = "Account doesn't exist";
  require_once './application/views/forgot.php';
}
}

?>