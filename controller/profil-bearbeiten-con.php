
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
                echo $ziel;
            }
            echo "Bis hier läufts";
            echo $ziel;
            if (@move_uploaded_file($_FILES["profilbild"]["tmp_name"], $ziel)) {
             echo "Dateiupload hat geklappt";
                /*$profilbildDao = new ProfilbildDao();
                //$resultTrue = $profilbildDao->insertProfilbild($ziel, $email);

                if($resultTrue){
                    header("Location: http://localhost/kajaksport/profil.php");
                }else{
                    echo "Fehler!!";
                }*/

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

            $profilbildpfad = $profilbildZiel;

            $sql = "INSERT INTO kajaksport.mitglied(profilbild)
                VALUES('$profilbildpfad') WHERE email = '$email'";

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
