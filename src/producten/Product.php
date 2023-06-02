<?php

class Product
{
    protected $prodOmschrijving;

    public function __construct($prodId = NULL, $prodNaam = NULL, $prodOmschrijving = NULL, $prodPrijs = NULL)
    {
        $this->prodId = $prodId;
        $this->prodNaam = $prodNaam;
        $this->prodOmschrijving = $prodOmschrijving;
        $this->prodPrijs = $prodPrijs;
    }


    public function set_prodNaam($prodNaam)
    {
        $this->prodNaam = $prodNaam;
    }


    public function afdrukken()
    {
        echo $this->get_prodNaam();
        echo "<br/>";
        echo $this->get_prodOmschrijving();
        echo "<br/>";
        echo $this->get_prodPrijs();
        echo "<br/>";
        echo "<br/>";
    }

    public function createProduct()
    {
        require "../src/klant/oopconnect.php";

        $prodID = NULL;
        $prodNaam = $this->get_prodNaam();
        $prodOmschrijving = $this->get_prodOmschrijving();
        $prodPrijs = $this->get_prodPrijs();

        $sql = $conn->prepare("insert into producten values(:prodID, :prodNaam, :prodOmschrijving, :prodPrijs)");

        $sql->bindParam(":prodID", $prodID);
        $sql->bindParam(":prodNaam", $prodNaam);
        $sql->bindParam(":prodOmschrijving", $prodOmschrijving);
        $sql->bindParam(":prodPrijs", $prodPrijs);

        $sql->execute([
            "prodID"=>$prodID,
            "prodNaam"=>$prodNaam,
            "prodOmschrijving"=>$prodOmschrijving,
            "prodPrijs"=>$prodPrijs,
        ]);

        echo "Artikel toegevoegd";
        echo "<a href='../producten/artikelmenu.php'>Terug naar het menu. <a/>";
    }

    public function readProduct()
    {
        require "../src/klant/oopconnect.php";

        $producten = $conn->prepare("select     prodID,
                                                prodNaam,
                                                prodOmschrijving,
                                                prodPrijs
                                         from   producten");

        $producten->execute();
        echo"<table>";
        foreach($producten as $product)
        {
            echo "<tr>";
            echo "<td>" . $product["prodID"] . "</td>";
            echo "<td>" . $product["prodNaam"] . "</td>";
            echo "<td>" . $product["prodOmschrijving"] . "</td>";
            echo "<td>" . $product["prodPrijs"] . "</td>";
        }
        echo"</table>";
        echo "<a href='../producten/artikelmenu.php'>Terug naar het menu. <a/>";
    }

    public function updateProduct()
    {
        require "../src/klant/oopconnect.php";

        $producten= $conn->prepare("
    select prodID,
           prodNaam,
           prodOmschrijving,
           prodPrijs
    from   producten
    where prodID = :prodID
    ");
        $prodID = $this->get_prodId();
        $producten->execute(["prodID"=>$prodID]);
//nieuw formulier
        echo "<form action='../producten/updateArtikelFormulier3.php' method='post'>";
        foreach ($producten as $product)
        {
//artid mag niet gewijzigd worden
            echo "prodID:" . $product ["prodID"];
            echo " <input type='hidden' name ='prodidvak' ";
            echo " value=' ". $product["prodID"]. "'> <br/>";

            echo "prodNaam: <input type='text' ";
            echo "name ='prodnaamvak'";
            echo " value=' ".$product["prodNaam"]. "' ";
            echo "'> <br/>";

            echo "prodOmschrijving: <input type='text' ";
            echo "name ='prodomschrijvingvak'";
            echo " value=' ".$product["prodOmschrijving"]. "' ";
            echo "'> <br/>";

            echo "prodPrijs: <input type='text' ";
            echo "name ='prodprijsvak'";
            echo " value=' ".$product["prodPrijs"]. "' ";
            echo "'> <br/>";
        }
        echo "<input type='submit' name='submit' value='Submit'>";
        echo "</form>";
    }

    public function updateProduct2()
    {
        require "../src/klant/oopconnect.php";

        $prodID = $this->get_prodId();
        $prodNaam = $this->get_prodNaam();
        $prodOmschrijving = $this->get_prodOmschrijving();
        $prodPrijs= $this->get_prodPrijs();

        $sql = $conn->prepare("
                               update producten set prodID = :prodID,
                                                    prodNaam = prodNaam,
                                                    prodOmschrijving = :prodOmschrijving,
                                                    prodPrijs = :prodPrijs
                                                    where   prodID = :prodID 
                               ");
        $sql->execute([
            "prodID" => $prodID,
            "prodNaam" => $prodNaam,
            "prodOmschrijving" => $prodOmschrijving,
            "prodPrijs" => $prodPrijs

        ]);
        echo "Het product is gewijzigd. <br/>";
        echo "<a href='../producten/artikelmenu.php'>Terug naar het menu. <a/>";
    }

    public function deleteProduct()
    {
        require "../src/klant/oopconnect.php";

        $producten= $conn->prepare("
    select prodID,
           prodNaam,
           prodOmschrijving,
           prodPrijs
    from   producten
    where prodID = :prodID
    ");
        $prodID = $this->get_prodId();
        $prodNaam = $this->get_prodNaam();
        $prodOmschrijving = $this->get_prodOmschrijving();
        $prodPrijs = $this->get_prodPrijs();

        $producten->execute(["prodID"=>$prodID]);

        echo "<table>";
        while ($row = $producten->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            echo "<tr>";
            echo  "<td>".$prodID . "</td>";
            echo  "<td>".$prodNaam . "</td>";
            echo  "<td>".$prodOmschrijving. "</td>";
            echo  "<td>".$prodPrijs . "</td>";
            echo "</tr>";
        }
        echo "</table><br/>";

        echo "<form action='../producten/deleteArtikelFormulier3.php' method ='post'>";
//waarde null als dit niet gecheckt word
        echo "<input type='hidden' name='prodidvak' value='".$prodID."'>";
        echo "Verwijder dit product. <br/>";
        echo "<input type='checkbox' name='verwijdervak' value='1'>";
        echo "<input div class = submit type='submit'>";
        echo "</form>";
    }

    public function deleteProduct2()
    {
        $prodID = $this->get_prodId();
        $verwijder = $_POST ["verwijdervak"];

        if ($verwijder)
        {
            require "../src/klant/oopconnect.php";
            $sql = $conn->prepare("delete from producten 
        where prodID = :prodID");

            $sql->execute(["prodID" =>$prodID]);
            echo "De gegevens zijn verwijderd. <br/>";
            echo "<a href='../producten/artikelmenu.php'>Terug naar het menu. <a/>";

        }
        else
        {
            echo "De gegevens zijn niet verwijderd. <br/>";
            echo "<a href='../producten/artikelmenu.php'>Terug naar het menu. <a/>";
        }
    }

    public function searchProduct()
    {
        //haalt gegevens op die ingevoerd waren op searchArtikelFormulier1 en searchKlantFormulier2
        $prodID = $this->get_prodId();
        require "../src/klant/oopconnect.php";

        $sql = $conn->prepare("
                                     select * from  producten
                                     where      prodID = prodID
                                   ");
        $sql->bindParam("prodID", $prodID);
        $sql->execute();

        foreach($sql as $product)
        {
            echo $product["prodID"] . "<br/>";
            $this->prodNaam=$product["prodNaam"];
            $this->prodOmschrijving=$product["prodOmschrijving"];
            $this->prodPrijs=$product["prodPrijs"];
        }
        echo "<a href='../producten/artikelmenu.php'> terug naar het menu </a>";
    }

    public function set_prodOmschrijving($prodOmschrijving)
    {
        $this->prodOmschrijving = $prodOmschrijving;
    }

    public function set_prodPrijs($prodPrijs)
    {
        $this->prodPrijs = $prodPrijs;
    }

    public function set_prodId($prodId)
    {
        $this->prodId = $prodId;
    }


    public function get_prodNaam()
    {
        return $this->prodNaam;
    }

    function get_prodOmschrijving()
    {
        return $this->prodOmschrijving;
    }

    function get_prodPrijs()
    {
        return $this->prodPrijs;
    }

    function get_prodId()
    {
        return $this->prodId;
    }
}
?>
