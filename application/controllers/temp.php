<?php
require_once 'googleconfig.php';
require_once './vendor/autoload.php';

use Database\Database;
use User\User;

if (isset($_GET['code'])) {
  $token = $googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
} else {
  header('Location: /login');
  exit();
}

if (!isset($token["error"])) {
  $gAuth = new Google_Service_Oauth2($googleClient);
  $userData = $gAuth->userinfo_v2_me->get();

  $email = $userData['email'];
  $name = $userData['givenName'];
  $picture = $userData['picture'];

  $password = "";
  $cookie = 0;
  $objectUser = new User;
  if(!$objectUser->account_exists($email)) {
  $objectUser->createAccount($name, $password, $email, $picture, $cookie);

    session_start();
    $_SESSION['Login'] = TRUE;
    $_SESSION['name'] = $name;
    $_SESSION['info'] = $email;
    $_SESSION['filepath'] = $picture;
    $_SESSION['Login'] = True;
    require_once 'mailer4.php';


} else {
    session_start();
    $_SESSION['info'] = $email;
    $_SESSION['name'] = $objectUser->Get_Name($email);
    $GLOBALS['name'] =  $_SESSION['name'];
    $_SESSION['filepath'] = $objectUser->get_image($email);
    $_SESSION['Bio'] = $objectUser->get_bio($email);
    $_SESSION['gender'] = $objectUser->getGender($email);
    $_SESSION['Login'] = True;

}

  header('Location: home');
}
 else {
  header('Location: /login');
  exit();
}


