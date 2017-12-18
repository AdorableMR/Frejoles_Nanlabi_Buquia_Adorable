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

         if(isset($_POST['go_back'])){
                
           header("Location: ../html/iframe_inv/pre-charge-inves_search.php");
           exit();
         }

   if(isset($_POST['update'])){

       include_once'dbh.inc.php';

               $number=$_POST['update'];

                  $pulis_details = "SELECT * from viewthings  where status_given='Pre-charge Investigation' ";
                  
                  $pd = $conn->query($pulis_details);

                   $c=0;

                  while($convey=$pd->fetch_assoc()){
                  
                      $c++;
                  
                      if($c==$number){
                      

                     
                  
                      echo"<form action='pre-charge_inves_update_edit.php' method='POST'>";
                      
                      echo"<table class='table table-striped table-hover'>
                      <th colspan=2>Police Name </th><th colspan=2>Complainant</th><th>Unit</th><th>Date</th><th colspan=2>Investigator on case</th><th>Status</th><th>Docket</th>";
                  
                      echo"<tr><td>$convey[pulis_first]</td>";
                  
                      echo"<td>$convey[pulis_last]</td>";
                      


                      echo"<td>$convey[com_first]</td>";
                  
                      echo"<td>$convey[com_last]</td>";
                  
                    
                  
                      echo"<td>$convey[unit_base]</td>";

                  
                      echo"<td>$convey[co_date]</td>";
                  
            
                  
                      echo"<td>$convey[inves_first]</td>";
                  
                      echo"<td>$convey[inv_last]</td>";

                      echo"<td>$convey[status_given]</td>";
                      
                      echo"<td>$convey[official_docket]</td></tr></table><table class='table table-striped table-hover'>";
  
                        echo "<tr><td>";
                        echo "<b>Offense : </b>".$convey["offense_given"];
                        echo "</td></tr></table>" ;                       
                      
                      
                      echo "<table class='table table-striped table-hover'><tr style='background-color:silver;'><td><h3><center><input type='radio' name='val' value='Precharge Archive' style='margin-left:20px;' required/>Precharge Archive<h3></center><br>";

                  
                      echo"<center><button type='submit' class='btn btn-default' name='update_initial' value='$c' style='width:20%;'>update</button></center>";

                      echo "</form><br>";
                      echo "
                        <form action='pre-charge_inves_update_edit.php' method='POST'>

                       <center><input type='submit' name='go_back'  class='btn btn-default' 'style='width:20%;' value='Go back without saving'></center>
                      
                       </form></table>";

                  
                
                 }     

              }
           }

if(isset($_POST['update_initial'])){

       include_once'dbh.inc.php';

                if(!isset($_POST['val'])){
                echo "<br><br><br><center>
                <div class='alert alert-danger' style='width:20%'>
                <strong>Error!</strong> No selected status
                </div></center>';";
                echo "<form action='pre-charge_inves_update_edit.php' method='POST'>";
                echo "<center><button name='go_back' class='form-control' style='width:20%'>Okey</button></center>";
                echo "</form>";
                exit();
               }
                
                $status=$_POST['val'];

               $number=$_POST['update_initial'];


                  $pulis_details = "SELECT * from viewthings  where status_given='Pre-charge Investigation' ";
                  
                  $pd = $conn->query($pulis_details);

                   $c=0;

                  while($convey=$pd->fetch_assoc()){
                  
                      $c++;
                  
                      if($c==$number){
                      
                  if($status=='Precharge Archive'){

                  $mo_date = date("m"); 
                  $da_date = date("d"); 
                  $ye_date = date("Y"); 

                  $pulis = "UPDATE c SET status='Precharge Archive' where docket='$convey[official_docket]';";
                  $conn->query($pulis);

                  $update_kk = "UPDATE deadline SET mo='$mo_date',da='$da_date',ye='$ye_date',docket='$convey[official_docket]' WHERE docket='$convey[official_docket]';";
                  $conn->query($update_kk);



                 header("Location: ../html/iframe_inv/pre-charge-inves_search.php");
                  exit();




                          }  
                
                 }     

              }
           }



?>


<?php

     if(isset ($_POST['edit'])){

        include_once'dbh.inc.php';
      

               $number=$_POST['edit'];


          $pulis_details = "SELECT * from viewthings  where status_given='Pre-charge Investigation' ";

                  
                  $pd = $conn->query($pulis_details);

                   $c=0;

                  while($convey=$pd->fetch_assoc()){
                  
                      $c++;
                  
                      if($c==$number){
                      

                      echo "<div id = 'ordinary' style='display:block;'>";
                
                      

                        echo"<form action='investigation_search_update.inc.php' method='POST' style='padding-left:10px;'>";
                      

                      echo"<label><b>Status : </label>$convey[status_given] <br><br>";


                      echo "Edit Police Report </center><br><br>";
                  
                      echo"<input type='text' name='pulis_first' value='$convey[pulis_first]' style='display:none;'>";
                  
                      echo"<input type='text' name='pulis_last' value='$convey[pulis_last]' style='display:none;'>";
                  
                      echo"<input type='text' name='com_first' value='$convey[com_first]' style='display:none;'>";
                  
                      echo"<input type='text' name='com_last' value='$convey[com_last]' style='display:none;'>";
                  
                      echo"<input type='text' name='unit_base' value='$convey[unit_base]' style='display:none;'>";
                  
                      echo"<input type='text' name='day' value='$convey[da]' style='display:none;'>";
                  
                      echo"<input type='text' name='month' value='$convey[mo]' style='display:none;'>";
                  
                      echo"<input type='text' name='year' value='$convey[ye]' style='display:none;'>";

                      echo"<input type='text' name='offense_given' value='$convey[offense_given]' style='display:none;'>";
                  
                      echo"<input type='text' name='inves_first' value='$convey[inves_first]' style='display:none;'>";
                  
                      echo"<input type='text' name='inves_last' value='$convey[inv_last]' style='display:none;'>";
                  
                      echo"<input type='text' name='status_given' value='$convey[status_given]' style='display:none;'>";
                  
                      echo"<input type='text' name='official_docket' value='$convey[official_docket]' style='display:none;'>";
                      
                      echo"<label>Police Name : </label><br>";
                  
                      echo"<label><b>first Name: </b></label><input type='text' name='first' required='required'   style='width:40%; text-align:center;' value='$convey[pulis_first]'> &nbsp;&nbsp;";
                  
                      echo"<b>last Name:</b> <input type='text' name='last' required='required'  style='width:40%; text-align:center;' value='$convey[pulis_last]'><br><br>";
                  
                      echo"<label>Complainant Name :</label><br>";
                  
                      echo"<label>first Name: </label><input type='text' name='c_first' required='required'  style='width:40%; text-align:center;' value='$convey[pulis_first]'> &nbsp;&nbsp;";
                  
                      echo"<label>last Name: </label><input type='text' name='c_last' required='required' style='width:40%; text-align:center;' value='$convey[pulis_last]'><br><br>";
                            
                      echo"<label>Unit : </label><input type='text' name='unit' required='required' style='width:50%; text-align:center;' value='$convey[unit_base]'><br><br>";


                      echo"<label>Offense : </label><textarea name='offense' required='required' value='$convey[offense_given]' style='width:90%; height=150px; text-align:center;'>$convey[offense_given]</textarea><br><br>";

                      echo"<label>Investigator Name : </label><br>";
                  
                      echo"<label>first Name: </label><input type='text' name='i_first' required='required'style='width:40%; text-align:center;' value='$convey[inves_first]'>&nbsp;&nbsp;";
                  
                      echo"<label>last Name: </label><input type='text' name='i_last' required='required'style='width:40%; text-align:center;' value='$convey[inv_last]'><br><br>";
                  
                      echo"<label>Docket No. : </label><input type='text' name='docket' required='required' style='width:50%; text-align:center;' value='$convey[official_docket]'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                  
                      echo"<input type='submit' name='Edit'  class='btn btn-default' 'style='width:40%;' value='Edit'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

                      echo"</form><form action='pre-charge_inves_update_edit.php' method='POST' style='width:40%; padding-left:10%; float:right;'>

                      <input type='submit' name='go_back'  class='btn btn-default' 'style='width:40%; float:left; margin-left:40%;' value='Go back without saving'>";
                      echo "</form></center>";
                  

                    }


                  }

   }


?>

<?php

include_once'dbh.inc.php';

    if(isset($_POST['submit_one'])){
         $evaluate = $_POST['search'];

         if($evaluate==null){

           header("Location: ../html/iframe_inv/pre-charge-inves_search.php");
           exit();
         }else{

        $pulis_details = "SELECT * from viewthings where status_given='Pre-charge Investigation' &&(com_first like '%$evaluate%' || com_last like '%$evaluate%' || pulis_first like '%$evaluate%' || pulis_last like '%$evaluate%' || official_docket like '%$evaluate%' || unit_base like '%$evaluate%' || status_given like '%$evaluate%' || official_docket like '%$evaluate%')";
        $pd = $conn->query($pulis_details);


if($pd->num_rows > 0){

                             echo "
                             <div style='width:23%; height:15%; float:left; padding-right:4px; padding-left:20px;'>
                             <img src='
                             ../images/legend.png' style='width:80%; height:100%; float:left; padding-right:2px; padding-left:2px;' > 
                             </div>
                              ";


echo "<form action='pre-charge_inves_update_edit.php' method='POST' style='float:right; margin-right:20px;'>";

echo "<input class='btn btn-default' type='submit' name = 'submit_one' value='search' style='float:right;'>&nbsp;";
echo "<input class='btn btn-default' type='search' name='search' ";
echo "placeholder='Enter keyword' style='float:right;'>";

$c=0;

echo"<table class='table table-striped table-hover'  style='float:left;'>";

  echo "<input type='text' name='status' value='Motu-proprio Investigation' style='display:none'>";
  echo"<th colspan=2 >Police Name</th><th>Unit</th><th colspan=2>complainant</th><th colspan=2>Date of cognitance</th><th colspan=2>Investigator on case</th><th>Status</th><th>Day</th><th>Docket No.</th><th colspan=2>Action</th>";
  
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
 
   setcookie($c,$col1['official_docket'],time()+3600);

   echo"<td>";
   echo "<button class='btn btn-default'  name='update_here' value='$c'><p class='glyphicon glyphicon-pencil'>Status</p></button> &nbsp;&nbsp;";
   
   echo "<button class='btn btn-default'  name='edit_here' value='$c'><p class='glyphicon glyphicon-edit'>Edit</p></button> &nbsp;&nbsp;";
   echo "</td>";
   echo"</tr>";


  }
  echo "</form>";

}
else{

echo "<form action='pre-charge_inves_update_edit.php' method='POST' style='float:right; margin-right:20px;'>";
echo "<input class='btn btn-default' type='submit' name = 'submit_one' value='search' style='float:right;'>&nbsp;";
echo "<input class='btn btn-default' type='search' name='search' ";
echo "placeholder='Enter keyword' style='float:right;'>";
echo "</form>";
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

    }

?>


<?php



   if(isset($_POST['update_here'])){

       include_once'dbh.inc.php';

               $number=$_POST['update_here'];

                  $pulis_details = "SELECT * from viewthings  where status_given='Pre-charge Investigation' ";
                  
                  $pd = $conn->query($pulis_details);

                   $c=0;

                  while($convey=$pd->fetch_assoc()){
                  
                      $c++;
                  
                      if($_COOKIE[$number]==$convey['official_docket']){
                               
                      echo"<form action='pre-charge_inves_update_edit.php' method='POST'>";
                      
                      echo"<table class='table table-striped table-hover'>
                      <th colspan=2>Police Name </th><th colspan=2>Complainant</th><th>Unit</th><th>Date</th><th colspan=2>Investigator on case</th><th>Status</th><th>Docket</th>";
                  
                      echo"<tr><td>$convey[pulis_first]</td>";
                  
                      echo"<td>$convey[pulis_last]</td>";
                      


                      echo"<td>$convey[com_first]</td>";
                  
                      echo"<td>$convey[com_last]</td>";
                  
                    
                  
                      echo"<td>$convey[unit_base]</td>";

                  
                      echo"<td>$convey[co_date]</td>";
                     
            
                  
                      echo"<td>$convey[inves_first]</td>";
                  
                      echo"<td>$convey[inv_last]</td>";

                      echo"<td>$convey[status_given]</td>";
                      
                      echo"<td>$convey[official_docket]</td></tr></table><table class='table table-striped table-hover'>";
  
                        echo "<tr><td>";
                        echo "<b>Offense : </b>".$convey["offense_given"];
                        echo "</td></tr></table>" ;                       
                      
                      
                      echo "<table class='table table-striped table-hover'><tr style='background-color:silver;'><td><h3><center><input type='radio' name='val' value='Precharge Archive' style='margin-left:20px;' required/>Precharge Archive<h3></center><br>";

                  
                      echo"<center><button type='submit' class='btn btn-default' name='update_initial' value='$c' style='width:20%;'>update</button></center>";

                      echo "</form><br>";
                      echo "
                        <form action='pre-charge_inves_update_edit.php' method='POST'>

                       <center><input type='submit' name='go_back'  class='btn btn-default' 'style='width:20%;' value='Go back without saving'></center>
                      
                       </form></table>";
                  
                
                 }     

              }
           }
           ?>


 <?php

     if(isset ($_POST['edit_here'])){

        include_once'dbh.inc.php';
      

               $number=$_POST['edit_here'];




          $pulis_details = "SELECT * from viewthings  where status_given='Pre-charge Investigation' ";

                  
                  $pd = $conn->query($pulis_details);

                   $c=0;

                  while($convey=$pd->fetch_assoc()){
                  
                      $c++;
                  
                      if($_COOKIE[$number]==$convey['official_docket']){
                      

                      echo "<div id = 'ordinary' style='display:block;'>";
                  
                      echo"<form action='investigation_search_update.inc.php' method='POST' style='padding-left:10px;'>";
                      

                      echo"<label><b>Status : </label>$convey[status_given] <br><br>";


                      echo "Edit Police Report </center><br><br>";
                  
                      echo"<input type='text' name='pulis_first' value='$convey[pulis_first]' style='display:none;'>";
                  
                      echo"<input type='text' name='pulis_last' value='$convey[pulis_last]' style='display:none;'>";
                  
                      echo"<input type='text' name='com_first' value='$convey[com_first]' style='display:none;'>";
                  
                      echo"<input type='text' name='com_last' value='$convey[com_last]' style='display:none;'>";
                  
                      echo"<input type='text' name='unit_base' value='$convey[unit_base]' style='display:none;'>";
                  
                      echo"<input type='text' name='day' value='$convey[da]' style='display:none;'>";
                  
                      echo"<input type='text' name='month' value='$convey[mo]' style='display:none;'>";
                  
                      echo"<input type='text' name='year' value='$convey[ye]' style='display:none;'>";

                      echo"<input type='text' name='offense_given' value='$convey[offense_given]' style='display:none;'>";
                  
                      echo"<input type='text' name='inves_first' value='$convey[inves_first]' style='display:none;'>";
                  
                      echo"<input type='text' name='inves_last' value='$convey[inv_last]' style='display:none;'>";
                  
                      echo"<input type='text' name='status_given' value='$convey[status_given]' style='display:none;'>";
                  
                      echo"<input type='text' name='official_docket' value='$convey[official_docket]' style='display:none;'>";
                      
                      echo"<label>Police Name : </label><br>";
                  
                      echo"<label><b>first Name: </b></label><input type='text' name='first' required='required'   style='width:40%; text-align:center;' value='$convey[pulis_first]'> &nbsp;&nbsp;";
                  
                      echo"<b>last Name:</b> <input type='text' name='last' required='required'  style='width:40%; text-align:center;' value='$convey[pulis_last]'><br><br>";
                  
                      echo"<label>Complainant Name :</label><br>";
                  
                      echo"<label>first Name: </label><input type='text' name='c_first' required='required'  style='width:40%; text-align:center;' value='$convey[pulis_first]'> &nbsp;&nbsp;";
                  
                      echo"<label>last Name: </label><input type='text' name='c_last' required='required' style='width:40%; text-align:center;' value='$convey[pulis_last]'><br><br>";
                            
                      echo"<label>Unit : </label><input type='text' name='unit' required='required' style='width:50%; text-align:center;' value='$convey[unit_base]'><br><br>";


                      echo"<label>Offense : </label><textarea name='offense' required='required' value='$convey[offense_given]' style='width:90%; height=150px; text-align:center;'>$convey[offense_given]</textarea><br><br>";

                      echo"<label>Investigator Name : </label><br>";
                  
                      echo"<label>first Name: </label><input type='text' name='i_first' required='required'style='width:40%; text-align:center;' value='$convey[inves_first]'>&nbsp;&nbsp;";
                  
                      echo"<label>last Name: </label><input type='text' name='i_last' required='required'style='width:40%; text-align:center;' value='$convey[inv_last]'><br><br>";
                  
                      echo"<label>Docket No. : </label><input type='text' name='docket' required='required' style='width:50%; text-align:center;' value='$convey[official_docket]'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                  
                      echo"<input type='submit' name='Edit'  class='btn btn-default' 'style='width:40%;' value='Edit'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

                      echo"</form><form action='pre-charge_inves_update_edit.php' method='POST' style='width:40%; padding-left:10%; float:right;'>

                      <input type='submit' name='go_back'  class='btn btn-default' 'style='width:40%; float:left; margin-left:40%;' value='Go back without saving'>";
                      echo "</form></center>";
                  

                    }


                  }

   }


?>

  </body>
</html>
