<?php

if (isset($_GET['confirmed']) && $_GET['confirmed'] == "yes") {
    $id = $_GET['id'];
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "MyDb";

    $conn = new mysqli($host, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed" . $conn->connect_error);
    }

    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === true) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Deletion cancelled.";
}
$conn->close();
?>




















// $sql = "select * from <table name>";
    // $rs = $conn->query($sql);

    // if ($rs->num_rows > 0) {

    // while ($row = $rs->fetch_assoc()) {
    // echo "
    // <tbody>
        // <tr>
            // <td>" . $row["id"] . "</td>
            // <td>" . $row["username"] . "</td>
            // <td>" . $row["email"] . "</td>
            // <td>
                // <a href='delete.php?id=" . $row["id"] . "'>Delete</a> |
                // <a href='update.php?id=" . $row["id"] . "'>Edit</a>
                // </td>
            // </tr>
        // </tbody>";
    // }
    // }
    // echo "</table>";




// echo "
// <table>
    // <thead>
        // <tr>
            // <th>ID</th>
            // <th>First Name</th>
            // <th>Last Name</th>
            // <th>Phone Number</th>
            // </tr>
        // </thead>
    // ";