<?php

require '../config.php';

class DB
{
    public static function getConn()
    {
        try {
            $Conn = new PDO(DB_SGDB . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $Conn->exec('SET CHARACTER SET utf8');

            return $Conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
