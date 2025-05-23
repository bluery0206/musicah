<?php 

class Database {
    protected function connect(): PDO {
        $hname  = "localhost";
        $uname  = "root";
        $pwd    = "";
        $dbname = "musicah";
        
        $dsn = "mysql:host=$hname;dbname=$dbname";
        
        $conn = new PDO($dsn, $uname, $pwd);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        
        return $conn;
    }
}