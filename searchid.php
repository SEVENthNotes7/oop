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
    <title>Document</title>
</head>

<body>
    <form action="searchid.php" method="post">
        Enter ID:
        <input type="text" name="id"><br>
        <input type="submit" name="submit" value="Sarch">
    </form>
    <?php
    echo "
    <table>
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone Number</th>
    </tr>
    </thead>
    ";
    if (!empty($_POST["submit"]) && !empty($_POST["id"])) {
        $sql = "select * from friendstbl where id=" . $_POST["id"];
        $rs = $conn->query($sql);
        if ($rs->num_rows > 0) {

            while ($row = $rs->fetch_assoc()) {
                echo "
            <tbody>
            <tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["fname"] . "</td>
                <td>" . $row["lname"] . "</td>
                <td>" . $row["pnum"] . "</td>
            </tr>
            </tbody>";
            }
        } else {
            echo "Record Not Found.";
        }
    }

    $conn->close();
    ?>
</body>

</html>