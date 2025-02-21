<?php

$localhost = "localhost";
$root = "root";
$pw = "";
$db = "bookdb";

$conn = new mysqli($localhost, $root, $pw, $db);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}


?>
