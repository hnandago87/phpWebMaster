<?php
$dbhost = "127.0.0.1";
$dbuser = 'hari';
$dbpass = 'Gerrard08';
$dbname = 'corp_db';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if(mysqli_connect_errno()){
	die("DB connection failed: ". mysqli_connect_error()." (".mysqli_connect_errno." )");
}
?>