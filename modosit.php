<?php
    session_start();
    require_once("dbolvasas.php");
    if(isset($_GET['id,']))
    {
        echo "Meghivva ID setelve";
        $db = getDb();
        $id = $_GET['id'];
        $statement = $db->prepare("SELECT * FROM AdatBazis WHERE ID = :ID");
        $statement->bindParam(":ID", $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
       
    }
    else{
        header("Location:index.php");
        echo "Nem találta az adott id-jű embert";
    }
?>

<!DOCTYPE html>
<html lang = "hu">
    <body>
        <form action="modositveglegesit.php" method = "POST">
            <input type = "hidden" name = "ID" value = <?=$id?>/>
            <label>Nev: <input type = "text" name = "nev"> </label>
            <label>Jegy: <input type = "number" name = "jegy"> </label>
            <input type = "submit" value = "Módosít" name = "Modositogomb">
        </form>
    </body>
</html>
