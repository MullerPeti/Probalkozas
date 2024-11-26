<?php
    function getDB($hostname = "127.0.0.1:3307",$username = "root",$password = "",$database="Hirportal") {
        try{
            $db = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
        catch(PDOException $e) {
            echo "could not connect to database". $e->getMessage();
        }
    }
