<?php 
function saveServiceProvider($params){
    return array(
        "status"=> "OK",
        "statusCode"=> "200",
        "message"=> "Saved",
        "reference"=> "1234...."
        
    );
}

/**
 *
 * @param  $params: $params->location, location, name
 * @return string[]|string[][]|NULL[]
 */
function getServiceProvider($params){
    
    
    
    return array("providers" => array(
        "reference"=>"12345..",
        "name" => "Name",
        "phoneNumber" => "Number",
        "address" => "Address",
        "email" => "Email",
        "location" => "Location",
        "gpsCoodinates" => "Coopinates",
        "website" => "Site url",
        "category" => array("cat1", "cat2"),
    ));
}
?>