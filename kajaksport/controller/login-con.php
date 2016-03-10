<?php
session_start();

if(isset($_POST["loginEmail"]) && isset($_POST["loginPasswort"]) ) {

    $email = $_POST["loginEmail"];
    $mysqli = new mysqli("localhost", "root", "", "kajaksport");

    if ($mysqli->connect_error) {
        echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
        exit();
    }

    $sql = "SELECT passwort FROM mitglied WHERE email = '$email'";

    $erg = $mysqli->query($sql);
    $result = mysqli_num_rows($erg);
    $pw = $erg->fetch_array();
    $passwortDB = $pw['passwort'];

    if ($result == 0) {

        $link = "login-fail.php";

    } else {

        if ($_POST["loginPasswort"] == $passwortDB) {
            $_SESSION['emailSession'] = $_POST["loginEmail"];
            $_SESSION['login'] = "ok";

            //Wenn Passwort und email stimmen, dann Loginbereich
            $link = "index.php";


        }else{
            $link = "login-fail.php";

        }
    }
}else{
    $link = "login-fail.php";

}
$host  = htmlspecialchars($_SERVER["HTTP_HOST"]);
$uri   = "/kajaksport/";
header("Location: https://$host$uri$link");
?>
