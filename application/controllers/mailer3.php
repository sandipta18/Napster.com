<?php
session_start();
require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'sandysardar1800@gmail.com';
$mail->Password = 'lrnkyfhmrwyhkbii';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('sandiptasardar99@gmail.com');
$mail->addAddress($_SESSION['email']);
$mail->isHTML(true);
$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;
$_SESSION['mail'] = $_POST['mail'];
$mail->Subject = 'OTP';
$mail->Body = $otp;
$mail->send();
require_once './application/views/otp.php';
?>
