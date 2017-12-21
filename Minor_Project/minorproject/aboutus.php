<?php
require('server.php');
if(empty($_SESSION['username'])) {
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Index
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>
	<div class="home-header">
	<?php if (isset($_SESSION["username"])): ?>
			<p class="btnLogout"><a href="index.php?logout='1'" style="color:#5f9ea0;">Logout</a></p>
		<?php endif ?>
		<h2 style="font-size: 35px"><b> ABOUT US </b></h2>
		<div>
		<nav class="navbar">
		<?php if (isset($_SESSION["admin"])){ ?>
		<a href="index.php" style="color:white">Home</a>
		<?php }else{?>
		<a href="user.php" style="color:white">Home</a>
		<?php } ?>
		<a href="aboutus.php" style="color:white">About Us</a>
		</nav>
		</div>
	</div>
	
		
		<div class="container">


		<?php if (isset($_SESSION["username"])): ?>
		
		<div style="background-color: white	;padding: 5px 5px 5px 5px;">
		<center><div>
			<h2 style="color:blue">DEVELOPERS:</h2>
			<p>
				ADORABLE, Mary Rose C. <br />
				BUQUIA, Rennjo <br />
				FREJOLES, Mie <br />
				NANLABI, Ralph Wealthy <br />
			</p>
		</div></center>
		<br />	
		<center><div>
			<h2 style="color:blue">College:</h2>
			<p>
				<i>Insitute of Computing </i>
			</p>
		</div></center>
		<br />
		<center><div>
			<h2 style="color:blue">School:</h2>
			<p>
				University of Southeastern Philippines
			</p>
		</div></center>
		<br />
		<center><div>
			<h2 style="color:blue">Instructor:</h2>
			<p>
				NANCY S. MOZO	
			</p>
		</div>	
	</center>
	</div>
		<br /> <br />
		<div style="margin-left: 200px;margin-right: 20px">
			<h2 style="color:blue">DESIGN FOR WHOM?</h2>
			<p style="text-align: justify">
				This system is about book borrowing where anyone can borrow available books with different genres like children stories, 
				action,fiction,romance and drama. The ones who are allowed to borrow are those who are already registered, and for those who are not, they can also avail the free registration that will be facilitated by an authorized user only or an admin.  
			</p>
		</div>

		<?php endif ?>
	</div>
	

</body>
</html>