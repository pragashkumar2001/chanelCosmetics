<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/registration.css?v=<?php echo time(); ?>" />
  <title>CHANEL Cosmetics - Signup</title>

</head>

<body>

  <script>
    function validate() {
      let pw = document.getElementById("txtPassword").value;
      let cpw = document.getElementById("txtConfirmPassword").value;
      if (pw != cpw) {
        alert("Password and Confrim Password doesn't match. Please check again!!!");
        return false;
      }

      return true;
    }
  </script>

<div class="wrapper">
  <div class="inner">
    <div class="image-holder">
      <img src="../../assets/images/registrationPic.jpg" alt="">
    </div>
    <form action="authHandler.php" method="post" onsubmit="return validate();" class="form-content">
      <h3>Sign Up</h3>
      <div class="form-holder active">
        <input type="text" name="txtFirstName" id="txtFirstName" placeholder="First Name" class="form-control" required>
      </div>
      <div class="form-holder">
        <input type="text" id="txtLastName" name="txtLastName" placeholder="Last Name" class="form-control" required>
      </div>
      <div class="form-holder">
        <input type="text" name="txtEmail" id="txtEmail" placeholder="e-mail" class="form-control" required>
      </div>
      <div class="form-holder">
        <input type="text" name="txtAddress" id="txtAddress" placeholder="Address" class="form-control" required>
      </div>
      <div class="form-holder">
        <input type="number" name="txtPhoneNumber" id="txtPhoneNumber" placeholder="07x xxx xxxx" class="form-control" required>

      </div>
      <div class="form-holder">
        <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" class="form-control" style="font-size: 15px;" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"required>
      </div>
      
      <div class="form-holder">
        <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Confirm Password" class="form-control" style="font-size: 15px;" required>
      </div>
    
      <div class="form-login">
        <button name="signUpBtn" id="signUpBtn">Sign up</button>
        <p>Already Have account? <a href="signin.php">Login</a></p>
        <p>OR   <br><br></p>
        <p><a href="../shop/home.php">   Go back to Home</a></p>
      </div>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$(function(){
	$('.form-holder').delegate("input", "focus", function(){
		$('.form-holder').removeClass("active");
		$(this).parent().addClass("active");
	})
})</script>
</body>

</html>