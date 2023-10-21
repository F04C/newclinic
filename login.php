<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<link rel="stylesheet" href="loginassets/css/style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="loginassets\js\1.js"></script>




</head>

<body class="img js-fullheight" style="background-image: url(loginassets/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<form action="adminlogin.php" class="signin-form" method="POST">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Username" name="inputUsername" required>
							</div>
							<div class="form-group">
								<input id="password-field" type="password" class="form-control" name="inputPassword" placeholder="Password" required>
								<span toggle="#password-field" class="far fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3" name="btnSignin">Sign In</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
							</div>
						</form>
						<h5 id="contactAdminMsg" class="mb-4 text-center <?php echo isset($_GET["userNotFound"]) ? '' : 'd-none'; ?>" style=color:#ffff>Contact administrator if you don't have an account.</h5>
					</div>
				</div>
			</div>
	</section>

</body>

</html>