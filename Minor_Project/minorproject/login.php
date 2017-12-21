<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Login
	</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
	<body style="background-image: url('images/girl1.jpg')">
<div class="home-header">
	<h2 style="font-size: 35px"><b> iWant Books </b></h2>
</div>

	<div class="header" style="margin-top: 50px;margin-left: 850px">
		<h2> Login </h2>
	</div>

	<form style="margin-left: 850px" action="login.php" method="post">
		<!--display validation errors here-->
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
	</form>
	<center><h2 style="font-size: 25px;background-color: black;padding-bottom:0px;padding-top:5px;margin-top: 210px;color: white">&copy;ASD 2017<b></b></h2></center>
</body>
</body>
</html>