<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashion Hub - SignIn</title>
  <link rel="stylesheet" href="../../assets/css/main.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" href="../../assets/css/auth.css?v=<?php echo time(); ?>" />
</head>

<body>
  <main class="signin-form">
    <h1>Sign In</h1>
    <form action="authHandler.php" method="post" class="form-content">

      <div class="form-group">
        <label for="txtEmail">Email</label>
        <input type="email" name="txtEmail" id="txtEmail" required />
      </div>

      <div class="form-group">
        <label for="txtPassword">Password</label>
        <input type="password" name="txtPassword" id="txtPassword" required />
      </div>

      <input type="submit" name="signInBtn" id="signInBtn" value="Login" />

      <p class="form-footer">
        Don't Have an Account? <a href="signup.php">Sign Up</a>
        <br><br>
        <a href="../shop/home.php">Go back to Home</a>
      </p>

    </form>
  </main>
</body>

</html>