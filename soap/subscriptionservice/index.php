<?php
require_once 'Subscriber.php';

ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("SubscriptionService.wsdl");
$server->addFunction("saveSubscriber");
$server->addFunction("getSubscriber");
$server->handle();
?>