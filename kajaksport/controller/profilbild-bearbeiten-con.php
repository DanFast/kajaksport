<?php
session_start();
$email = $_SESSION["emailSession"];
$mitgliedID = $_SESSION["mitgliedID"];
if (isset($_FILES["profilbild"]) AND ! $_FILES["profilbild"]["error"]  AND  ($_FILES["profilbild"]["size"] < 5000000 )) {


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

        $neuername = "Profilbild";
        $neuername .= ".$endung";


        if(!is_dir("../img/upload/user/$mitgliedID")){

            mkdir("../img/upload/user");
            mkdir("../img/upload/user/$mitgliedID");
        }

        if (is_file("../img/upload/user/$mitgliedID/$neuername"))
        {
            unlink("../img/upload/user/$mitgliedID/$neuername");
        }

        $ziel = "../img/upload/user/$mitgliedID/$neuername";

        while (file_exists($ziel)) {
            $neuername = "kopie_$neuername";
            $ziel = "../img/upload/$email/$neuername";
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

                header("Refresh:0.1; url=http://localhost/kajaksport/profil.php");
            }else{
                echo "Fehler beim speichern des Profilbilds in die Datenbank!!";
            }

        } else {
            echo "Dateiupload hat nicht geklappt*****";
        }
    }
}else{
    echo "Dateiupload hat nicht geklappt!!!!!!!!!!!!!!!!!?????";
}



class ProfilbildDao{

    public function insertProfilbild($profilbildZiel, $email){
        $mysqli = new \mysqli("127.0.0.1", "root", "", "kajaksport");

        if ($mysqli->connect_error) {
            echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
            exit();
        }

        /*
         * Bildpfad von neuem Profilbild in DB speichern
         * */

        $sql = "UPDATE `kajaksport`.`mitglied` SET `profilbild` = '$profilbildZiel' WHERE `mitglied`.`email` = '$email'";

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