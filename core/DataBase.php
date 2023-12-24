<?php
class DataBase{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";

    public static function connect()
    {
        try {
            $conn = new PDO(
                "mysql:host= " . self::$servername . ";dbname=youcode",
                self::$username,
                self::$password
            );
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $conn;
    }
}









?>