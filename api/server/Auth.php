<?php
// Prevent direct access to php file

require_once( __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'shared' . DIRECTORY_SEPARATOR . 'UserModel.php');


class Auth {

    public function verifyCredentials($username, $password) {

        //no input validation

        $model = new UserModel();
        $user_data = $model->getByUsername($username);

        //Added a catch for username is not found
        if(!$user_data) return false;

        $db_password = $user_data->password;

        if ( password_verify($password, $db_password) ) {
            return $user_data->id;
        }


        return false;
    }

    public function doLogin( $username, $password ) {
        // See notes in next function
        if ( $id = $this->verifyCredentials($username, $password) ) {
            session_start();
            $_SESSION['user_id'] = $id;
            return [ 'success' => true, 'id' => $id ];
        }
        else {
            return ['success' => false, 'msg' => 'Login failed'];
        }
        
    }

    public function requireLogin() {
        /*
        Notes:
        Improve authentication process - should be unique authentication token
        Hashed, expiration, ip address, etc.
        */
        session_start();
        if ( empty($_SESSION['user_id']) ) {
            header("HTTP/1.1 403 Access Denied");
            exit;
        }

        return [ 'success' => true, 'id' => $_SESSION['user_id'] ];
    }

}