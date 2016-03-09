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
            <a class="navbar-brand" href="index.php"><img class="imgbrand" alt="Home" src="img/LogoWFV.png"></a>
            <div class="navbar-text hidden-sm hidden-xs" style="margin-left: -10px">Welser Faltbootverein</div>
        </div>



        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#aktuell">Aktuell <span class="sr-only">(current)</span></a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="#bootshaus">Bootshaus</a></li>
                <li><a href="#sponsoren">Sponsoren</a></li>
                <li><a href="#kontakt">Kontakt</a></li>
                <li><a href="#">Pinnwand</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Intern<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><span class="glyphicon glyphicon-download-alt" aria-hidden="true" style="padding-right: 5px"></span> Downloads</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-link" aria-hidden="true" style="padding-right: 5px"></span> Links</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-right: 5px"></span> Mitglieder</a></li>
                        <li class="divider"></li>
                        <li><a href="" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true" style="padding-right: 5px"></span> Login</a></li>
                    </ul>
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
                <div class="text-center alert-danger">Login Fehlgeschlagen!</div>
                <br>
                <form class="form-group has-error" method="post" action="controller/login-con.php" role="form">
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