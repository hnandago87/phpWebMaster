<?php
    try {
        require_once("admin_db_connect.php");
    } catch (PDOException $e) {
        die("Try again later");
    }
    //function to create new user profile
    function insertNewUser($name, $email,$password, $account_type, $timestamp, $hash){
        global $db;
     $query = $db->prepare('INSERT INTO users(userEmail,userName,userPass,createdDate,type) VALUES (:userE, :userN, :userP, :userT, (SELECT type FROM user_type WHERE type_name = :type))');

    # If we leave out the third parameters, it is set to
    # PDO::PARAM_STRING by default
    $query->bindParam(':userE', $email);
    $query->bindParam(':userN', $name);
    $query->bindParam(':userP', $password);
    $query->bindParam(':type', $account_type);
    $query->bindParam(':userT', $timestamp);
        
    
    #write query for password hash
    $passhash = $db->prepare('INSERT INTO password_hash( userName,hash) VALUES(:userN, :hash)');
        $passhash->bindParam(':userN', $name);
        $passhash->bindParam(':hash', $hash);
        
//        # Execute the query as transaction
        $db->beginTransaction();
        $query->execute();
        if(!$query->rowCount()){
            $db->rollBack();
        } else{
            $passhash->execute();
            if(!$passhash->rowCount()){
                $db->rollBack();
            } else{
                $db->commit();
            }
        }
        return $db->lastInsertId(); 
    }
    //function to store hash 
    function storeHash($user_name, $hashed_salt){
        $store_hash = "INSERT INTO password_hash(userName,hash) VALUES(:user, :hash_salt)";
        $insert_query = $db->prepare($store_hash);
        $insert_query->bindParam(':user', $user_name);
        $insert_query->bindParam(':hash_salt', $hashed_salt);
        return $insert_query;
    }
    
    

//if($db){
//    $sql = 'SELECT * FROM loggedUsers';
//    $result = $db->query($sql);
//    while($row = $result->fetch()){
//    echo $row['firstName']." ".$row['lastName'];
//}
//}elseif(isset($error)){
//    echo "bad";
//}
////
////$sql1 = 'SELECT * FROM testCategory';
////    $result1 = $db->query($sql1);
////    $all = $result1->fetchAll(PDO::FETCH_NUM);
////    print_r($all);
//$userE = 'hk@a.com';
//$userN = 'asd asdf';
//$userP = 'asdasd11';
//$type = 'Administrator';

 //$store_hash = 'INSERT INTO password_hash(userName,hash) VALUES(?, ?)';
//$query = $db->prepare('INSERT INTO users(userEmail,userName,userPass,createdDate,type) VALUES (:userE, :userN, :userP, now(), (SELECT type FROM user_type WHERE type_name = :type))');
//
//# If we leave out the third parameters, it is set to
//# PDO::PARAM_STRING by default
//$query->bindParam(':userE', $userE);
//$query->bindParam(':userN', $userN);
//$query->bindParam(':userP', $userP);
//$query->bindParam(':type', $type);
//
//
//
//# Execute the query
//$query->execute();
//        $insert_query = $db->prepare('INSERT INTO password_hash(userName,hash) VALUES(?, ?)');
//        $insert_query->bindParam(1, $user_name);
//        $insert_query->bindParam(2, $hashed_salt);
//        $insert_query->execute();   
   // echo $insert_query;
?>