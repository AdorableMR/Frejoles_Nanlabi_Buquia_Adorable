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

   <link rel="stylesheet" type="text/css" href="children_styles.css">
</head>
<body>
	<div class="home-header">
	<?php if (isset($_SESSION["username"])): ?>
			<p class="btnLogout"><a href="index.php?logout='1'" style="color:#5f9ea0;">Logout</a></p>
		<?php endif ?>
		<h2 style="font-size: 35px"><b> iWant Books ( Action ) </b></h2>
		<div>
		<nav class="navbar">
		<a href="index.php" style="color:white">Home</a>
		<a href="aboutus.php" style="color:white">About Us</a>
		</nav>
		</div>
	</div>
	
		
		<div class="container">
		<?php if (isset($_SESSION['success'])): ?>
				<div class="error success">
						<h3>
							<?php
								echo $_SESSION['success'];
								unset($_SESSION['success']);
							?>
						</h3>
				</div>
		<?php endif ?>

		<?php if (isset($_SESSION["username"])): ?>
		<div class="r_image">
			<form class="form1" action="action_function.php" method="POST">
			<center><img src="images/action1.jpg">
			<h4>Satellite</h4>
			<p style="font-size: 15px;">by <i>Nick Lake</i></p>
			<p class="b1">A teenage boy born in space makes his first trip to Earth. He’s going to a place he’s never been before: home. Moon 2 is a space station that orbits approximately 250 miles above Earth. It travels 17,500 miles an hour, making one full orbit every ninety minutes.</p><br />
		    
		    <input type="text" name="title" value="Satellite" style="display:none">
		    <input type="text" name="author" value="Nick Lake" style="display:none">
		    <input type="text" name="para" value="A teenage boy born in space makes his first trip to Earth. He’s going to a place he’s never been before: home. Moon 2 is a space station that orbits approximately 250 miles above Earth. It travels 17,500 miles an hour, making one full orbit every ninety minutes." style="display:none">

			<?php if(isset($_SESSION['admin'])){ ?> <button type="submit" name="submit"  class='btn btn-default' style='color:white; background-color:#5f9ea0;' value="action">Borrow</button><?php } ?>
			</center>
			</form>
		</div>
			<div class="r_image">
			<form class="form1" action="action_function.php" method="POST">
			<center><img src="images/action2.jpg">
			<h4>Dare Mighty Things</h4>
			<p style="font-size: 15px;">by <i>Heather Kaczynski</i></p>
			<p class="b2">THE RULES ARE SIMPLE: You must be gifted. You must be younger than twenty-five. You must be willing to accept the dangers that you will face if you win. Seventeen-year-old Cassandra Gupta’s entire life has been leading up to this—the opportunity to travel to space. </p>
			 
			<input type="text" name="title" value="Dare Mighty Things" style="display:none">
		    <input type="text" name="author" value="Heather Kaczynski" style="display:none">
		    <input type="text" name="para" value="THE RULES ARE SIMPLE: You must be gifted. You must be younger than twenty-five. You must be willing to accept the dangers that you will face if you win. Seventeen-year-old Cassandra Gupta’s entire life has been leading up to this—the opportunity to travel to space." style="display:none">

			<?php if(isset($_SESSION['admin'])){ ?><button type="submit"  class='btn btn-default' style='color:white; background-color:#5f9ea0;' name="submit"  value="action">Borrow</button><?php } ?>
			</center>
			</form>
		</div>
		<div class="r_image">
			<form class="form1" action="action_function.php" method="POST">
			<center><img class="b3_image" src="images/action3.jpg">
			<h4>The Empress (The Diabolic #2)</h4>
			<p style="font-size: 15px;">by <i>S.J. Kincaid</i></p>
			<p class="b3">It’s a new day in the Empire.Trus has ascended to the throne with Nemesis by his side and now they can find a new way forward—one where they don’t have to hide or scheme or kill.</p><br /><br />
			
		    <input type="text" name="title" value="The Empress (The Diabolic #2)" style="display:none">
		    <input type="text" name="author" value="S.J. Kincaid" style="display:none">
		    <input type="text" name="para" value="It’s a new day in the Empire.Trus has ascended to the throne with Nemesis by his side and now they can find a new way forward—one where they don’t have to hide or scheme or kill." style="display:none">

			<?php if(isset($_SESSION['admin'])){ ?><button type="submit"  class='btn btn-default' style='color:white; background-color:#5f9ea0;' name = "submit"  value="action">Borrow</button><?php } ?>
			</center>
			</form>
		</div>
			<div class="r_image">
			<form class="form1" action="action_function.php" method="POST">
			<center><img class="b4_image" src="images/action4.jpg">
			<h4>Eversong (The Kindred, #1)</h4>
			<p style="font-size: 15px;">by <i>Donna Grant (Translator), Norman MacAfee (Translator)</i></p>
			<p class="b4"> New York Times bestselling author Donna Grant “skillfully melds history and legend” (RT Book Reviews) in a brand new series – The Kindred. To live in the light, they hunt in the dark… Unparalleled in beauty and daring, Leoma has been raised with a single-minded focus—to wipe out corrupt witches. </p>
			
		    <input type="text" name="title" value="Eversong (The Kindred, #1)" style="display:none">
		    <input type="text" name="author" value="Donna Grant (Translator), Norman MacAfee (Translator)" style="display:none">
		    <input type="text" name="para" value="New York Times bestselling author Donna Grant “skillfully melds history and legend” (RT Book Reviews) in a brand new series – The Kindred. To live in the light, they hunt in the dark… Unparalleled in beauty and daring, Leoma has been raised with a single-minded focus—to wipe out corrupt witches." style="display:none">

			<?php if(isset($_SESSION['admin'])){ ?><button type="submit"  class='btn btn-default' style='color:white; background-color:#5f9ea0;' name="submit"  value="action">Borrow</button><?php } ?>
			</center>
			</form>
		</div>

		</div>

		<?php endif ?>
	</div>
	
	<div class="sidenav">
				<h2 style="color:#5f9ea0">Genres: </h2><br />
				<a href="action.php">Action</a>
						
				<a href="drama.php">Drama</a>
						
				<a href="romance.php">Romance</a>
						
				<a href="fiction.php">Fiction</a>
						
				<a href="children.php">Children Stories</a>			
		</div>
</body>
</html>

<!-- 
		    <input type="text" name="title" value="" style="display:none">
		    <input type="text" name="author" value="" style="display:none">
		    <input type="text" name="para" value="" style="display:none">

-->