<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashion Hub - Signup</title>
  <link rel="stylesheet" href="../../assets/css/main.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" href="../../assets/css/auth.css?v=<?php echo time(); ?>" />
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
  <main class="signup-form">
    <h1>Sign Up</h1>
    <form action="authHandler.php" method="post" onsubmit="return validate();" class="form-content">

      <div class="form-group">
        <label for="txtFirstName">First Name</label>
        <input type="text" name="txtFirstName" id="txtFirstName" required />
      </div>

      <div class="form-group">
        <label for="txtLastName">Last Name</label>
        <input type="text" id="txtLastName" name="txtLastName" required />
      </div>

      <div class="form-group">
        <label for="txtEmail">Email</label>
        <input type="email" name="txtEmail" id="txtEmail" required />
      </div>

      <div class="form-group">
        <label for="txtPassword">Password</label>
        <input type="password" name="txtPassword" id="txtPassword" required />
      </div>

      <div class="form-group">
        <label for="txtConfirmPassword">Confirm Password</label>
        <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" required />
      </div>

      <div class="form-group">
        <label for="txtAddress">Address</label>
        <textarea name="txtAddress" id="txtAddress" required></textarea>
      </div>

      <div class="form-group">
        <label for="txtPhoneNumber">Phone Number</label>
        <input type="text" name="txtPhoneNumber" id="txtPhoneNumber" required />
      </div>

      <input type="submit" name="signUpBtn" id="signUpBtn" value="Register" />

      <p class="form-footer">
        Already Have an Account? <a href="signin.php">Sign In</a>
        <br><br>
        <a href="../shop/home.php">Go back to Home</a>
      </p>
    </form>
  </main>
</body>

</html>