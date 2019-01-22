<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "budiman";

$kon = mysqli_connect($servername, $username, $password, $dbname);
if (!$kon) {
    die("Connection Failed:" . mysqli_connect_error());
}
?>