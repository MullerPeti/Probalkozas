<?php
session_start();
require_once("dbolvasas.php");
if(isset($_POST['ID']) && isset($_POST['nev']) && isset($_POST['jegy']))
{
    $id = $_POST['ID'];
    $jegy = $_POST['jegy'];
    $nev = $_POST['nev'];
    $db = getDB();
    $statement = $db->prepare("UPDATE AdatBazis SET Nev = :nev, Eredmeny = :jegy WHERE ID = :id");
    $statement ->bindParam(":id", $id, PDO::PARAM_INT);
    $statement ->bindParam(":nev", $nev, PDO::PARAM_STR);
    $statement ->bindParam(":jegy", $jegy, PDO::PARAM_INT);
    $statement->execute();
}
header("Location:index.php");
