<?php
require_once './vendor/autoload.php';

use Database\Database;
use User\User;

$objectDatabase = new Database();
$objectUser = new User;
if(isset($_POST['submit']))  {
if($objectUser->account_exists($_POST['mail'])){
  session_start();
  $_SESSION['email'] = $_POST['mail'];
  require_once 'mailer.php';
  require_once './application/views/otp.php';
}
else{
  $GLOBALS['error'] = "Account doesn't exist";
  require_once './application/views/forgot.php';
}
}

?>
