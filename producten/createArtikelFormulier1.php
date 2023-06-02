<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>create artikel formulier 1</title>
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
<h1>Create klant formulier 1</h1>
<form action="createArtikelFormulier2.php" method="post">
    <label for="productnaamvak">Productnaam</label>
    <input type="text" id="productnaamvak" name="productnaamvak"><br/>
    <label for="productomschrijvingvak">Product omschrijving</label>
    <input type="text" id="productomschrijvingvak" name="productomschrijvingvak"><br/>
    <label for="productprijsvak">Productprijs</label>
    <input type="text" id="productprijsvak" name="productprijsvak"><br/>
    <input type="submit">
</form>
</body>
</html>

