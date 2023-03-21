<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "userlogin";

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
$createtb = "CREATE TABLE IF NOT EXISTS post (
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(15) NOT NULL,
    last_name VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)";

if ($conn->query($createtb) === true) {
} else {
    echo "Error creating table: " . $conn->error;
}
