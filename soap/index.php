<?php
// require_once 'AttractionSite.php';
// require_once 'ServiceProviders.php';

// ini_set("soap.wsdl_cache_enabled", "0");
// $server = new SoapServer("ProfilingService.wsdl");
// $server->addFunction("getAttractionSite");
// $server->addFunction("saveAttractionSite");
// $server->addFunction("saveRating");

// $server->addFunction("getServiceProvider");
// $server->addFunction("saveServiceProvider");
// $server->handle();
echo 'Access not allowed';

$array = array(
    'fruit1' => 'apple',
    'fruit2' => 'orange',
    'fruit3' => 'grape',
    'fruit4' => 'apple',
    'fruit5' => 'apple');

// this cycle echoes all associative array
// key where value equals "apple"
while ($fruit_name = current($array)) {
    if ($fruit_name == 'apple') {
        echo key($array).'<br />';
    }
    next($array);
}

foreach ($array as $key => $value){
    echo $value;
}
?>