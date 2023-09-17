<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Products";
include("../shared/head.php");
?>

<body>

  <?php
  $page = "products";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Products";

    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">
      <a href="addProduct.php" class="custom-btn m-25">Add Product</a>

      <?php
      include_once '../../../configs/database.php';

      $limit = 5;
      $sql = "SELECT * FROM `product`";
      $result = mysqli_query($conn, $sql);
      $total_rows = mysqli_num_rows($result);
      $total_pages = ceil($total_rows / $limit);

      if (!isset($_GET['page'])) {
        $page_number = 1;
      } else {
        $page_number = $_GET['page'];
      }

      $initial_page = ($page_number - 1) * $limit;
      $getQuery = "SELECT * FROM `product` ORDER BY `product_id` DESC LIMIT $initial_page, $limit ";

      echo '<table>';
      echo "<thead>";
      echo "<tr>";
      echo "<th>Product ID</th>";
      echo "<th>Product Name</th>";
      echo "<th>Quantity</th>";
      echo "<th>Unit Price</th>";
      echo '<th class="text-center">Action</th>';
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      if ($result = mysqli_query($conn, $getQuery)) {
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['product_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td> Rs. " . $row['unit_price'] . "</td>";
            echo '<td class="text-center">
            <a href="editProduct.php?id=' . $row["product_id"] . '" class="custom-btn-outline">Edit</a>
            <span class="mx-5"></span>
            <a href="productHandler.php?delete=' . $row["product_id"] . '" class="custom-btn-outline">Delete</a>
            </td>';
            echo "</tr>";
          }

          if ($total_pages > 1) {
            echo '<tr class="table-row">';
            echo '<td class="table-account pagination" colspan="3">';
            for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
              echo '<a href = "products.php?page=' . $page_number . '">' . $page_number . ' </a>';
            }
            echo ' </td>';
            echo '</tr>';
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