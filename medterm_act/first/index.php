<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "friendsdb";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
    dei("Connection failes" . $conn->connect_error);
}

$sql = "select * from friendstbl";
$rs = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Insert New Record</title>
</head>

<body>
    <h1>Insert new Record</h1>
    <form action="insert.php" method="POST">
        <table>
            <tr>
                <td>firstname</td>
                <td><input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>lastname</td>
                <td><input type="text" name="lastname"></td>
            </tr>
            <tr>
                <td>phone</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="save"></td>
            </tr>
        </table>
    </form>
    <div class="all-user-table">
        <h1>all user</h1>
        <?php
        echo "
        <table>
        <thead>
        <tr>    
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
        </thead>
        ";

        if ($rs->num_rows > 0) {

            while ($row = $rs->fetch_assoc()) {
                echo "
            <tbody>
            <tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["fname"] . "</td>
                <td>" . $row["lname"] . "</td>
                <td>" . $row["pnum"] . "</td>
                <td><a href='delete.php?id=".$row["id"]."'>Delete</a></td>
            </tr>
            </tbody>";
            }
        }
        echo "</table>";
        $conn->close();
        ?>
    </div>
</body>

</html>