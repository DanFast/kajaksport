<?php
session_start();
$email = $_SESSION["emailSession"];

    if(isset($_POST["passwortold"]) && isset($_POST["passwortnew"]) && isset($_POST["passwortnew1"]) ) {

        $passwortold = $_POST["passwortold"];
        $passwortnew = $_POST["passwortnew"];
        $passwortnew1 = $_POST["passwortnew1"];

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

                echo "Fehler beim laden von Passwort";

            } else {

                // Prüfen ob altes das PW aus DB ist und ob Neues PW 2x korrekt eingegeben wurde
                if (($_POST["passwortold"] == $passwortDB) && ($_POST["passwortnew"] == $_POST["passwortnew1"]) && ($_POST["passwortnew"] != $passwortDB) &&(strlen($_POST["passwortnew"]) >=6 )) {

                    //Wenn Passwörter stimmen, dann speichern von neuen PW in die DB

                    $passwortDao = new PasswortDao();

                    $resultTrue = $passwortDao->savePasswort($_POST["passwortnew"], $email);

                    if ($resultTrue) {

                        $_SESSION['passwortchange'] = "ok";
                        header("Location: http://localhost/kajaksport/profil.php");

                    } else {
                        $_SESSION['passwortchange'] = "error";
                        header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
                    }
                }

                elseif ($_POST["passwortold"] !== $passwortDB) {

                    $_SESSION['passwortchange'] = "errorOldPw";
                    header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
                }
                elseif ($_POST["passwortnew"] == $passwortDB) {

                    $_SESSION['passwortchange'] = "errorEqual";
                    header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
                }
                elseif ($_POST["passwortnew"] !== $_POST["passwortnew1"]) {

                    $_SESSION['passwortchange'] = "errorNewPw";
                    header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
                }
                elseif (strlen($_POST["passwortnew"]) < 6 ) {

                    $_SESSION['passwortchange'] = "errorShort";
                    header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
                }

            }
    }else{
        $_SESSION['passwortchange'] = "error";
        header("Location: http://localhost/kajaksport/profil-bearbeiten.php");
    };

class PasswortDao{

    public function savePasswort($passwortnew, $email){
        $mysqli = new \mysqli("127.0.0.1", "root", "", "kajaksport");

        if ($mysqli->connect_error) {
            echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
            exit();
        }

        /*
         * Neues Passwort in DB speichern
         * */

        $sql = "UPDATE `kajaksport`.`mitglied` SET `passwort` = '$passwortnew' WHERE `mitglied`.`email` = '$email'";

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

