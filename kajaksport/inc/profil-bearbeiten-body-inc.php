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
                                    <?php echo "<input type='file' name='profilbild' id='profilbild' accept='image/*' onchange='loadProfilbild(event)' value='".$profilbild."' required>"?>
                                    <div class="media">
                                        <div class="media-left">
                                                <img id="profilbildview" style="max-height: 200px; width: auto" class="media-object">
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

        <!-- Panel Titelbild ändern -->
        <div class="panel panel-success">
            <div class="panel-heading" style="background-color: #5BB85D">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                    <h4 class="panel-title text-center" style="color: #ffffff">Titelbild ändern</h4>
                </a>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    <form  name="titelbildForm" action="controller/titelbild-bearbeiten-con.php" enctype="multipart/form-data" method="post" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0">
                                <div class="form-group">
                                    <label for="titelbild">Titelbild hochladen</label>
                                    <?php echo "<input type='file' name='titelbild' id='titelbild' accept='image/*' onchange='loadTitelbild(event)' value='".$titelbild."' required>"?>
                                    <div class="media">
                                        <div class="media-left">
                                            <img id="titelbildview" style="max-height: 200px; width: auto" class="media-object">
                                        </div>
                                    </div>
                                    <script>
                                        var loadTitelbild = function(event) {
                                            var output = document.getElementById('titelbildview');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            var outputsm = document.getElementById('titelbildviewsm');
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

        <!-- Panel Beschreibung ändern -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #5BB85D">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                    <h4 class="panel-title text-center" style="color: #ffffff">Beschreibung ändern</h4>
                </a>
            </div>

            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    <form name="beschreibungForm" action="controller/beschreibung-bearbeiten-con.php"  enctype="multipart/form-data" method="post" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0">
                                <div class="form-group">
                                    <label for="beschreibung1" class="control-label">Beschreibung Text 1</label>
                                    <?php echo "<textarea name='beschreibung' id='beschreibung1' class='form-control' cols='20' rows='5' placeholder='Schreibe etwas über dich'></textarea>"?>
                                </div><!-- End form group-->


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
                                    <?php echo "<input type='number' class='form-control col-md-10' name='telefon' placeholder='Telefonnummer' value='".$telefon."'>"?>
                                </div>
                                <div class="form-group ">
                                    <label for="strasse">Adresse</label>
                                    <?php echo "<input class='form-control' name='strasse' type='text' placeholder='Strasse' value='".$strasse."'>"?>
                                </div>
                                <div class="form-group">
                                    <label for="nummer"></label>
                                    <?php echo "<input class='form-control' name='nummer' type='number' placeholder='Nr.' value='".$nummer."'>"?>
                                </div>
                                <div class="form-group">
                                    <label for="plz"></label>
                                    <?php echo "<input class='form-control' name='plz' type='number' placeholder='Plz' value='".$plz."'>"?>
                                </div>
                                <div class="form-group">
                                    <label for="ort"></label>
                                    <?php echo "<input class='form-control' name='ort' type='text' placeholder='Ort' value='".$ort."'>"?>
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

            <?php

                if(isset($_SESSION['passwortchange']) && $_SESSION['passwortchange']== "error"){
                     echo "
                             <div id='collapseTwo' class='panel-collapse collapse  show'>
                                <div class='panel-body'>
                                    <div class='alert alert-danger text-center' role='alert'>Ups, das sollte nicht passieren! Bitte nochmal probieren!...</div>
                                    <form name='passwortForm' action='controller/passwort-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                        <div class='row'>
                                            <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                                <div class='form-group '>
                                                    <label for='passwortold'>Altes Passwort</label>
                                                    <input type='password' class='form-control' name='passwortold' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='passwortnew'>Neues Password</label>
                                                    <input type='password' class='form-control' name='passwortnew' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='passwortnew1'>Neues Password wiederholen</label>
                                                    <input type='password' class='form-control' name='passwortnew1' required>
                                                </div>
                                                <div class='form-group'>
                                                    <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                     ";
                    $_SESSION['passwortchange'] = "false";
                }

                if(isset($_SESSION['passwortchange']) && $_SESSION['passwortchange']== "errorOldPw") {
                    echo "<div id='collapseTwo' class='panel-collapse collapse show'>
                                <div class='panel-body'>
                                    <div class='alert alert-danger text-center' role='alert'>Das alte Passwort ist falsch!</div>
                                    <form name='passwortForm' action='controller/passwort-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                        <div class='row'>
                                            <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                                <div class='form-group alert-danger'>
                                                    <label for='passwortold'>Altes Passwort</label>
                                                    <input type='password' class='form-control' name='passwortold' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='passwortnew'>Neues Password</label>
                                                    <input type='password' class='form-control' name='passwortnew' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='passwortnew1'>Neues Password wiederholen</label>
                                                    <input type='password' class='form-control' name='passwortnew1' required>
                                                </div>
                                                <div class='form-group'>
                                                    <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                         ";

                    $_SESSION['passwortchange'] = "false";
                }

                if(isset($_SESSION['passwortchange']) && $_SESSION['passwortchange']== "errorNewPw") {
                    echo "<div id='collapseTwo' class='panel-collapse collapse show'>
                            <div class='panel-body'>
                                <div class='alert alert-danger text-center' role='alert'>Die neuen Passwörter sind unterschiedlich!</div>
                                <form name='passwortForm' action='controller/passwort-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                    <div class='row'>
                                        <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                            <div class='form-group '>
                                                <label for='passwortold'>Altes Passwort</label>
                                                <input type='password' class='form-control' name='passwortold' required>
                                            </div>
                                            <div class='form-group alert-danger'>
                                                <label for='passwortnew'>Neues Password</label>
                                                <input type='password' class='form-control' name='passwortnew' required>
                                            </div>
                                            <div class='form-group alert-danger'>
                                                <label for='passwortnew1'>Neues Password wiederholen</label>
                                                <input type='password' class='form-control' name='passwortnew1' required>
                                            </div>
                                            <div class='form-group'>
                                                <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                     ";

                    $_SESSION['passwortchange'] = "false";
                }

                if(isset($_SESSION['passwortchange']) && $_SESSION['passwortchange']== "errorShort") {
                    echo "<div id='collapseTwo' class='panel-collapse collapse show'>
                                <div class='panel-body'>
                                    <div class='alert alert-danger text-center' role='alert'>Das neue Passwort ist zu kurz, es muss mindestens 6 Zeichen haben!</div>
                                    <form name='passwortForm' action='controller/passwort-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                        <div class='row'>
                                            <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                                <div class='form-group '>
                                                    <label for='passwortold'>Altes Passwort</label>
                                                    <input type='password' class='form-control' name='passwortold' required>
                                                </div>
                                                <div class='form-group alert-danger'>
                                                    <label for='passwortnew'>Neues Password</label>
                                                    <input type='password' class='form-control' name='passwortnew' required>
                                                </div>
                                                <div class='form-group alert-danger'>
                                                    <label for='passwortnew1'>Neues Password wiederholen</label>
                                                    <input type='password' class='form-control' name='passwortnew1' required>
                                                </div>
                                                <div class='form-group'>
                                                    <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                         ";

                    $_SESSION['passwortchange'] = "false";
                }

                if(isset($_SESSION['passwortchange']) && $_SESSION['passwortchange']== "errorEqual") {
                    echo "<div id='collapseTwo' class='panel-collapse collapse show'>
                                    <div class='panel-body'>
                                        <div class='alert alert-danger text-center' role='alert'>Das neue Passwort ist gleich dem Alten!?</div>
                                        <form name='passwortForm' action='controller/passwort-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                            <div class='row'>
                                                <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                                    <div class='form-group '>
                                                        <label for='passwortold'>Altes Passwort</label>
                                                        <input type='password' class='form-control' name='passwortold' required>
                                                    </div>
                                                    <div class='form-group alert-danger'>
                                                        <label for='passwortnew'>Neues Password</label>
                                                        <input type='password' class='form-control' name='passwortnew' required>
                                                    </div>
                                                    <div class='form-group alert-danger'>
                                                        <label for='passwortnew1'>Neues Password wiederholen</label>
                                                        <input type='password' class='form-control' name='passwortnew1' required>
                                                    </div>
                                                    <div class='form-group'>
                                                        <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                             ";

                    $_SESSION['passwortchange'] = "false";
                }

                else{
                        echo "<div id='collapseTwo' class='panel-collapse collapse'>
                                <div class='panel-body'>
                                    <form name='passwortForm' action='controller/passwort-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                        <div class='row'>
                                            <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                                <div class='form-group '>
                                                    <label for='passwortold'>Altes Passwort</label>
                                                    <input type='password' class='form-control' name='passwortold' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='passwortnew'>Neues Password</label>
                                                    <input type='password' class='form-control' name='passwortnew' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='passwortnew1'>Neues Password wiederholen</label>
                                                    <input type='password' class='form-control' name='passwortnew1' required>
                                                </div>
                                                <div class='form-group'>
                                                    <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                         ";
                }

            ?>
        </div>

        <!-- Panel Email ändern -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #5BB85D">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    <h4 class="panel-title text-center" style="color: #ffffff">Email ändern</h4>
                </a>
            </div>

            <?php
                if(isset($_SESSION['emailchange']) && $_SESSION['emailchange']== "error") {
                    echo "

                        <div id='collapseThree' class='panel-collapse collapse show'>
                                <div class='panel-body'>
                                    <div class='alert alert-danger text-center' role='alert'>Ups, das sollte nicht passieren! Bitte nochmal probieren!...</div>
                                    <form name='kontaktForm' action='controller/email-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                        <div class='row'>
                                            <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                                <div class='form-group '>
                                                    <label for='email'>Alte Email</label>
                                                   <input type='email' class='form-control' name='emailold' value='".$email."' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='emailnew'>Neue Email</label>
                                                    <input type='email' class='form-control' name='emailnew' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='emailnew1'>Neue Email wiederholen</label>
                                                    <input type='email' class='form-control' name='emailnew1' required>
                                                </div>
                                                <div class='form-group'>
                                                    <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                                </div>
                                            </div>
                                        </div>
                                     </form>
                                </div>
                        </div>
                    ";

                    $_SESSION['emailchange'] = "false";
                }

                if(isset($_SESSION['emailchange']) && $_SESSION['emailchange']== "errorOldEmail") {
                    echo "

                            <div id='collapseThree' class='panel-collapse collapse show'>
                                    <div class='panel-body'>
                                        <div class='alert alert-danger text-center' role='alert'>Die alte Email ist falsch!</div>
                                        <form name='kontaktForm' action='controller/email-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                            <div class='row'>
                                                <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                                    <div class='form-group alert-danger'>
                                                        <label for='email'>Alte Email</label>
                                                       <input type='email' class='form-control' name='emailold' value='".$email."' required>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='emailnew'>Neue Email</label>
                                                        <input type='email' class='form-control' name='emailnew' required>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='emailnew1'>Neue Email wiederholen</label>
                                                        <input type='email' class='form-control' name='emailnew1' required>
                                                    </div>
                                                    <div class='form-group'>
                                                        <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                                    </div>
                                                </div>
                                            </div>
                                         </form>
                                    </div>
                            </div>
                        ";

                    $_SESSION['emailchange'] = "false";

                }

                if(isset($_SESSION['emailchange']) && $_SESSION['emailchange'] == "errorNewEmail") {
                    echo "

                                <div id='collapseThree' class='panel-collapse collapse show'>
                                        <div class='panel-body'>
                                            <div class='alert alert-danger text-center' role='alert'>Die neuen Emails stimmen nicht überein!</div>
                                            <form name='kontaktForm' action='controller/email-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                                <div class='row'>
                                                    <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                                        <div class='form-group'>
                                                            <label for='email'>Alte Email</label>
                                                           <input type='email' class='form-control' name='emailold' value='".$email."' required>
                                                        </div>
                                                        <div class='form-group alert-danger'>
                                                            <label for='emailnew'>Neue Email</label>
                                                            <input type='email' class='form-control' name='emailnew' required>
                                                        </div>
                                                        <div class='form-group alert-danger'>
                                                            <label for='emailnew1'>Neue Email wiederholen</label>
                                                            <input type='email' class='form-control' name='emailnew1' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                                        </div>
                                                    </div>
                                                </div>
                                             </form>
                                        </div>
                                </div>
                            ";

                    $_SESSION['emailchange'] = "false";
                }

                if(isset($_SESSION['emailchange']) && $_SESSION['emailchange']== "errorEqual") {
                    echo "

                                    <div id='collapseThree' class='panel-collapse collapse show'>
                                            <div class='panel-body'>
                                                <div class='alert alert-danger text-center' role='alert'>Die neue und alte Emailadresse ist gleich!</div>
                                                <form name='kontaktForm' action='controller/email-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                                    <div class='row'>
                                                        <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                                            <div class='form-group alert-danger'>
                                                                <label for='email'>Alte Email</label>
                                                               <input type='email' class='form-control' name='emailold' value='".$email."' required>
                                                            </div>
                                                            <div class='form-group alert-danger'>
                                                                <label for='emailnew'>Neue Email</label>
                                                                <input type='email' class='form-control' name='emailnew' required>
                                                            </div>
                                                            <div class='form-group alert-danger'>
                                                                <label for='emailnew1'>Neue Email wiederholen</label>
                                                                <input type='email' class='form-control' name='emailnew1' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </form>
                                            </div>
                                    </div>
                                ";

                    $_SESSION['emailchange'] = "false";
                }

                else{

                    echo "
                                    <div id='collapseThree' class='panel-collapse collapse'>
                                            <div class='panel-body'>
                                                <form name='kontaktForm' action='controller/email-bearbeiten-con.php' enctype='multipart/form-data' method='post' style='padding-top: 20px'>
                                                    <div class='row'>
                                                        <div class='col-lg-6 col-lg-offset-3 col-md-offset-0 col-sm-offset-0'>
                                                            <div class='form-group'>
                                                                <label for='email'>Alte Email</label>
                                                               <input type='email' class='form-control' name='emailold' value='".$email."' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label for='emailnew'>Neue Email</label>
                                                                <input type='email' class='form-control' name='emailnew' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label for='emailnew1'>Neue Email wiederholen</label>
                                                                <input type='email' class='form-control' name='emailnew1' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <button type='submit' class='btn btn-success btn-md'>Speichern</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </form>
                                            </div>
                                    </div>
                                ";

                }

            ?>
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
                        <?php echo "<img id='textfoto1view' style='padding-top: 5px' class='featurette-image img-responsive' src='".$titelbild."' alt='Foto 1'>"?>
                    </div>

                    <div class="col-md-6">
                        <h4 id="beschreibung1view" src="#beschreibung1"></h4>
                    </div>
                </div>
                <!--
                <div class="row featurette" style="padding: 20px">
                    <div class="col-md-6">
                        <h4 id="beschreibung2view"></h4>
                    </div>
                    <div class="col-md-6">

                        /*<?php echo "<img id='textfoto2view' style='padding-top: 5px' class='featurette-image img-responsive' src='".$foto2."' alt='Foto2'>"?>*/

                    </div>
                </div>
                -->
            </div>
            <div class="modal-footer">
                <div class="text-center">

                        <button class="btn btn-success btn-block col-lg-12" data-dismiss="modal">Zurück</button>

                </div>
            </div>
        </div>
    </div>
</div>