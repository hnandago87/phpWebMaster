<?php
    require("login.php");
    //function to validate the username and password
    function getLoginDetails($email){
        //add some protection against user data
        $user = selectUser($email); 
        return $user;
    }
    //Apply salt for the password
    function saltUserPass($user_email, $password){
        $hash = selectHash($user_email);
        $salted_password = hash('sha256', $password.$hash['hash']);
        return $salted_password;
    }
    function getSessionID($email, $password){
        $user_in_db = getLoginDetails($email);
        $user_to_validate = NULL;
        if(isset($user_in_db) && !empty($user_in_db)){
            $user_to_validate = saltUserPass($email,$password);
            if(strcmp($user_to_validate,$user_in_db['userPass']) ===0){
                return true; 
            } else { 
                return false; 
            }
        } else {
            return "No User Found";
        } 
    }
?>