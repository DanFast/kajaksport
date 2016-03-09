<!-- Facebook iframe -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Page Content -->
<div class="container" style="padding-top: 40px">
    <div class="page-header">
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <?php echo"<img style='max-height: 100px; max-width: 100px' class='media-object' src='".$profilbild."' alt='Profilbild'>"?>
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <?php
                    echo $email;
                    ?>
                </h4>
                Willkommen zurück!
            </div>

            <div class="row" style="padding-top: 20px">
                <div class="col-lg-2 col-lg-offset-1">
                    <a href="fahrtenbuch.php" type="button" class="btn btn-success btn-block" onclick="">
                        Fahrtenbuch <span class="glyphicon glyphicon-book" aria-hidden="true" style="padding-left: 5px"></span>
                    </a>
                </div>
                <div class="col-lg-2">
                    <a href="bericht-schreiben.php" type="button" class="btn btn-success btn-block">
                        Bericht schreiben <span class="glyphicon glyphicon-pencil" aria-hidden="true"  style="padding-left: 5px"></span>
                    </a>
                </div>
                <div class="col-lg-2">
                    <a href="event-eintrag.php" type="button" class="btn btn-success btn-block">
                        Event eintragen <span class="glyphicon glyphicon-copy" aria-hidden="true"  style="padding-left: 5px"></span>
                    </a>
                </div>
                <div class="col-lg-2">
                    <a href="pinnwand-eintrag.php" type="button" class="btn btn-success btn-block">
                        Pinnwandeintrag <span class="glyphicon glyphicon-pushpin" aria-hidden="true"  style="padding-left: 5px"></span>
                    </a>
                </div>
                <div class="col-lg-2">
                    <a href="profil.php" type="button" class="btn btn-success btn-block">
                        Profil anzeigen <span class="glyphicon glyphicon-user" aria-hidden="true"  style="padding-left: 5px"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
