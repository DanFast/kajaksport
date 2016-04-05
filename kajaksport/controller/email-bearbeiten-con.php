<?php
session_start();
$email = $_SESSION["emailSession"];

if(isset($_POST["emailold"]) && isset($_POST["emailnew"]) && isset($_POST["emailnew1"]) ) {

        // Prüfen ob altes PW korrekt ist und ob Neue Email 2x korrekt eingegeben wurde und ob neue != alte Eamil ist
        if (($_POST["emailold"] == $email) && ($_POST["emailnew"] == $_POST["emailnew1"]) && ($_POST["emailnew"] != $email)) {

            //Wenn alles passt Email speichern in die DB

            $emailDao = new EmailDao();

            $resultTrue = $emailDao->saveEmail($_POST["emailnew"], $email);

            if ($resultTrue) {

                $_SESSION['emailchange'] = "ok";
                $_SESSION["emailSession"] = $_POST["emailnew"];
                header("Location: http://localhost/kajaksport/profil.php");

            } else {
                $_SESSION['eamilchange'] = "error";
                header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
            }
        }

        elseif ($_POST["emailold"] !== $email) {

            $_SESSION['emailchange'] = "errorOldEmail";
            header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
        }
        elseif ($_POST["emailnew"] == $email) {

            $_SESSION['emailchange'] = "errorEqual";
            header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
        }
        elseif ($_POST["emailnew"] !== $_POST["emailnew1"]) {

            $_SESSION['emailchange'] = "errorNewEmail";
            header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
        }

}else{
    $_SESSION['emailchange'] = "error";
    header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
};

class EmailDao{

    public function saveEmail($emailnew, $email){
        $mysqli = new \mysqli("127.0.0.1", "root", "", "kajaksport");

        if ($mysqli->connect_error) {
            echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
            exit();
        }

        /*
         * Neues Passwort in DB speichern
         * */

        $sql = "UPDATE `kajaksport`.`mitglied` SET `email` = '$emailnew' WHERE `mitglied`.`email` = '$email'";

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