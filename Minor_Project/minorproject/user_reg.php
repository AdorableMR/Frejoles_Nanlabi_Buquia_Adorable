<?php
require('server.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Registration
	</title>
	<link rel="stylesheet" type="text/css" href="homestyle.css">
</head>
<body style="background-image: url('images/girl1.jpg')">
<div class="home-header">
	<?php if (isset($_SESSION["username"])): ?>
			<p class="btnLogout"><a href="index.php?logout='1'" style="color:#5f9ea0;">Logout</a></p>
		<?php endif ?>
	<h2 style="font-size: 35px"><b> iWant Books </b></h2>
			<div>
	
		<nav class="navbar" >
		<a href="index.php" style="color:white">Home</a>
		<a href="aboutus.php" style="color:white">About Us</a>
		</nav>
		</div>
</div>

	<div class="header">
		<h2 style="color:#5f9ea0"> Register </h2>
	</div>

	<form action="register.php" method="post">
		<!--display validation errors here-->
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>" >
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
	<br />
	</form>
	<h2 style="font-size: 25px;background-color: black;padding-bottom:5px;margin-top: 20px">Footer<b></b></h2>
</body>
</html>