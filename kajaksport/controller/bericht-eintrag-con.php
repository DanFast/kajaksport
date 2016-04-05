<?php
session_start();
$email = $_SESSION["emailSession"];
$mitgliedID = $_SESSION["mitgliedID"];
$arrsize=0;
$titelbildziel="";

if (!empty($_POST["berichttitel"]) AND isset($_FILES["titelbild"]) AND ! $_FILES["titelbild"]["error"]  AND  ($_FILES["titelbild"]["size"] < 5000000 )) {
    echo "jugo";

    $berichtDao = new BerichtDao();
    $berichtID = $berichtDao->berichteintragen($mitgliedID, $_POST["berichttitel"] );

    if($berichtID != false){
        $berichtID_= "berichtID_";
        $berichtID_ .= "$berichtID";
        if(!is_dir("../img/upload/user/$mitgliedID")){

            mkdir("../img/upload/user/$mitgliedID");
        }

        if(!is_dir("../img/upload/user/$mitgliedID/berichteIDs")){

            mkdir("../img/upload/user/$mitgliedID/berichteIDs");
        }

        if (!is_file("../img/upload/user/$mitgliedID/berichteIDs/$berichtID_"))
        {
            mkdir("../img/upload/user/$mitgliedID/berichteIDs/$berichtID_");
        }

        //echo "Berichtordner wurde erstellt mit der ID: $berichtID_";

        if (isset($_FILES["titelbild"]) AND ! $_FILES["titelbild"]["error"] AND  ($_FILES["titelbild"]["size"] < 5000000 )) {

            $bildinfo = getimagesize($_FILES["titelbild"]["tmp_name"]);
            if ($bildinfo === false) {
                die("kein Bild");
            }
            else {
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

                $neuername = "Titelbild";
                $neuername .= ".$endung";

                $ziel = "../img/upload/user/$mitgliedID/berichteIDs/$berichtID_/$neuername";

                while (file_exists($ziel)) {
                    $neuername = "kopie_$neuername";
                    $ziel = "../img/upload/$mitgliedID/berichteIDs/$berichtID_/$neuername";
                }

                if (@move_uploaded_file($_FILES["titelbild"]["tmp_name"], $ziel)) {
                    //echo "Dateiupload hat geklappt";
                    $ziel = substr($ziel, 3);
                    $titelbildziel = $ziel;

                } else {
                    $_SESSION["berichteintrag"] = "error";
                    echo "Dateiupload hat nicht geklappt*****";
                    header("Refresh:0.1; url=http://localhost/kajaksport/bericht-schreiben.php");
                }
            }

        }


    }else{
        $_SESSION["berichteintrag"] = "error";
        echo "Dateiupload hat nicht geklappt*****";
        header("Refresh:0.1; url=http://localhost/kajaksport/bericht-schreiben.php");
    }
}

if(!empty($_POST["berichttext"])){

    $arrsize = count($_POST['berichttext']);
    $fotos = array(NULL, NULL, NULL, NULL, NULL);
    $berichttext = array(NULL, NULL, NULL, NULL, NULL);

    for($j = 0 ; $j<$arrsize;$j++){
        $berichttext[$j] = $_POST["berichttext"][$j];
    }

    for($i = 0 ; $i<$arrsize;$i++){

        //Bericht - Fotos in das Filesystem speichern
        if (isset($_FILES["textbild"]) AND ! $_FILES["textbild"]["error"][$i] AND  ($_FILES["textbild"]["size"][$i] < 5000000 )) {

            $bildinfo = getimagesize($_FILES["textbild"]["tmp_name"][$i]);
            if ($bildinfo === false) {
                die("kein Bild");
            }
            else {
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

                $neuername = "Foto";
                $neuername .= $i+1;
                $neuername .= ".$endung";

                $ziel = "../img/upload/user/$mitgliedID/berichteIDs/$berichtID_/$neuername";

                while (file_exists($ziel)) {
                    $neuername = "kopie_$neuername";
                    $ziel = "../img/upload/$mitgliedID/berichteIDs/$berichtID_/$neuername";
                }

                if (@move_uploaded_file($_FILES["textbild"]["tmp_name"][$i], $ziel)) {
                    //echo "Dateiupload hat geklappt";
                    $ziel = substr($ziel, 3);
                    $fotos[$i] = $ziel;
                } else {
                    //$_SESSION["pinnwandeintrag"] = "error";
                    echo "Dateiupload hat nicht geklappt*****";
                    // header("Refresh:0.1; url=http://localhost/kajaksport/pinnwand.php");
                }
            }

        }
    }

    $berichtfotosDao = new BerichtDao();

    //Speichert Pfade der Fotos von Berichten in die DB($ziel) ohne ../ in die Datenbank
    $ziel = substr($ziel, 3);
    $resultTrue = $berichtfotosDao->berichtfotoseintragen($berichtID,$titelbildziel, $fotos, $berichttext );

    if($resultTrue){
        $_SESSION["berichteintrag"] = "ok";
        echo "Dateiupload hat geklappt";
        header("Refresh:0.1; url=http://localhost/kajaksport/bericht.php");
    }else{
        $_SESSION["berichteintrag"] = "error";
        echo "Dateiupload hat nicht geklappt*****";
        header("Refresh:0.1; url=http://localhost/kajaksport/bericht-schreiben.php");
    }


}

class BerichtDao{


    public function berichtfotoseintragen($berichtID,$titelbild, $fotos, $berichttext){
        $mysqli = new \mysqli("127.0.0.1", "root", "", "kajaksport");

        if ($mysqli->connect_error) {
            echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
            exit();
        }
        /*
         *Bericht Fotos und dazugehörige Texte in DB speichern
         * */

        $sql = "INSERT INTO `kajaksport`.`berichtfotos` (`berichtfotosID`, `berichtID`, `titelbild`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `text1`, `text2`, `text3`, `text4`, `text5`)
                VALUES (NULL, '$berichtID', '$titelbild' , '$fotos[0]', '$fotos[1]', '$fotos[2]', '$fotos[3]', '$fotos[4]', '$berichttext[0]', '$berichttext[1]', '$berichttext[2]', '$berichttext[3]', '$berichttext[4]');";

        if ($mysqli->query($sql) === TRUE) {
            $berichtID = $mysqli->insert_id;
            $mysqli->close();
            return $berichtID;
        } else {
            $mysqli->close();
            return false;
        }
    }

    public function berichteintragen($mitgliedID, $titel){
        $mysqli = new \mysqli("127.0.0.1", "root", "", "kajaksport");

        if ($mysqli->connect_error) {
            echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
            exit();
        }
        /*
         *Neuen Bericht in DB anlegen
         * */

        $sql = "INSERT INTO `kajaksport`.`bericht` (`berichtID`, `mitgliedID`, `datum`, `titel`) VALUES (NULL, '$mitgliedID', CURRENT_TIMESTAMP, '$titel');";

        /*$beschreibung = "beschreibung testen insterten";
        $sql = "UPDATE `kajaksport`.`mitglied` SET `beschreibung1` = 'testbeschreibung' WHERE `mitglied`.`email` = 'jan@kajaksport.at'";
        */
        if ($mysqli->query($sql) === TRUE) {
            $berichtID = $mysqli->insert_id;
            $mysqli->close();
            return $berichtID;
        } else {
            $mysqli->close();
            return false;
        }
    }
};
?>