<?php

$server = "localhost";
$username = "epiz_31877959";
$password = "pZT7TSITidY";
$dbase = "links";

$conn = mysqli_connect($server, $username, $password, $dbase);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>