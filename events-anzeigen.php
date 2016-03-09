<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "inc/head-tag-inc.php";
?>
<body style="background-color: ghostwhite">

<?php
if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
    $email = $_SESSION["emailSession"];
    include "inc/nav-login-success.php";
    include "inc/event-calendar-inc.php";
    include "inc/index-body-footer-inc.php";
    include "inc/index-body-js-inc.php";


}else{
    include "inc/index-body-nav-inc.php";
    include "inc/event-calendar-inc.php";
    include "inc/index-body-footer-inc.php";
    include "inc/index-body-js-inc.php";
}

?>

</body>
</html>