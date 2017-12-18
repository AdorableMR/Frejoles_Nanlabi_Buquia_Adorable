

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

<link href="../../css/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
   html{
    margin-left: 10px;
   }

  </style>

</head>
<body>

<?php

include_once '../../includes/dbh.inc.php';



echo"<link href='../../css/css/bootstrap.min.css' rel='stylesheet'>";


$pulis_details = "SELECT * from viewThings where status_given='Pre-charge Investigation'";


$pd = $conn->query($pulis_details);


if($pd->num_rows > 0){

                             echo "
                             <div style='width:23%; height:15%; float:left; padding-right:4px; padding-left:20px;'>
                             <img src='../../images/legend.png' style='width:80%; height:100%; float:left; padding-right:2px; padding-left:2px;' > 
                             </div>
                              ";



echo "<form action='../../includes/pre-charge_inves_update_edit.php' method='POST' style='float:right; margin-right:20px;'>";
echo "<input class='btn btn-default' type='submit' name = 'submit_one' value='search' style='float:right;'>&nbsp;";
echo "<input class='btn btn-default' type='search' name='search' ";
echo "placeholder='Enter keyword' style='float:right;'>";
$c=0;

echo"<table class='table table-striped table-hover' style='float:left;'>";


    echo "<input type='text' name='status' value='Motu-proprio Investigation' style='display:none'>";
	echo"<th colspan=2 >Police Name</th><th>Unit</th><th colspan=2>complainant</th><th>Date of cognitance</th><th colspan=2>Investigator on case</th><th>Status</th><th>Day</th><th>Docket No.</th><th colspan=2>Action</th>";
	

	while($col1 = $pd->fetch_assoc()){
	$c++;

		 $result = "SELECT mo,da,ye FROM deadline WHERE docket=$col1[official_docket]";
          $pd3 = $conn->query($result);
          $pd19=$pd3->fetch_assoc();

         $y = $pd19['ye'];
         $m = $pd19['mo'];
         $d = $pd19['da'];

        $now1 = time(); // or your date as well
        $your_date1 = strtotime("$y-$m-$d");
        $datediff1 = $now1 - $your_date1;
        $roar1 =  floor($datediff1 / (60 * 60 * 24));

    if($roar1>=18 && $roar1<27){
    echo"<tr class='warning'>";
     }
    else if($roar1>=27){
     echo"<tr class='danger'>";
 
    }else{
  	 echo"<tr>";
  	}
	echo "<td>";
	echo $col1["pulis_first"];
	echo"</td>";


    $cute1[$c]=$col1["pulis_first"];

	echo"<td>";
	echo $col1["pulis_last"];
	echo "</td>";

    echo"<td>";
	echo $col1["unit_base"];
	echo"</td>";
	
	echo "<td>";
	echo $col1["com_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["com_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["co_date"];
	echo "</td>";

	echo "<td>";
	echo $col1["inves_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["inv_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["status_given"];
	echo "</td>";

    echo "<td>";
    echo "$roar1";
    echo "</td>";

	echo "<td>";
	echo $col1["official_docket"];
	echo "</td>";

   echo"<td>";
   echo "<button class='btn btn-default'  name='update' value='$c'><p class='glyphicon glyphicon-pencil'>Status</p></button> &nbsp;&nbsp;";
   echo"</td>";

   echo"<td>";
   echo "<button class='btn btn-default'  name='edit' value='$c'><p class='glyphicon glyphicon-edit'>Edit</p></button> &nbsp;&nbsp;";
   echo "</td>";
   echo"</tr>";

  

	}
	echo "</form>	";

}
else{
	                           echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-success' style='width:20%'>
                             <strong>0 case</strong> 
                             </div></center>'
                          ";
}
echo"</table>";

$conn->close();

?>

</body>
</html>