<?php

namespace App\Service;

/**
 * @file consists of User Validations
*/
class Validate {

  /**
   * This variable is used to return all the error messages
   *
   * @var string
   */
  public string $errorMessage;

  /**
   * This function is used to validate Email of the User
   *
   * @param string $email
   *
   * @return boolean
   *
   */
  public function validateEmail(string $email) {
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
      return true;
    } else {
      $this->errorMessage = "Invalid Email";
      return false;
    }
  }

  public function validatePassword(string $password) {
    if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $password)) {
      $this->errorMessage = "Invalid Password";
      return false;

    } else {
      return true;
    }
  }


}
?>
