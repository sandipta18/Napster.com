 <?php
require_once './vendor/autoload.php';

use Database\Database;
use User\User;

$Object_database = new Database();
$Object_user = new User;


if (isset($_POST['submit_register'])) {

  // Validating email id entered by user

  if ($Object_user->validateEmail($_POST['email'])) {

    // Calling function Validate_Password to validate the password entered
    // by user. Password must contain 8 characters, in which there should be one
    // special character and one upper case and one lower case character
    htmlspecialchars($_POST['bio'], ENT_QUOTES);
    if ($Object_user->Validate_Password($_POST['password'])) {
      // If validation is succesfull store data inside the database and send a message
      // $defaultImage = "public/assets/img/" . 'profile.jpg';
      if(isset($_POST['cookie'])) {
        $cookie = 1;
      }
      else {
        $cookie = 0;
      }
      $defaultImage = "../../public/assets/img/profile.jpg";
      $Signup = $Object_user->Signup_User(
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['gender'],
        htmlspecialchars($_POST['bio'], ENT_QUOTES),
        $defaultImage,
        $cookie
      );
      if ($Signup) {
        $GLOBALS['signup'] = true;
        $GLOBALS['signup_message'] = "Signed up succesfully";
        require_once 'mailer2.php';
      }
      // If validation has failed send error message
      else {
        $GLOBALS['signup'] = false;
        $GLOBALS['signup_message'] = "Account alreay Exists";
      }
    } else {
      $GLOBALS['validate'] = false;
      $GLOBALS['password_message'] = "Password not strong enough";
    }
  } else {
    $GLOBALS['email_validate'] = false;
    $GLOBALS['validate_message'] = 'Invalid Email ID';
  }
}
require_once './application/views/signup.php';
