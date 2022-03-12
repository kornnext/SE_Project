<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<title>ระบบจองห้องประชุม</title>


</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<!-- Just an image -->

			<a class="navbar-brand" href="index.php">
				<img src="img/logo.png" width="30" height="30" alt="">
			</a>

			<a class="navbar-brand" href="index.php">ระบบจองห้องประชุม</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">

				</ul>
				<div class="ml-md-2 my-lg-0">
					<a href="login.php" class="btn btn-primary" role="button">เข้าสู่ระบบ</a>
				</div>
			</div>
		</div>
	</nav>
	<div>
		<img src="img/meeting.png" class="center-block img-fluid" alt="Responsive image">
	</div>

	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<a class="navbar-brand">เข้าใช้งานระบบ</a>
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form role="form" method="post" action="login.php">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="Username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">

							<button type="submit" name="login" class="btn btn-primary">Login</button>
							<input class="btn btn-danger" type="reset" value="Reset">
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>



</body>

</html>

<?php

include("conn.php");

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$check_user = "SELECT * FROM user WHERE username='$username' AND password='$password'";

	$result = $conn->query($check_user);

	$row = mysqli_fetch_array($result);

	if ($result->num_rows > 0) {
		if ($row['type'] == "01") {   //admin check
			$_SESSION['user'] = $username;
			$_SESSION['ID'] = $row['ID'];  //push data to SESSION
			echo "<script>window.open('adminpage.php','_self')</script>";
		} elseif ($row['type'] == "02") {   //user check
			$_SESSION['user'] = $username;
			$_SESSION['ID'] = $row['ID'];  //push data to SESSION
			echo "<script>window.open('userpage.php','_self')</script>";
		}
	} else {
		echo "<script>alert('username or password is incorrect!')</script>";
		echo "<script>window.open('login.php','_self')</script>";
	}
}

?>