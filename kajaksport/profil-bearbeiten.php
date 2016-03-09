<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php
include "inc/head-tag-inc.php";
?>

<body>
<?php
if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
    $email = $_SESSION["emailSession"];

    include "inc/nav-login-success.php";
    include "inc/login-success-pageheader-inc.php";
    include "inc/profil-bearbeiten-body-inc.php";
    include "inc/profil-bearbeiten-body-js.php";

} else {
    $host  = htmlspecialchars($_SERVER["HTTP_HOST"]);
    $uri   = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "/\\");
    $extra = "login-fail.php";
    header("Location: http://$host$uri/$extra");
}
?>

</body>
</html>