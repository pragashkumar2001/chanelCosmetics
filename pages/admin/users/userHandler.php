<?php
include_once '../../../configs/database.php';

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="users.php"';
  echo '</script>';
}

if (isset($_POST["createUserBtn"])) {
  $firstName = $_POST["txtFirstName"];
  $lastName = $_POST["txtLastName"];
  $email = $_POST["txtEmail"];
  $password = $_POST["txtPassword"];
  $address = $_POST["txtAddress"];
  $phoneNo = $_POST["txtPhoneNo"];
  $role = "Administrator";

  $sql = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `password`, `address`, `phone_no`, `role`) 
  VALUES ('$firstName','$lastName','$email','$password','$address','$phoneNo','$role');";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to insert a new user: " . mysqli_error($conn));
  } else {
    func_alert("User Added Successfully!!!");
  }
}

if (isset($_POST["editUserBtn"])) {
  $id = $_POST["id"];
  $firstName = $_POST["txtFirstName"];
  $lastName = $_POST["txtLastName"];
  $email = $_POST["txtEmail"];
  $password = $_POST["txtPassword"];
  $address = $_POST["txtAddress"];
  $phoneNo = $_POST["txtPhoneNo"];
  $role = "Administrator";

  $sql = "UPDATE `user` SET `first_name` = '$firstName', `last_name` = '$lastName', `email` = '$email', `password` = '$password', `address` = '$address',
   `phone_no` = '$phoneNo', `role` = '$role' WHERE `user_id` = $id";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to update user: " . mysqli_error($conn));
  } else {
    func_alert("User Updated Successfully!!!");
  }
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql = "DELETE FROM user WHERE user_id=$id";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to delete user: " . mysqli_error($conn));
  } else {
    func_alert("Deleted Successfully!!!");
  }
}
?>