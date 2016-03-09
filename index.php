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
        include "inc/index-body-aktuell-events-inc.php";
        include "inc/index-body-bootshaus-kontakt-inc.php";
        include "inc/index-body-footer-inc.php";
        include "inc/index-body-js-inc.php";


    }else{
        include "inc/index-body-nav-inc.php";
        include "inc/index-body-pageheader-inc.php";
        include "inc/index-body-aktuell-events-inc.php";
        include "inc/index-body-bootshaus-kontakt-inc.php";
        include "inc/index-body-footer-inc.php";
        include "inc/index-body-js-inc.php";

    }

?>

</body>
</html>