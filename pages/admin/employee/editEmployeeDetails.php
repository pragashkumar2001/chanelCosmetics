<?php
  include_once '../../../configs/database.php';

  if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = "SELECT * FROM `employeedetail` WHERE `employee_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  }

  mysqli_close($conn);
  ?>

 <!DOCTYPE html>
 <html lang="en">

 <?php
  $pageTitle = "EmployeeDetails";
  include("../shared/head.php");
  ?>

 <body>
   <?php
    $page = "EmployeeDetails";
    include("../shared/aside.php");
    ?>

   <section class="page-wrapper">

     <?php
      $title = "Edit Employee";
      include("../shared/nav.php");
      ?>

     <div class="page-content px-25">

       <a href="employeeDetails.php" class="custom-btn m-25">Go Back</a>

       <div class="card my-25 ">

         <form action="employeeHandler.php?id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data" class="form-content">
           <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">

           <div class="form-group mb-15">
             <label for="lstStatus">Status</label>
             <select name="lstStatus" id="lstStatus" required>
               <?php
                $sizes = array("Pending", "Cancelled", "Delivered");
                foreach ($sizes as $value) {
                  if ($row['status'] == $value) {
                    echo '<option selected value="' . $value . '">' . $value . '</option>';
                  } else {
                    echo '<option value="' . $value . '">' . $value . '</option>';
                  }
                }
                ?>
             </select>
           </div>

           <div class="mb-15">
             <button type="submit" class="custom-btn" name="editEmployeeBtn" id="editEmployeeBtn">Save</button>
           </div>
         </form>
       </div>
     </div>
   </section>
 </body>

 </html>