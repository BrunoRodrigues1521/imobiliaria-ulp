<?php
$servername = "localhost";
$username = "root";
$password = "#Qwerty3";
$db = "imobiliaria";
$mysqli = mysqli_connect($servername, $username, $password, $db);

// check connection
if (mysqli_connect_error()) {
    die("Connection error: " . $mysqli->connect_error);
}
?>
