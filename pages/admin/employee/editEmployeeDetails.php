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
             <label for="txtEmployeeName">Employee Name</label>
             <input type="text" name="txtEmployeeName" id="txtEmployeeName" value="<?php echo $row["name"]; ?>" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtAddress">Address</label>
             <textarea name="txtAddress" id="txtAddress" required><?php echo $row["address"]; ?></textarea>
           </div>

           <div class="form-group mb-15">
             <label for="txtContact">Contact</label>
             <input type="number" name="txtContact" id="txtContact" value="<?php echo $row["contact"]; ?>"  required />
           </div>

           <div class="form-group mb-15">
             <label for="txtSalary">Salary</label>
             <input type="number" name="txtSalary" id="txtSalary" value="<?php echo $row["salary"]; ?>"  required />
           </div>

           <div class="mb-15">
             <button type="submit" class="custom-btn" name="editEmployeeBtn" id="editEmployeeBtn">Update</button>
           </div>
         </form>
       </div>
     </div>
   </section>
 </body>

 </html>