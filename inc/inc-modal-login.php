<?php
session_start();

    if(isset($_SESSION["login"]) && $_SESSION["login"] == "ok"){

        echo test;
    }else{

        echo failed;
    }





?>
