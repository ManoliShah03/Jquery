<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "moviedata";

$conn = new mysqli($servername, $username, $password, );
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$createdb = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($createdb) === true) {

} else {
    echo "Error creating database: " . $conn->error;
}
$conn->select_db($dbname);
$createtb = "CREATE TABLE IF NOT EXISTS Movie (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(30),
    Rating INT
)";

if ($conn->query($createtb) === true) {
} else {
    echo "Error creating table: " . $conn->error;
}
