<?php
session_start();
include_once '../../../configs/database.php';

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="products.php"';
  echo '</script>';
}

if (isset($_POST["createProductBtn"])) {
  $date = date_create();
  $dbimage = "assets/uploads/" . date_timestamp_get($date) ."-". basename($_FILES["imageFile"]["name"]);
  $image = "../../../assets/uploads/" . date_timestamp_get($date) ."-". basename($_FILES["imageFile"]["name"]);

  if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $image)) {
    $productName = $_POST["txtProductName"];
    $description = $_POST["txtDescription"];
    $quantity = $_POST["txtQuantity"];
    $unitPrice = $_POST["txtUnitPrice"];
    $brandId = $_POST["txtBrandId"];
    $categoryId = $_POST["txtCategoryId"];

    $sql = "INSERT INTO `product` (`name`, `description`,`image`, `quantity`, `unit_price`, `brand_id`, `category_id`) 
          VALUES ('$productName', '$description', '$dbimage', '$quantity', '$unitPrice', '$brandId', '$categoryId');";

    if (!mysqli_query($conn, $sql)) {
      func_alert("Unable to insert a new product: " . mysqli_error($conn));
    } else {
      func_alert("Product Added Successfully!!!");
    }
  } else {
    func_alert("Unable insert a product image: " . mysqli_error($conn));
  }
}

if (isset($_POST["editProductBtn"])) {
  $id = $_POST["id"];
  $productName = $_POST["txtProductName"];
  $description = $_POST["txtDescription"];
  $quantity = $_POST["txtQuantity"];
  $unitPrice = $_POST["txtUnitPrice"];
  $brandId = $_POST["txtBrandId"];
  $categoryId = $_POST["txtCategoryId"];

  if (!file_exists($_FILES['imageFile']["tmp_name"]) || !is_uploaded_file($_FILES['imageFile']["tmp_name"])) {
    $image = $_SESSION["image"];
    $dbImage = $_SESSION["dbImage"];
  } else {
    $date = date_create();
    $image = "../../../assets/uploads/" . date_timestamp_get($date) ."-". basename($_FILES["imageFile"]["name"]);
    $dbImage = "assets/uploads/" . date_timestamp_get($date) ."-". basename($_FILES["imageFile"]["name"]);
    move_uploaded_file($_FILES["imageFile"]["tmp_name"], $image);
  }

  $sql = "UPDATE `product` SET `name` = '$productName', `description` = '$description', `image` = '$dbImage',
   `quantity` = '$quantity', `unit_price` = '$unitPrice', `brand_id` = '$brandId', `category_id` = '$categoryId' WHERE `product_id` = $id";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable update product: " . mysqli_error($conn));
  } else {
    func_alert("Product Updated Successfully!!!");
  }
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $sql = "DELETE FROM `product` WHERE `product_id` = $id";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to delete product: " . mysqli_error($conn));
  } else {
    func_alert("Product Deleted Successfully!!!");
  }
}

mysqli_close($conn);
