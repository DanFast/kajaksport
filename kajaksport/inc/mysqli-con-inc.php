<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "kajaksport");

if ($mysqli->connect_error) {
echo "Fehler bei Verbindung zur Datenbank: " . mysqli_connect_error();
exit();
}