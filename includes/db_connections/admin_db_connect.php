<?php 
//Use PDO statements
//$dsn = 'mysql:host=127.0.0.1;dbname=corp_db';
//$user = 'hari';
//$password = 'Gerrard08';
//$db = new PDO($dsn,$user,$password);
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dsn = 'mysql:host=127.0.0.1;dbname=corp_db';
$user = 'hari';
$password = 'Gerrard08';
try{
    $db = new PDO($dsn,$user,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Try again later");
}

?>