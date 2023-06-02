<?php
$servername = "localhost";
$dbname = "gameshop";
$username = "root";
$password = "";

try
{
    $conn = new PDO(
        "mysql:host=$servername;
             dbname=$dbname",
             $username,
             $password
    );
    echo "Connectie gelukt <br/>";
}
catch(PDOException $exception)
{
    echo "Connectie mislukt <br/>". $exception->getMessage();
}
?>
