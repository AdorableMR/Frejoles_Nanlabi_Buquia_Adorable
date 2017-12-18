
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

if(isset($_POST['search'])){

  $value = $_POST['search'];
 
    if($value==null){

        
       header('Location: reset_logs.php');
       exit();
    }else{
      
      $pulisy_details = "SELECT * from deliquency_reset_record where first ='$value' || last like '%$value%' || first like '%$value%' || total like '%$value%'";
      
      if($pd=$conn->query($pulisy_details)){
        echo "<form action='reset_logs.php' method='POST' style='float:right; '>";
echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
echo "<input class='btn btn-default' type='search' name='search' ";
echo "placeholder='Enter keyword' style='float:right;'>";
echo "</form>";



   echo"<table id='two' class='table table-striped table-hover'>";

if($pd->num_rows>0){
  echo"<th colspan=2 >Police Name</th><th>Unit</th><th>Date</th><th>Total Demerits</th>";
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
  echo $col1["mo"]."-".$col1["da"]."-".$col1["ye"];
  echo "</td>";
    
   echo "<td>";
  echo $col1["total"];
  echo "</td>";



   echo"</tr>";
  

   }

 }
 else{
  echo " 0 results";
 }
echo"</table>";
      }else{
        header('Location: reset_logs.php');
        exit();
      }



       

    }

}else{




$pulis_details = "SELECT * from deliquency_reset_record";
$pd = $conn->query($pulis_details);

echo "<form action='reset_logs.php' method='POST' style='float:right; '>";
echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
echo "<input class='btn btn-default' type='search' name='search' ";
echo "placeholder='Enter keyword' style='float:right;'>";
echo "</form>";



   echo"<table id='two' class='table table-striped table-hover'>";

if($pd->num_rows>0){
  echo"<th colspan=2 >Police Name</th><th>Unit</th><th>Date</th><th>Total Demerits</th>";
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
  echo $col1["mo"]."-".$col1["da"]."-".$col1["ye"];
  echo "</td>";
    
   echo "<td>";
  echo $col1["total"];
  echo "</td>";



   echo"</tr>";
  

   }

 }
 else{
                              echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-warning' style='width:20%'>
                             <strong>0 result</strong> 
                             </div></center>'
                          ";
 }
echo"</table>";

}
$conn->close();

?>

  </body>
</html>


