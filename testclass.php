<?php

/*$config = parse_ini_file('configs/db.ini');
if(is_array($config)){
    $link = mysqli_connect($config['host'], $config['username'], $config['password'], $config['dbname']);
}*/

class Db
{

    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'jsstore_db';

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
        $this->connection = new mysqli($this->_host, $this->_username,
            $this->_password, $this->_database);

       // Error handling
        if (mysqli_connect_errno()) {
            die("Database connection failed: " .
                mysqli_connect_error() . " (" .
                mysqli_connect_errno() . ")"
            );
        }
    }

    private function __clone(){
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }
}

    // require 'Db.php';
    $db = Db::getInstance(); //
    $sql = "SELECT * FROM products";
    $q = $db->query($sql); // deleted comments


    while($row = $q->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["description"]. "<br>";
    }


