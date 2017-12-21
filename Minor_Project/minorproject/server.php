<?php
session_start();
$username ="";
$email="";
$errors = array();
//connect to the database
$db = mysqli_connect('localhost','root','','minorproject');

//if register button is clicked
if (isset($_POST['register'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$contact_number = $_POST['contact'];
	$address = $_POST['address'];

	//ensure form are filled
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($contact_number)) {
		array_push($errors, "Contact number is required");
	}	
	if (empty($address)) {
		array_push($errors, "Address is required");
	}
	//if no errors save to db
	if(count($errors) == 0){
		$sql = "INSERT INTO register (borrower_id,username,email,contact_number,address) 
				VALUES (NULL,'$username,'$email,'$contact_number','$address')";
		mysqli_query($db, $sql);	
	}
}

	//log uer from login page
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//ensure form are filled
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}
	if(count($errors) == 0){
		/*$password = md5($password);*/


				    $query2 = "SELECT * FROM admin_table WHERE username='$username' AND password='$password'";
		            $result2 = mysqli_query($db, $query2);

		            if($result2->num_rows > 0 ){
			           $_SESSION['username'] = $username;
		               $_SESSION['admin'] = $username;
		               $_SESSION['success'] = "You are now logged in.";
		              header('location: index.php');
		            }

		$query = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
		$result = mysqli_query($db,	 $query);
		if($result->num_rows > 0){
			//log useer in
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in.";
		header('location: user.php');
		}
		else{
		      array_push($errors,"Wrong username/password combination. ");
		  
		    }



	}
}

	//logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
?>
<?php ?>