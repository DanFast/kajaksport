<?php
session_start();
$email = $_SESSION["emailSession"];

if (isset($_FILES["profilbild"]) AND ! $_FILES["profilbild"]["error"]  AND  ($_FILES["profilbild"]["size"] < 300000 )) {
    echo "Hier komme ich rein!!";
    $bildinfo = getimagesize($_FILES["profilbild"]["tmp_name"]);
    if ($bildinfo === false) {
        die("kein Bild");
    } else {
        $mime = $bildinfo["mime"];
        $mimetypen = array (
            "image/jpeg" => "jpg",
            "image/gif" => "gif",
            "image/png" => "png"
        );
        if (!isset($mimetypen[$mime])) {
            die("nicht das richtige Format");
        } else {
            $endung = $mimetypen[$mime];
        }

        $neuername = basename($_FILES["profilbild"]["name"]);
        $neuername = preg_replace("/\.(jpe?g|gif|png)$/i", "", $neuername);
        $neuername = preg_replace("/\.(JPE?G|GIF|PNG)$/i", "", $neuername);
        $neuername = preg_replace("/[^a-zA-Z0-9_-]/", "", $neuername);
        $neuername .= ".$endung";
        $ziel = "../img/upload/$neuername";
        while (file_exists($ziel)) {
            $neuername = "kopie_$neuername";
            $ziel = "../img/upload/$neuername";
            //echo $ziel;
        }
        //echo "Bis hier läufts";
        //echo $ziel;
        if (@move_uploaded_file($_FILES["profilbild"]["tmp_name"], $ziel)) {
            //echo "Dateiupload hat geklappt";
            $profilbildDao = new ProfilbildDao();

            //Speichert Pfad($ziel) ohne ../ in die Datenbank
            $ziel = substr($ziel, 3);
            $resultTrue = $profilbildDao->insertProfilbild($ziel, $email);

            if($resultTrue){
                header("Location: http://localhost/kajaksport/profil.php");
            }else{
                echo "Fehler beim speichern des Profilbilds in die Datenbank!!";
            }

        } else {
            echo "Dateiupload hat nicht geklappt*****";
        }
    }
}else{
    echo "Dateiupload hat nicht geklappt!!!!!!!!!!!!!!!!!";
}



class ProfilbildDao{

    public function insertProfilbild($profilbildZiel, $email){
        $mysqli = new \mysqli("127.0.0.1", "root", "", "kajaksport");

        if ($mysqli->connect_error) {
            echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
            exit();
        }

        /*
         * Alten Bildpfad aus DB auslesen und Bild aus Filesystem löschen
         **/
        $sql = "SELECT profilbild FROM mitglied WHERE email = '$email'";

        $erg = $mysqli->query($sql);
        $data = $erg->fetch_array();
        $pfadProfilbildAlt = $data['profilbild'];

        if (is_file("../".$pfadProfilbildAlt))
        {
            unlink("../".$pfadProfilbildAlt);
        }

        /*
         * Bildpfad von neuem Profilbild in DB speichern
         * */
        $profilbildpfad = $profilbildZiel;

        $sql = "UPDATE `kajaksport`.`mitglied` SET `profilbild` = '$profilbildpfad' WHERE `mitglied`.`email` = '$email'";

        /*$beschreibung = "beschreibung testen insterten";
        $sql = "UPDATE `kajaksport`.`mitglied` SET `beschreibung1` = 'testbeschreibung' WHERE `mitglied`.`email` = 'jan@kajaksport.at'";
        */
        if ($mysqli->query($sql) === TRUE) {
            $mysqli->close();
            return true;
        } else {
            $mysqli->close();
            return false;
        }
    }
};
?>