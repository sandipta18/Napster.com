<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$Otp = $_POST['digit-1'] . $_POST['digit-2'] . $_POST['digit-3'] .$_POST['digit-4'] .$_POST['digit-5'] .$_POST['digit-6'];

if(isset($_POST['submit'])){
$Otp = $_POST['digit-1'] . $_POST['digit-2'] . $_POST['digit-3'] .$_POST['digit-4'] .$_POST['digit-5'] .$_POST['digit-6'];
if($Otp == $_SESSION['otp']){
  // require_once './application/views/reset.php';
  header('Location: resetpage');
}
else{
  $GLOBALS['error'] = "Otp doesn't match";
  require_once './application/views/otp.php';
}

}

?>

