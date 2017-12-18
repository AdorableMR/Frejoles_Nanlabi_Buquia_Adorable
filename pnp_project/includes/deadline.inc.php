<?php

session_start();

?>
<!DOCTYPE html>
<head>
	<title></title>
  <link href="../../css/holder.css" type="text/css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>


<?php

include_once 'dbh.inc.php';

echo"<link href='../css/css/bootstrap.min.css' rel='stylesheet'>";


function line($y,$m,$d){

$g="$y-$m-$d";

$date = new DateTime($g);

$date->add(new DateInterval('P4D'));

$rr= $date->format('m-d-Y');
 
}

$current=date("m-d-Y") ;

$pulis_details = "SELECT * from deliquency_report where alert_date='$current' ";

$pd = $conn->query($pulis_details);

   echo"<table class='table table-striped table-hover'>";
  
   echo"<form class='form-control' action='reset_ins.inc.php' method='POST'>";  

if($pd->num_rows>0){
	

	echo"<div id= 'static'> <th colspan=2 >Police Name</th><th>Unit</th><th>Input Date </th><th>Start Date </th><th>End Date</th><th>No.<th>Reset</th></div>";

	echo"<tr>";

	$c=0;


	while($col1=$pd->fetch_assoc()){

	$c++;

	echo "<td>";

	echo $col1["first"];

	echo"</td>";



	echo"<td >";

	echo $col1["last"];

	echo "</td>";


    echo"<td >";

	echo $col1["unit"];

	echo"</td>";
	

	echo "<td >";

	echo $col1["start_date"];

	echo "</td>";


     echo "<td >";

     echo $col1["entered_date_month"]."-".$col1["entered_date_day"]."-".$col1["entered_date_year"];

     echo "</td>";
    
    echo "<td>";

	echo $col1["alert_date"];

	echo "</td>";

	echo "<td>";
	echo $col1["counter"];
	echo "</td>";

    echo"<td>";
  
   echo "<button type='submit' name='insert' value='$c' class='btn btn-danger' ><p class='glyphicon glyphicon-remove'></p></button>&nbsp;";

   echo "</td>";

   echo"</tr>";
 
   }

    echo"</table>";


    echo "<input type='submit' name='delete_all' value='Reset All' class='btn btn-warning' style='float:right; margin-right:10px;'>";


    echo"</form>";

 }
 else{
                              echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-success' style='width:20%'>
                             <strong>No Deadline !</strong> For the day
                             </div></center>'
                          ";
 }

/*
for($a=0;$a<$c+1;$a++){
	echo $first_e[$a]."&nbsp;&nbsp;&nbsp;".$last_e[$a]."&nbsp;&nbsp;&nbsp;".$counter_e[$a]."&nbsp;&nbsp;&nbsp;".$report_t[$a]."&nbsp;&nbsp;&nbsp;".$start_date_e[$a]."&nbsp;&nbsp;&nbsp;".$alert_date_e[$a]."<br>";
    

}
*/
$conn->close();

?>

</body>
</html>