<?php include_once '../../../configs/database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Users";
include("../shared/head.php");
?>


<body>

    <div class="page-content px-25">

      <?php
      include_once '../../../configs/database.php';
      
      $sql = "SELECT * FROM `user` WHERE `role` = 'Customer' ORDER BY `user_id`";
      $result = mysqli_query($conn, $sql);

        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Customer ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Email</th>";
        echo "<th>Address</th>";
        echo "<th>Phone No</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

      if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['user_id'] . "</td>";
              echo "<td>" . $row['first_name'] . "</td>";
              echo "<td>" . $row['last_name'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['address'] . "</td>";
              echo "<td>" . $row['phone_no'] . "</td>";
              echo "</tr>";
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
      ?>
      
	<div class="center">
          <button onclick="window.print()" class="print-btn button " id="print-btn">Print Details</button>
        </div>

	<?php
      mysqli_close($conn);
      ?>
    </div>
 

</body>

</html>