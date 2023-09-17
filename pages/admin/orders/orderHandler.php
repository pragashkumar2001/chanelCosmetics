<?php
include_once '../../../configs/database.php';

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="orders.php"';
  echo '</script>';
}


if (isset($_POST["editOrderBtn"])) {
  $id = $_POST["id"];
  $status = $_POST["lstStatus"];

  $sql = "UPDATE `customer_order` SET `status`='$status' WHERE `order_id`=$id;";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to update order: " . mysqli_error($conn));
  } else {
    func_alert("Order Updated Successfully!!!");
  }
}
?>