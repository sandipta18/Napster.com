<?php
session_start();
require_once './vendor/autoload.php';

use User\User;

$objectUser = new User;
setcookie('cookie', $_POST['value']);
$objectUser->setCookie($_POST['value'],$_SESSION['info']);

?>
