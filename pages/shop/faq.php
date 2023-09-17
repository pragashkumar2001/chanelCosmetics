<?php
include_once '../../configs/database.php';
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
  <div class="mb-40"></div>
  <section class="p-40">
    <h1 class="text-center">Frequently Asked Questions</h1>
    <?php

    $sql = "SELECT * FROM faq";
    $result = mysqli_query($conn, $sql);
    echo '<table>';
    echo "<thead>";
    echo "<tr>";
    echo '<th width="35%" >FAQ</th>';
    echo '<th width="65%" >Answers</th>';
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    if ($result = mysqli_query($conn, $sql)) {
      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['question'] . "</td>";
          echo "<td>" . $row['answer'] . "</td>";
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
  </section>

  <?php include_once './shared/footer.php'; ?>

</body>

</html>