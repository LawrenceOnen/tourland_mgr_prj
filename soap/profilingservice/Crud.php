<?php 
require_once 'DbConfig.php';
require_once 'Utils.php';

class Crud extends DbConfig{
    private $util = "";
    protected  $table_name;
    
    public function __construct(){
        parent::__construct();
        $this->util = new Utils();
        
    }
    
    public function save($params){
        $query = "Insert into ". $this->table_name ." (".$this->get_arraykey($params).") values(".$this->get_values($params).")";
        $results = $this->excecute($query);
        return $results;
    }
    
    function save_where($params, $where){
        $query = "Update table ". $this->table_name ." set ";
        $action = array();
        $condition = array();
        
        foreach ($params as $key=>$value){
            array_push($action, $key."=".$value);
        }
        
        foreach ($where as $key=>$value){
            array_push($condition, $key."=".$value);
        }
        
        $query = $query.implode(" , ", $action)." where ".implode(" and ", $condition);
        $results = $this->excecute($query);
        return $results;
    }
    
    function get($params=Null, $where=Null, $where_or=Null){
        $query = "Select * from ".$this->table_name."";
        $cond="";
        $condition = array();
        if(isset($where) && !empty($where)){
            
            foreach ($where as $key=>$value){
                array_push($condition, $key."=".$value);
            }
            $cond = " where ".implode(" and ", $condition);
        }
        
        if(isset($where_or) && !empty($where_or)){
           
            foreach ($where_or as $value2){
                
                array_push($condition, key($value2)."=".$value2[key($value2)]);
                
            }
            $cond = " where ".implode(" or ", $condition);
            $this->util->m_log("Where or ". $cond);
        }
        
        $query = $query.$cond;
        $this->util->m_log($query);
        
        $results = $this->__execute($query);
        return $results;
    }
    
    
    function delete($where=Null){
        $query = "Delete from ".$this->table_name."";
        $condition = array();
        if(isset($where)){
            foreach ($where as $key=>$value){
                array_push($condition, $key."=".$value);
            }
        }
        $query = $query.implode(" and ", $condition);
        $results = $this->excecute($query);
        return $results;
    }
    
    function delete_where(){
        
    }
    
    private function __execute($query){
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            return $result;
        }
        if ($result == false) {
            echo $query;
            echo 'Error: cannot execute the command. '.$this->connection->error;
            exit;
        }
        return Null;
    }
    
    private function excecute($query){
        $result = $this->connection->query($query);
        
        if ($result == false) {
            
            echo 'Error: cannot execute the command. '.$this->connection->error;
            exit;
        } else {
            //return  $result->fetch_object();
            return $this->connection->insert_id;
        } 
    }
    
    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
    
    function get_arraykey($array){
        $_key = array();
        foreach($array as $key => $value){
            array_push($_key, $key);
        }
        return implode(",", $_key);
    }
    
    function get_values($array){
        $_value = array();
        foreach($array as $key => $value){
            array_push($_value, "'".$value."'");
        }
        return implode(",", $_value);
    }
}
?>