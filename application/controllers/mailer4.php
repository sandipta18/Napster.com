<?php

require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'sandiptasardar99@gmail.com';
$mail->Password = 'lwkbmdihsqvbqple';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('sandiptasardar99@gmail.com');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->addEmbeddedImage('welcome.jpg', 'welcome');
$mail->Subject = 'Thanks for Registering';
$mail->Body = '<h1>Welcome to Napster ' . $name.'</h1><br>
<h2>Click <a href="napster.com/login">here</a>
to login </h2>
<br> <img src="cid:welcome">';
$mail->send();

?>
