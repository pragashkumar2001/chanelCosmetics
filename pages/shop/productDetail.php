<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once '../../configs/database.php';

if (isset($_GET["id"]) && !empty($_GET["id"])) {
  $id =  $_GET["id"];
  $sql = "SELECT p.*, b.name as brandName , c.name as categoryName 
  FROM product p, brand b, category c 
  WHERE p.product_id=$id AND p.brand_id = b.brand_id AND p.category_id = c.category_id ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}

$product_id = $_GET["id"];
$name = $row['name'];
$description = $row['description'];
$image = $row['image'];
$quantity = $row['quantity'];
$unit_price = $row['unit_price'];

if (isset($_POST["addToCart"])) {
  if (!isset($_SESSION["user_id"])) {
    header('Location: ../auth/signin.php');
  }

  $cartItem = array(
    'product_id' => $product_id,
    'name' => $name,
    'description' => $description,
    'image' => $image,
    'quantity' => $quantity,
    'cart_quantity' => $_POST["cart_quantity"],
    'unit_price' => $unit_price
  );

  $cartArray = array(
    $product_id => $cartItem
  );

  if (empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
  } else {
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if (in_array($product_id, $array_keys)) {
      $_SESSION["shopping_cart"][$product_id] = $cartItem;
    } else {
      $_SESSION["shopping_cart"] = array_merge(
        $_SESSION["shopping_cart"],
        $cartArray
      );
    }
  }

  header('Location: cart.php');
}

mysqli_close($conn);
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
  <section class="product-section pt-100">

    <div class="row p-50">

      <div class="column">
        <div class=" ms-50">
          <img src="../../<?php echo $row["image"] ?>" height="500px" />
          <a href="productPrint.php?product_id=<?php echo $row['product_id'] ?>" class="custom-btn-outline">Print Order</a>
        </div>
      </div>

      <div class="column">
        <div class="product-detail">
          <form action="productDetail.php?id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data">
            <h2 style="text-align: left;"><?php echo $row["name"] ?></h2>
            <p style="text-align: left; overflow-wrap: anywhere; "><?php echo $row["description"] ?></p>
            <p style="text-align: left;">
              <label>Brand:</label>
              <span><?php echo $row["brandName"] ?></span>
            </p>
            <p style="text-align: left;">
              <label>Category:</label>
              <span><?php echo $row["categoryName"] ?></span>
            </p>

            <p style="text-align: left;">
              <label>Price:</label>
              <span>Rs. <?php echo $row["unit_price"] ?></span>
            </p>

            <p style="text-align: left;" class="quantity">
              Select Quantity:
              <input type="number" name="cart_quantity" min="1" max="<?php echo $row['quantity'] ?>" value="1">
            </p>


            <button type="submit" class="custom-btn" name="addToCart" id="addToCart">Add to Cart</button>
          </form>

        </div>
      </div>

    </div>

  </section>

  <?php include_once './shared/footer.php'; ?>

</body>

</html>