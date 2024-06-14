<?php
include ("conn.php");
if (isset($_GET["id"])) {
  $uid = $_GET["id"];
  $sql = "select * from friendstbl where id=" . $uid;
  $rs = $conn->query($sql);


  if ($rs->num_rows > 0) {

    while ($row = $rs->fetch_assoc()) {
      $fname = $row["fname"];
      $lname = $row["lname"];
      $phone = $row["pnum"];

    }
  }

}
?>
<form action="saveupdate.php" method="post">
  <h1>Update Records</h1>
  <input type="hidden" name="id" value="<?php echo $uid ?>">
  First Name:<input type="text" name="fname" value="<?php echo $fname ?>"><br>
  Last Name:<input type="text" name="lname" value="<?php echo $lname ?>"><br>
  Phone:<input type="text" name="phone" value="<?php echo $phone ?>"><br>
  <input type="submit" name="submit" id="submit" value="Save changes">
</form>
<hr>
<?php $conn->close(); ?>