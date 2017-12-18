<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
 <body>
 <!--<a href="#">Inbox<span class="badge">50</span></a>

<button class="btn btn-primary" type="button">
  Messages<span class="badge">74</span></button>
-->


<?php
session_start();

if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}

?>


<script type="text/javascript">

function othergroup(){
       if(document.getElementById('search_de')){
        document.getElementById('two').style.display='none';
        document.getElementById('search_table').style.display='block';

}
</script>

<?php

include_once '../../includes/dbh.inc.php';

$pulis_details = "SELECT * from deliquency_report";
$pd = $conn->query($pulis_details);

echo "<form action='../../includes/deliquency_search.inc.php' method='POST' style='float:right; '>";
echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
echo "<input class='btn btn-default' type='search' name='search' ";
echo "placeholder='Enter keyword' style='float:right;'>";
echo "</form>";



   echo"<table id='two' class='table table-striped table-hover'>";
  
   echo"<form action='../../includes/edit_ins.inc.php' method='POST'>";  
if($pd->num_rows>0){
  echo"<div id= 'static'> <th colspan=2 >Police Name</th><th>Unit</th><th>Input Date </th><th>Start Date </th><th>End Date</th><th>No.<th>Action</th></div>";
  echo"<tr>";
  $c=0;

  while($col1=$pd->fetch_assoc()){
  $c++;
       /*

         $y = $pd19['entered_date_year'];
         $m = $pd19['entered_date_month'];
         $d = $pd19['entered_date_day'];

        $now1 = time(); 
        $your_date1 = strtotime("$y-$m-$d");
        $datediff1 = $now1 - $your_date1;
        $roar1 =  floor($datediff1 / (60 * 60 * 24));*/


  
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
   echo "<button class='btn btn-default'  name='insert' value='$c' data-toggle='tooltip' title='Edit Information'><p class='glyphicon glyphicon-edit'></p></button> &nbsp;&nbsp;";
   echo "</td>";
   echo"</tr>";
  

   }
    echo"</form>";

 }
 else{
  echo " 0 results";
 }
echo"</table>";

$conn->close();

?>

  </body>
</html>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

