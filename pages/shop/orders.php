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
      <a href="profile.php" class="text-center custom-btn-outline-border ">View Profile Details</a>
      <span class="text-center custom-btn-outline-border active">View Order Details</span>
    </div>
  </div>

  <section class="p-40">

    <table>
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Order Date</th>
          <th>Status</th>
          <th>Total Amount</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $sql = "SELECT * , SUM(o.amount) as Total FROM customer_order c, order_detail o, user u where c.user_id=u.user_id and o.order_id = c.order_id and c.user_id = $user_id group by c.order_id";
        $result = mysqli_query($conn, $sql);

        if ($result = mysqli_query($conn, $sql)) {
          if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) { ?>
              <tr>
                <td><?php echo $row['order_id'] ?></td>
                <td><?php echo $row['order_date'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>Rs. <?php echo $row['Total'] ?></td>
                <td class="text-center">
                  <a href="orderDetail.php?order_id=<?php echo $row['order_id'] ?>" class="custom-btn-outline">View</a>
                </td>
              </tr>

        <?php
            }

            mysqli_free_result($result);
          } else {
            echo "<tr>";
            echo "<td><em>No records were found.</em></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr>";
          echo "<td><em>Oops! Something went wrong. Please try again later.</em></td>";
          echo "</tr>";
        }

        echo "<tbody>";
        echo "</tbody>";
        echo "</table>";

        mysqli_close($conn);
        ?>
        </div>

  </section>

  <?php include_once './shared/footer.php'; ?>

</body>

</html>