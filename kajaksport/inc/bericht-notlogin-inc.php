<div class="container" style="padding-top: 40px">
    <div class="page-header text-center">
        <h2>Berichte</h2>
    </div>


    <br>

    <div class="tab-content" style="margin-top: 30px">
        <div id="sectionBerichte" class="tab-pane fade in active">
            <h3>Aktuelle Berichte:</h3><br><br>

            <?php
            include "mysqli-con-inc.php";

            $sql = "SELECT `titel`, `datum`,`titelbild`, `berichtfotos`.`berichtID`, `berichtfotosID` FROM `berichtfotos`, `bericht`
                    WHERE `berichtfotos`.`berichtID` = `bericht`.`berichtID` ORDER BY datum DESC ";

            if($erg = $mysqli->query($sql)) {
                $i=0;
                $string = "<div class='row'>";
                while($row = $erg->fetch_array()) {

                    if($i<=4){

                        $string .= "<div class='col-sm-3 col-md-3'>
                                                <div class='thumbnail' style='min-height: 330px; max-height: 330px'>
                                                    <img src='{$row['titelbild']}' alt='Leider Kein Bild' style='max-height: 156px; min-height: 156px'>
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