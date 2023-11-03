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


mysqli_close($conn);

?>