<?php
// koneksi ke mysql
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "budiman";
mysql_connect($dbHost, $dbUser, $dbPass);
mysql_select_db($dbName);
?>