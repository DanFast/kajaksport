
    <div style=" position:fixed; padding-top: 50px; padding-left: 100px;" id="sponsor1">

        <img src="img/eww.png">
    </div>

    <div style=" position:fixed; padding-top: 180px; padding-left: 100px;" id="sponsor1">
        <img src="img/sleasing176x98.png">
    </div>

<nav class="container navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-xs" href="index.php" style="padding-top: 19px"><img class="imgbrand img-circle" alt="Home" src="img/LogoWFV.png"></a>
            <a class="navbar-brand hidden-md hidden-lg hidden-sm" href="index.php"><img class="imgbrand img-circle" alt="Home" src="img/LogoWFV.png"></a>
            <div class="navbar-text hidden-sm hidden-xs" style="margin-left: -6px; padding-top: 7px"><b>Welser Faltbootverein</b></div>
        </div>



        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div class="btn-group btn-group-lg">
                        <a  href="#aktuell" type="button" class="btn btn-lg navbar-btn btn-success" style="background: transparent; border: none">Aktuell</a>
                    </div>
                </li>
                <li>
                    <!-- Split button -->
                    <div class="btn-group btn-group-lg" role="group">
                        <a type="button" class="btn navbar-btn btn-lg btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=" margin-left: -18px; background: transparent; border: none">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><span class="glyphicon glyphicon-picture" aria-hidden="true" style="padding-right: 5px"></span> Fotos</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true" style="padding-right: 5px"></span> Videos</a></li>
                            <li><a href="bericht.php"><span class="glyphicon glyphicon-comment" aria-hidden="true" style="padding-right: 5px"></span> Berichte</a></li>
                            <li><a href="pinnwand.php"><span class="glyphicon glyphicon-pushpin" aria-hidden="true" style="padding-right: 5px"></span> Pinnwand</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <div class="btn-group btn-group-lg">
                        <a  href="#events" type="button" class="btn btn-lg navbar-btn btn-success" style="background: transparent; border: none">Events</a>
                    </div>
                </li>
                <li>
                    <div class="btn-group btn-group-lg">
                        <a  href="#bootshaus" type="button" class="btn btn-lg navbar-btn btn-success" style="background: transparent; border: none">Bootshaus</a>
                    </div>
                </li>
                <li>
                    <div class="btn-group btn-group-lg">
                        <a  href="#sponsoren" type="button" class="btn btn-lg navbar-btn btn-success" style="background: transparent; border: none">Sponsoren</a>
                    </div>
                </li>
                <li>
                    <div class="btn-group btn-group-lg">
                        <a  href="#kontakt" type="button" class="btn btn-lg navbar-btn btn-success" style="background: transparent; border: none">Kontakt</a>
                    </div>
                </li>

                <li>
                        <!-- Split button -->
                        <div class="btn-group btn-group-lg" role="group">
                            <a type="button" class="btn navbar-btn btn-lg btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=" margin-left: -10px; background: transparent; border: none">
                                Intern
                                <span class="caret" style="margin-left: 5px"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><span class="glyphicon glyphicon-download-alt" aria-hidden="true" style="padding-right: 5px"></span> Downloads</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-link" aria-hidden="true" style="padding-right: 5px"></span> Links</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-right: 5px"></span> Mitglieder</a></li>
                                <li class="divider"></li>
                                <li><a href="" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true" style="padding-right: 5px"></span> Login</a></li>
                            </ul>
                        </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Mitglieder Login</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="controller/login-con.php" role="form">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">@</span>
                        <input type="text" name="loginEmail" placeholder="Email" class="form-control">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon2" aria-hidden="true"></span>
                        <input type="password" name="loginPasswort" placeholder="Passwort" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block" style="margin-top: 10px">Login!</button>
                </form>
            </div>
        </div>
    </div>
</div>