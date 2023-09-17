<?php
session_start();
include_once '../../configs/database.php';

function func_alert_signin($message)
{
	echo '<script language="javascript">';
	echo 'alert("' . $message . '");';
	echo 'location.href="signin.php"';
	echo '</script>';
}

function func_alert_signup($message)
{
	echo '<script language="javascript">';
	echo 'alert("' . $message . '");';
	echo 'location.href="signup.php"';
	echo '</script>';
}

if (isset($_POST["signInBtn"])) {
	$email = $_POST["txtEmail"];
	$password = $_POST["txtPassword"];

	$sql = "SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "'";

	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION["user_id"] = $row["user_id"];
		$_SESSION["user_email"] = $row["email"];
		$_SESSION["role"] = $row["role"];
		if ($row["role"] == 'Customer') {
			header('Location:../../index.php');
		}
		if ($row["role"] == 'Administrator') {
			header('Location:../admin/orders/orders.php');
		}
	} else {
		header('Location:signin.php');
	}
}

if (isset($_POST["signUpBtn"])) {
	$firstName = $_POST["txtFirstName"];
	$lastName = $_POST["txtLastName"];
	$email = $_POST["txtEmail"];
	$password = $_POST["txtPassword"];
	$cPassword = $_POST["txtConfirmPassword"];
	$address = $_POST["txtAddress"];
	$phoneNo = $_POST["txtPhoneNumber"];
	$role = "Customer";


	$sql = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `password`, `address`, `phone_no`, `role`) 
					VALUES ('$firstName','$lastName','$email','$password','$address','$phoneNo','$role');";

	if (!mysqli_query($conn, $sql)) {
		func_alert_signup("Unable to register!!!");
	} else {
		func_alert_signin("You have registered successfully!!!");
	}
}

mysqli_close($conn);

?>