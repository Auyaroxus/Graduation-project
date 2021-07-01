<?php
$serverName = "sql4.webzdarma.cz";
$dbUserName = "fyzikachytra9635";
$dbPassword = "Queu2g507v6%It4f2D#-";
$dbName = "fyzikachytra9635";

$connection = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$connection) {
    die("Connection failed: ".mysqli_connect_error());
}


