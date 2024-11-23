<?php
session_start();
require_once("dbolvasas.php");
if(isset($_POST['nev']) && isset($_POST['jegy'])) {
    try{    
        $db = getDb();
        $statement = $db->prepare("INSERT INTO AdatBazis(Nev,Eredmeny) VALUES(:nev,:jegy)");
        $statement->bindParam(":nev", $_POST["nev"], PDO::PARAM_STR);
        $statement->bindParam(":jegy", $_POST["jegy"], PDO::PARAM_INT);
        $statement->execute();
        $_SESSION['message'] = 'Sikeres beszúrás!';
    } catch (PDOException $e) {
        // Itt sem használsz echo-t, hanem egy hibaüzenetet menthetsz el
        $_SESSION['message'] = 'Hiba történt: ' . $e->getMessage();
    }
} else {
    $_SESSION['message'] = 'Hiányzó paraméterek!';
}

// Header a fájl végén, miután beállítottad a session üzenetet
header("Location: index.php");
exit(); 