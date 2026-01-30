<?php
$server = "127.0.0.1";
$user = "root";
$pass = "root";
$db = "phonebook_db";
$port = 8889;


$conn = mysqli_connect($server, $user, $pass, $db, $port);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}


?>