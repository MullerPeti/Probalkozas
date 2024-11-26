<?php
    session_start();
    require_once("dbin.php");
    $db = getDB();
    $result1 = $db->query("SELECT hirek.cim as cim, hirek.szoveg as szoveg, hirek.datum as datum from hirek where hirek.datum > '2024-01-01' order by hirek.datum");
    $result2 = $result1;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel = "stylesheet" type = "text/css" href = "style.css">

    </head>
    <body>
        <div id = "keret">
            <h1 >
                Hírek
            </h1>
            Müller Péter TM1S67
            <div id = "tartalom">
            <?php while($row = $result1->fetchObject()) : ?>
                <h2 id = "cikkcim">
                    <?= $row->cim?>
                </h2>
                     <?= $row->szoveg?>
                <h3 id = "hozzaszolascim">
                    Hozzászólások
                </h3>

                <ul>
                    <?php 
                        $result2 = $db->query("SELECT h.szerzo as szerzo, h.hozzaszolas as szoveg from hozzaszolas h inner join hozzaszolasok
                        on hozzaszolasok.hozzaszolasid = h.id inner join hirek on 
                        hirek.id = hozzaszolasok.hirid where hirek.cim = '$row->cim'");
                        while($row2 = $result2->fetchObject()) :
                    ?>
                        <li>
                            <?=$row2->szerzo?> : <?= $row2->szoveg?>
                        </li>
                    <?php endwhile; ?>
                    <?php if($result2->rowCount() <1) : ?>
                        <li>
                            Nincs hozzászólás
                        </li>
                    <?php endif; ?>
                </ul>
                <?php endwhile;?>
            </div>
            <form action = "comment.php">
                        <label>Név <br> <input type = "text" name = "nev" ></label>
                        <label>Szöveg <br> <input type = "text" name = "nev" ></label>
                        <input type = "submit" value="Elküld" name = "valami">
            </form>
        </div>
    </body>
</html>