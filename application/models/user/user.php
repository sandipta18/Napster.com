<?php 

namespace User;

require_once './vendor/autoload.php';
use Database\Database;

/**
 * 
 * @method Signup_User
 * 
 */
class User extends Database{

        
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

    public function Signup_User($username,$email,$password,$gender,$bio) {

        $this->username = $username;
        $this->$password = $password;
        $this->email = $email;
        $this->gender = $gender;
        $this->bio = $bio;
        
        $sql="SELECT * FROM Users WHERE Email='".$email."'";
        
        $check= $this->link->query($sql);
        $row_count=$check->num_rows;
        
        if($row_count == 0){
            $sql1="INSERT INTO Users (Username,Password,Email,Gender,Bio) VALUES ('".$username."','".md5($password)."','".$email."','".$gender."','".$bio."')";
            $result=mysqli_query($this->link,$sql1);
            return $result;
        }
        else{
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

    public function Validate_Login($username,$password) {
      
      $this->username = $username;
      $this->$password = $password;

      $sql="SELECT Uid from Users WHERE Email='".$username."' and Password='".md5($password)."'";
      $output=mysqli_query($this->link,$sql);
      $data=mysqli_fetch_array($output);
      $row_count=$output->num_rows;
      
      if($row_count==1){
          $_SESSION['logged_in']=true;
          $_SESSION['User_id']=$data['Uid'];
          return true;
      }
      else
      {
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

  public function Validate_Password($password){

    if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $password)) {
      return FALSE;
    } 
    else {
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
  public function Get_Name($email){
    $sql="SELECT Username from Users WHERE Email='".$email."'";
      $output=mysqli_query($this->link,$sql);
      $data=mysqli_fetch_array($output);
      return $data[0];
      
  }

  
  /**
   * @var string
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
  public function Validate_Image($imagename,$imagesize,$imagetype){
      //If there's no image name that means that no image was uploaded so displaying error
      if (!$imagename) {
        $this->message = "No image was uploaded";
        return false;
      }
      //If image size is greater than 6MB
      else if ($imagesize > 6000000) {
        $this->message = "File size too large";
          return false;
      }
      
      elseif($imagetype != 'image/jpg' && $imagetype !='image/png' && $imagetype!= 'image/jpeg'){
        $this->message = "Invalid file type";
        return false;
      }
      else{
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
  public function Upload_Image($filepath,$email){
    $sql="Update Users SET Image = '".$filepath."' WHERE Email='".$email."' " ;
    $result=mysqli_query($this->link,$sql);
    if($result){
      return true;
    }
    else{
      return false;
    }
    

  }


}




?>


