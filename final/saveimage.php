<?php
include "conn.php";

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["product_image"]["name"]);

if (!empty($_POST["submit"])) {
  $product_name = $_POST["product_name"];
  $price = $_POST["product_price"];
  $quant = $_POST["product_quantity"];

  if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["product_image"]["name"])) . " has been uploaded successfully.<br>";

      $imageName = "img/" . htmlspecialchars(basename($_FILES["product_image"]["name"]));

      $sql = $conn->prepare("INSERT INTO tbl_products (product_name, price, quantity, imageloc) VALUES (?, ?, ?, ?)");
      
      $sql->bind_param("sdis", $product_name, $price, $quant, $imageName);
      $sql->execute();

      // Check if the insertion was successful
      if ($sql->affected_rows > 0) {
          echo "Product details inserted into database successfully.<a href='dashboard.php'>Go back</a><br>";
      } else {
          echo "Error inserting product details into database.<br>";
      }

      $sql->close();
  } else {
      echo "Failed to upload image. <a href='index.php'>Go back</a>";
  }
} else {
  echo "No data submitted. <a href='index.php'>Go back</a>";
}

$conn->close();
?>