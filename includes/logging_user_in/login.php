<?php 
$dsn = 'mysql:host=127.0.0.1;dbname=corp_db';
$user = 'hari';
$password = 'Gerrard08';
try{
    $db = new PDO($dsn,$user,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Try again later");
}
    //write pdo query to validate user id and password
    function selectUser($user_email){
        global $db;
        $query = 'SELECT U.userName, U.userPass, T.type_name FROM users AS U INNER JOIN user_type AS T ON U.type = T.type WHERE U.userEmail = :email';
        $stmt = $db->prepare($query);
        $result = $stmt->execute(array(':email'=>$user_email));
        $user   = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    //select passwordhash for the given user
    function selectHash($user_email){
        global $db;
        $query = 'SELECT hash FROM password_hash WHERE userName = (SELECT userName FROM users WHERE userEmail = :email)';
        $stmt = $db->prepare($query);
        $result = $stmt->execute(array(':email'=>$user_email));
        $user_hash = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user_hash;
    }
?>