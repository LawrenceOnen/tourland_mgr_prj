<?php
class Validator{
    public function __construct($table_name){
        
    }
    
    public function validate_email($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return True;
        } else {
            return False;
        }
    }
    
    public function validate_url($url){
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return True;
        } else {
            return False;
        }
//         if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
//             $websiteErr = "Invalid URL";
//         }
    }
}
?>