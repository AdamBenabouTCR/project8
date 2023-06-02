<?php
require "Persoon.php";
class Klant extends Persoon
{
    protected $klantemail;

    public function __construct($klantid = NULL, $klantnaam = NULL, $klantemail = NULL, $klantadres = NULL, $klantpostcode = NULL)
    {
        $this->klantid = $klantid;
        $this->klantnaam = $klantnaam;
        $this->klantemail = $klantemail;
        $this->klantadres = $klantadres;
        $this->klantpostcode = $klantpostcode;
    }


    public function set_klantemail($klantemail)
    {
        $this->klantemail = $klantemail;
    }

    /*public function voorstellen()
    {
        echo "Mijn naam is " . $this->get_klantnaam() .
            ", Ik doe de opleiding " . $this->get_klantemail() . ", Mijn postcode is " . $this->get_klantpostcode();
    }*/

    public function afdrukken()
    {
        echo $this->get_klantnaam();
        echo "<br/>";
        echo $this->get_klantemail();
        echo "<br/>";
        echo $this->get_klantadres();
        echo "<br/>";
        echo $this->get_klantpostcode();
        echo "<br/>";
        echo "<br/>";
    }

    public function createKlant()
    {
        require "oopconnect.php";

        $klantID = NULL;
        $klantNaam = $this->get_klantnaam();
        $klantMail = $this->get_klantemail();
        $klantAdres = $this->get_klantadres();
        $klantPostcode = $this->get_klantpostcode();

        $sql = $conn->prepare("insert into klant values(:klantID, :klantNaam, :klantMail, :klantAdres,:klantPostcode)");

        $sql->bindParam(":klantID", $klantID);
        $sql->bindParam(":klantNaam", $klantNaam);
        $sql->bindParam(":klantMail", $klantMail);
        $sql->bindParam(":klantAdres", $klantAdres);
        $sql->bindParam(":klantPostcode", $klantPostcode);

        $sql->execute([
            "klantID"=>$klantID,
            "klantNaam"=>$klantNaam,
            "klantMail"=>$klantMail,
            "klantAdres"=>$klantAdres,
            "klantPostcode"=>$klantPostcode
        ]);

        echo "Klant toegevoegd";
        echo "<a href='../klant/klantmenu.php'> terug naar het menu </a>";
    }

    public function readKlant()
    {
        require "oopconnect.php";

        $klanten = $conn->prepare("select       klantID,
                                                klantNaam,
                                                klantMail,
                                                klantAdres,
                                                klantPostcode
                                         from   klant");

        $klanten->execute();
        echo"<table>";
        foreach($klanten as $klant)
        {
            echo "<tr>";
            echo "<td>" . $klant["klantID"] . "</td>";
            echo "<td>" . $klant["klantNaam"] . "</td>";
            echo "<td>" . $klant["klantMail"] . "</td>";
            echo "<td>" . $klant["klantAdres"] . "</td>";
            echo "<td>" . $klant["klantPostcode"] . "</td>";
        }
        echo"</table>";
        echo "<a href='../klant/klantmenu.php'> terug naar het menu </a>";
    }

    public function updateKlant()
    {
        require "oopconnect.php";

        $klanten= $conn->prepare("
    select klantID,
       klantNaam,
       klantMail,
       klantAdres,
       klantPostcode
    from   klant
    where klantID = :klantID
    ");
        $klantID = $this->get_klantid();
        $klanten->execute(["klantID"=>$klantID]);
//nieuw formulier
        echo "<form action='../klant/updateKlantFormulier3.php' method='post'>";
        foreach ($klanten as $klant)
        {
//artid mag niet gewijzigd worden
            echo "klantID:" . $klant ["klantID"];
            echo " <input type='hidden' name ='klantidvak' ";
            echo " value=' ". $klant["klantID"]. "'> <br/>";

            echo "klantNaam: <input type='text' ";
            echo "name ='klantnaamvak'";
            echo " value=' ".$klant["klantNaam"]. "' ";
            echo "'> <br/>";

            echo "klantMail: <input type='text' ";
            echo "name ='klantemailvak'";
            echo " value=' ".$klant["klantMail"]. "' ";
            echo "'> <br/>";

            echo "klantAdres: <input type='text' ";
            echo "name ='klantadresvak'";
            echo " value=' ".$klant["klantAdres"]. "' ";
            echo "'> <br/>";

            echo "klantPostcode: <input type='text' ";
            echo "name ='klantpostcodevak'";
            echo " value=' ".$klant["klantPostcode"]. "' ";
            echo "'> <br/>";

        }
        echo "<input type='submit' name='submit' value='Submit'>";
        echo "</form>";
    }

    public function updateKlant2()
    {
        require "oopconnect.php";

        $klantID = $this->get_klantid();
        $klantNaam = $this->get_klantnaam();
        $klantMail = $this->get_klantemail();
        $klantAdres= $this->get_klantadres();
        $klantPostcode = $this->get_klantpostcode();

        $sql = $conn->prepare("
                               update klant set klantID = :klantID,
                                                  klantNaam = :klantNaam,
                                                  klantMail = :klantMail,
                                                  klantAdres = :klantAdres,
                                                  klantPostcode = :klantPostcode
                                                  where   klantID = :klantID 
                               ");
        $sql->execute([
            "klantID" => $klantID,
            "klantNaam" => $klantNaam,
            "klantMail" => $klantMail,
            "klantAdres" => $klantAdres,
            "klantPostcode" => $klantPostcode,

        ]);
        echo "De klant is gewijzigd. <br/>";
        echo "<a href='../klant/klantmenu.php'>Terug naar het menu. <a/>";
    }

    public function deleteKlant()
    {
        require "oopconnect.php";

        $klanten= $conn->prepare("
    select klantID,
       klantNaam,
       klantMail,
       klantAdres,
       klantPostcode
    from   klant
    where klantID = :klantID
    ");
        $klantID = $this->get_klantid();
        $klantNaam = $this->get_klantnaam();
        $klantMail = $this->get_klantemail();
        $klantAdres = $this->get_klantadres();
        $klantPostcode = $this->get_klantpostcode();

        $klanten->execute(["klantID"=>$klantID]);

        echo "<table>";
        while ($row = $klanten->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            echo "<tr>";
            echo  "<td>".$klantID . "</td>";
            echo  "<td>".$klantNaam . "</td>";
            echo  "<td>".$klantMail. "</td>";
            echo  "<td>".$klantAdres . "</td>";
            echo  "<td>".$klantPostcode . "</td>";
            echo "</tr>";
        }
        echo "</table><br/>";

        echo "<form action='../klant/deleteKlantFormulier3.php' method ='post'>";
//waarde null als dit niet gecheckt word
        echo "<input type='hidden' name='klantidvak' value='".$klantID."'>";
        echo "Verwijder deze klant. <br/>";
        echo "<input type='checkbox' name='verwijdervak' value='1'>";
        echo "<input div class = submit type='submit'>";
        echo "</form>";
    }

    public function deleteKlant2()
    {
        $klantID = $this->get_klantid();
        $verwijder = $_POST ["verwijdervak"];

        if ($verwijder)
        {
            require "oopconnect.php";
            $sql = $conn->prepare("delete from klant 
        where klantID = :klantID");

            $sql->execute(["klantID" =>$klantID]);
            echo "De gegevens zijn verwijderd. <br/>";
            echo "<a href='../klant/klantmenu.php'>Terug naar het menu. <a/>";

        }
        else
        {
            echo "De gegevens zijn niet verwijderd. <br/>";
            echo "<a href='../klant/klantmenu.php'>Terug naar het menu. <a/>";
        }
    }

    public function searchKlant()
    {
        //haalt gegevens op die ingevoerd waren op searchKlantFormulier1 en searchKlantFormulier2
        $klantID = $this->get_klantid();
        require "oopconnect.php";

        $sql = $conn->prepare("
                                   select * from  klant
                                   where      klantID = :klantID
                                   ");
        $sql->bindParam("klantID", $klantID);
        $sql->execute();

        foreach($sql as $klant)
        {
            echo $klant["klantID"] . "<br/>";
            $this->klantnaam=$klant["klantNaam"];
            $this->klantemail=$klant["klantMail"];
            $this->klantadres=$klant["klantAdres"];
            $this->klantpostcode=$klant["klantPostcode"];
        }

        echo "<a href='../klant/klantmenu.php'> terug naar het menu </a>" . "<br/>";
    }

    public function set_klantadres($klantadres)
    {
        $this->klantadres = $klantadres;
    }

    public function set_klantpostcode($klantpostcode)
    {
        $this->klantpostcode = $klantpostcode;
    }

    public function set_klantid($klantid)
    {
        $this->klantid = $klantid;
    }


    public function get_klantemail()
    {
        return $this->klantemail;
    }

    function get_klantpostcode()
    {
        return $this->klantpostcode;
    }

    function get_klantadres()
    {
        return $this->klantadres;
    }

    function get_klantid()
    {
        return $this->klantid;
    }
}
?>
