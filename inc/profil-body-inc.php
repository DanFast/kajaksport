<?php
$email = $_SESSION["emailSession"];

include "controller/mysqli-con.php";

$sql = "SELECT * FROM mitglied WHERE email = '$email'";

$erg = $mysqli->query($sql);
$data = $erg->fetch_array();


$nachname = $data['nachname'];
$vorname = $data['vorname'];
$passwort = $data['passwort'];
$telefon = $data['telefon'];
$strasse = $data['strasse'];
$nummer = $data['nummer'];
$plz = $data['plz'];
$ort = $data['ort'];
$profilbild = $data['profilbild'];
$beschreibung1 = $data['beschreibung1'];
$beschreibung2 = $data['beschreibung2'];
$foto1 = $data['foto1'];
$foto2 = $data['foto2'];
$mysqli->close();
?>

    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">
                <img style="width: 100%; max-width: 100px" src="img/profilbild_Daniel.jpg" alt="Profilbild">
            </div>

        </div>

        <div class="row" style="padding-top: 20px">
            <div class="col-xs-6 co text-right">
                <label>Name: </label>
            </div>
            <div class="col-xs-6 text-left">
                <?php echo $vorname, " ", $nachname ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 co text-right">
                <label>Email: </label>
            </div>
            <div class="col-xs-6 text-left">
                <?php echo $email ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 co text-right">
                <label>Telefon: </label>
            </div>
            <div class="col-xs-6 text-left">
                <?php echo "+43(0)",$telefon ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 co text-right">
                <label>Adresse: </label>
            </div>
            <div class="col-xs-6 text-left">
                <?php echo $strasse, " ", $nummer," ", $plz, " ", $ort ?>
            </div>
        </div>

        <div class="row featurette" style="padding: 20px">
            <div class="col-md-6">
                <?php echo "<img id='textfoto1' style='padding-top: 5px' class='featurette-image img-responsive' src='".$foto1."' alt=''>"?>
            </div>

            <div class="col-md-6">
                <h4 id="beschreibung1"><?php echo $beschreibung1 ?></h4>
            </div>
        </div>

        <div class="row featurette" style="padding: 20px">
            <div class="col-md-6">
                <h4 id="beschreibung2"><?php echo $beschreibung2 ?></h4>
            </div>
            <div class="col-md-6">
                <?php echo "<img id='textfoto2' style='padding-top: 5px' class='featurette-image img-responsive' src='".$foto2."' alt=''>"?>

            </div>
        </div>

            <div class="text-center">
                <a role="button" href="profil-bearbeiten.php" class="btn btn-success col-lg-4 col-lg-offset-1">Profil bearbeiten
                    <span class="glyphicon glyphicon-wrench" aria-hidden="true" style="padding-left: 5px"></span>
                </a>

                <a role="button" href="login-success.php" class="btn btn-success col-lg-4 col-lg-offset-3">
                    <span class="glyphicon glyphicon-backward" aria-hidden="true" style="padding-right: 5px"></span> Zurück
                </a>
            </div>

    </div>