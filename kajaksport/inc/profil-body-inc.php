    <div class="container">
        <?php

            if($_SESSION["passwortchange"] == "ok"){
                echo "<div class='alert alert-success text-center' role='alert'>Passwort wurde erfolgreich geändert!</div>";

                $_SESSION["passwortchange"] = "false";
            }

            if($_SESSION["emailchange"] == "ok"){
                echo "<div class='alert alert-success text-center' role='alert'>Email wurde erfolgreich geändert!</div>";

                $_SESSION["emailchange"] = "false";
            }

        ?>
        <div class="container">
            <div class="text-center">
                <a role="button" href="profil-bearbeiten.php" class="btn btn-success col-lg-4 col-lg-offset-1">Profil bearbeiten
                    <span class="glyphicon glyphicon-wrench" aria-hidden="true" style="padding-left: 5px"></span>
                </a>

                <a role="button" href="index.php" class="btn btn-success col-lg-4 col-lg-offset-1">
                    <span class="glyphicon glyphicon-backward" aria-hidden="true" style="padding-right: 5px"></span> Zurück
                </a>
            </div>
        </div>

        <br>

        <div class="jumbotron">
            <div class="container">
                <?php echo" <h1>$vorname $nachname</h1> "?>
                <p>Enjoy Your Holidays at the Tropical Paradise! Feel Home at Our Comfy & Luxurious Resorts with Breaktaking Views!!!</p>
                <p><a class="btn btn-primary btn-lg">Zu meinen Fotos &raquo;</a></p>
            </div>
        </div>

        <div class="container" style="margin-left: -15px;">

                <div class="page-header">
                    <?php echo" <h2>$vorname $nachname</h2> "?>
                </div><!-- End Page Header-->

                <div class="row">

                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail" style="max-height: 400px">
                            <h3><b>Profilbild: </b></h3>
                            <br><br>
                            <?php echo" <img class='img-rounded' src='".$profilbild."' alt='Profilbild'> "?>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail" style="min-height: 400px">
                            <h3><b>Über mich: </b></h3>
                            <div class="caption">
                                <p><h4><b><span class="glyphicon glyphicon-tent" aria-hidden="true"></span>&nbsp&nbspWohnort:</b></h4></p>
                                <p><h4><b><?php echo " &nbsp&nbsp&nbsp&nbsp&nbsp $ort" ?></b></h4></p>
                                <p><h4><b><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>&nbsp&nbspTelefon:</b></h4></p>
                                <p><h4><b><?php echo " &nbsp&nbsp&nbsp&nbsp&nbsp $telefon" ?></b></h4></p>
                                <p><h4><b><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp&nbspEmail:</b></h4></p>
                                <p><h4><b><?php echo " &nbsp&nbsp&nbsp&nbsp&nbsp $email" ?></b></h4></p>
                                <p><h4><b><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>&nbsp&nbspFluss:</b></h4></p>
                                <p><h4><b><?php echo " &nbsp&nbsp&nbsp&nbsp&nbsp Koppentraun" ?></b></h4></p>
                             </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail" style="min-height: 400px">
                            <h3><b>Statistik: </b></h3>
                            <div class="caption">
                                <p><h4><b><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp&nbspRangliste 2016:</b></h4></p>
                                <p><h4><b><?php echo " &nbsp&nbsp&nbsp&nbsp&nbsp Platz: 1" ?></b></h4></p>
                                <p><h4><b><span class="glyphicon glyphicon-book" aria-hidden="true"></span>&nbsp&nbspGefahrene Kilometer 2016:</b></h4></p>
                                <p><h4><b><?php echo " &nbsp&nbsp&nbsp&nbsp&nbsp $gesamtkilometer" ?></b></h4></p>
                                <p><h4><b><span class="glyphicon glyphicon-tint" aria-hidden="true"></span>&nbsp&nbspTop 3 Flüsse:</b></h4></p>
                                <p><h4><b><?php echo " &nbsp&nbsp&nbsp&nbsp&nbsp Salza" ?></b></h4></p>
                                <p><h4><b><?php echo " &nbsp&nbsp&nbsp&nbsp&nbsp Traun" ?></b></h4></p>
                                <p><h4><b><?php echo " &nbsp&nbsp&nbsp&nbsp&nbsp Enns" ?></b></h4></p>
                                <p><h4><b><span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp&nbspPaddeltage 2016:</b></h4></p>
                                <p><h4><b><?php echo " &nbsp&nbsp&nbsp&nbsp&nbsp 32" ?></b></h4></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="thumbnail" style="max-height: 400px">
                            <h3><b>Ein paar Worte über mich: </b></h3>
                            <br><br>
                            <div class="caption">
                                <p><h4><b><?php echo "$beschreibung1" ?></b></h4></p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
        </div>

    </div>