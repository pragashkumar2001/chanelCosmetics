<?php
include_once '../../configs/database.php';

if (!isset($_SESSION)) {
  session_start();
}

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="orders.php"';
  echo '</script>';
}

$cartArray = array();

if (isset($_SESSION["shopping_cart"])) {
  $cartArray = $_SESSION["shopping_cart"];
  $total = 0;

  if (count($cartArray) > 0) {

    if (isset($_GET["delete"])) {
      $id = $_GET["delete"];
      $key = $_GET["key"];
      array_splice($cartArray, $key, 1);
      $_SESSION["shopping_cart"] = $cartArray;
      header('Location: cart.php');
    }

    if (isset($_POST["placeOrder"])) {

      if (!isset($_SESSION["user_id"])) {
        header('Location: ../auth/signin.php');
      } else {

        $order_date = date('Y/m/d');
        $status = "Pending";
        $user_id = $_SESSION["user_id"];

        $sql = "INSERT INTO `customer_order` ( `order_date`, `status`, `user_id`) VALUES ('$order_date', '$status', '$user_id');";

        if (!mysqli_query($conn, $sql)) {
          func_alert("Unable to place an Order: " . mysqli_error($conn));
        } else {
          $order_id = mysqli_insert_id($conn);
          $sql = "";
          foreach ($cartArray as $key => $value) {
            $product_id = $cartArray[$key]["product_id"];
            $quantity = $cartArray[$key]["cart_quantity"];
            $amount = $cartArray[$key]['cart_quantity'] * $cartArray[$key]['unit_price'];
            $sql .= "INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `amount`) VALUES ('$order_id', '$product_id', '$quantity', '$amount');";
            $sql .= "INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `amount`) VALUES ('$order_id', '$product_id', '$quantity', '$amount');";
          }

          if (!mysqli_multi_query($conn, $sql)) {
            func_alert("Unable to place an Order: " . mysqli_error($conn));
          } else {
            func_alert("Order Placed Successfully!!!");
          }
        }
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
include("./shared/head.php");
?>

<body>

  <?php include("./shared/navbar.php"); ?>

  <section class="product-section pt-100">

    <div class="row px-50 pb-50">
      <table>
        <thead>
          <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <form action="cart.php" method="POST">

            <?php
            if (count($cartArray) > 0) {
              foreach ($cartArray as $key => $value) { ?>
                <tr>
                  <td><img height="100px" src="../../<?php echo $cartArray[$key]['image'] ?>"></td>
                  <td><?php echo $cartArray[$key]['name'] ?></td>
                  <td><?php echo $cartArray[$key]['cart_quantity'] ?></td>
                  <td>Rs. <?php echo $cartArray[$key]['cart_quantity'] * $cartArray[$key]['unit_price'] ?></td>
                  <td class="text-center">
                    <a href="cart.php?delete=<?php echo $cartArray[$key]['product_id'] ?>&key=<?php echo $key ?>" class="custom-btn-outline">Delete</a>
                  </td>
                </tr>
              <?php
                $total +=  $cartArray[$key]['cart_quantity'] * $cartArray[$key]['unit_price'];
              }
            } else {
              echo "<tr>";
              echo "<td><em>Empty cart, Please add products!!!.</em></td>";
              echo "</tr>";
            }

            if (count($cartArray) > 0) {
              ?>
              <tr>
                <td>Total Amount:</td>
                <td colspan="4"></td>
                <td><b> Rs. <?php echo $total; ?></b> </td>
                <td class="text-center">
                  <button type="submit" class="custom-btn" name="placeOrder" id="placeOrder">Place Order</button>
                </td>
              </tr>

            <?php } ?>

          </form>
        </tbody>
      </table>
    </div>

  </section>

  <?php include_once './shared/footer.php'; ?>

</body>

</html>