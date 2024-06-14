<?php
session_start();
if (isset($_SESSION["admin"])) {
  header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Register</h1>
  <form action="registeruser.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username"><br>
    <label for="password">Password</label>
    <input type="text" name="password"><br>
    <input type="submit" name="submit" value="Register">
  </form>
  <a href="login.php">Login</a>
</body>

</html>