<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "productdb";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failes" . $conn->connect_error);
}

$sql = "delete from tbl_products where id=".$_GET["id"];


if ($conn->query($sql) === true) {
    echo "record".$_GET["id"]."deleted";
    echo "<a href='index.php'>back</a>";
}else{
    echo "record failed to delete";
    echo "<a href='index.php'>back</a>";
}
$conn->close();

?>