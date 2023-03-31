<?php

require_once './vendor/autoload.php';

use User\User;

$objectUser = new User;
$uri = $_SERVER['REQUEST_URI'];
$uri = explode("/",$uri);
$email = base64_decode($uri[2]);



$array = $objectUser->getPosts($email);
$bio = $objectUser->get_bio($email);
$name = $objectUser->getName($email);
$gender =  $objectUser->getGender($email);
$image = $objectUser->get_image($email);
require_once './application/views/selfpage.php';

?>
