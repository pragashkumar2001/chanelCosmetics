<?php
include_once '../../configs/database.php';
include_once '../../configs/fpdf186/fpdf.php';
include 'feedbackPrint.php';


function func_alert($message)
    {
      echo '<script language="javascript">';
      echo 'alert("' . $message . '");';
      echo 'location.href="about.php"';
      echo '</script>';
    }

    if (isset($_POST["createFeedback"])) {
      $name = $_POST["txtName"];
      $email = $_POST["txtEmail"];
      $phoneNo = $_POST["txtPhoneNo"];
      $category = $_POST["txtCategory"];
      $subject = $_POST["txtSubject"];
      $description = $_POST["txtDescription"];
      
      $sql = "INSERT INTO `feedback` (`name` , `email` , `phoneNo` , `category` , `subject` , `description`) VALUES ('$name', '$email', '$phoneNo', '$category', '$subject', '$description');";
      
      if (!mysqli_query($conn, $sql)) {
        func_alert("Unable to insert a new faq: " . mysqli_error($conn));
      } else {
        generatePDF($conn);
        func_alert("Feedback Received Successfully!!!");
      }
    }
?>