<?php 


class Database{

    private $username;
    private $password;
    private $host;
    private $database;
    
    function __construct($username, $password,$servername, $database,){

        $this->username = $username;
        $this->password = $password;
        $this->host = $servername;
        $this->database = $database;
        
    }
    
}

?>