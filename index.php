<?php 

require_once "IConn.php";
require_once "Conn.php";
require_once "IProduct.php";
require_once "Product.php";
require_once "ServiceProduct.php";

$db = new Conn("localhost","test_oo", "root","");
$Product = new Product;

$service = new ServiceProduct($db,$Product);

print_r($service->find(4))