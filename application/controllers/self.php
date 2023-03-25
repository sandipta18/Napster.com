<?php

require_once './vendor/autoload.php';

use User\User;

$objectUser = new User;
$uri = $_SERVER['REQUEST_URI'];
$uri = explode("/",$uri);
$email = $uri[2];
// echo $email;


$array = $objectUser->getPosts($email);
require_once './application/views/selfpage.php';

?>
