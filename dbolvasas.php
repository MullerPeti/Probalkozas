<?php 
    function getDb($hostname = "127.0.0.1:3307", $username = "root", $password = "", $database = "TesztSchema")
    {
        try
        {
            $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
        catch (PDOException $e)
        {
            echo "". $e->getMessage();
        }
    }

