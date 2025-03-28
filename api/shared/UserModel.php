<?php

require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'DB.php');

class UserModel {

    public function getByUsername($username) {
        
        $db = DB::connect();
        /* 
        Notes:
        No input validation
        No error handling
        Susceptible to SQL injection
        No else statement for return false - added it myself
        */
        $result = $db->query('SELECT * FROM employees WHERE username=\'' . $username . '\'');
        
        if ( $result ) {
            $row = $result->fetchObject();
            return $row;
        }else{
            return false;
        }
    }

}