<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lks_database";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
    die("Connection failed". mysqli_connect_error());
} else {
    "Успех";
} ?>
