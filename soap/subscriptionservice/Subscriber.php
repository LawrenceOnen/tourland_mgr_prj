<?php
require_once 'SubscriptionModel.php';
require_once 'Validator.php';
require_once 'Utils.php';

function saveSubscriber($params){
    $statusCode = 200;
    $message = "Success";
    $reference = Null;
    $model = new SubscriptionModel();
    $util = new Utils();
    $validator = new Validator();
    
    $name = $params->name;
    $country = $params->country;
    $email = $params->email;
    $subscriptionDate = $params->subscriptionDate;
    $siteCategory = $params->siteCategory; //object
    
    if(!isset($name)){
        $message = "Subscribers Name is required";
        $statusCode = 406;
    }
    
    if(!isset($country)){
        $message = "Country Code is required";
        $statusCode = 406;
    }
    
    if(isset($email) && !$validator->validate_email($email)){
        $message = "Invalid Email Address provided";
        $statusCode = 406;
    }
    
    $filter["email"] = "'".$email."'";
    
    $res = $model->get_subscriber(null, $filter);
  
    if(isset($res)){
        $message = "An User with the email address provided exist.";
        $statusCode = 406;
        $status = "ERROR";
    }
    
    $param = array(
        'reference' => $util->uuid(),
        'name' => $name,
        'country' => $country,
        'email' => $email,
        'subscription_date' => $subscriptionDate,
    );
    
    $reference = $param['reference'];
    
    if($status != "ERROR"){
        $res = $model->save_subscriber($param);
        
        if (sizeof($siteCategory->category) > 1){
            foreach ($siteCategory->category as $act){
                $util->m_log("Category ".$act);
                $act_params = array(
                    'subscriber_reference' => $reference,
                    'category_code' => $act
                );
                $model->save_site_category($act_params);
            }
        }else{
            $act_params = array(
                'subscriber_reference' => $reference,
                'category_code' => $siteCategory->category
            );
            $model->save_site_category($act_params);
        }
    }
    
    return array(
        "status"=>$status,
        "statusCode"=>$statusCode,
        "message"=>$message,
    );
}

function getSubscriber($params){
    
    $statusCode = 200;
    $message = "Success";
    $model = new SubscriptionModel();
    $util = new Utils();
    $response = array();
    $filter = array(); //associate array
    $param = array(); //single array
    $subscriber = array(); //single array
    
    $code = $params->reference;
    
    if(isset($code) and $code!=""){
        $filter["reference"] = "'".$reference."'";
    }
    
    $get_sub = $model->get_subscriber($param, $filter);
    if($get_sub){
        while($row1 = $get_sub->fetch_assoc()) {
            $category = array();
            $cat_query = $model->get_site_category('', $where=array("subscriber_reference" => "'".$row1["reference"]."'"));
            if($cat_query){
                while($row2 = $cat_query->fetch_assoc()) {
                    array_push($category,  $row2["category_code"]
                    );
                }
            }
           
            array_push($subscriber, array(
                "reference" => $row1["reference"],
                "name" => $row1['name'],
                "email" => $row1['email'],
                "country" => $row1['country'],
                "siteCategory" => array("category" => $category),
                "subscriptionDate" => $row1['subscription_date']
            )
            );
        }
    }
    
    return array(
        "status"=> "OK",
        "statusCode"=> "200",
        "response" => array("subscriber" => $subscriber)
        
    );
}

function getSubscriberByCategory($param){
    $statusCode = 200;
    $message = "Success";
    $model = new SubscriptionModel();
    $util = new Utils();
    $response = array();
    $filter = array(); //associate array
    $param = array(); //single array
    $subscriber = array(); //single array
    
    $code = $params->category;
    
    
    
    
}

?>