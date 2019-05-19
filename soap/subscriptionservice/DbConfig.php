<?php
require_once 'Utils.php';

class DbConfig{
    
    private $database = "tl_subscribers_db";
    private $username = "root";
    private $password = "";
    private $host = "localhost";
    private $port = "";
    
    protected $connection;
    
    public function __construct()
    {
        $util = new Utils();
        if(!isset($this->connection)){
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        }
       
        if(!$this->connection){
            echo 'Cannot connect to database server'.$this->connection->connect_error;
            exit;
        }
        if ($this->connection->connect_errno) {
            printf("Connect failed: %s\n", $this->connection->connect_error);
            exit();
        }
        
        return $this->connection; 
    }
}

?>