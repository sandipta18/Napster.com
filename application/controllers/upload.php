<?php 

session_start();
require_once './vendor/autoload.php';
use Database\Database;
require_once './vendor/autoload.php';
use User\User;

$Object_database = new Database();
$Object_user = new User;

if (isset($_POST['submit_upload'])) {
    $imagename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $imagesize = $_FILES['image']['size'];
    $imagetype = $_FILES['image']['type'];
    if($Object_user->Validate_Image($imagename,$imagesize,$imagetype)){
        $filePath = "public/assets/img/" . $imagename;
        move_uploaded_file($tempname, $filePath);
        $Object_user->Upload_Image($filePath,$_SESSION['info']);
        $_SESSION['message'] = "Image Uploaded Succesfully";
        header('Location: profile');
        
    }
    else{
       $_SESSION['message'] = $Object_user->message;
       header('Location: profile');
    
    }
    
    
   
    
    
}


?>