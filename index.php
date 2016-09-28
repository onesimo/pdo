<?php 
try{
	$conn = new \PDO('mysql:host=localhost;dbname=test_oo','root','');
}catch(\PDOException $e){
	echo "Error: Message: ".getMessage()." Code:".$e->getCode();
}
