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
        include "inc/index-body-aktuell-events-inc.php";
        include "inc/index-body-bootshaus-kontakt-inc.php";
        include "inc/index-body-footer-inc.php";
        include "inc/index-body-js-inc.php";

    }else{
        include "inc/index-body-nav-inc.php";
        include "inc/index-body-pageheader-inc.php";
        include "inc/index-body-aktuell-events-inc.php";
        include "inc/index-body-bootshaus-kontakt-inc.php";
        include "inc/index-body-footer-inc.php";
        include "inc/index-body-js-inc.php";

    }

?>

</body>
</html>