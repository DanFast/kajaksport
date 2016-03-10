<div class="container">

    <div class="panel-group" id="accordion">

        <!-- Panel Profilbild ändern -->
        <div class="panel panel-success">
            <div class="panel-heading" style="background-color: #5BB85D">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <h4 class="panel-title text-center" style="color: #ffffff">Profilbild ändern</h4>
                </a>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <form  name="profilbildForm" action="controller/profilbild-bearbeiten-con.php" enctype="multipart/form-data" method="post" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0">
                                <div class="form-group">
                                    <label for="profilbild">Profilbild hochladen</label>
                                    <?php echo "<input type='file' name='profilbild' id='profilbild' accept='image/*' onchange='loadProfilbild(event)' value='".$profilbild."'>"?>
                                    <div class="media">
                                        <div class="media-left">
                                                <img id="profilbildview" style="max-height: 100px; max-width: 100px" class="media-object">
                                        </div>
                                    </div>
                                    <script>
                                        var loadProfilbild = function(event) {
                                            var output = document.getElementById('profilbildview');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            var outputsm = document.getElementById('profilbildviewsm');
                                            outputsm.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-md">Speichern</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Panel Passwort ändern -->
        <div class="panel panel-success">
            <div class="panel-heading" style="background-color: #5BB85D">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    <h4 class="panel-title text-center" style="color: #ffffff">Passwort ändern</h4>
                </a>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <form name="passwortForm" action="controller/passwort-bearbeiten-con.php" enctype="multipart/form-data" method="post" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0">
                                <div class="form-group ">
                                    <label for="passwortold">Altes Passwort</label>
                                    <?php echo "<input type='password' class='form-control' id='passwortold' required>"?>
                                </div>
                                <div class="form-group">
                                    <label for="passwortnew">Neues Password</label>
                                    <?php echo "<input type='password' class='form-control' id='passwortnew' required>"?>
                                </div>
                                <div class="form-group">
                                    <label for="passwortnew1">Neues Password wiederholen</label>
                                    <?php echo "<input type='password' class='form-control' id='passwortnew1' required>"?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-md">Speichern</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Panel Email ändern -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #5BB85D">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    <h4 class="panel-title text-center" style="color: #ffffff">Email ändern</h4>
                </a>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <form name="kontaktForm" action="controller/kontakt-bearbeiten-con.php" enctype="multipart/form-data" method="post" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0">
                                <div class="form-group ">
                                    <label for="email">Alte Email</label>
                                    <?php echo "<input type='email' class='form-control' id='emailold' value='".$email."' required>"?>
                                </div>
                                <div class="form-group ">
                                    <label for="emailnew">Neue Email</label>
                                    <?php echo "<input type='email' class='form-control' id='emailnew' required>"?>
                                </div>
                                <div class="form-group">
                                    <label for="emailnew1">Neue Email wiederholen</label>
                                    <?php echo "<input type='email' class='form-control' id='emailnew1' required>"?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-md">Speichern</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Panel Kontaktdaten ändern -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #5BB85D">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                    <h4 class="panel-title text-center" style="color: #ffffff">Kontaktdaten ändern</h4>
                </a>
            </div>

            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <form class="kontaktForm" action="controller/kontakt-bearbeiten-con.php" class="form-horizontal" enctype="multipart/form-data" method="post" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0">
                                <div class="form-group ">
                                    <label for="telefon">Telefonnummer</label>
                                    <?php echo "<input type='tel' class='form-control col-md-10' id='telefon' placeholder='Telefonnummer' value='0".$telefon."'>"?>
                                </div>
                                <div class="form-group ">
                                    <label for="strasse">Adresse</label>
                                    <?php echo "<input class='form-control' id='strasse' type='text' placeholder='Strasse' value='".$strasse."'>"?>
                                </div>
                                <div class="form-group">
                                    <label for="nummer"></label>
                                    <?php echo "<input class='form-control' id='text' type='number' placeholder='Nr.' value='".$nummer."'>"?>
                                </div>
                                <div class="form-group">
                                    <label for="plz"></label>
                                    <?php echo "<input class='form-control' id='plz' type='number' placeholder='Plz' value='".$plz."'>"?>
                                </div>
                                <div class="form-group">
                                    <label for="ort"></label>
                                    <?php echo "<input class='form-control' id='ort' type='text' placeholder='Ort' value='".$ort."'>"?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-md">Speichern</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Panel Beschreibung ändern -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #5BB85D">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                    <h4 class="panel-title text-center" style="color: #ffffff">Beschreibung ändern</h4>
                </a>
            </div>

            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    <form name="beschreibungForm" action="controller/kontakt-bearbeiten-con.php"  enctype="multipart/form-data" method="post" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0">
                                <div class="form-group">
                                    <label for="beschreibung1" class="control-label">Beschreibung Text 1</label>
                                    <?php echo "<textarea name='user-message' id='beschreibung1' class='form-control' cols='20' rows='5' value='".$beschreibung1."' placeholder='Schreibe etwas über dich'></textarea>"?>
                                </div><!-- End form group-->
                                <div class="form-group">
                                    <label for="textfoto1">Foto Text 1</label>
                                    <?php echo "<input type='file' id='textfoto1' accept='image/*' onchange='loadFile(event)' value='".$foto1."'>"?>
                                    <p class="help-block"></p>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img id="textfoto1viewsm" style="max-height: 100px; max-width: 100px" class="media-object">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var loadFile = function(event) {
                                        var output = document.getElementById('textfoto1view');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        var outputsm = document.getElementById('textfoto1viewsm');
                                        outputsm.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>


                                <div class="form-group">
                                    <label for="beschreibung2" class="control-label">Beschreibung Text 2 (Optional)</label>
                                    <?php echo "<textarea name='user-message' id='beschreibung2' class='form-control' cols='20' rows='5' value='".$beschreibung2."' placeholder='Schreibe etwas über dich'></textarea>"?>
                                </div><!-- End form group-->

                                <div class="form-group">
                                    <label for="textfoto2">Foto Text 2 (Optional)</label>
                                    <?php echo "<input type='file' id='textfoto2' accept='image/*' onchange='loadFile1(event)' value='".$foto2."'>"?>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img id="textfoto2viewsm" style="max-height: 100px; max-width: 100px" class="media-object">
                                            </a>
                                        </div>
                                    </div>
                                    <script>
                                        var loadFile1 = function(event) {
                                            var output = document.getElementById('textfoto2view');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            var outputsm = document.getElementById('textfoto2viewsm');
                                            outputsm.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#vorschauModal" id="vorschau">Vorschau</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success btn-block" id="speichern">Speichern</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                                <label >Email: <span id="emailview" ></span></label><br>
                                <label >Tel.: <span id="telefonview" ></span></label><br>
                                <label >Adresse: <span id="strasseview" ></span> <span id="nummerview" ></span> <span id="plzview" ></span> <span id="ortview" ></span></label>
                            </div>
                        </div>
                    </div>
                </h4>
            </div>

            <div class="modal-body">
                <div class="row featurette" style="padding: 20px">
                    <div class="col-md-6">
                        <?php echo "<img id='textfoto1view' style='padding-top: 5px' class='featurette-image img-responsive' src='".$foto1."' alt='Foto 1'>"?>
                    </div>

                    <div class="col-md-6">
                        <h4 id="beschreibung1view"></h4>
                    </div>
                </div>

                <div class="row featurette" style="padding: 20px">
                    <div class="col-md-6">
                        <h4 id="beschreibung2view"></h4>
                    </div>
                    <div class="col-md-6">
                        <?php echo "<img id='textfoto2view' style='padding-top: 5px' class='featurette-image img-responsive' src='".$foto2."' alt='Foto2'>"?>

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