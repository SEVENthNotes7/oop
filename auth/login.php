<?php
$id = $_GET['id'];
$host = "localhost";
$username = "root";
$password = "";
$db = "MyDb"; // database name

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
  die("Connection failed" . $conn->connect_error);
}

$sql = "SELECT username, email FROM users WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<form action="check_update.php?id=<?php echo $id; ?>" method="post">
  <label for="username">Username:</label>
  <input type="text" name="username" id="username" value="<?php echo $row['username'] ?>" required>
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>" required>
  <input type="submit" value="Submit">
</form>