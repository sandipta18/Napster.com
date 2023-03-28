<?php

$url = $_SERVER['REQUEST_URI'];
$url = rtrim($url);
$url = explode( "/", $url);
switch ($url[1]) {
    case '' :
        require_once 'application/controllers/login.php';
        break;

    case 'login' :
        require_once 'application/controllers/login.php';
        break;

    case 'signin' :
        require_once 'application/controllers/login.php';
        break;

    case 'register' :
        require_once 'application/controllers/signup.php';
        break;

    case 'signup' :
        require_once 'application/controllers/login.php';
        break;

    case 'registration' :
        require_once 'application/controllers/signup.php';
        break;

    case 'welcome' :
        require_once 'application/controllers/validate_login.php';
        break;

    case 'check' :
         require_once 'application/controllers/signin.php';
         break;

    case 'home' :
        require_once 'application/controllers/welcome.php';
        break;

    case 'signout':
        require_once 'application/controllers/logout.php';
        break;

    case 'upload' :
        require_once 'application/controllers/upload.php';
        break;

    case 'profile' :
        require_once 'application/controllers/profile.php';
        break;

    case 'forgot' :
        require_once 'application/controllers/forgot.php';
        break;

    case 'reset' :
        require_once 'application/controllers/reset.php';
        break;

    case 'validateotp' :
        require_once 'application/controllers/validate_otp.php';
        break;

    case 'resetpassword' :
        require_once 'application/controllers/resetpassword.php';
        break;

    case 'validate_ajax' :
        require_once 'application/controllers/validate_ajax.php';
        break;

    case 'resetpage' :
        require_once 'application/controllers/resetemplate.php';
        break;

    case 'post' :
        require_once 'application/controllers/post.php';
        break;

    case 'resend' :
        require_once 'application/controllers/mailer3.php';
        break;

    case 'self' :
        require_once 'application/controllers/self.php';
        break;

    case 'search' :
        require_once 'application/controllers/search.php';
        break;

    default :
        require_once 'application/controllers/error.php';


}


?>
