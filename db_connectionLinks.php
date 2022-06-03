<?php

$server = "localhost";
$username = "root";
$password = "";
$dbase = "links";

$conn = mysqli_connect($server, $username, $password, $dbase);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>