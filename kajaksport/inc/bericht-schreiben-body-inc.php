<?php
$email = $_SESSION["emailSession"];

include "controller/mysqli-con.php";

$sql = "SELECT * FROM mitglied WHERE email = '$email'";

$erg = $mysqli->query($sql);
$data = $erg->fetch_array();


$nachname = $data['nachname'];
$vorname = $data['vorname'];

$telefon = $data['telefon'];
$strasse = $data['strasse'];
$nummer = $data['nummer'];
$plz = $data['plz'];
$ort = $data['ort'];
$profilbild = $data['profilbild'];

$mysqli->close();
?>

<div class="container">
    <div class="page-header text-center" style="margin-top: -20px">
        <h2>Bericht schreiben</h2>
    </div>


        <form action="controller/bericht-eintrag-con.php" class="form-horizontal" enctype="multipart/form-data" method="post" style="padding-top: 20px">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                        <div class="form-group">
                            <label for="berichttitel">Bericht - Titel</label>
                            <input type="text" class="form-control" name="berichttitel" id="berichttitel" placeholder="Titel" required>
                        </div>


                        <div class="form-group">
                            <label for="bild">Titelbild</label>
                            <input type='file' name='titelbild' id='titelbild' accept='image/*' onchange='loadTitelBild(event)' required>
                            <div class="media">
                                <div class="media-left">
                                    <img id="bildviewsm" style="max-height: 180px; width: auto" class="media-object">
                                </div>
                            </div>
                            <script>
                                var loadTitelBild = function(event) {
                                    var output = document.getElementById('bildview');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    var outputsm = document.getElementById('bildviewsm');
                                    outputsm.src = URL.createObjectURL(event.target.files[0]);
                                };
                            </script>
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="berichttext1" class="control-label">Text 0</label>
                                    <textarea name='berichttext[]' id='berichttext0' class='form-control' cols='20' rows='10' placeholder='Schreibe hier etwas' oninput="loadText0()" required></textarea>
                                    <script>
                                        function loadText0() {
                                            var x = document.getElementById("berichttext0").value;
                                            document.getElementById("berichttext0view").innerHTML = x;
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bild">Foto zu Text 0</label>
                                    <input type='file' name='textbild[]' id='textbild0' accept='image/*' onchange='loadFoto0(event)' required>
                                    <div class="media">
                                        <div class="media-left">
                                            <img id="bildviewsm0" style="max-height: 180px; max-width: 200px" class="media-object">
                                        </div>
                                    </div>
                                    <script>
                                        var loadFoto0 = function(event) {
                                            var output = document.getElementById('bildview0');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            var outputsm = document.getElementById('bildviewsm0');
                                            outputsm.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input_fields_wrap2">

            </div>
            <div>
                <button class="add_field_button btn btn-success btn-sm col-md-offset-2"><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span></button>
                Textfeld hinzufügen
            </div>

            <br>

            <div class="form-group">

                <div class="col-lg-6">
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#vorschauModal" id="vorschauBericht">Vorschau</button>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-success btn-block" id="speichern">Speichern</button>
                </div>
            </div>


        </form>

</div>

<!-- Modal Vorschau -->
<div class="modal fade" id="vorschauModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <div class="media">
                        <div class="media-left">
                            <?php echo "<img id='profilbildviewsm' style='max-height: 100px; max-width: 100px' class='media-object' src='".$profilbild."' alt='Profilbild'>"?>
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <label >Email: <?php echo "<span id='email' >$email</span>"?></label><br>
                                <label >Tel.: <?php echo "<span id='telefon' >0$telefon</span>"?></label><br>
                                <label >Adresse: <?php echo "<span id='strasse' >$strasse</span> <span id='nummer' >$nummer</span> <span id='plz' >$plz</span> <span id='ort' >$ort</span>"?></label>
                            </div>
                        </div>
                    </div>
                </h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3><b>Titel: </b></h3>
                        <h4 id="berichttitelview"></h4><br>
                        <img id='bildview' style='padding-top: 5px; max-height: 200px; width: auto' class='featurette-image img-responsive center-block' alt='Kein Foto'>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <h4><b>Text 0: </b></h4>
                        <h4 id="berichttext0view"></h4><br>
                    </div>
                    <div class="col-md-4">
                        <h4><b>Bild 0: </b></h4>
                        <img id='bildview0' style='padding-top: 5px; max-height: 200px; width: auto' class='featurette-image img-responsive' alt='Kein Foto'>
                    </div>
                </div>

                <div class="input_fields_wrap">
                </div>

            </div>

            <div class="modal-footer">
                <div class="text-center">

                    <button class="btn btn-success btn-block col-lg-12" data-dismiss="modal">Zurück</button>

                </div>
            </div>
        </div>
    </div>
</div>