<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Klant menu</title>
    <style>
        .button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #ce000c;
            width: 25%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
            background: #fc8474;
        }
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
<body>
<header>
    <ul>
        <li><a href="../mainmenu.php">Menu</a></li>
        <li><a href="../index.php">Uitloggen</a></li>
    </ul>
</header>
welkom<br>
<div class="button"><a href="createKlantFormulier1.php">Create</a><br></div>
<div class="button"><a href="readKlant.php">Read</a><br></div>
<div class="button"><a href="updateKlantFormulier1.php">Update</a><br></div>
<div class="button"><a href="deleteKlantFormulier1.php">Delete</a><br></div>
<div class="button"><a href="searchKlantFormulier1.php">Search</a><br></div>
</body>
</html>
