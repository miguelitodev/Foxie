<?php

# DB conf
define('DB_SGDB', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_etec');
define('DB_USER', 'tux');
define('DB_PASS', '@MySQL2001');

class Conn {

    public static function getConn() {
        try {
            $Conn = new PDO(DB_SGDB . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $Conn->exec('SET CHARACTER SET utf8');
            
            return $Conn;
        } catch(PDO_Exception $e) {
            echo $e->getMessage();
        }
    } 
}