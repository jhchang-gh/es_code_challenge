<?php

class DB {

    static $DB_name='es_challenge';
    static $Connection;

    public static function connect() {

        if ( !self::$Connection) {
            /* 
            Notes:
            Configured for local use and intended for demo only
            Hardcoded DB Username and Password should be called from a secure env file instead
            Connection should have error handling - timeouts
            PDO should have SSL encryption
            PHP file should not be directly accessible
            */
            self::$Connection = new PDO('mysql:host=localhost:8889;dbname=' . self::$DB_name, 'root', 'root');
        }

        return self::$Connection;
    }
    
}