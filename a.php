<?php
include_once 'lib/nusoap.php';


function get_price($name)
{
    $products = [
        "book"=>20,
        "pen"=>10,
        "pencil"=>5
    ];
    
    foreach($products as $product=>$price)
    {
        if($product==$name)
        {
            return $price;
            break;
        }
    }
}


$server = new nusoap_server(); // Create a instance for nusoap server

$server->configureWSDL("Soap Demo","urn:soapdemo"); // Configure WSDL file

$server->register(
    "get_price", // name of function
    array("name"=>"xsd:string"),  // inputs
    array("return"=>"xsd:integer")   // outputs
    );

$server->service(file_get_contents("php://input"));




?>