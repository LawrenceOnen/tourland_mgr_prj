<?php 
/**
 * 
 * @param  $params: $params->reference
 * @return string[]
 */
function saveAttractionSite($params){
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
function getAttractionSite($params){
    
    
    
    return array("site" => array(
        "reference"=>"12345..",
        "name" => "Name",
        "phoneNumber" => "Number",
        "address" => "Address",
        "email" => "Email",
        "location" => "Location",
        "gpsCoodinates" => "Coopinates",
        "website" => "Site url",
        "images" => array("imageurl", "imageurl", "...."),
        "activity" => array("activity1", "Activity2", "...."),
        "rating" => "4",
    ));
}


/**
 * 
 * @param $params: $params->reference
 * @return string[]
 */
function saveRating($params){
    return array(
        "status"=> "OK",
        "statusCode"=> "200",
        "message"=> "Saved",
        
    );
}
?>