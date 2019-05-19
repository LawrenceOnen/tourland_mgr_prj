<?php 
require_once 'Crud.php';
class ProfileModel extends Crud 
{
    public function  __construct()
    {
        parent::__construct();
        
    }
    
    public function save_attraction_site($params)
    {
        $this->table_name = 'attraction_site';
        $result = $this->save($params);
        return $result;
    }
    
    public function save_site_category($params)
    {
        $this->table_name = 'site_category';
        $result = $this->save($params);
        return $result;
    }
    
    public function save_site_activity($params)
    {
        $this->table_name = 'site_activity';
        $result = $this->save($params);
        return $result;
    }
    
    public function save_attraction_rate($params)
    {
        $this->table_name = 'site_rating';
        $result = $this->save($params);
        return $result;
    }
    
    public function get_category($params=Null, $where=Null){
        $this->table_name = 'category';
        $result = $this->get($params, $where);
        return $result;
    }
    
    public function get_provider_category($params=Null, $where=Null){
        $this->table_name = 'provider_category';
        $result = $this->get($params, $where);
        return $result;
    }
    
    
    public function get_site_category($params=Null, $where=Null){
        $this->table_name = 'site_category';
        $result = $this->get($params, $where);
        return $result;
    }
    
    public function get_site_activity($params=Null, $where=Null){
        $this->table_name = 'site_activity';
        $result = $this->get($params, $where);
        return $result;
    }
    
    public function get_attraction_site($params=Null, $where=Null, $where_or=Null)
    {
        $this->table_name = 'attraction_site';
        $result = $this->get($params, $where, $where_or);
        
        return $result;
    }
    
    public function get_attraction_site_rate($params=Null, $where=Null)
    {
        $this->table_name = 'site_rating';
        $result = $this->get($params, $where);
        
        return $result;
    }
    
    
    //Service Provider
    public function save_service_provider($params)
    {
        $this->table_name = 'service_provider';
        $result = $this->save($params);
        return $result;
    }
    
    public function get_service_provider($params=Null, $where=Null)
    {
        $this->table_name = 'service_provider';
        $result = $this->get($params, $where);
        
        return $result;
    }
}
?>