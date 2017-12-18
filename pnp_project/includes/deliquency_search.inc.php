

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

echo"<link href='../css/css/bootstrap.min.css' rel='stylesheet'>";

include_once 'dbh.inc.php';



   if(isset($_POST['submit'])){
 
           $cd = $_POST['search'];


         if($cd==null){
         header("Location: ../html/iframe_ins/search.php");
         exit();
         
         }else{



        $pulis_details = "SELECT * from deliquency_report where first like '%$cd%' || last like '%$cd%' || unit like '%$cd%' || counter like '%$cd%' || report_text like '%$cd%' || start_date like '%$cd%' || alert_date like '%$cd%'";
        $pd = $conn->query($pulis_details);


echo "<form action='deliquency_search.inc.php' method='POST' style='float:right; margin-right:30px;'>";

echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
echo "<input class='btn btn-default' type='search' name='search' ";
echo "placeholder='Enter keyword' style='float:right;'>";

echo "</form>";

        echo"<table id='two' class='table table-striped table-hover' style='display:block;'>";

        echo"<form action='edit_ins.inc.php' method='POST'>";  


  if($pd->num_rows>0){

    echo"<div id= 'static'> <th colspan=2 >Police Name</th><th>Unit</th><th>Input Date </th><th>Start Date </th><th>End Date</th><th>No.<th>Action</th></div>";

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
    

   /* echo "<td colspan=10 id='iba' >";

    echo $col1["report_text"];

    echo "</td>";*/

    echo "<td >";

    echo $col1["start_date"];

    echo "</td>";


     echo "<td >";

     echo $col1["entered_date_month"]."-".$col1["entered_date_day"]."-".$col1["entered_date_year"]."<br>";

     echo "</td>";
    
    echo "<td>";

    echo $col1["alert_date"];

    echo "</td>";

    echo "<td>";

    echo $col1["counter"];

    echo "</td>";

    echo"<td>";
  
  $cookie_first="f";
  $cookie_last="l";
  $cookie_unit="u";

       setcookie($cookie_first,$col1['first'],time()+3600);
       setcookie($cookie_last,$col1['last'],time()+3600);
       setcookie($cookie_unit,$col1['unit'],time()+3600);


  echo "<button class='btn btn-default'  name='edit' value='edit'><p class='glyphicon glyphicon-edit'>Edit</p></button> &nbsp;&nbsp;";

   echo "</td>";
  
   echo"</tr>";

  

                        }
                
                     echo"</form>";
                
                }else{

                       echo "0 results";
  
                      }
            }
   }else{
      
      header("Location: ../html/iframe_ins/search.php");
      
      exit();
   }


$conn->close();
?>


</body>
</html>