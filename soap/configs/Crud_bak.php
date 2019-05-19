<?php 
class Crud_bak extends DbConfig{
    
    private $table_name;
    
    public function __construct($table_name){
        $this->table_name = $table_name;
    }
    
    public function save($params){
        $query = "Insert into ". $table_name ." (".$this->get_arraykey($params).") values(".$this->get_values($params).")";
        $results = $this->excecute($query);
        return $results;
    }
    
    function save_where($params, $where){
        $query = "Update table ". $table_name ." set ";
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
    
    function get($params, $where=Null){
        $query = "Select * from ".$this->table_name."";
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
    
    private function excecute($query){
        $result = $this->connection->query($query);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return $result->insert_id;
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
            array_push($_value, $value);
        }
        return implode(",", $_value);
    }
}
?>