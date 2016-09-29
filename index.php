<?php 


error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "IConn.php";
require_once "Conn.php";
require_once "IProduct.php";
require_once "Product.php";
require_once "ServiceProduct.php";

$db = new Conn("127.0.0.1","test_oo", "phpmyadmin","some_pass");
$product = new Product;

$product->setId(1)
        ->setName("JS Course")
        ->setDesc("Javascript C");
 
$service = new ServiceProduct($db,$product);

//$service->save();
//print_r($service->find(3));
//print_r($service->delete(1));
print_r($service->update(3));


echo "teste";
