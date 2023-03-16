<?php 

namespace Database;
/**
 * 
 * @method __construct()
 * It will  initialize connection with database
 * 
 */
class Database
{
    
    protected $link;
    
    function __construct(){
        require_once 'database_info.php';

        $this->link=new \mysqli(Server,Username,Password,Database);

        if(mysqli_connect_errno()){
            throw new \Exception('Connection failed');
            exit;
        }

        
    }
    
}

?>