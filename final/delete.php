<?php
include "conn.php";

$sql = "delete from tbl_products where id=".$_GET["id"];


if ($conn->query($sql) === true) {
    echo "record".$_GET["id"]."deleted";
    echo "<a href='dashboard.php'>back</a>";
}else{
    echo "record failed to delete";
    echo "<a href='dashboard.php'>back</a>";
}
$conn->close();

?>