<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "employeedb";

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_error){
    die("connectoin failed" . $conn->connect_error);
}

$sql = "select * from employee_info";
$rs = $conn->query($sql);

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
}

echo "</table>";
$conn->close();
?>