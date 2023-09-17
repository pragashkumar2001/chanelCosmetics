<?php include_once '../../../configs/database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Users";
include("../shared/head.php");
?>

<body>
  <?php
  $page = "users";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Users";
    include("../shared/nav.php");
    ?>
    <div class="page-content px-25">
      <div class="row flex-between">
        <a href="addUser.php" class="custom-btn m-25">Add Admin</a>
        <div>
          <button class="custom-btn-dark m-25" onclick="getUser('Customer')">Customers</button>
          <button class="custom-btn-dark m-25" onclick="getUser('Administrator')">Administrators</button>
        </div>
      </div>

      <div id="Customer" class="role">
        <?php
        $limit = 5;
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
        $total_rows = mysqli_num_rows($result);
        $total_pages = ceil($total_rows / $limit);

        if (!isset($_GET['page'])) {
          $page_number = 1;
        } else {
          $page_number = $_GET['page'];
        }

        $initial_page = ($page_number - 1) * $limit;
        $getQuery = "SELECT * FROM `user` WHERE `role` = 'Customer' ORDER BY `user_id` DESC LIMIT $initial_page, $limit ";

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

        if ($result = mysqli_query($conn, $getQuery)) {
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

            if ($total_pages > 1) {
              echo '<tr class="table-row">';
              echo '<td class="table-account pagination" colspan="3">';
              for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
                echo '<a href = "users.php?page=' . $page_number . '">' . $page_number . ' </a>';
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

        ?>
      </div>

      <div id="Administrator" class="role" style="display:none">
        <?php
        $limit = 5;
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
        $total_rows = mysqli_num_rows($result);
        $total_pages = ceil($total_rows / $limit);

        if (!isset($_GET['page'])) {
          $page_number = 1;
        } else {
          $page_number = $_GET['page'];
        }

        $initial_page = ($page_number - 1) * $limit;
        $getQuery = "SELECT * FROM `user` WHERE `role` = 'Administrator' ORDER BY `user_id` DESC LIMIT $initial_page, $limit ";

        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Admin ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Email</th>";
        echo "<th>Address</th>";
        echo "<th>Phone No</th>";
        echo '<th class="text-center">Action</th>';
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        if ($result = mysqli_query($conn, $getQuery)) {
          if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['user_id'] . "</td>";
              echo "<td>" . $row['first_name'] . "</td>";
              echo "<td>" . $row['last_name'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['address'] . "</td>";
              echo "<td>" . $row['phone_no'] . "</td>";
              echo '<td class="text-center">
                    <a href="editUser.php?id=' . $row["user_id"] . '" class="custom-btn-outline">Edit</a>
                    <span class="mx-5"></span>
                    <a href="userHandler.php?delete=' . $row["user_id"] . '" class="custom-btn-outline">Delete</a>
                    </td>';
              echo "</tr>";
            }

            if ($total_pages > 1) {
              echo '<tr class="table-row">';
              echo '<td class="table-account pagination" colspan="3">';
              for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
                echo '<a href = "users.php?page=' . $page_number . '">' . $page_number . ' </a>';
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
        ?>
      </div>
    </div>
  </section>

  <script>
    function getUser(role) {
      var i;
      var x = document.getElementsByClassName("role");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      document.getElementById(role).style.display = "block";
    }
  </script>

  <?php
  mysqli_close($conn);
  ?>
</body>

</html>