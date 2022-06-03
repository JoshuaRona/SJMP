<?php

$server = "sql203.epizy.com";
$username = "epiz_31877959";
$password = "pZT7TSITidY";
$dbase = "epiz_31877959_sanjoseparish";

$conn = mysqli_connect($server, $username, $password, $dbase);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>