<?php 

$url = $_SERVER['REQUEST_URI'];
$url = rtrim($url);

switch ($url) {
    case '/' :
        require_once 'application/controllers/login.php';
        break;

    case '/login' :
        require_once 'application/controllers/login.php';
        break;

    case '/signin' :
        require_once 'application/controllers/login.php';
        break;
    
    case '/register' :
        require_once 'application/controllers/signup.php';
        break;

    case '/signup' :
        require_once 'application/controllers/login.php';
        break;
    
    case '/registration' :
        require_once 'application/controllers/signup.php';
        break;

    case '/welcome' :
        require_once 'application/controllers/validate_login.php';
        break;
        
    case '/check' :
         require_once 'application/controllers/signin.php';
         break;

    case '/home' :
        require_once 'application/controllers/welcome.php';
        break;
    
    case '/signout':
        require_once 'application/controllers/logout.php';
        break;

    case '/upload' :
        require_once 'application/controllers/upload.php';
        break;
    
    case '/profile' :
        require_once 'application/controllers/profile.php';
        break;

    default :
        require_once 'application/controllers/error.php';

   
}


?>