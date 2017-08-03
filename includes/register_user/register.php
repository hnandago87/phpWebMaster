<?php 
    include("user_registration_login_function.php");
    //function to create hash
    function createHash($password, $salt){
        $hashed_salt =  hash('sha256', $salt);
        $hashed_password = hash('sha256', $password.$hashed_salt);
        return array($hashed_salt, $hashed_password);
    }
    //function to register the user in the database
    function registerUser($email_error, $password_error, $password_match_error, $name_error, $value){
        if($name_error && $password_match_error&& $password_error['valid'] && empty($email)){
            $time_stamp = date('Y-m-d H:i:s');
            $hashed_salt_password = createHash($value['password'],$time_stamp);
         return array(insertNewUser ($value['name'],$value['email'], $hashed_salt_password[1], $value['account_type'], $time_stamp, $hashed_salt_password[0]));
            //storeHash($value['name'], $hashed_salt_password[0]);
        }
    }
    
?>