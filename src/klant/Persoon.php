<?php
    class Persoon
    {
        public $klantnaam;
        public $telefoonnummer;
        //public $email;



        function set_klantnaam($klantnaam)
        {
            $this->klantnaam=$klantnaam;

        }

        function set_telefoon($telefoonnummer)
        {
            $this->telefoonnummer=$telefoonnummer;
        }

        /*function set_email($email)
        {
            $this->email=$email;
        }*/

        function get_klantnaam()
        {
            return $this->klantnaam;
        }

        function get_telefoon()
        {
            return $this->telefoonnummer;
        }

        /*function get_email()
        {
            return $this->email;
        }*/
    }
    //$persoon1 = new Persoon();
    //$persoon1->set_klantnaam("test");
    //$persoon1->set_telefoon("123456789");
    //$persoon1->set_email("test@testmail.com");
    //echo "<h1>" .$persoon1->get_klantnaam(). "</h1>";
    //echo "<h3>" .$persoon1->get_telefoon(). "</h3>";
    //echo "<h3>" .$persoon1->get_email(). "</h3>";

    /*
    $persoon2 = new Persoon();
    $persoon2->set_klantnaam("Nick");
    $persoon2->set_telefoon("5624652452");
    $persoon2->set_email("n.joe@testmail.com");
    echo "<h1>" .$persoon2->get_klantnaam(). "</h1>";
    echo "<h3>" .$persoon2->get_telefoon(). "</h3>";
    echo "<h3>" .$persoon2->get_email(). "</h3>";
    */
?>
