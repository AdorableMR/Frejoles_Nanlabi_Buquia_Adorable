
<?php
session_start();

if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
 <body>

<?php

include_once '../../includes/dbh.inc.php';



$pulis_details = "SELECT * from viewThings where status_given='Motu-proprio Archive'";

$pd = $conn->query($pulis_details);


if($pd->num_rows > 0){
echo"<link href='../../css/css/bootstrap.min.css' rel='stylesheet'>";


 echo "<form action='../../includes/motu-proprio-archive.inc.php' method='POST' style='float:right; margin-right:20px;'>";
echo "<input class='btn btn-default' type='submit' name = 'submit_one' value='search' style='float:right;'>&nbsp;";
echo "<input class='btn btn-default' type='search' name='search' ";
echo "placeholder='Enter keyword' style='float:right;'>";

$c=0;

echo"<table class='table table-striped table-hover' style='float:left;'>";
   
    echo "<input type='text' name='status' value='Motu-proprio Investigation' style='display:none'>";

	echo"<th colspan=2 >Police Name</th><th>Unit</th><th colspan=2>complainant</th><th>Case Close Date</th><th>Date Of Cognitance</th><th colspan=2>Investigator on case</th><th>Status</th><th>Description</th><th>Docket No.</th>";
	echo"<tr>";
	while($col1 = $pd->fetch_assoc()){

$re = "SELECT * from motu_related where docket='$col1[official_docket]'";

$pd2 = $conn->query($re);

$col2=$pd2->fetch_assoc();

	$c++;
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
	echo $col1["mo"]."/";
	echo $col1["da"]."/";
	echo $col1["ye"];
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
	echo $col2["related"];//drug or not drug relate
	echo "</td>";


	echo "<td>";
	echo $col1["official_docket"];
	echo "</td>";

echo"</tr>";

	}
	echo "</form>";

}
else{
		                     echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-success' style='width:20%'>
                             <strong>0 result</strong> 
                             </div></center>'
                              ";
}
echo"</table>";

$conn->close();

?>

  </body>
</html>
