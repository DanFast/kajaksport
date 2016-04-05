<?php
session_start();
$email = $_SESSION["emailSession"];
$mitgliedID = $_SESSION["mitgliedID"];

if (!empty($_POST["beschreibung"])) {

    $bes = $_POST["beschreibung"];
}else{
    $bes = NULL;
}

if(($bes != NULL)){


            $beschreibungDao = new BeschreibungDao();

            $resultTrue = $beschreibungDao->saveBeschreibung($bes,$mitgliedID);

            if($resultTrue){
                //echo"$ziel";
                header("Location: http://localhost/kajaksport/profil.php");
            }else{
                echo "Fehler beim speichern der Beschreibung in die Datenbank!!";
            }

}else{

    echo " ALLES IST VORBEI!!!!!!!!!!!!!!!!!????????????????";
}



class BeschreibungDao{

    public function saveBeschreibung($beschreibung, $mitgliedID){
        $mysqli = new \mysqli("127.0.0.1", "root", "", "kajaksport");

        if ($mysqli->connect_error) {
            echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
            exit();
        }

        /*
         * Bildpfad von neuem Profilbild in DB speichern
         * */

        $sql = "UPDATE `kajaksport`.`mitglied` SET `beschreibung`= '$beschreibung' WHERE `mitglied`.`mitgliedID` = '$mitgliedID'";

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