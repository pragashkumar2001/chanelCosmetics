 <?php
  include_once '../../../configs/database.php';

  if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = "SELECT * FROM `user` WHERE `user_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  }

  mysqli_close($conn);
  ?>

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
      $title = "Edit User";
      include("../shared/nav.php");
      ?>

     <div class="page-content px-25">

       <a href="users.php" class="custom-btn m-25">Go Back</a>

       <div class="card my-25 ">

         <form action="userHandler.php?id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data" class="form-content">
           <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">

           <div class="form-group mb-15">
             <label for="txtFirstName">First Name</label>
             <input type="text" name="txtFirstName" id="txtFirstName" value="<?php echo $row["first_name"]; ?>" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtLastName">Last Name</label>
             <input type="text" name="txtLastName" id="txtLastName" value="<?php echo $row["last_name"]; ?>" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtEmail">Email</label>
             <input type="email" name="txtEmail" id="txtEmail" value="<?php echo $row["email"]; ?>" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtPassword">Password</label>
             <input type="password" name="txtPassword" id="txtPassword" value="<?php echo $row["password"]; ?>" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtAddress">Address</label>
             <input type="text" name="txtAddress" id="txtAddress" value="<?php echo $row["address"]; ?>" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtPhoneNo">Phone No</label>
             <input type="text" name="txtPhoneNo" id="txtPhoneNo" value="<?php echo $row["phone_no"]; ?>" required />
           </div>

           <div class="mb-15">
             <button type="submit" class="custom-btn" name="editUserBtn" id="editUserBtn">Save</button>
           </div>
         </form>
       </div>
     </div>
   </section>
 </body>

 </html>