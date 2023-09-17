<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Users";
include("../shared/head.php");
?>

<body>
  <?php
  $page = "users";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Add Users";
    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">

      <a href="users.php" class="custom-btn m-25">Go Back</a>

      <div class="card my-25 ">
        <form action="userHandler.php" method="post" enctype="multipart/form-data" class="form-content">
          <div class="form-group mb-15">
            <label for="txtFirstName">First Name</label>
            <input type="text" name="txtFirstName" id="txtFirstName" required />
          </div>

          <div class="form-group mb-15">
            <label for="txtLastName">Last Name</label>
            <input type="text" name="txtLastName" id="txtLastName" required />
          </div>

          <div class="form-group mb-15">
            <label for="txtEmail">Email</label>
            <input type="email" name="txtEmail" id="txtEmail" required />
          </div>

          <div class="form-group mb-15">
            <label for="txtPassword">Password</label>
            <input type="password" name="txtPassword" id="txtPassword" required />
          </div>

          <div class="form-group mb-15">
            <label for="txtAddress">Address</label>
            <input type="text" name="txtAddress" id="txtAddress" required />
          </div>

          <div class="form-group mb-15">
            <label for="txtPhoneNo">Phone No</label>
            <input type="text" name="txtPhoneNo" id="txtPhoneNo" required />
          </div>

          <div class="mb-15">
            <button type="submit" class="custom-btn" name="createUserBtn" id="createUserBtn">Save</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>