<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './application/views/profile.php';
require_once './vendor/autoload.php';
use Database\Database;
require_once './vendor/autoload.php';
use User\User;

$Object_database = new Database();
$Object_user = new User;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imagename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $imagesize = $_FILES['image']['size'];
    $imagetype = $_FILES['image']['type'];
    if($Object_user->Validate_Image($imagename,$imagesize,$imagetype)){
        $_SESSION['message'] = $this->message;
        header('Location : profile');
    }
    else{
    //    $_SESSION['message'] = "failed";
       $_SESSION['message'] = "Image Upload Failed";
       header('Location : profile');
    }
    
}


?>