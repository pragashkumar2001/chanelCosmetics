  <?php
  session_start();
  include_once '../../../configs/database.php';

  if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = "SELECT * FROM `product` WHERE `product_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  }
  ?>

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
      $title = "Edit Product";
      include("../shared/nav.php");
      ?>

      <div class="page-content px-25">

        <a href="products.php" class="custom-btn m-25">Go Back</a>

        <div class="card my-25">
          <form action="productHandler.php?id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data" class="form-content">
            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">

            <div class="form-group mb-15">
              <label for="txtProductName">Product Name</label>
              <input type="text" name="txtProductName" id="txtProductName" value="<?php echo $row["name"]; ?>" required />
            </div>

            <div class="form-group mb-15">
              <label for="txtDescription">Description</label>
              <textarea name="txtDescription" id="txtDescription" required><?php echo $row["description"]; ?></textarea>
            </div>

            <div class="form-group mb-15">
              <label for="imageFile">Image</label>
              <input type="file" name="imageFile" id="imageFile" class="mb-5">
              <?php
              if ($row["image"]) {
                $_SESSION["image"] = "../../../" . $row["image"];
                $_SESSION["dbImage"] = $row["image"];
                echo '<img src="../../../' . $row["image"] . '">';
              }
              ?>
            </div>

            <div class="form-group mb-15">
              <label for="txtBrandId">Brand</label>
              <select name="txtBrandId" id="txtBrandId" required>
                <?php
                $sql = "SELECT * FROM `brand`";
                $result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                  if ($rows['brand_id'] == $row["brand_id"]) {
                    echo '<option selected value="' . $rows['brand_id'] . '">' . $rows['name'] . '</option>';
                  }
                  if ($rows['brand_id'] != $row["brand_id"]) {
                    echo '<option value="' . $rows['brand_id'] . '">' . $rows['name'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-group mb-15">
              <label for="txtCategoryId">Category</label>
              <select name="txtCategoryId" id="txtCategoryId" required>
                <?php
                $sql = "SELECT * FROM `category`";
                $result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                  if ($rows['category_id'] == $row["category_id"]) {
                    echo '<option selected value="' . $rows['category_id'] . '">' . $rows['name'] . '</option>';
                  }
                  if ($rows['category_id'] != $row["category_id"]) {
                    echo '<option value="' . $rows['category_id'] . '">' . $rows['name'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-group mb-15">
              <label for="txtQuantity">Quantity</label>
              <input type="number" name="txtQuantity" id="txtQuantity" value="<?php echo $row["quantity"]; ?>" required />
            </div>

            <div class="form-group mb-15">
              <label for="txtUnitPrice">Unit Price</label>
              <input type="text" name="txtUnitPrice" id="txtUnitPrice" value="<?php echo $row["unit_price"]; ?>" required />
            </div>



            <div class="mb-15">
              <button type="submit" class="custom-btn" name="editProductBtn" id="editProductBtn">Save</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </body>

  </html>

  <?php mysqli_close($conn); ?>