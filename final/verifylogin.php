<?php
session_start();
if (isset($_SESSION['admin'])) {
  header("location: dashboard.php");
}
include ("conn.php");

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if ($username === $row["username"] && $password === $row["password"]) {
        $_SESSION["admin"] = $username;
        header("location:dashboard.php");
      } else {
        echo "Login Failed.<a href='login.php'>Try again.</a>";
      }
    }
  }
}