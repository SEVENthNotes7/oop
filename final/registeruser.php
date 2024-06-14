<?php
include "conn.php";

$username = $_POST["username"];
$password = md5($_POST['password']);
$user_type = "Client";

$sql = "INSERT INTO users (username, password, user_type) VALUES ('$username', '$password' , '$user_type')";

if ($conn->query($sql) === true) {
  echo "Successfully Created. <a href='login.php'>Login</a>";
} else {
  echo "Registration Failed.<a href='register.php'>Try again.</a><br>" . $sql . "<br>" . $conn->error;
}

$conn->close();
