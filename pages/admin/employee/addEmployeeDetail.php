<?php include_once '../../../configs/database.php'; ?>
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
      $title = "Add Employee";
      include("../shared/nav.php");
      ?>

     <div class="page-content px-25">

       <a href="employeeDetails.php" class="custom-btn m-25">Go Back</a>

       <div class="card my-25">
         <form action="employeeHandler.php" method="post" enctype="multipart/form-data" class="form-content">
           <div class="form-group mb-15">
             <label for="txtEmployeeName">Employee Name</label>
             <input type="text" name="txtEmployeeName" id="txtEmployeeName" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtAddress">Address</label>
             <textarea name="txtAddress" id="txtAddress" required></textarea>
           </div>



           <div class="form-group mb-15">
             <label for="txtContact">Contact</label>
             <input type="number" name="txtContact" id="txtContact" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtSalary">Salary</label>
             <input type="number" name="txtSalary" id="txtSalary" required />
           </div>

           <div class="mb-15">
             <button type="submit" class="custom-btn" name="createEmployeeBtn" id="createEmployeeBtn">Save</button>
           </div>
         </form>
       </div>
     </div>
   </section>
 </body>

 </html>