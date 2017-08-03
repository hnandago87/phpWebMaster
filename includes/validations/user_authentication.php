<?php
    
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
    
?>