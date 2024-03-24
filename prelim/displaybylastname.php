<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "employeedb";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
    dei("Connection failes" . $conn->connect_error);
}

$sql = "select * from employee_info";
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
    <form action="displaybylastname.php" method="post">
        Enter Last Name:
        <input type="text" name="lastName"><br>
        <input type="submit" name="submit" value="Sarch">
    </form>
    <?php
    echo "
    <table>
    <thead> 
    <tr>    
        <th>ID</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Phone No.</th>
        <th>Department</th>
        <th>Status</th>
    </tr>
    </thead>
    ";
    if (!empty ($_POST["submit"]) && !empty ($_POST["lastName"])) {
        $lastName = $conn->real_escape_string($_POST["lastName"]);
        $sql = "select * from employee_info where last_name = '$lastName' ";
        $rs = $conn->query($sql);
        if ($rs->num_rows > 0) {
            while ($row = $rs->fetch_assoc()) {
                echo "
                <tbody>
                <tr>
                    <td>" . $row["emp_id"] . "</td>
                    <td>" . $row["first_name"] . "</td>
                    <td>" . $row["middle_name"] . "</td>
                    <td>" . $row["last_name"] . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>" . $row["phone"] . "</td>
                    <td>" . $row["departmant"] . "</td>
                    <td>" . $row["status"] . "</td>
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