<?php
function return_category($arg){
  $response = "";
  try{
    if(isset($arg->item) ){
      if (sizeof($arg->item) > 1){
        foreach ($arg->item as $variable) {
          $response = $response." , ".$variable->name;
        }
      }else{
         
        // print_r($arg->item->name);
        // die();
        $response = $arg->item->name;
      }
    }
    }catch (exception $e) {

    }


    echo $response;

}
 ?>
