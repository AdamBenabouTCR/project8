<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>create klant formulier 1</title>
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
<form action="createKlantFormulier2.php" method="post">
    <label for="klantnaamvak">Klantnaam</label>
    <input type="text" id="klantnaamvak" name="klantnaamvak"><br/>
    <label for="klantemailvak">Klantmail</label>
    <input type="text" id="klantemailvak" name="klantemailvak"><br/>
    <label for="klantpostcodevak">Klantpostcode</label>
    <input type="text" id="klantpostcodevak" name="klantpostcodevak"><br/>
    <label for="klantadresvak">Klantadres</label>
    <input type="text" id="klantadresvak" name="klantadresvak"><br/>
    <input type="submit">
</form>
</body>
</html>

