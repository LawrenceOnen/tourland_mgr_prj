<?php
require_once 'AttractionSite.php';
require_once 'ServiceProviders.php';

ini_set("soap.wsdl_cache_enabled", "0");
$server = new SoapServer("ProfilingService.wsdl");
$server->addFunction("getAttractionSite");
$server->addFunction("getAttractionCategory");
$server->addFunction("getProviderCategory");
$server->addFunction("saveAttractionSite");
$server->addFunction("saveRating");

$server->addFunction("getServiceProvider");
$server->addFunction("saveServiceProvider");
$server->handle();
?>