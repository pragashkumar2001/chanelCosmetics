<?php
include_once '../../../configs/database.php';

//alert function
function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="employeeDetails.php"';
  echo '</script>';
}

//insert crud operation
if (isset($_POST["createEmployeeBtn"])) {
  $name = $_POST["txtEmployeeName"];
  $address = $_POST["txtAddress"];
  $contact = $_POST["txtContact"];
  $salary = $_POST["txtSalary"];
  $sql = "INSERT INTO `employeedetail` (`name`, `address`, `contact`, `salary`) VALUES ('$name','$address','$contact','$salary')";
  
  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to insert a new category: " . mysqli_error($conn));
  } else {
    func_alert("Employee Added Successfully!!!");
  }
}

//update crud operation
if (isset($_POST["editEmployeeBtn"])) {
  $id = $_POST["id"];
  $name = $_POST["txtEmployeeName"];
  $address = $_POST["txtAddress"];
  $contact = $_POST["txtContact"];
  $salary = $_POST["txtSalary"];

  $sql =" UPDATE `employeedetail` SET `name` = ' $name', `address` = ' $address', `contact` = '$contact', `salary` = '$salary' WHERE `employee_id` = $id;";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to update Employee: " . mysqli_error($conn));
  } else {
    func_alert("Employee Updated Successfully!!!");
  }
}

//Delete crud operation
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  
  $sql = "DELETE FROM `employeedetail` WHERE `employee_id` = $id";
  
  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to delete Employee Details: " . mysqli_error($conn));
  } else {
    func_alert("Employee Details Deleted Successfully!!!");
  }
}

?>