<?php 

$url = $_SERVER['REQUEST_URI'];
$url = rtrim($url);

switch ($url) {
    case '/' :
        require 'application/controllers/login.php';
        break;

    case '/login' :
        require 'application/controllers/login.php';
        break;

    case '/signin' :
        require 'application/controllers/login.php';
        break;
    
    case '/register' :
        require 'application/controllers/register.php';
        break;

    case '/signup' :
        require 'application/controllers/register.php';
        break;
    

    default :
        // header('location: application/controllers/error.php');
        require 'application/controllers/error.php';
}

?>