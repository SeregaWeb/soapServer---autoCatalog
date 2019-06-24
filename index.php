<?php
ini_set("soap.wsdl_cache_enabled", "0");

include('libs/db.php');
include('libs/AutoShop.php');


$server = new SoapServer("http://tc.geeksforless.net/~user7/soap/soapServer/Calalogue1.wsdl");
$server->setClass("AutoShop");
$server->handle();




