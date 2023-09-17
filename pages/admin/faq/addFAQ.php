<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "FAQ";
include("../shared/head.php");
?>

<body>
  <?php
  $page = "faq";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Add FAQ";
    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">

      <a href="faq.php" class="custom-btn m-25">Go Back</a>

      <div class="card my-25 ">
        <form action="faqHandler.php" method="post" enctype="multipart/form-data" class="form-content">
          <div class="form-group mb-15">
            <label for="txtFaqQuestion">FAQ Question</label>
            <input type="text" name="txtFaqQuestion" id="txtFaqQuestion" required />
          </div>


          <div class="form-group mb-15">
            <label for="txtFaqAnswer">FAQ Answer</label>
            <textarea name="txtFaqAnswer" id="txtFaqAnswer" required></textarea>
          </div>

          <div class="mb-15">
            <button type="submit" class="custom-btn" name="createFAQBtn" id="createFAQBtn">Save</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>