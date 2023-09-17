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
      <a href="orders.php" class="text-center custom-btn-outline-border ">Go Back</a>
    </div>
  </div>

  <section class="p-40">

    <table>
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Product Name</th>
          <th>Product Image</th>
          <th>Size</th>
          <th>Color</th>
          <th>Quantity</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $order_id =  $_GET["order_id"];
        $sql = "SELECT *, d.quantity as Qty FROM customer_order o, order_detail d, product p WHERE o.order_id = d.order_id AND p.product_id = d.product_id and o.order_id=$order_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
              <td><?php echo $row['order_id'] ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><img src="../../<?php echo $row['image'] ?>" height="100"></td>
              <td><?php echo $row['size'] ?></td>
              <td><?php echo $row['color'] ?></td>
              <td><?php echo $row['Qty'] ?></td>
              <td>Rs. <?php echo $row['amount'] ?></td>
            </tr>
        <?php
          }

          mysqli_free_result($result);
        } else {
          echo "<tr>";
          echo "<td><em>No records were found.</em></td>";
          echo "</tr>";
        }
        ?>
    </table>

    </div>

  </section>

  <?php include_once './shared/footer.php'; ?>

</body>

</html>