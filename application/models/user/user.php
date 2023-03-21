<?php

namespace User;

require_once './vendor/autoload.php';

use GuzzleHttp\Client;

use Database\Database;

/**
 *
 * @method Signup_User
 *
 */
class User extends Database
{


  private $username;
  private $password;
  private $email;
  private $gender;
  private $bio;

  /**
   *
   * @param mixed $email
   * @param mixed $username
   * @param mixed $password
   * @param mixed gender
   * @param mixed bio
   *
   * @return boolean
   *
   */

  public function Signup_User($username, $email, $password, $gender, $bio)
  {

    $this->username = $username;
    $this->$password = $password;
    $this->email = $email;
    $this->gender = $gender;
    $this->bio = $bio;

    $sql = "SELECT * FROM Users WHERE Email='" . $email . "'";

    $check = $this->link->query($sql);
    $row_count = $check->num_rows;

    if ($row_count == 0) {
      $sql1 = "INSERT INTO Users (Username,Password,Email,Gender,Bio) VALUES ('" . $username . "','" . md5($password) . "','" . $email . "','" . $gender . "','" . $bio . "')";
      $result = mysqli_query($this->link, $sql1);
      return $result;
    } else {
      return false;
    }
  }

  /**
   * This function is used to validate the login process
   * @param mixed $username
   * @param mixed $password
   *
   * @return boolean
   *
   */

  public function validate_login($username, $password)
  {

    $this->username = $username;
    $this->$password = $password;

    // The md5 functions is being used to encrypt the password inside database
    $sql = "SELECT Uid from Users WHERE Email='" . $username . "' and Password='" . md5($password) . "'";
    $output = mysqli_query($this->link, $sql);
    $data = mysqli_fetch_array($output);
    $row_count = $output->num_rows;

    if ($row_count == 1) {
      $_SESSION['logged_in'] = true;
      $_SESSION['User_id'] = $data['Uid'];
      return true;
    } else {
      return false;
    }
  }


  /*
    Regular Expression: $\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$
    $ = beginning of string
    \S* = any set of characters
    (?=\S{8,}) = of at least length 8
    (?=\S*[a-z]) = containing at least one lowercase letter
    (?=\S*[A-Z]) = and at least one uppercase letter
    (?=\S*[\d]) = and at least one number
    (?=\S*[\W]) = and at least a special character (non-word characters)
    $ = end of the string
 */
  /**
   * This function will be used to validate the password entered by user
   *
   * @param mixed $password
   *
   * @return boolean
   *
   */

  public function Validate_Password($password)
  {

    if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $password)) {
      return FALSE;
    } else {
      return TRUE;
    }
  }

  /**
   *
   * This function is being used to fetch data from the field
   *
   * @param mixed $email
   *
   * @return string
   *
   */
  public function Get_Name($email)
  {
    $sql = "SELECT Username from Users WHERE Email='" . $email . "'";
    $output = mysqli_query($this->link, $sql);
    $data = mysqli_fetch_array($output);
    return $data[0];
  }


  /**
   * @var string $message
   * This string will return the error messages related to validation of image
   */

  public string $message;

  /**
   *
   * This function will be used to validate the image
   * @param mixed $imagename
   * @param mixed $imagesize
   * @param mixed $imagetype
   *
   * @return boolean
   */
  public function Validate_Image($imagename, $imagesize, $imagetype)
  {
    //If there's no image name that means that no image was uploaded so displaying error
    if (!$imagename) {
      $this->message = "No image was uploaded";
      return false;
    }
    //If image size is greater than 6MB
    elseif ($imagesize > 6000000) {
      $this->message = "File size too large";
      return false;
    } elseif ($imagetype != 'image/jpg' && $imagetype != 'image/png' && $imagetype != 'image/jpeg') {
      $this->message = "Invalid file type";
      return false;
    } else {
      return true;
    }
  }

  /**
   *
   * This function is used to store the image file location in database
   *
   * @param mixed $filepath
   * @param mixed $email
   *
   * @return boolean
   */
  public function Upload_Image($filepath, $email)
  {

    $sql = "Update Users SET Image = '" . $filepath . "' WHERE Email='" . $email . "' ";
    $result = mysqli_query($this->link, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * This function is used to facilitate Image from database
   *
   * @param mixed $email
   *
   * @return string
   */
  public function get_image($email)
  {

    $sql = "Select Image from Users WHERE Email='" . $email . "'";
    $output = mysqli_query($this->link, $sql);
    $data = mysqli_fetch_array($output);
    return $data[0];
  }

  /**
   * @param mixed $email
   *
   * @return [type]
   */
  public function get_bio($email)
  {

    $sql = "Select Bio from Users WHERE Email='" . $email . "'";
    $output = mysqli_query($this->link, $sql);
    $data = mysqli_fetch_array($output);
    return $data[0];
  }

  /**
   * This functions helps to update the bio based upon the data entered by user
   * @param mixed $bio
   * @param mixed $email
   *
   * @return boolean
   */
  public function Upload_bio($bio, $email)
  {
    $this->email = $email;
    $sql = "Update Users SET Bio = '" . $bio . "' WHERE Email='" . $email . "' ";
    $result = mysqli_query($this->link, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * This function checks whether account exists or not
   *
   * @param mixed $email
   *
   * @return boolean
   *
   */
  public function account_exists($email)
  {
    $this->email = $email;
    $sql = "SELECT * from Users WHERE Email='" . $email . "' ";
    $output = mysqli_query($this->link, $sql);
    $row_count = $output->num_rows;

    if ($row_count == 1) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * This function is used to update user password
   *
   * @param mixed $email
   *
   * @param mixed $password
   *
   * @return boolean
   *
   */
  public function update_password($email, $password)
  {

    $this->email = $email;
    $this->password = $password;
    $sql = "Update Users SET Password = '" . md5($password) . "' WHERE Email='" . $email . "' ";
    $result = mysqli_query($this->link, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * This function is used to update username
   *
   * @param mixed $name
   *
   * @param mixed $email
   *
   * @return boolean
   *
   */
  public function upload_name($name, $email)
  {
    $this->email = $email;
    $sql = "Update Users SET Username = '" . $name . "' WHERE Email='" . $email . "' ";
    $result = mysqli_query($this->link, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * This function is used to update email
   *
   * @param mixed $emailToupdate
   * @param mixed $email
   *
   * @return boolean
   */
  public function uploadEmail($emailToupdate, $email)
  {
    $sql = "Update Users SET Email = '" . $emailToupdate . "' WHERE Email='" . $email . "' ";
    $result = mysqli_query($this->link, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * This function is used to uploadd data to the database
   *
   * @param mixed $username
   * @param mixed $content
   * @param mixed $image
   *
   * @return boolean
   *
   */
  public function makePost($username, $content, $image, $display, $video, $audio)
  {
    $sql = "INSERT INTO Posts (Username,Content,Image,Display,Video,Audio) VALUES
    ('" . $username . "','" . $content . "','" . $image . "','" . $display . "','" . $video . "','" . $audio . "')";
    $result = mysqli_query($this->link, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }


  /**
   * This function is used to retrieve posts from the database
   * @param mixed $a
   * @param mixed $b
   *
   * @return [type]
   */
  public function getContent()
  {
    $sql = "SELECT * from Posts order by Pid DESC  ";
    return ($this->link->query($sql)->fetch_all(MYSQLI_ASSOC));
  }


  /**
   * This function is used to validate the email entered by the user using
   * mailboxlayer api
   *
   * @param mixed $email
   *
   * @return boolean
   *
   */
  public function validateEmail($email)
  {

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'https://api.apilayer.com'
    ]);
    $response = $client->request('GET', 'email_verification/check?email=' . $email, [
      'headers' => [
        'apikey' => 'EgFVIMYLC78KM6VD65HlOY6k5VpA0CTB',
      ]
    ]);

    $body = $response->getBody();
    $arr_body = json_decode($body);
    if ($arr_body->format_valid && $arr_body->smtp_check) {
      return TRUE;
    } else {
      return FALSE;
    }

    // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //   return true;
    // } else {
    //   return false;
    // }


  }

  /**
   * This function is used to check whether the password is same as previous
   *
   * @param mixed $email
   * @param mixed $password
   *
   * @return boolean
   */
  public function samePassword($email, $password) {

    $sql = "SELECT Password from Users WHERE Email='" . $email . "' ";
    $output = mysqli_query($this->link, $sql);
    $data = mysqli_fetch_array($output);
    if($data[0] == md5($password)) {
      return true;
    }
    else {
      return false;
    }
  }

}
