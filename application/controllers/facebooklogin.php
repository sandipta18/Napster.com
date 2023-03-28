<?php
require_once '../../vendor/autoload.php';
require_once 'facebookconfig.php';

$fb = new Facebook\Facebook([
  'app_id' => App_ID,
  'app_secret' => App_Secret,
  'default_graph_version' => Api_Version,
]);

?>
