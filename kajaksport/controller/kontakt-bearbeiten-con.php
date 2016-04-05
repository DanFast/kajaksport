<?php
session_start();
$email = $_SESSION["emailSession"];

if (!empty($_POST["telefon"])) {
    $telefon = $_POST["telefon"];
}else{
    $telefon = NULL;
}

if (!empty($_POST["strasse"])) {
    $strasse = $_POST["strasse"];
}else{
    $strasse = NULL;
}

if (!empty($_POST["nummer"])) {
    $nummer = $_POST["nummer"];
}else{
    $nummer = NULL;
}

if (!empty($_POST["plz"])) {
    $plz = $_POST["plz"];
}else{
    $plz = NULL;
}

if (!empty($_POST["ort"])) {
    $ort = $_POST["ort"];
}else{
    $ort = NULL;
}


$kontaktDao = new KontaktDao();

$resultTrue = $kontaktDao->saveKontakt($telefon, $strasse, $nummer, $plz, $ort, $email);

if ($resultTrue) {

    $_SESSION['kontaktchange'] = "ok";

    header("Location: http://localhost/kajaksport/profil.php");

} else {
    $_SESSION['kontaktchange'] = "error";
    header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
}






class KontaktDao{

    public function saveKontakt($telefon, $strasse, $nummer, $plz, $ort, $email){
        $mysqli = new \mysqli("127.0.0.1", "root", "", "kajaksport");

        if ($mysqli->connect_error) {
            echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
            exit();
        }

        /*
         * Neue Kontaktdaten in DB speichern
         * */

        $sql = "UPDATE `kajaksport`.`mitglied` SET `telefon` = '$telefon', `strasse` = '$strasse', `nummer` = '$nummer', `plz` = '$plz', `ort` = '$ort' WHERE `mitglied`.`email` = '$email'";

        if ($mysqli->query($sql) === TRUE) {
            $mysqli->close();
            return true;
        } else {
            $mysqli->close();
            return false;
        }
    }
}


?>