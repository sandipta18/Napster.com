<?php 


class User{

    private $username;
    private $password;
    private $email;
    private $image;
    private $bio;
    private $age;
    private $gender;

    function __construct($username, $password, $email, $image, $bio)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->image = $image;
        $this->bio = $bio;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getImage(){
        return $this->image;
    }
    public function getBio(){
        return $this->bio;
    }
    public function getAge(){
        return $this->age;
    }
    public function getGender(){
        return $this->gender;
    }

}

?>