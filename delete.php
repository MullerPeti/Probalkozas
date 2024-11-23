<?php
session_start();
require_once("dbolvasas.php");
if(isset($_GET['id']))
{
    $db = getDb();
    $id = $_GET['id'];
    $delStatement = $db->prepare("DELETE FROM adatbazis WHERE ID = :id");
    $delStatement->bindParam(':id', $id, PDO::PARAM_INT);
    $delStatement->execute();
    
}
header("Location:index.php");
