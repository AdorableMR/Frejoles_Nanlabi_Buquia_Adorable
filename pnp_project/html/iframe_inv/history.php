<?php
session_start();

if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
?>
<!DOCTYPE html>
<head>
<title>
</title>
</head>
<body>
	<p> History using php <br>location: history.html</p>
</body>
</html>