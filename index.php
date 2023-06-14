<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="styles/indexstyle.css">
</head>
<body>

<div class="login-page">

    <!---
    <div class="imgcontainer">
        <img src="assets/img_logo.png" alt="Avatar" class="avatar">
    </div>
    -->
    <div class="form">
        hopla
        <form id="log-in" action="index2.php" method="post" accept-charset="UTF-8">
            <label>Emailadres
                <input type="text" name="emailvak"/>
            </label>
            <label>Wachtwoord
                <input type="password" name="passwordvak"/>
            </label>
            <button>login</button>
            <input type="submit" name="submit">
            <p class="message">Nog geen account?<a href="register.php">Registreer</a></p>
        </form>
    </div>
</div>
</body>
<?php
/*require "src/user/User.php";
echo "<pre>".print_r($_POST, true)."</pre>";
$userMail=$_POST["emailvak"];
$password=$_POST["passwordvak"];


$user1 = new User($userMail, $password);
$user1->login();*/
?>
</body>
</html>
