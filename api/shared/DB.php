<?php

class DB {

    static $DB_name='es_challenge';
    static $Connection;

    public static function connect() {

        if ( !self::$Connection) {
            self::$Connection = new PDO('mysql:host=localhost:8889;dbname=' . self::$DB_name, 'root', 'root');
        }

        return self::$Connection;
    }
    
}