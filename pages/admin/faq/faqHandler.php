<?php
include_once '../../../configs/database.php';

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="faq.php"';
  echo '</script>';
}

if (isset($_POST["createFAQBtn"])) {
  $faqQuestion = $_POST["txtFaqQuestion"];
  $faqAnswer = $_POST["txtFaqAnswer"];
  
  $sql = "INSERT INTO `faq` (`question` , `answer`) VALUES ('$faqQuestion', '$faqAnswer');";
  
  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to insert a new faq: " . mysqli_error($conn));
  } else {
    func_alert("FAQ Added Successfully!!!");
  }
}

if (isset($_POST["editFAQBtn"])) {
  $id = $_POST["id"];
  $faqQuestion = $_POST["txtFaqQuestion"];
  $faqAnswer = $_POST["txtFaqAnswer"];
  
  $sql = "UPDATE `faq` SET `question` = '$faqQuestion', `answer` = '$faqAnswer' WHERE `faq_id` = $id";
  
  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable update faq: " . mysqli_error($conn));
  } else {
    func_alert("FAQ Updated Successfully!!!");
  }
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  
  $sql = "DELETE FROM `faq` WHERE `faq_id` = $id";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to delete faq: " . mysqli_error($conn));
  } else {
    func_alert("FAQ Deleted Successfully!!!");
  }
}

mysqli_close($conn);

?>