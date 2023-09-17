<?php
include_once '../../configs/database.php';

if (!isset($_SESSION)) {
  session_start();
}

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="profile.php"';
  echo '</script>';
}

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM user WHERE `user_id` = $user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if (isset($_POST["editCustomerBtn"])) {
  $firstName = $_POST["txtFirstName"];
  $lastName = $_POST["txtLastName"];
  $email = $_POST["txtEmail"];
  $password = $_POST["txtPassword"];
  $address = $_POST["txtAddress"];
  $phoneNo = $_POST["txtPhoneNo"];
  $role = "Customer";

  $sql = "UPDATE `user` SET `first_name` = '$firstName', `last_name` = '$lastName', `email` = '$email', `password` = '$password', `address` = '$address',
   `phone_no` = '$phoneNo', `role` = '$role' WHERE `user_id` = $user_id";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to update user: " . mysqli_error($conn));
  } else {
    func_alert("User Details Updated Successfully!!!");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
include("./shared/head.php");
?>

<body>

  <?php
  include("./shared/navbar.php");
  ?>

  <div class="pt-40">
    <div class="row flex-around mt-40">
      <span class="text-center custom-btn-outline-border active">View Profile Details</span>
      <a href="orders.php" class="text-center custom-btn-outline-border">View Order Details</a>
    </div>
  </div>

  <section class="p-40">
    <form action="profile.php?id=<?php echo $user_id ?>" method="post" enctype="multipart/form-data" class="card form-content mx-100">
      <input type="hidden" name="id" value="<?php echo $user_id ?>">

      <div class="form-group mb-15">
        <label for="txtFirstName">First Name</label>
        <input type="text" name="txtFirstName" id="txtFirstName" value="<?php echo $row["first_name"]; ?>" required />
      </div>

      <div class="form-group mb-15">
        <label for="txtLastName">Last Name</label>
        <input type="text" name="txtLastName" id="txtLastName" value="<?php echo $row["last_name"]; ?>" required />
      </div>

      <div class="form-group mb-15">
        <label for="txtEmail">Email</label>
        <input type="email" name="txtEmail" id="txtEmail" value="<?php echo $row["email"]; ?>" required />
      </div>

      <div class="form-group mb-15">
        <label for="txtPassword">Password</label>
        <input type="password" name="txtPassword" id="txtPassword" value="<?php echo $row["password"]; ?>" required />
      </div>

      <div class="form-group mb-15">
        <label for="txtAddress">Address</label>
        <input type="text" name="txtAddress" id="txtAddress" value="<?php echo $row["address"]; ?>" required />
      </div>

      <div class="form-group mb-15">
        <label for="txtPhoneNo">Phone No</label>
        <input type="text" name="txtPhoneNo" id="txtPhoneNo" value="<?php echo $row["phone_no"]; ?>" required />
      </div>

      <div class="mb-15">
        <button type="submit" class="custom-btn" name="editCustomerBtn" id="editCustomerBtn">Save</button>
      </div>
    </form>
  </section>

  <?php include_once './shared/footer.php'; ?>

</body>

</html>