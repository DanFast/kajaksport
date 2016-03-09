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

    <div class="row">
        <form action="controller/pinnwand-eintrag.php" class="form-horizontal" enctype="multipart/form-data" method="get" style="padding-top: 20px">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <label for="sel1">Kategorie:</label>
                    <select class="form-control" id="sel1" required="">
                        <option>Verkaufe</option>
                        <option>Suche</option>
                        <option>Gefahrenhinweis</option>
                        <option>Sonstiges</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="titel">Titel</label>
                    <input type="text" class="form-control" id="titel" placeholder="Titel" required="">
                </div>

                <div class="form-group">
                    <label for="posting" class="control-label">Text</label>
                    <textarea name='user-posting' id='posting' class='form-control' cols='20' rows='5' placeholder='Schreibe hier etwas' required=""></textarea>
                </div><!-- End form group-->

                <div class="form-group">
                    <label for="bild">Foto (Optional)</label>
                        <input type='file' name='bild' id='profilbild' accept='image/*' onchange='loadFoto(event)'>
                    <div class="media">
                        <div class="media-left">
                            <img id="bildviewsm" style="max-height: 100px; max-width: 100px" class="media-object">
                        </div>
                    </div>
                    <script>
                        var loadFoto = function(event) {
                            var output = document.getElementById('bildview');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            var outputsm = document.getElementById('bildviewsm');
                            outputsm.src = URL.createObjectURL(event.target.files[0]);
                        };
                    </script>
                </div>

                <div class="form-group">
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#vorschauModal" id="vorschauPinnwand">Vorschau</button>
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-block" id="speichern">Speichern</button>
                    </div>
                </div>


            </div>
        </form>
    </div>
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
                <div class="col-md-12">
                    Kategorie:<h4 id="katview"></h4><br>
                </div>
                <div class="col-md-12">
                    Titel:<h4 id="titelview"></h4><br>
                </div>
                <div class="row featurette" style="padding: 20px">
                    <div class="col-md-6">
                        <img id='bildview' style='padding-top: 5px' class='featurette-image img-responsive' alt='Foto'>
                    </div>

                    <div class="col-md-6">
                        <h4 id="postingview"></h4>
                    </div>
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