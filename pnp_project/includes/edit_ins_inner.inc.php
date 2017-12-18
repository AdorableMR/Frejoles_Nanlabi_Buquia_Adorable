<?php
session_start();

if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
?>
<?php

include_once 'dbh.inc.php';

if(isset($_POST['update'])){

$ol=mysqli_real_escape_string($conn,$_POST['or_l']);

$of=mysqli_real_escape_string($conn,$_POST['or_f']);

$uu=mysqli_real_escape_string($conn,$_POST['or_un']);

$oc=mysqli_real_escape_string($conn,$_POST['or_no_de']);

$oe=mysqli_real_escape_string($conn,$_POST['or_de']);

$ost=mysqli_real_escape_string($conn,$_POST['or_st']);

$oal=mysqli_real_escape_string($conn,$_POST['or_al']);


$day=mysqli_real_escape_string($conn,$_POST['entered_date_day']);

$month=mysqli_real_escape_string($conn,$_POST['entered_date_month']);

$year=mysqli_real_escape_string($conn,$_POST['entered_date_year']);

$day_entered=mysqli_real_escape_string($conn,$_POST['day']);

$month_entered=mysqli_real_escape_string($conn,$_POST['month']);

$year_entered=mysqli_real_escape_string($conn,$_POST['year']);


$g="$year_entered-$month_entered-$day_entered";

$date = new DateTime($g);

$date->add(new DateInterval('P1M'));

$rr= $date->format('m-d-Y');


$a=mysqli_real_escape_string($conn,$_POST['fi']);

$b=mysqli_real_escape_string($conn,$_POST['la']);

$c=mysqli_real_escape_string($conn,$_POST['un']);

$d=mysqli_real_escape_string($conn,$_POST['no_de']);

$e=mysqli_real_escape_string($conn,$_POST['de']);



$update = "UPDATE deliquency_report SET last='$b',first='$a',unit='$c',counter='$d',alert_date='$rr',entered_date_day='$day_entered',entered_date_month='$month_entered',entered_date_year='$year_entered'  where last='$ol' && first='$of' &&  unit='$uu'";
  
  mysqli_query($conn,$update);

  header("Location: ../html/iframe_ins/search.php");

  exit();

}
else if($_POST['cancel']){

  header("Location: ../html/iframe_ins/search.php");	

}

 else{
  echo "error";

}


$conn->close();

?>