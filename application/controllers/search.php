<?php
require_once './vendor/autoload.php';

use User\User;

$objectUser = new User;
$array = $objectUser->searchByUsername($_POST['search']);
if($array!=NULL) {
for ($i = 0; $i < count($array); $i++) { ?>

  <a class="name" href="self/<?php echo base64_encode($array[$i]['Email']); ?>">
    <?php echo $array[$i]['Username']; ?></a>

<?php
}
}
else { ?>
  <a class="name">Not found</a>

<?php  }

?>

