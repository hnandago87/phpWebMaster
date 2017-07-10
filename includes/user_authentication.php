<?php
require("user_registration_login_function.php");
    //function to create hash
    function createHash($password, $salt){
        $hashed_salt =  hash('sha256', $salt);
        $hashed_password = hash('ripemd160', 'Hari@1991'.$hashed_salt);
        return array($hashed_salt, $hashed_password);
    }
    
    //validate registration for name
    function validName($name){
        if(strlen(trim($name))>4 && !empty($name)){
            return true;
        }
        else return false;
    }
    function validateEmail($email){
         $message = [];
        if(empty($email)){
            $message['empty'] = 'Email cannot be empty';
        } else{
            if(count(explode("@", $email))==2){
                $emailArray = explode("@", $email);
                if(count(explode('.', $emailArray[1]))<2){
                    $message['format'] = 'Enter Valid email';
                } 
            } else{
                    $message['format'] = true;
                }
        }
        return $message;
    }
    function validatePassword($password){
         $message = [];
        if(empty($password)){
            $message['pEmpty'] = 'Password cannot be empty';
        } else{
                if(strlen($password)>4 && preg_match('/[a-zA-Z0-9]/', $password)){
                    $message['valid'] =true;
                } else{
                    $message['valid'] = false;
                }
            }
        return $message;
    }
    function passwordMatch($password, $repeat){
        if(strcmp($password,$repeat)==0){
            return true;
        }
        else return false;
    }
    function accountTypeValidation($type){
        if(strcmp($type, "") == 0){
            return false;
        } else true;
    }
    function registerUser($email_error, $password_error, $password_match_error, $name_error, $value){
        if($name_error && $password_match_error&& $password_error['valid'] && empty($email)){
            $time_stamp = date('Y-m-d H:i:s');
            $hashed_salt_password = createHash($value['password'],$time_stamp);
         return array(insertNewUser ($value['name'],$value['email'], $hashed_salt_password[1], $value['account_type'], $time_stamp, $hashed_salt_password[0]));
            //storeHash($value['name'], $hashed_salt_password[0]);
        }
    }
?>