<?php

session_start();
if (isset($_SESSION["admin"])) {
  header("location: dashboard.php");
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
  <h1>Login</h1>
  <form action="verifylogin.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username"><br>
    <label for="password">Password</label>
    <input type="password" name="password"><br>
    <input type="submit" name="submit" value="Login">
  </form>
  <a href="register.php">Register</a>
</body>

</html>