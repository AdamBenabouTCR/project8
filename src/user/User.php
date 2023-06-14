<?php
include "./src/klant/oopconnect.php";
session_start();

class User
{
    protected $userId;
    protected $usermail;
    protected $password;

    public function __construct($userId = NULL, $usermail = NULL, $password = NULL)
    {
        global $conn;

        $this->userId = $userId;
        $this->usermail = $usermail;
        $this->password = $password;

        $this->conn = $conn;
    }

    public function set_userId($userId)
    {
        $this->userId=$userId;
    }

    public function set_usermail($usermail)
    {
        $this->usermail=$usermail;
    }

    public function set_password($password)
    {
        $this->password=$password;
    }

    public function createUser()
    {
        require "./src/klant/oopconnect.php";

        $userId = NULL;

        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

        $passwordHash = $this->password;

        $sql = $conn->prepare
        ("
        insert into users values(:userID, :userMail, :password)
        ");

        $sql->bindParam(":userID", $userID);
        $sql->bindParam(":userMail", $this->userMail);
        $sql->bindParam(":password", $passwordHash);
        $sql->execute([
            "userID"=>$userID,
            "userMail"=>$this->usermail,
            "password"=>$passwordHash,
        ]);
        echo "User toegevoegd<br/>";

        echo "Account aangemaakt";
    }


    public function login()
    {

        require "./src/klant/oopconnect.php";

        $sql = $conn->prepare("select * from users where userMail=:userMail");
        $sql->bindParam(":userMail", $this->usermail);
        $sql->execute();
        echo "password:" . $this->password . "<br/>";
        echo "usermail:" . $this->usermail . "<br/>";
        foreach($sql as $user)
        {
            //echo $this->password . "<br/>";

            echo $this->usermail . "<br/>";

            echo "gevonden password:" . $user["password"] . "<br/>";

            //if (password_verify($this->password, $user["password"]))
            if ($this->password = $user["password"])
            {
                echo "<a href='mainmenu.php'>goed ingelogd</a><br/>";
            }
            else
            {
                echo "Niet ingelogd, de gegevens kloppen niet!<br/>";
            }
        }

        /* if (isset($_POST["submit"])) {
                $userMail = $this->get_usermail();
                $password = $this->get_password();


                $result = $this->sqlMetResult(["userMail"=>$userMail, "password"=>$password]);

                if (isset($result[0]->userRol) == 1) {
                    echo "correcte gegevens";
                    $_SESSION["userRol"] = $result[0]->userRol;
                    echo $_SESSION["userRol"];

                    if ($_SESSION["userRol"] == 1) {
                        header("Location: ./mainmenu.php");
                    }
                    if ($_SESSION["userRol"] == 2) {
                        header("Location: ./mainmenu.php");
                    }
                    if ($_SESSION["userRol"] == 3) {
                        header("Location: ./mainmenu.php");
                    }

                } else {
                    echo "verkeerde gegevens";
                }
        */
    }

    public function allUsers()
    {
        require "./src/klant/oopconnect.php";
        $sql = $conn->prepare
        ("
        select * from users
        ");
        $sql->execute();
        foreach($sql as $user)
        {
            echo $this->usermail=$user["userMail"]. " - ";
            echo $this->password=$user["password"]. "<br/>";
        }
    }

    public function afdrukkenUser()
    {
        echo $this->get_usermail();
        echo "<br/>";
        echo $this->get_password();
    }

    public function get_userId()
    {
        return $this->userId;
    }

    public function get_usermail()
    {
        return $this->usermail;
    }

    public function get_password()
    {
        return $this->password;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function get_usernummer()
    {
        return $this->usernummer;
    }

    public function get_userrol()
    {
        return $this->userrol;
    }
}
?>
