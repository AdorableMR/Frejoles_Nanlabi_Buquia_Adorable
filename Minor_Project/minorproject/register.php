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
<!--<body style="background-image: url('images/girl1.jpg')">-->
	<!--
<div class="home-header">
	<?php if (isset($_SESSION["username"])): ?>
			<p class="btnLogout"><a href="index.php?logout='1'" style="color:#5f9ea0;">Logout</a></p>
		<?php endif ?>
	<h2 style="font-size: 35px"><b> iWant Books </b></h2>
			<div>-->
	
		<nav class="navbar" >
		<a href="index.php" style="color:#5f9ea0; font-size:30x; margin-right:470px;">Home</a>
		<!--<a href="aboutus.php" style="color:white">About Us</a>-->
		</nav>
		</div>
</div>
<h1 style="font-size: 90px;float: right;margin: 70px;color:black; "><?php /*echo "WELCOME" . "<br />" . "$_SESSION[username]" . " !"*/?></h1>
	   <center>
	   	<div class="header">
		  <h2 style="color:#5f9ea0"> Register </h2>
	    </div>
 
	<form action="register.inc.php" method="post" >
		<!--display validation errors here-->
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email">
		</div>

		<div class="input-group">
			<label>Contact Number</label>
			<input type="number" name="contact">
		</div>
	 <div class="input-group">
			<label>Address</label>
			<input type="text" name="address">
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
	<br />
	</form></center>
</div>
	<h2 style="font-size: 25px;padding-bottom:5px;margin-top: 20px">Footer<b></b></h2>
</body>
</html>