<?php

class Db
{
    private static $instance  = null; // should be static
    private $connection;

    public static function getInstance () {
        if (is_null(self::$instance)) {
            self::$instance = new self ();
        }
        return self::$instance;
    }
    //
    private function __construct(){
        $this->connection = new mysqli('localhost', 'root', '', 'jsstore_db');
    }

    private function __clone(){
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }
}

    // require 'Db.php';
    $db = Db::getInstance(); //
    $q = $db->query("SELECT * FROM products"); // select query corrected


    while($row = $q->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["description"]. "<br>";
    }


