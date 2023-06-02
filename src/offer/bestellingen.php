<?php
class bestelling
{
    protected $bestellingID;
    protected $klantID;
    protected $artID;
    protected $artikels;
    protected $hoeveelheid;
    protected $bestellingDatum;
    protected $totaalPrijs;

    public function __construct($bestellingID = NULL, $klantID = NULL, $artID = NULL, $artikels = NULL, $hoeveelheid = NULL, $bestellingDatum = NULL, $totaalPrijs = NULL)
    {
        $this->bestellingID = $bestellingID;
        $this->klantID = $klantID;
        $this->artID = $artID;
        $this->artikels = $artikels;
        $this->hoeveelheid = $hoeveelheid;
        $this->bestellingDatum = $bestellingDatum;
        $this->totaalPrijs = $totaalPrijs;
    }

    public function afdrukken()
    {
        echo "<p>Artikel: </p>";
        echo $this->get_artikels() . "<br><br>";
        echo "<p>Kwantiteit: </p>";
        echo $this->get_hoeveelheid() . "<br><br>";
        echo "<p>Datum: </p>";
        echo $this->get_bestellingDatum() . "<br><br>";
        echo "<p>Prijs: </p>";
        echo $this->get_totaalPrijs() . "<br><br>";
    }

    public function createBestelling()
    {
        require "../src/klant/oopconnect.php";

        $bestellingID = NULL;
        $klantID = $this->get_klantID();
        $artID = $this->get_artID();
        $artikels = $this->get_artikels();
        $hoeveelheid = $this->get_hoeveelheid();
        $bestellingDatum = $this->get_bestellingDatum();
        $totaalPrijs = $this->get_totaalPrijs();

        $sql = $conn->prepare("INSERT INTO bestellingen VALUES (:bestellingID, :klantID, :artID, :artikels, :hoeveelheid,
                                 :bestellingDatum, :totaalPrijs)");

        $sql->execute
        ([
            "bestellingID" => $bestellingID,
            "klantID" => $klantID,
            "artID" => $artID,
            "artikels" => $artikels,
            "hoeveelheid" => $hoeveelheid,
            "bestellingDatum" => $bestellingDatum,
            "totaalPrijs" => $totaalPrijs
        ]);

        echo "Uw bestelling is aangemaakt" . "<br>";
        echo "<a href='../bestelling/bestellingmenu.php'> terug naar het menu </a>";
    }

    public function readBestelling()
    {
        require "../src/klant/oopconnect.php";
        $bestellingen = $conn->prepare("SELECT * FROM bestellingen");

        $bestellingen->execute();
        echo "<table>";
        foreach($bestellingen as $bestelling)
        {
            echo "<tr>";
            echo "<td>" . $bestelling["bestellingID"] . "</td>";
            echo "<td>" . $bestelling["klantID"] . "</td>";
            echo "<td>" . $bestelling["artID"] . "</td>";
            echo "<td>" . $bestelling["artikels"] . "</td>";
            echo "<td>" . $bestelling["hoeveelheid"] . "</td>";
            echo "<td>" . $bestelling["bestellingDatum"] . "</td>";
            echo "<td>" . $bestelling["totaalPrijs"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a href='../bestelling/bestellingmenu.php'>Terug naar het menu</a>";
    }

    public function updateBestelling()
    {
        require "../src/klant/oopconnect.php";

        $bestellingen = $conn->prepare("SELECT * FROM bestellingen WHERE bestellingID = :bestellingID");
        $bestellingID = $this->get_bestellingID();
        $bestellingen->execute(["bestellingID"=>$bestellingID]);
        echo "<form action='../bestelling/updateBestellingFormulier3.php' method='post'>";
        foreach ($bestellingen as $bestelling)
        {
            // ID's = hidden property om niet veranderd te worden
            echo "BestellingID:" . $bestelling ["bestellingID"];
            echo "<input type = 'hidden' name = 'bestellingidvak' ";
            echo "value=' " . $bestelling["bestellingID"] . "'> <br>";

            echo "klantID:" . $bestelling ["klantID"];
            echo "<input type = 'hidden' name = 'klantidvak' ";
            echo "value=' " . $bestelling["klantID"] . "'> <br>";

            echo "artID:" . $bestelling ["bestellingID"];
            echo "<input type = 'hidden' name = 'artidvak' ";
            echo "value=' " . $bestelling["artID"] . "'> <br>";

            echo "Artikels: <input type='text' ";
            echo "name = 'artikelvak'";
            echo "value=' " . $bestelling["artikels"] . "'> <br>";

            echo "hoeveelheid: <input type='text' ";
            echo "name = 'hoeveelheidvak'";
            echo "value = ' " . $bestelling["hoeveelheid"] . "'> <br>";

            echo "Bestelling datum: <input type='text' ";
            echo "name = 'bestellingdatumvak'";
            echo "value = ' " . $bestelling["bestellingDatum"] . "'> <br>";

            echo "Totaal prijs: <input type='text' ";
            echo "name = 'totaalprijsvak'";
            echo "value = ' " . $bestelling["totaalPrijs"] . "'> <br>";
        }
        echo "<input type='submit' name='submit' value='Update'>";
        echo "</form>";
    }

    public function updateBestelling2()
    {
        require "../src/klant/oopconnect.php";

        $bestellingID = $this->get_bestellingID();
        $klantID = $this->get_klantID();
        $artID = $this->get_artID();
        $artikels = $this->get_artikels();
        $hoeveelheid = $this->get_hoeveelheid();
        $bestellingDatum = $this->get_bestellingDatum();
        $totaalPrijs = $this->get_totaalPrijs();

        $sql = $conn->prepare("UPDATE bestellingen SET bestellingID = :bestellingID, 
                                                       klantID = :klantID, 
                                                       artID = :artID,
                                                       artikels = :artikels,
                                                       hoeveelheid = :hoeveelheid,
                                                       bestellingDatum = :bestellingDatum,
                                                       totaalPrijs = :totaalPrijs
                                                       where bestellingID = :bestellingID");
        $sql->execute([
            "bestellingID" => $bestellingID,
            "klantID" => $klantID,
            "artID" => $artID,
            "artikels" => $artikels,
            "hoeveelheid" => $hoeveelheid,
            "bestellingDatum" => $bestellingDatum,
            "totaalPrijs" => $totaalPrijs
        ]);
        echo "De bestelling is gewijzigd. <br>";
        echo "<a href='../bestelling/bestellingmenu.php'>Terug naar het menu. </a>";
    }

    public function deleteBestelling()
    {
        require "../src/klant/oopconnect.php";

        $bestellingen = $conn->prepare("SELECT * FROM bestellingen WHERE bestellingID = :bestellingID");

        $bestellingID = $this->get_bestellingID();
        $klantID = $this->get_klantID();
        $artID = $this->get_artID();
        $artikels = $this->get_artikels();
        $hoeveelheid = $this->get_hoeveelheid();
        $bestellingDatum = $this->get_bestellingDatum();
        $totaalPrijs = $this->get_totaalPrijs();

        $bestellingen->execute(["bestellingID" => $bestellingID]);

        echo "<table>";
        while ($row = $bestellingen->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            echo "<tr>";
            echo "<td>" . $bestellingID . "</td>";
            echo "<td>" . $klantID . "</td>";
            echo "<td>" . $artID . "</td>";
            echo "<td>" . $artikels . "</td>";
            echo "<td>" . $hoeveelheid . "</td>";
            echo "<td>" . $bestellingDatum . "</td>";
            echo "<td>" . $totaalPrijs . "</td>";
            echo "</tr>";
        }
        echo "</table> <br>";

        echo "<form action = '../bestelling/deleteBestellingFormulier3.php' method = 'post'>";
        echo "<input type = 'hidden' name = 'bestellingidvak' value = '". $bestellingID ."'>";
        echo "Verwijder deze bestelling. <br>";
        echo "<input type = 'checkbox' name = 'verwijdervak' value = '1'>";
        echo "<input class = 'submit' type = 'submit'>";
        echo "</form>";
    }

    public function deleteBestelling2()
    {
        $bestellingID = $this->get_bestellingID();
        $delete = $_POST ["verwijdervak"];

        if ($delete)
        {
            require "../src/klant/oopconnect.php";
            $sql = $conn->prepare("DELETE FROM bestellingen WHERE bestellingID = :bestellingID");

            $sql->execute(["bestellingID" => $bestellingID]);
            echo "De bestelling is verwijderd. <br>";
            echo "<a href = '../bestelling/bestellingmenu.php'>Terug naar het menu. </a>";
        }
        else{
            echo "De gegevens zijn niet verwijderd. <br>";
            echo "<a href='../bestelling/bestellingmenu.php'>Terug naar het menu. </a>";
        }
    }

    public function searchBestelling()
    {
        $bestellingID = $this->get_bestellingID();
        require "../src/klant/oopconnect.php";

        $sql = $conn->prepare("SELECT * FROM bestellingen WHERE bestellingID = :bestellingID");
        $sql->bindParam("bestellingID", $bestellingID);
        $sql->execute();

        foreach($sql as $bestelling)
        {
            echo $bestelling["bestellingID"] . "<br>";
            $this->klantID=$bestelling["klantID"];
            $this->artID=$bestelling["artID"];
            $this->artikels=$bestelling["artikels"];
            $this->hoeveelheid=$bestelling["hoeveelheid"];
            $this->bestellingDatum=$bestelling["bestellingDatum"];
            $this->totaalPrijs=$bestelling["totaalPrijs"];
        }

        echo "<a href = '../bestelling/bestellingmenu.php'>Terug naar het menu</a><br>";
    }
    //setters
    public function set_bestellingID($bestellingID)
    {
        $this->bestellingID = $bestellingID;
    }

    public function set_klantID($klantID)
    {
        $this->klantID = $klantID;
    }

    public function set_artID($artID)
    {
        $this->artID = $artID;
    }
    public function set_artikels($artikels)
    {
        $this->artikels = $artikels;
    }
    public function set_hoeveelheid($hoeveelheid)
    {
        $this->hoeveelheid = $hoeveelheid;
    }
    public function set_bestellingDatum($bestellingDatum)
    {
        $this->bestellingDatum = $bestellingDatum;
    }

    public function set_totaalPrijs($totaalPrijs)
    {
        $this->totaalPrijs = $totaalPrijs;
    }

    //getters
    public function get_bestellingID()
    {
        return $this->bestellingID;
    }

    public function get_klantID()
    {
        return $this->klantID;
    }

    public function get_artID()
    {
        return $this->artID;
    }

    public function get_artikels()
    {
        return $this->artikels;
    }

    public function get_hoeveelheid()
    {
        return $this->hoeveelheid;
    }

    public function get_bestellingDatum()
    {
        return $this->bestellingDatum;
    }

    public function get_totaalPrijs()
    {
        return $this->totaalPrijs;
    }
}