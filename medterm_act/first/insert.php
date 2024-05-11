<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "friendsdb";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
    die("connectoin failed" . $conn->connect_error);
}
if (!empty($_POST["submit"])) {
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $pnum = $_POST["phone"];

    $val_query = "select * from friendstbl where fname='$fname' && lname='$lname'";
    $result = mysqli_query($conn, $val_query);

    if (mysqli_num_rows($result) > 0) {
        echo "repeated!<a href='index.php'>BACK</a>";
    } else {
        $sql = "insert into friendstbl(fname, lname, pnum) values('$fname', '$lname', '$pnum')";
        if ($conn->query($sql) === true) {
            echo "New Record created!<a href='index.php'>BACK</a>";

        } else {
            echo "New Record created failed!" . $conn->error;
        }
    }
}

echo "</table>";
$conn->close();
?>