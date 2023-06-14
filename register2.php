<!DOCTYPE HTML>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
        <li><a href="index.php">Inloggen als je een account heb</a></li>
    </ul>
</header>
<body>
<h1>Account aanmaken</h1>

<?php
require "src/user/User.php";

$userId= NULL;
$usermail=$_POST["usermailvak"];
$password=$_POST["passwordvak"];

$user1 = new User($userId, $usermail, $password);
$user1->createUser();
?>
</body>
</html>
