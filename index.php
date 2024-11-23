<?php   
    session_start();
    require ("dbolvasas.php");
    $db = getDb();
    $result = $db->query("SELECT * FROM adatbazis");
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>"; // Üzenet megjelenítése HTML-ben
        unset($_SESSION['message']); // Üzenet törlése, hogy ne jelenjen meg újra
    }
?>

<!DOCTYPE html>
<html lang = "hu">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type ="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <h1>
            Itt a cím öregem

        </h1>
        <p id="firstparagraph" onmouseleave="myotherfcn()" onmouseover="myfcn()">
            Ez meg egy paragrafus

        </p>
        <button id = "btn1" onclick="clickfcn()"> Gomb1 </button>
        <article>
        Itt meg egy article mi a szar        
    </article>
        <table>
            <tr>
                <th> Neve </th>
                <th> Jegye </th>
            </tr>
            <?php while ($row = $result->fetchObject()) : ?>
                <tr>    
                    <td><?= $row->Nev?></td>
                    <td><?= $row->Eredmeny?></td>
                    <td><a href = "delete.php?id=<?=$row->ID?>">Töröl</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <p></p>
    <label> Nev: <input id = "Nevinput" type = "text"> </label>
    <label> Jegy: <input id = "Jegyinput" type = "number" max = 5 min = 0> </label>
    <button id = "btnbekuld" onclick = "clickfcn2()"> Hozzáadás </button>
    <script>
        function clickfcn()
        {
            console.log("Megnyomva");
        }
        function myfcn()
        {
            let p =document.getElementById("firstparagraph");
            p.style.color = 'blue';
        }
        function myotherfcn()
        {
            let p =document.getElementById("firstparagraph");
            p.style.color = 'yellow';
        }
        function clickfcn2()
        {
            let p = document.getElementById("Nevinput"); // Input mező a névhez
            let b = document.getElementById("Jegyinput"); // Input mező a jegyhez
            // Input értékek lekérése a value segítségével
            let nev = p.value; 
            let jegy = b.value;
            console.log(nev);
            $.ajax({
            url: "adatbekuldes.php", // PHP fájl, amely feldolgozza az adatokat
            method: "POST",
            data: {
                nev: nev,
                jegy: jegy
            },
            success:function(response){
                window.location.reload();
            }
            });
        }
    </script>
    </body>
</html>