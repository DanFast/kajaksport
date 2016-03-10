<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php
include "inc/head-tag-inc.php";
?>

<body>
<?php
if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {

    $email = $_SESSION["emailSession"];

    /*  Speicherung der Userdaten welecher erfolgreich eingeloggt ist, von Datenbank in "globale" Variablen
            die in den includes dann zur Verfügung stehen*/

    include "controller/mysqli-con.php";

    $sql = "SELECT * FROM mitglied WHERE email = '$email'";

    $erg = $mysqli->query($sql);
    $data = $erg->fetch_array();
    /*
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "cat";
    */
    $nachname = $data['nachname'];
    $vorname  = $data['vorname'];
    $passwort = $data['passwort'];
    $telefon = $data['telefon'];
    $strasse = $data['strasse'];
    $nummer = $data['nummer'];
    $ort = $data['ort'];
    $plz = $data['plz'];
    $profilbild = $data['profilbild'];
    $beschreibung1 = $data['beschreibung1'];
    $beschreibung2 = $data['beschreibung2'];
    $foto1 = $data['foto1'];
    $foto2 = $data['foto2'];

    $mysqli->close();

    include "inc/nav-login-success.php";
    include "inc/login-success-pageheader-inc.php";
    include "inc/pinnwand-eintrag-body-inc.php";
    include "inc/index-body-footer-inc.php";
    include "inc/index-body-js-inc.php";



} else {
    $host  = htmlspecialchars($_SERVER["HTTP_HOST"]);
    $uri   = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "/\\");
    $extra = "login-fail.php";
    header("Location: http://$host$uri/$extra");
}
?>

</body>
</html>