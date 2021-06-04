<?php
namespace App\Config;

use App\Config\DbConnect;

class Database extends DBConnect {

    static public function connect() {
        $db = new \mysqli(DBConnect::$dbHost, DBConnect::$dbUser, DBConnect::$dbPass,
            DBConnect::$dbName);

        if($db->connect_errno) {
            die("Error Connecting to Database :". $db->connect_error);
        }
        return $db;
    }
}