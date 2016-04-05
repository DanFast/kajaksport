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

include "controller/mysqli-con.php";

/*Die aktuellen Videos aus DB auslesen*/

$sql = "SELECT url FROM video ORDER BY datum DESC";

$url=array();

if($erg = $mysqli->query($sql)) {
    $i = 0;
    while (($data = $erg->fetch_object()) && $i < 3) {
        array_push($url, $data->url);
        $i++;
    }

    /* free $erg set */
    $erg->free();
}

$videoURL1 = $url[0];
$videoURL2 = $url[1];
$videoURL3 = $url[2];


/*Prüfen ob Session für Browerser besteht und ob der Login passt*/
    if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {

        $email = $_SESSION["emailSession"];
        $_SESSION["passwortchange"] = "false";
        $_SESSION["emailchange"] = "false";
        $_SESSION["pinnwandeintrag"] = "false";
        $_SESSION["berichteintrag"] = "false";

        /*  Speicherung der Userdaten welecher erfolgreich eingeloggt ist, von Datenbank in "globale" Variablen
            die in den includes dann zur Verfügung stehen*/



        $sql = "SELECT * FROM mitglied WHERE email = '$email'";

        $erg = $mysqli->query($sql);
        $data = $erg->fetch_array();

        $_SESSION["mitgliedID"] = $data['mitgliedID'];
        $nachname = $data['nachname'];
        $vorname  = $data['vorname'];
        $passwort = $data['passwort'];
        $telefon = $data['telefon'];
        $strasse = $data['strasse'];
        $nummer = $data['nummer'];
        $ort = $data['ort'];
        $plz = $data['plz'];
        $profilbild = $data['profilbild'];
        $beschreibung1 = $data['beschreibung'];
        $titelbild = $data['titelbild'];
        $foto2 = $data['foto2'];
        $gesamtkilometer = $data['gesamtkilometer'];

        $mysqli->close();

        include "inc/nav-login-success.php";
        include "inc/login-success-pageheader-inc.php";
        include "inc/index-body-aktuell-inc.php";
        include "inc/index-body-videos-inc.php";
        include "inc/index-body-toppaddler-inc.php";
        include "inc/index-body-events-inc.php";
        include "inc/index-body-bootshaus-kontakt-inc.php";
        include "inc/index-body-footer-inc.php";
        include "inc/index-body-js-inc.php";

    }else{
        include "inc/index-body-nav-inc.php";
        include "inc/index-body-pageheader-inc.php";
        include "inc/index-body-aktuell-inc.php";
        include "inc/index-body-videos-inc.php";
        include "inc/index-body-toppaddler-inc.php";
        include "inc/index-body-events-inc.php";
        include "inc/index-body-bootshaus-kontakt-inc.php";
        include "inc/index-body-footer-inc.php";
        include "inc/index-body-js-inc.php";
        $mysqli->close();
    }

?>

</body>
</html>