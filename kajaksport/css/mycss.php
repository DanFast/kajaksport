<?php
    session_start();
    header('Content-type: text/css; charset:UTF-8');
    $titelbild = "../";
    $titelbild .= $_SESSION["titelbild"];

?>

/* ------------------- Jumbotron Styling ------------------- */

.jumbotron {
    /*background: #000 url("../img/IMG_1251.JPG") no-repeat center center;*/
    background-image: url("<?php echo $titelbild; ?>");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    background-attachment: fixed;
    -moz-background-size: 100% 100%;
    -webkit-background-size: 100% 100%;
    -o-background-size: 100% 100%;
    color: #FFF; // change text color
}