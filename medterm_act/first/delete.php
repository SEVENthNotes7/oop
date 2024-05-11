<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "friendsdb";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
    dei("Connection failes" . $conn->connect_error);
}

$sql = "delete from friendstbl where id=".$_GET["id"];


if ($conn->query($sql) === true) {
    echo "record".$_GET["id"]."deleted";
    echo "<a href='index.php'>back</a>";
}else{
    echo "record failed to delete";
    echo "<a href='index.php'>back</a>";
}
$conn->close();
?>