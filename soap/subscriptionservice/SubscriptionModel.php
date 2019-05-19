<?php 
require_once 'Crud.php';
class SubscriptionModel extends Crud 
{
    public function  __construct()
    {
        parent::__construct();
        
    }
    
    public function save_site_category($params)
    {
        $this->table_name = 'site_category';
        $result = $this->save($params);
        return $result;
    }
    
    public function save_subscriber($params)
    {
        $this->table_name = 'subscriber';
        $result = $this->save($params);
        return $result;
    }
    
    
    public function get_site_category($params=Null, $where=Null){
        $this->table_name = 'site_category';
        $result = $this->get($params, $where);
        return $result;
    }
    
    public function get_subscriber($params=Null, $where=Null){
        $this->table_name = 'subscriber';
        $result = $this->get($params, $where);
        
        return $result;
    }
}
?>