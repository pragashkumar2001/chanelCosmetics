<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Feedback";
include("../shared/head.php");
?>

<body>
  <?php
  $page = "feedback";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Feedback";
    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">

      <?php
      include_once '../../../configs/database.php';
      
      $sql = "SELECT * FROM feedback";
      $result = mysqli_query($conn, $sql);

      echo '<table>';
      echo "<thead>";
      echo "<tr>";
      echo "<th>Feedback ID</th>";
      echo '<th>Name</th>';
      echo '<th>Email</th>';
      echo '<th>Phone No</th>';
      echo '<th>Category</th>';
      echo '<th>Subject</th>';
      echo '<th width="30%" >Feedback</th>';
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['feedback_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo '<td>' . $row["email"] . '</td>';
            echo "<td>" . $row['phoneNo'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo '<td>' . $row["subject"] . '</td>';
            echo "<td>" . $row['description'] . "</td>";
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

      mysqli_close($conn);
      ?>
    </div>
  </section>

</body>

</html>