<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<link rel="stylesheet" href="../../assets/css/login.css?v=<?php echo time(); ?>" />
  <title>CHANEL Cosmetics - SignIn</title>
  
</head>

<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="../../assets/images/SignPic.png" alt="">
				</div>
				<form action="authHandler.php" method="post" class="form-content">
					<h3>Sign in</h3>
				
					<div class="form-holder active">
						<input type="email" placeholder="e-mail" class="form-control" name="txtEmail" id="txtEmail" required>
					</div>
                    <div class="form-holder">
						<input type="password" placeholder="password" class="form-control" style="font-size: 15px;" name="txtPassword" id="txtPassword" required>
					</div>
					<div class="form-login">
						<button name="signInBtn" id="signInBtn">Sign in</button>
						<p>Dont't Have an account? <a href="signup.php">Register</a></p>
            <p>OR   <br><br></p>
            <p><a href="../shop/home.php">   Go back to Home</a></p>
					</div>
					

					
				</form>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script>$(function(){
	$('.form-holder').delegate("input", "focus", function(){
		$('.form-holder').removeClass("active");
		$(this).parent().addClass("active");
	})
})</script>
	</body>

</html>