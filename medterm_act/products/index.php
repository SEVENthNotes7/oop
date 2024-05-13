<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "productdb";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
  dei("Connection failes" . $conn->connect_error);
}

$sql = "select * from tbl_products";
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
  <div class="container">
    <div class="form-container">
      <!-- form -->
      <form action="saveimage.php" method="POST" enctype="multipart/form-data">
        <h3>Add Product</h3>
        <span>Product Name: </span>
        <input type="text" name="product_name"><br>
        <span>Price:</span>
        <input type="number" name="product_price"><br>
        <span>Quantity: </span>
        <input type="number" name="product_quantity"><br>
        <span>Chose Image: </span>
        <input type="file" name="product_image"><br>
        <input type="submit" name="submit" id="btnsubmit" value="Save Product">
      </form>
    </div>
    <div class="product-table">
      <table>
        <thead>
          <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($rs->num_rows > 0) {
            while ($row = $rs->fetch_assoc()) {
              echo "
                <tr>
                    <td><img src=" . $row["imageloc"] . " alt='Product Image'></img></td>
                    <td>" . $row["product_name"] . "</td>
                    <td>" . $row["price"] . "</td>
                    <td>" . $row["quantity"] . "</td>
                    <td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>
                </tr>";
            }
          }
          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>