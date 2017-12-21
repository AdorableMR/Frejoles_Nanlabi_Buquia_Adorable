<?php
session_start();
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minorproject";

 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
    }

$user=mysqli_real_escape_string($conn,$_POST["username"]);
$pass=mysqli_real_escape_string($conn,$_POST["password"]);
$address=mysqli_real_escape_string($conn,$_POST["address"]);
$contact=mysqli_real_escape_string($conn,$_POST["contact"]);

$insert = "INSERT INTO accounts (username,address,password,contact)
           values ('$user','$address','$pass','$contact');";
           mysqli_query($conn,$insert);
           header('Location:index.php');


mysqli_close($conn);



 ?> 


