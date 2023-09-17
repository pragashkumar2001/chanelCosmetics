 <?php
  include_once '../../../configs/database.php';

  if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = "SELECT * FROM `faq` WHERE `faq_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  }

  mysqli_close($conn);
  ?>

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
      $title = "Edit FAQ";
      include("../shared/nav.php");
      ?>

     <div class="page-content px-25">

       <a href="faq.php" class="custom-btn m-25">Go Back</a>

       <div class="card my-25 ">

         <form action="faqHandler.php?id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data" class="form-content">
           <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">

           <div class="form-group mb-15">
             <label for="txtFaqQuestion">FAQ Question</label>
             <input type="text" name="txtFaqQuestion" id="txtFaqQuestion" value="<?php echo $row["question"]; ?>" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtFaqAnswer">FAQ Answer</label>
             <textarea name="txtFaqAnswer" id="txtFaqAnswer" required><?php echo $row["answer"]; ?></textarea>
           </div>

           <div class="mb-15">
             <button type="submit" class="custom-btn" name="editFAQBtn" id="editFAQBtn">Save</button>
           </div>
         </form>
       </div>
     </div>
   </section>
 </body>

 </html>