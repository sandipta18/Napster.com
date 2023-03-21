<?php

require_once './vendor/autoload.php';


use User\User;


$objectUser = new User;
if($objectUser->account_exists($_POST['email'])) {
  echo "Account Exists";
}



?>
