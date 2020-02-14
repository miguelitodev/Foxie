<?php

require_once '../config.php';

class Conn {

    public static function getConn() {
        $Conn = new PDO(DB_SGDB . ':' . DB_HOST . ';' . 'dbname=' . DB_NAME, DB_USER, DB_PASS);
        $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $Conn->exec('SET CHARACTER SET utf8');
        
        return $Conn;
    } 

}