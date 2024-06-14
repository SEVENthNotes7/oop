<?php
include ("conn.php");


if (isset($_POST["submit"])) {
  $uid = $_POST["id"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $phone = $_POST["phone"];

  $sql = "update friendstbl set fname='$fname', lname='$lname', pnum='$phone' where id='$uid'";

  if ($conn->query($sql) === true) {
    echo "Info updated successfully.<a href='index.php'>Home</a>";
  } else {
    echo "Update fails.";
  }

}
$conn ->close();
?>