<?php

$server = "localhost";
$username = "epiz_31877959";
$password = "pZT7TSITidY";
$database = "links";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>