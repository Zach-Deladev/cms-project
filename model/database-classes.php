<?php

// Database class to establish connection to the database and to be extended by other classes
class Database
{
    protected function connection()
    {
        // try catch to establish connection to database
        try {
            $server = "sql303.epizy.com";
            $username = "epiz_34038138";
            $password = "yelKNKdc3OgkQTX";
            $dbname = "epiz_34038138_cmsproject";

            $dsn = "mysql:host=$server;dbname=$dbname";
            $conn = new PDO($dsn, $username, $password);

            // Set PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
}
