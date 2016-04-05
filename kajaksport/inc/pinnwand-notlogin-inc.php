<div class="container" style="padding-top: 40px">
    <div class="page-header text-center">
        <h2>Pinnwand</h2>
    </div>

    <ul class="nav nav-tabs nav-justified" id="myTab">
        <li class="active"><a href="#sectionDanger">Gefahrenmeldung</a></li>
        <li><a href="#sectionVerkaufe">Verkaufe</a></li>
        <li><a href="#sectionSuche">Suche</a></li>
        <li><a href="#sectionSonstiges">Sonstiges</a></li>
    </ul>

    <div class="tab-content" style="margin-top: 30px">
        <div id="sectionDanger" class="tab-pane fade in active">
            <h3>Gefahrenhinweise:</h3><br><br>

            <?php
            include "mysqli-con-inc.php";

            $sql = "SELECT * FROM `pinnwand` WHERE `kategorie` = 'Gefahrenhinweis' ORDER BY `datum` DESC";

            if($erg = $mysqli->query($sql)) {
                $i=0;
                $string = "<div class='row'>";
                while($row = $erg->fetch_array()) {

                    if($i<=4){
                        $string .= "<div class='col-sm-3 col-md-3'>
                                                <div class='thumbnail' style='min-height: 330px; max-height: 330px'>
                                                    <img src='{$row['pwbild']}' alt='Leider Kein Bild' style='max-height: 156px; min-height: 156px'>
                                                    <div class='caption'>
                                                        <h4>{$row['titel']}</h4>
                                                        <p>Eingetragen am: <br>{$row['datum']}</p>
                                                        <p><a href='#' class='btn btn-success' role='button'>Zum Eintrag</a></p>
                                                    </div>
                                                </div>
                                            </div>";

                        $i++;
                    }
                    if($i==4){
                        $string .= "</div>";
                        echo $string;
                        $string = "<div class='row'>";
                        $i=0;
                    }

                }
                $string .= "</div>";
                echo $string;

                /* free $erg set */
                $erg->free();
            }
            $mysqli->close();
            ?>

        </div>

        <div id="sectionVerkaufe" class="tab-pane fade">
            <h3>Verkaufe:</h3><br><br>

            <?php
            include "mysqli-con-inc.php";

            $sql = "SELECT * FROM `pinnwand` WHERE `kategorie` = 'Verkaufe' ORDER BY `datum` DESC";

            if($erg = $mysqli->query($sql)) {
                $i=0;
                $string = "<div class='row'>";
                while($row = $erg->fetch_array()) {

                    if($i<=4){
                        $string .= "<div class='col-sm-3 col-md-3'>
                                                <div class='thumbnail' style='min-height: 330px; max-height: 330px'>
                                                    <img src='{$row['pwbild']}' alt='Leider Kein Bild' style='max-height: 156px; min-height: 156px'>
                                                    <div class='caption'>
                                                        <h4>{$row['titel']}</h4>
                                                        <p>Eingetragen am: <br>{$row['datum']}</p>
                                                        <p><a href='#' class='btn btn-success' role='button'>Zum Eintrag</a></p>
                                                    </div>
                                                </div>
                                            </div>";

                        $i++;
                    }
                    if($i==4){
                        $string .= "</div>";
                        echo $string;
                        $string = "<div class='row'>";
                        $i=0;
                    }

                }
                $string .= "</div>";
                echo $string;

                /* free $erg set */
                $erg->free();
            }
            $mysqli->close();
            ?>

        </div>
        <div id="sectionSuche" class="tab-pane fade">
            <h3>Suche:</h3><br><br>

            <?php
            include "mysqli-con-inc.php";

            $sql = "SELECT * FROM `pinnwand` WHERE `kategorie` = 'Suche' ORDER BY `datum` DESC";

            if($erg = $mysqli->query($sql)) {
                $i=0;
                $string = "<div class='row'>";
                while($row = $erg->fetch_array()) {

                    if($i<=4){
                        $string .= "<div class='col-sm-3 col-md-3'>
                                                <div class='thumbnail' style='min-height: 330px; max-height: 330px'>
                                                    <img src='{$row['pwbild']}' alt='Leider Kein Bild' style='max-height: 156px; min-height: 156px'>
                                                    <div class='caption'>
                                                        <h4>{$row['titel']}</h4>
                                                        <p>Eingetragen am: <br>{$row['datum']}</p>
                                                        <p><a href='#' class='btn btn-success' role='button'>Zum Eintrag</a></p>
                                                    </div>
                                                </div>
                                            </div>";

                        $i++;
                    }
                    if($i==4){
                        $string .= "</div>";
                        echo $string;
                        $string = "<div class='row'>";
                        $i=0;
                    }

                }
                $string .= "</div>";
                echo $string;

                /* free $erg set */
                $erg->free();
            }
            $mysqli->close();
            ?>

        </div>

        <div id="sectionSonstiges" class="tab-pane fade">
            <h3>Sontiges:</h3><br><br>

            <?php
            include "mysqli-con-inc.php";

            $sql = "SELECT * FROM `pinnwand` WHERE `kategorie` = 'Sonstiges' ORDER BY `datum` DESC";

            if($erg = $mysqli->query($sql)) {
                $i=0;
                $string = "<div class='row'>";
                while($row = $erg->fetch_array()) {

                    if($i<=4){
                        $string .= "<div class='col-sm-3 col-md-3'>
                                                <div class='thumbnail' style='min-height: 330px; max-height: 330px'>
                                                    <img src='{$row['pwbild']}' alt='Leider Kein Bild' style='max-height: 156px; min-height: 156px'>
                                                    <div class='caption'>
                                                        <h4>{$row['titel']}</h4>
                                                        <p>Eingetragen am: <br>{$row['datum']}</p>
                                                        <p><a href='#' class='btn btn-success' role='button'>Zum Eintrag</a></p>
                                                    </div>
                                                </div>
                                            </div>";

                        $i++;
                    }
                    if($i==4){
                        $string .= "</div>";
                        echo $string;
                        $string = "<div class='row'>";
                        $i=0;
                    }

                }
                $string .= "</div>";
                echo $string;

                /* free $erg set */
                $erg->free();
            }
            $mysqli->close();
            ?>

        </div>

    </div>
</div>