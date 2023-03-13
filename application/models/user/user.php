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

    /**
     * 
     * @param mixed $email
     * @param mixed $username
     * @param mixed $password
     * 
     * @return boolean
     * 
     */

    public function Signup_User($username,$email,$password) {

        $this->username = $username;
        $this->$password = $password;
        $this->email = $email;
        
        $sql="SELECT * FROM Users WHERE Email='".$email."'";
        
        $check= $this->link->query($sql);
        $row_count=$check->num_rows;
        
        if($row_count == 0){
            $sql1="INSERT INTO Users (Username,Password,Email) VALUES ('".$username."','".md5($password)."','".$email."')";
            $result=mysqli_query($this->link,$sql1);
            return $result;
        }
        else{
            return false;
        }
    }

    /**
     * 
     * @param mixed $username
     * @param mixed $password
     * 
     * @return bool
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


}
?>


