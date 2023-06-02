<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>update klant formulier 1</title>
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
<h1>Update klant formulier 1</h1>
<p>Hier kunt u klanten updaten</p>
<form action="updateKlantFormulier2.php" method="post">
    Welke klantID wilt u toepassen?

    <input type="text" name="klantidvak"> <br>
    <input div class="button" type = "submit">

</form>
<footer>
    <h1>Contactgegevens</h1>
</footer>
</body>
</html>

