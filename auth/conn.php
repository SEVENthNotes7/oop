<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "friendsdb"; // database name

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
  die("Connection failes" . $conn->connect_error);
}
