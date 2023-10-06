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
  
  <div id="products" class="mb-40"></div>
  <section class="product-section pt-45">
    <h1>Products</h1>
    <br>
    <div class="pro-collection">
      <?php
      $sql = "SELECT product_id, p.name as productName, p.unit_price, p.image, b.name as brand
              FROM product p, brand b 
              WHERE p.brand_id = b.brand_id";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) { ?>
          <a href="./productDetail.php?id=<?php echo $row["product_id"] ?>">
            <div class="product-item">
              <img src="../../<?php echo $row["image"] ?>" />
              <h4 class="mt-5"> <?php echo $row["productName"] ?></h4>
              <div class="row flex-between">
                <h4 class="price mt-5">Rs. <?php echo $row["unit_price"] ?></h4>
                <a href="./productDetail.php?id=<?php echo $row["product_id"] ?>">
                  <i class='bx bx-message-square-add circle-icon'></i>
                </a>
              </div>
            </div>
          </a>
      <?php }
      }  ?>
    </div>
  </section>

  <?php include_once './shared/footer.php'; ?>