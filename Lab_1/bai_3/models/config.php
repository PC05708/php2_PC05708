<?php
$server = "localhost";
$username = "root";
$password = "mysql";
$database = "php2";

global $connection;
$connection = mysqli_connect($server, $username, $password, $database);
if (!$connection) {
    echo "Loi ket noi database";
    die();
}
