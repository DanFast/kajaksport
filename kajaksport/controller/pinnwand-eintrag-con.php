<?php
session_start();
$email = $_SESSION["emailSession"];
$mitgliedID = $_SESSION["mitgliedID"];


$mysqli = new mysqli("127.0.0.1", "root", "", "kajaksport");

$sql = "SELECT MAX(pinnwandID)AS maxID from pinnwand";
$sum = 0;
if($erg = $mysqli->query($sql)) {
    $data = $erg->fetch_array();
    $sum = $data['maxID'];
    $sum = $sum+1;
    /* free $erg set */
    $erg->free();
}
$mysqli->close();




if (!empty($_POST["pwkategorie"])) {
    $pwkategorie = $_POST["pwkategorie"];
}else{
    $pwkategorie = NULL;
}

if (!empty($_POST["pwtitel"])) {
    $pwtitel = $_POST["pwtitel"];
}else{
    $pwtitel = NULL;
}

if (!empty($_POST["pwtext"])) {
    $pwtext = $_POST["pwtext"];
}else{
    $pwtext = NULL;
}

if (isset($_FILES["pinnwandbild"]) AND ! $_FILES["pinnwandbild"]["error"]  AND  ($_FILES["pinnwandbild"]["size"] < 5000000 )) {


    $bildinfo = getimagesize($_FILES["pinnwandbild"]["tmp_name"]);
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

        $neuername = "PinnwandID_";
        $neuername .= "$sum";
        $neuername .= ".$endung";


        if(!is_dir("../img/upload/user/$mitgliedID")){

            mkdir("../img/upload/user");
            mkdir("../img/upload/user/$mitgliedID");
        }

        if(!is_dir("../img/upload/user/$mitgliedID/pinnwand")){

            mkdir("../img/upload/user/$mitgliedID/pinnwand");
        }

        if (is_file("../img/upload/user/$mitgliedID/pinnwand/$neuername"))
        {
            unlink("../img/upload/user/$mitgliedID/pinnwand/$neuername");
        }

        $ziel = "../img/upload/user/$mitgliedID/pinnwand/$neuername";

        while (file_exists($ziel)) {
            $neuername = "kopie_$neuername";
            $ziel = "../img/upload/$mitgliedID/pinnwand/$neuername";
            //echo $ziel;
        }
        //echo "Bis hier läufts";
        //echo $ziel;
        if (@move_uploaded_file($_FILES["pinnwandbild"]["tmp_name"], $ziel)) {
            //echo "Dateiupload hat geklappt";
            $pinnwandDao = new PinnwandDao();

            //Speichert Pfad($ziel) ohne ../ in die Datenbank
            $ziel = substr($ziel, 3);
            $resultTrue = $pinnwandDao->pinnwandeintrag($ziel, $mitgliedID, $pwkategorie, $pwtitel, $pwtext);

            if($resultTrue){
                $_SESSION["pinnwandeintrag"] = "ok";
                header("Refresh:0.1; url=http://localhost/kajaksport/pinnwand.php");
            }else{
                $_SESSION["pinnwandeintrag"] = "error";
                //echo "Fehler beim speichern des pinnwandeintrags in die Datenbank!!";
                header("Refresh:0.1; url=http://localhost/kajaksport/pinnwand.php");
            }

        } else {
            $_SESSION["pinnwandeintrag"] = "error";
            //echo "Dateiupload hat nicht geklappt*****";
            header("Refresh:0.1; url=http://localhost/kajaksport/pinnwand.php");
        }
    }
}else{

    $ziel=NULL;

    $pinnwandDao = new PinnwandDao();
    $resultTrue = $pinnwandDao->pinnwandeintrag($ziel, $mitgliedID, $pwkategorie, $pwtitel, $pwtext);

    if($resultTrue){
        $_SESSION["pinnwandeintrag"] = "ok";
        header("Refresh:0.1; url=http://localhost/kajaksport/pinnwand.php");
    }else{
        $_SESSION["pinnwandeintrag"] = "error";
        //echo "Fehler beim speichern des pinnwandeintrags in die Datenbank!!";
        header("Refresh:0.1; url=http://localhost/kajaksport/pinnwand.php");
    }
}



class PinnwandDao{

    public function pinnwandeintrag($pinnwandbildZiel, $mitgliedID, $pwkategorie, $titel, $pwtext){
        $mysqli = new \mysqli("127.0.0.1", "root", "", "kajaksport");

        if ($mysqli->connect_error) {
            echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
            exit();
        }

        /*
         * Bildpfad von neuem Pinnwandeintrag in DB speichern
         * */

        $sql = "INSERT INTO `kajaksport`.`pinnwand` (`pinnwandID`, `mitgliedID`, `kategorie`, `titel`, `datum`, `preis`, `text`, `pwbild`) VALUES (NULL, '$mitgliedID', '$pwkategorie', '$titel', CURRENT_TIMESTAMP, NULL, '$pwtext', '$pinnwandbildZiel');";

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