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
  <section id="hero">
    <h4>Trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more coupons & up to 70% off!</p>
  </section>

  <div id="categories" class="mb-40"></div>
  <section class="pt-45 mx-50">
    <h2>Categories</h2>
    <br>
    <div class="row flex-between flex-wrap">
      <?php
      $sql = "SELECT * FROM `category`";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          echo '<a class="text-center custom-btn-outline-border" href="./categories.php?id=' . $row["category_id"] . '">' . $row["name"] . '</a>';
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
      ?>
    </div>
  </section>

  <div id="products" class="mb-40"></div>
  <section class="product-section pt-45">
    <h1>Products</h1>
    <br>
    <div class="pro-collection">
      <?php
      $sql = "SELECT p.product_id, p.name as productName, p.unit_price, p.image, b.name as brand, AVG(r.rating) AS avg_rating
              FROM product p
              JOIN brand b ON p.brand_id = b.brand_id
              LEFT JOIN rating r ON p.product_id = r.product_id
              GROUP BY p.product_id, p.name, p.unit_price, p.image, b.name";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) { ?>
          <a href="./productDetail.php?id=<?php echo $row["product_id"] ?>">
            <div class="product-item">
              <img src="../../<?php echo $row["image"] ?>" />
              <h4 class="mt-5"> <?php echo $row["productName"] ?></h4>
              <div class="row flex-between">
                <h4 class="price mt-5">Rs. <?php echo $row["unit_price"] ?></h4>
              
                <div class="rating">
                  <?php
                  $average_rating = round($row["avg_rating"], 1);
                  for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $average_rating) {
                      echo '<i class="bx bxs-star"></i>';
                    } else {
                      echo '<i class="bx bx-star"></i>';
                    }
                  }
                  ?>
                </div>
                
              </div>
            </div>
          </a>
      <?php }
      }  ?>
    </div>
  </section>

  <?php include_once './shared/footer.php'; ?>

</body>

</html>