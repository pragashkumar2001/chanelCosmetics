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

  <section class="product-section pt-40">
    <h1>Categories</h1>
    <br>
    <div class="pro-collection">
      <?php
      if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $id =  $_GET["id"];
        $sql = "SELECT p.product_id, p.name as productName, p.unit_price, p.image, b.name as brand, AVG(r.rating) AS avg_rating, c.name as category
        FROM product p
        JOIN brand b ON p.brand_id = b.brand_id
        LEFT JOIN rating r ON p.product_id = r.product_id
        JOIN category c ON p.category_id = c.category_id
        WHERE c.category_id = $id
        GROUP BY p.product_id, p.name, p.unit_price, p.image, b.name, c.name";
        $result = mysqli_query($conn, $sql);
      }
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
      ?>         
          <a href="./productDetail.php?id=<?php echo $row["product_id"] ?>">
            <div class="product-item">
              <img src="../../<?php echo $row["image"] ?>" />
              <span style="text-align:left"><?php echo $row["category"] ?></span>
              <h4 class="mt-5"> <?php echo $row["productName"] ?></h4>
              <div class="row flex-between">
                <h4 class="price mt-5">Rs. <?php echo $row["unit_price"] ?></h4>

                <div class="rating">
                  <?php
                  $average_rating = round($row["avg_rating"], 1);
                  for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $average_rating) {
                      echo '<i class="bx bxs-star"></i>'; // Bold star
                    } else {
                      echo '<i class="bx bx-star"></i>'; // Empty star
                    }
                  }
                  ?>
                </div>
              </div>
            </div>
          </a>
      <?php }
      } ?>

    </div>
  </section>

  <?php include_once './shared/footer.php'; ?>

</body>

</html>