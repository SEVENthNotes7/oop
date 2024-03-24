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
}
echo "</table>";
$conn->close();
?>