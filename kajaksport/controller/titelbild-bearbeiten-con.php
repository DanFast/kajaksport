<?php
session_start();
$email = $_SESSION["emailSession"];
$mitgliedID = $_SESSION["mitgliedID"];

if (isset($_FILES["titelbild"]) AND ! $_FILES["titelbild"]["error"]  AND  ($_FILES["titelbild"]["size"] < 5000000 )) {


    $bildinfo = getimagesize($_FILES["titelbild"]["tmp_name"]);
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

        $neuername = "Titelbild";
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
        if (@move_uploaded_file($_FILES["titelbild"]["tmp_name"], $ziel)) {
            //echo "Dateiupload hat geklappt";
            $titelbildDao = new TitelbildDao();

            //Speichert Pfad($ziel) ohne ../ in die Datenbank
            $ziel = substr($ziel, 3);
            $resultTrue = $titelbildDao->insertTitelbild($ziel, $email);

            if($resultTrue){

                header("Refresh:0.1; url=http://localhost/kajaksport/profil.php");
            }else{
                echo "Fehler beim speichern des titelbilds in die Datenbank!!";
            }

        } else {
            echo "Dateiupload hat nicht geklappt*****";
        }
    }
}else{
    echo "Dateiupload hat nicht geklappt!!!!!!!!!!!!!!!!!";
}



class TitelbildDao{

    public function inserttitelbild($titelbildZiel, $email){
        $mysqli = new \mysqli("127.0.0.1", "root", "", "kajaksport");

        if ($mysqli->connect_error) {
            echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
            exit();
        }

        /*
         * Bildpfad von neuem titelbild in DB speichern
         * */

        $sql = "UPDATE `kajaksport`.`mitglied` SET `titelbild` = '$titelbildZiel' WHERE `mitglied`.`email` = '$email'";

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