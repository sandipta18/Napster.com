<?php

session_start();

$Otp = $_POST['digit-1'] . $_POST['digit-2'] . $_POST['digit-3'] .$_POST['digit-4'] .$_POST['digit-5'] .$_POST['digit-6'];

if(isset($_POST['submit'])){
$Otp = $_POST['digit-1'] . $_POST['digit-2'] . $_POST['digit-3'] .$_POST['digit-4'] .$_POST['digit-5'] .$_POST['digit-6'];
if($Otp == $_SESSION['otp']){
  header('Location: resetpage');
}
else{
  $GLOBALS['error'] = "Otp doesn't match";
  require_once './application/views/otp.php';
}

}

?>

