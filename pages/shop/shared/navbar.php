<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<nav>
  <input type="checkbox" id="check">
  <label for="check" class="checkbtn">
    <i class="fas fa-bars"></i>
  </label>
  <a href="../../index.php"> <label class="logo">Chanel<strong style="color:#000000">Cosmetics</strong></label></a>
  <ul>
    <li><a class="page-link" href="../../index.php">Home</a></li>
    <li><a class="page-link" href="../../index.php#categories">Categories</a></li>
    <li><a class="page-link" href="products.php">Products</a></li>

    <?php if (isset($_SESSION["user_email"]) && isset($_SESSION["role"])) {
      if ($_SESSION["role"] == 'Customer') { ?>
      <?php echo '<li><a href="profile.php"><i class="bx bx-user circle-icon-l"></i></a></li>';
      }

      if ($_SESSION["role"] == 'Administrator') {
        echo '<li><a href="../admin/orders/orders.php"><i class="bx bx-store-alt circle-icon-l"></i></a></li>';
      }
      ?>
      <li><a href="cart.php"><i class="bx bxs-cart-alt circle-icon-m"></i></a>
      <li>
      <li><a href="../shared/logout.php"> <i class="bx bx-log-out circle-icon-r"></i></a></li>
    <?php } else { ?>
      <li><a class="page-link" href="../auth/signin.php"><b>Login</b></a></li>
    <?php } ?>
  </ul>
</nav>