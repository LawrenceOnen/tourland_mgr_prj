<?php 

require_once 'ProfileModel.php';
require_once 'Validator.php';
require_once 'Utils.php';
require_once 'Weather.php';

/**
 * 
 * @param  $params: $params->reference
 * @return string[]
 */
function saveAttractionSite($params){
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
    $opening_time = $params->opening_time;
    $closing_time = $params->closing_time;
    $gps_coordinates = $params->gpsCoordinate;
    $image = $params->image;
    $website = $params->website;
    $activities = $params->activity; //Object
    $category = $params->category; //Object
    $type = $params->type;
    $images = $params->images; //Object
    $reference = $params->reference;
    
    
    $validator = new Validator();
    
    if(!isset($name)){
        $message = "Site Name is required";
        $statusCode = 406;
    }
    
    if(!isset($location)){
        $message = "Site Location is required";
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
        'location' => $location,
        'image' => $image,
        'website' => $website,
        'opening_time' => $opening_time,
        'closing_time' => $closing_time,
        'description' => $description,
        'gps_coordinates' => $gps_coordinates
    );
    
    $reference = $param['reference'];
    $res = $model->save_attraction_site($param);
    
    if (sizeof($activities->detail) > 1){
        foreach ($activities->detail as $act){
            $util->m_log("Activity ".$act->name);
            $act_params = array(
                'attraction_site' => $res,
                'activity_name' => $act->name,
                'description' => $act->description
            );
            $model->save_site_activity($act_params);    
        }
    }else{
        $act_params = array(
            'attraction_site' => $res,
            'activity_name' => $activities->detail->name,
            'description' => $activities->detail->description
        );
        $model->save_site_activity($act_params); 
    }
    
    foreach ($category->item as $cat){
        $util->m_log($cat);

        $cat_params = array(
            'attraction_site'=> $res,
            'category_code'=>$cat->code
        );
        $model->save_site_category($cat_params);
    }
    
   
    
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
function getAttractionSite($params){
    
    $statusCode = 200;
    $message = "Success";
    $model = new ProfileModel();
    $util = new Utils();
    $weather = new Weather();
    $response = array();
    $filter = null; //associate array
    $c_filter = array(); //associate array
    $param = null; //single array
    
    //Filter parameters
    $reference = $params->reference;
    $location = $params->location;
    $name = $params->name;
    $category = $params->category;
    
    if(isset($reference) and $reference!=""){
       $filter["reference"] = "'".$reference."'";
    }
    if(isset($location) and $location != ""){
        $filter["location"] = "'".$location."'";
    }
    if(isset($name) and $name!=""){
        $filter["name"] = "'".$name."'";
    }
    
    $_c = array();
    if(isset($category) and $category!=""){
        $c_filter["category"] = "'".$category."'";
        $_cat_query = $model->get_site_category('', $where=array("category_code"=>$c_filter["category"]));
        if($_cat_query){
            while($_row3 = $_cat_query->fetch_assoc()) {
                array_push($_c, array("id"=>$_row3["attraction_site"]));
            }
        }
    }
    
    
   
    $res = $model->get_attraction_site($param, $filter, $_c);
    if($res){
        while($row = $res->fetch_assoc()) {
            $category = array();
            $activity = array();
            
            $cat_query = $model->get_site_category('', $where=array("attraction_site"=>$row["id"]));
            if($cat_query){
                while($row1 = $cat_query->fetch_assoc()) {
                    $get_cat = $model->get_category('', $where=array("code" => "'".$row1["category_code"]."'"));
                    
                    if($get_cat ){
                        $cat = $get_cat->fetch_assoc();
                        $util->m_log($get_cat);
                    }
                    array_push($category, array(
                            "code" => $row1["category_code"], 
                            "name" => $cat['name']
                        
                    )
                );
                }
            }
            $util->m_log($category);
           
            
            $act_query = $model->get_site_activity('', $where=array("attraction_site"=>$row["id"]));
            if($act_query){
                while($row2 = $act_query->fetch_assoc()) {
                    array_push($activity, array("detail" => array(
                            "name" => $row2["activity_name"],
                            "description" => $row2["description"],
                            )
                        )
                    );
                }
            }
           
            $coodinates = explode(",", $row["gps_coordinates"]);
                
            $wth = $weather->get_forecast('current', $coodinates[0], $coodinates[1]);
            
            $rate = getAttractionRating($row["reference"]);
           
            $site = array(
                "reference" => $row["reference"],
                "name" => $row["name"],
                "phoneNumber" => $row["phone_number"],
                "email" => $row["email"],
                "address" => $row["address"],
                "opening_time" => $row["opening_time"],
                "closing_time" => $row["closing_time"],
                "location" => $row["location"],
                "website" => $row["website"],
                "description" => $row["description"],
                "image" => $row["image"],
                "gpsCoordinates" => $row["gps_coordinates"],
                "rating" => round($rate, 2),
                "weather" => $wth,
                "category" => $category,
                "activities" => $activity
            );
            array_push($response, $site);
        }

    }
    return array(
        "status"=> "OK",
        "statusCode"=> "200",
        "response" => array("site" => $response)

    );
}


/**
 * 
 * @param $params: $params->reference
 * @return string[]
 */
function saveRating($params){
    $statusCode = 200;
    $message = "Success";
    $status = "OK";
    $reference = Null;
    $model = new ProfileModel();
    $util = new Utils();
    $param = array();
    
    $reference = $params->reference;
    $rate = $params->rate;
    
   
    
    if(!isset($reference)){
        $message = "Reference is required";
        $statusCode = 406;
        $status = "ERROR";
    }
    
    if(!isset($rate)){
        $message = "Rate is required";
        $statusCode = 406;
        $status = "ERROR";
    }
    
    $filter["reference"] = "'".$reference."'";
    
    $res = $model->get_attraction_site($param, $filter);
    if(!$res){
        $message = "An Attraction site with the reference number provided does not exist.";
        $statusCode = 406;
        $status = "ERROR";
    }
    
    $param = array(
        'attraction_reference' => $reference,
        'rate' => $rate
    );
    
    if($status == "OK"){
        $res = $model->save_attraction_rate($param);
    }
    
    return array(
        "status"=> $status,
        "statusCode"=> $statusCode,
        "message"=> $message,
    );
    
}


function getAttractionRating($reference){
    $statusCode = 200;
    $message = "Success";
    $status = "OK";
    $model = new ProfileModel();
    $util = new Utils();
    $filter['attraction_reference'] = '"'.$reference.'"';
   
    $res = $model->get_attraction_site_rate($param, $filter);
    $count = 0;
    $rate = 0;
    if($res){
        while($row = $res->fetch_assoc()) {
            $util->m_log($count.'Rate'.$rate);
            $count += 1;
            $rate += floatval($row["rate"]);
            
        }
    }
    $r = $rate / $count;
    return $r;
}


function getAttractionCategory($params){
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
    
    $get_cat = $model->get_category($param, $filter);
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


function getSubscribers($category){
    $client = new SoapClient("http://localhost/soap/subscriptionservice/?wsdl");
    
}



?>