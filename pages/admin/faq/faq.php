<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "FAQ";
include("../shared/head.php");
?>

<body>
  <?php
  $page = "faq";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "FAQ";
    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">

      <a href="addFAQ.php" class="custom-btn m-25">Add FAQ</a>

      <?php
      include_once '../../../configs/database.php';
      
      $sql = "SELECT * FROM faq";
      $result = mysqli_query($conn, $sql);

      echo '<table>';
      echo "<thead>";
      echo "<tr>";
      echo "<th>FAQ ID</th>";
      echo '<th>FAQ Questions</th>';
      echo '<th  width="45%" >FAQ Answers</th>';
      echo '<th  width="20%" class="text-center">Action</th>';
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['faq_id'] . "</td>";
            echo "<td>" . $row['question'] . "</td>";
            echo '<td>' . $row["answer"] . '</td>';
            echo '<td class="text-center">
            <a href="editFAQ.php?id=' . $row["faq_id"] . '" class="custom-btn-outline">Edit</a>
            <span class="mx-5"></span>
            <a href="faqHandler.php?delete=' . $row["faq_id"] . '" class="custom-btn-outline">Delete</a>
            </td>';
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