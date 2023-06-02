<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Update artikel 3</title>
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

<h1>Artikel update</h1>
<p>Dit formulier is om artikelgegevens te wijzigen</p>

<?php

require "../src/producten/Product.php";
$prodId = $_POST ["prodidvak"];
$prodNaam = $_POST ["prodnaamvak"];
$prodOmschrijving = $_POST ["prodomschrijvingvak"];
$prodPrijs= $_POST ["prodprijsvak"];



$product1 = new Product($prodId, $prodNaam, $prodOmschrijving, $prodPrijs);
$product1->updateProduct2();
?>
</body>
</html>

