<?php
include_once '../../../configs/database.php';

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="categories.php"';
  echo '</script>';
}

if (isset($_POST["createCategoryBtn"])) {
  $categoryName = $_POST["txtCategoryName"];
  
  $sql = "INSERT INTO `category` (`name`) VALUES ('$categoryName');";
  
  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to insert a new category: " . mysqli_error($conn));
  } else {
    func_alert("Category Added Successfully!!!");
  }
}

if (isset($_POST["editCategoryBtn"])) {
  $id = $_POST["id"];
  $categoryName = $_POST["txtCategoryName"];
  
  $sql = "UPDATE `category` SET `name` = '$categoryName' WHERE `category_id` = $id";
  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to update category: " . mysqli_error($conn));
  } else {
    func_alert("Category Updated Successfully!!!");
  }
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  
  $sql = "DELETE FROM `category` WHERE `category_id` = $id";
  
  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to delete category: " . mysqli_error($conn));
  } else {
    func_alert("Category Deleted Successfully!!!");
  }
}

mysqli_close($conn);

?>