<?php
$dbhost = 'localhost'; 	// host
$dbname = 'budiman';  	// database
$dbuser = 'root';       // username         
$dbpass = '';           // password     
try{
  $db = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
  die($e->getMessage());
}