<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Update klant 3</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #f44336;
        }

        .active {
            background-color: #04AA6D;
        }
    </style>
</head>
<header>
    <ul>
        <li><a href="../mainmenu.php">Menu</a></li>
        <li><a href="../index.php">Uitloggen</a></li>
    </ul>
</header>
<body>

<h1>Klant update</h1>
<p>Dit formulier is om klantengegevens te wijzigen</p>

<?php

require "../src/klant/Klant.php";
$klantid = $_POST ["klantidvak"];
$klantnaam = $_POST ["klantnaamvak"];
$klantemail = $_POST ["klantemailvak"];
$klantadres= $_POST ["klantadresvak"];
$klantpostcode = $_POST ["klantpostcodevak"];



$klant1 = new Klant($klantid, $klantnaam, $klantemail, $klantadres, $klantpostcode);
$klant1->updateKlant2();
?>
</body>
</html>

