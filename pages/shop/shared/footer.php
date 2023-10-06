<footer>
  <div class="">
    <h3>Contact Details</h3>
    <address>
      <p><b>Owner: </b> CHANEL Cosmetics</p>
      <p><b>Address:</b> 210/4 Airtel Market,  Colombo 11, Sri Lanka.</p>
      <p><b>Phone:</b> +(94) 77 177 7547</p>
      <p><b>Hours:</b> 08:00 - 20:00 Mon - Sat</p>
    </address>
  </div>
  <div class="about">
    <h3>Help</h3>
    <br>
    <a href="about.php">About Us</a>
    <a href="t&c.php">Terms & Conditions</a>
    <a href="faq.php">FAQ</a>
  </div>
  <?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if (isset($_SESSION["user_id"])) {
  ?>
    <div class="myAccount">
      <h3>My Account</h3>
      <br>
      <a href="cart.php">View Cart</a>
      <a href="orders.php">Track My Orders</a>
      <a href="profile.php">View Profile</a>
    </div>
  <?php
  }
  ?>
</footer>