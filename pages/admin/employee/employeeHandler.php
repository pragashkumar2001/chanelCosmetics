<?php
include_once '../../../configs/database.php';

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="employeeDetails.php"';
  echo '</script>';
}


if (isset($_POST["editEmployeeBtn"])) {
  $id = $_POST["id"];
  $status = $_POST["lstStatus"];

  $sql = "UPDATE `employeedetail` SET `status`='$status' WHERE `employee_id`=$id;";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to update Employee: " . mysqli_error($conn));
  } else {
    func_alert("Employee Updated Successfully!!!");
  }
}
?>