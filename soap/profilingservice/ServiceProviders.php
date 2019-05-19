<?php 

require_once 'ProfileModel.php';
require_once 'Validator.php';
require_once 'Utils.php';

function saveServiceProvider($params){
    $statusCode = 200;
    $message = "Success";
    $reference = Null;
    $model = new ProfileModel();
    $util = new Utils();
    
    $name = $params->name;
    $location = $params->location;
    $phone_number = $params->phoneNumber;
    $email = $params->email;
    $address = $params->address;
    $description = $params->description;
    $gps_coordinates = $params->gpsCoordinate;
    $website = $params->website;
    $category = $params->category;
    $images = $params->images;
    $reference = $params->reference;
    
    $validator = new Validator();
    
    $util->m_log("Saving service provider data");
    
    if(!isset($name)){
        $message = "Service Provider Name is required";
        $statusCode = 406;
    }
    
    if(!isset($location)){
        $message = "Service Provider Location is required";
        $statusCode = 406;
    }
    
    if(isset($email) && !$validator->validate_email($email)){
        $message = "Invalid Email Address provided";
        $statusCode = 406;
    }
    
    if(isset($website) && !$validator->validate_url($website)){
        $message = "Invalid Website url provided";
        $statusCode = 406;
    }
    
    $param = array(
        'reference' => $util->uuid(),
        'name' => $name,
        'phone_number' => $phone_number,
        'email' => $email,
        'location' => $address,
        'website' => $website,
        'description' => $description,
        'category' => $category,
        'gps_coordinates' => $gps_coordinates
    );
    $reference = $param['reference'];
    
    $res = $model->save_service_provider($param);
    
    return array(
        "status"=> "OK",
        "statusCode"=> $statusCode,
        "response"=>  $message,
        "reference"=> $reference,
    );
}

/**
 *
 * @param  $params: $params->location, location, name
 * @return string[]|string[][]|NULL[]
 */
function getServiceProvider($params){
    
    $statusCode = 200;
    $message = "Success";
    $model = new ProfileModel();
    $util = new Utils();
    $response = array();
    $filter = array(); //associate array
    $param = array(); //single array
    
    //Filter parameters
    $reference = $params->reference;
    $location = $params->location;
    $name = $params->name;
    $category = $params->category;
    
    $util->m_log("Get service provider data");
    
    if(isset($reference) and $reference!=""){
        $filter["reference"] = "'".$reference."'";
    }
    if(isset($location) and $location != ""){
        $filter["location"] = "'".$location."'";
    }
    if(isset($name) and $name!=""){
        $filter["name"] = "'".$name."'";
    }
    if(isset($category) and $category!=""){
        $filter["category"] = "'".$category."'";
    }
    
    $res = $model->get_service_provider($param, $filter);
    if($res){
        while($row = $res->fetch_assoc()) {
            $site = array(
                "reference" => $row["reference"],
                "name" => $row["name"],
                "phoneNumber" => $row["phone_number"],
                "email" => $row["email"],
                "address" => $row["address"],
                "location" => $row["location"],
                "website" => $row["website"],
                "description" => $row["description"],
                "image" => $row["image"],
                "gpsCoordinates" => $row["gps_coordinates"],
                "rating" => "5",
                "category" => $row["category"],
            );
            array_push($response, $site);
        }
    }
        
   
    return array(
        "status"=> "OK",
        "statusCode"=> "200",
        "response" => array("serviceProvider" => $response)
        
    );
}

function getProviderCategory($params){
    $statusCode = 200;
    $message = "Success";
    $model = new ProfileModel();
    $util = new Utils();
    $response = array();
    $filter = array(); //associate array
    $param = array(); //single array
    $category = array(); //single array
    
    $code = $params->code;
    
    
    if(isset($code) and $code!=""){
        $filter["code"] = "'".$code."'";
    }
    
    $get_cat = $model->get_provider_category($param, $filter);
    if($get_cat){
        while($row1 = $get_cat->fetch_assoc()) {
            array_push($category, array(
                "code" => $row1["code"],
                "name" => $row1['name']
            )
                );
        }
    }
    
    return array(
        "status"=> "OK",
        "statusCode"=> "200",
        "response" => array("item" => $category)
        
    );
}
?>