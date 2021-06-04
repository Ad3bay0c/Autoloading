<?php

namespace App\Library;

use App\Config\Database;

class Blog {
    const DB_USER = 'blog';

    //static function to create new item to Blog table
    static public function insert(array $data) {
        $db = Database::connect();

        $keyData = array ();
        $valueData = "";

        foreach ($data as $key => $value) {
            array_push($keyData, $key);
            $valueData .= "'".$value."',";
        }

        $data = implode(",", $keyData);
        $value = explode(',', $valueData);
        array_pop($value);
        $valueData = implode(',', $value);

        $sql = $db->query("INSERT INTO " . self::DB_USER. "(".$data.") VALUES(". $valueData. ")")
        or die(mysqli_connect_error());
        if($sql) {
            return true;
        } else {
            return false;
        }

    }

    //static function to update item in Blog table
    static public function update(array $data, $id){
        $db = Database::connect();

        if(count($data) > 0) {
            $valueData = "";

            foreach ($data as $key => $value) {

                $valueData .= $key. "= '".$value."',";
            }

            $value = explode(',', $valueData);
            array_pop($value);
            $valueData = implode(',', $value);


//        $title = $data['title'];
//        $description = $data['description'];
            $sql = $db->query("UPDATE ". self::DB_USER. " SET ". $valueData . " WHERE id = '$id'");
            if($sql) {
                return true;
            } else {
                return false;
            }
        }
    }

    //static function to delete from Blog table
    static public function delete($id) {
        $db = Database::connect();

        if( $db->query("DELETE FROM ".self::DB_USER. " WHERE id = '$id'")){
            return true;
        } else {
            return false;
        }
    }

    //static function to get Details of an item from Blog table
    static public function getDetails($id) {
        $db = Database::connect();

        $sql = $db->query("SELECT * FROM ". self::DB_USER. " WHERE md5(id) = '$id'");

        return $sql->fetch_object();
    }

    // fetches all the blogs from database;
    static public function getAll() {
        $db = Database::connect(); //Connect to database

        $blogs = array();
        $sql = $db->query("SELECT * FROM blog ORDER BY sn DESC");
        while($row = $sql->fetch_object()) {
            array_push($blogs, $row);
        }
        return $blogs;
    }
}