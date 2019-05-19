<?php
class DbConfig_bak{
    
    private $database = "tourland";
    private $username = "root";
    private $password = "";
    private $host = "localhost";
    private $port = "";
    
    protected $connection;
    
    public function __construct()
    {
        if(!isset($this->connection)){
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        }
        
        if(!$this->connection){
            echo 'Cannot connect to database server';
            exit;
        }
        
        return $this->connection; 
    }
}

?>