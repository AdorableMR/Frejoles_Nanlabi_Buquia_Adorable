<?php
session_start();

if(!isset($_SESSION['user_name'])){
 
  echo"please log-in";
 
  header("Location= ../index.php?please-login");
 
  exit();
}

 include_once'dbh.inc.php';

 echo"<link href='../css/css/bootstrap.min.css' rel='stylesheet'>";

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
                
           header("Location: ../html/iframe_inv/initial_inves.php");
           exit();
   }


   if(isset($_POST['update'])){


               $number=$_POST['update'];

                  $pulis_details = "SELECT * from viewthings  where status_given='Initial Evaluation' ";
                  
                  $pd = $conn->query($pulis_details);

                   $c=0;

                  while($convey=$pd->fetch_assoc()){
                  
                      $c++;
                  
                      if($c==$number){

                        
                      echo"
                      <center><form action='initial_eval_update_edit.php' method='POST'>";
                      
                      echo"<table class='table table-striped table-hover'>
                      
                      <th colspan=2>Police Name </th><th colspan=2>Complainant</th><th>Unit</th><th> Date of Cognitance</th><th colspan=2>Investigator on case</th><th>Status</th><th>Docket</th>";
                  
                      echo"<tr><td>$convey[pulis_first]</td>";
                  
                      echo"<td>$convey[pulis_last]</td>";
                      


                      echo"<td>$convey[com_first]</td>";
                  
                      echo"<td>$convey[com_last]</td>";
                  
                    
                  
                      echo"<td>$convey[unit_base]</td>";

                  
                      echo "<td>";
                      
                      echo $convey["co_date"];
                      
                      echo "</td>";

                       
                     
            
                  
                      echo"<td>$convey[inves_first]</td>";
                  
                      echo"<td>$convey[inv_last]</td>";

                      echo"<td>$convey[status_given]</td>";
                      
                      echo"<td>$convey[official_docket]</td></tr></table><table class='table table-striped table-hover'>";
  
                      echo "<tr><td>";
                      
                      echo "<b>Offense : </b>".$convey["offense_given"];
                      
                      echo "</td></tr></table>" ; 




                  
                      
                      
                      echo "<table class='table table-striped table-hover'><tr style='background-color:silver;'><td><h3><center><input type='radio' name='val' value='Pre-charge Investigation' onclick='javascript:drug();' id='yes' style='margin-left:20px;'>";
                      echo"Pre-charge Investigation"; 
                      
                      echo "<input type='radio' name='val' value='Initial Evaluation Archive' onclick='javascript:not_me()' id='init' style='margin-left:20px;' required/>Initial Evaluation Archive</center><br>";
                       
                      echo "</center><center><input type='text' name='new_docket' class='form-control' placeholder='new docket' id='pop' style='display:none; width:20%;'></center> <br>";

                  
                      echo"<center><button name='update_initial' class='form-control' style='width:20%; ' value='$c'>update</button></center><br>
                      
                      <center></form><form action='initial_eval_update_edit.php' method='POST'><input type='submit' name='go_back'  class='btn btn-default' 'style='width:50%;' value='Go back without saving'></center>
                      ";

                      echo "</form></h3></td></tr></table> ";
                  
                
                 }     

              }
           }

if(isset($_POST['update_initial'])){

                 if(!isset($_POST['val'])){
                echo "<br><br><br><center>
                <div class='alert alert-danger' style='width:20%'>
                <strong>Error!</strong> No selected status
                </div></center>';";
                echo "<form action='initial_eval_update_edit.php' method='POST'>";
                echo "<center><button name='go_back' class='form-control' style='width:20%'>Okey</button></center>";
                echo "</form>";
                exit();
               }
                
                $status=$_POST['val'];

               $number=$_POST['update_initial'];


                  $pulis_details = "SELECT * from viewthings  where status_given='Initial Evaluation' ";
                  
                  $pd = $conn->query($pulis_details);

                   $c=0;

                  while($convey=$pd->fetch_assoc()){
                  
                      $c++;
                  
                      if($c==$number){
                      
                           if($status=='Pre-charge Investigation')
                           {
                                $new_docket=$_POST['new_docket'];

                                if($new_docket==null){
                             
                             echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Unable to Update Docket Number is not set
                             </div></center>'
                             <form action='../html/iframe_inv/initial_inves.php' method='POST'>
                             <center><button class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                              ";

                                   exit();
                                    
                                }
                                 $pulis_po = "SELECT * from viewthings  where official_docket='$new_docket' ";
                  
                                 $pd_h = $conn->query($pulis_po);

                                 
                                 if($pd_h->num_rows > 0){

                              echo "
                              <br><br><br>
                              <center>
                              <div class='alert alert-danger' style='width:20%'>
                              <strong>Error!</strong>Docket number is already taken 
                              </div></center>'
                              <form action='../html/iframe_inv/initial_inves.php' method='POST'>
                              <center><button class='form-control' style='width:20%'>Okey</button></center>
                              </form>

                              ";
                                  exit();
                                 }

                  $mo_date = date("m"); 
                  $da_date = date("d"); 
                  $ye_date = date("Y"); 
                  

                  $update_kk = "UPDATE deadline SET docket='$new_docket',mo='$mo_date',da='$da_date',ye='$ye_date' WHERE docket='$convey[official_docket]';";
                  $conn->query($update_kk);

                  $tran = "INSERT INTO pre(old_docket,docket,old_status) 
                           VALUES ('$convey[official_docket]','$new_docket','Initial Evaluation');";
                          $conn->query($tran);


                  $pulis = "UPDATE c SET status='Pre-charge Investigation',docket='$new_docket' WHERE docket='$convey[official_docket]' && status='Initial Evaluation';";
                  $conn->query($pulis);


                  $update_calendar = "UPDATE calendar SET docket_no='$new_docket' WHERE docket_no='$convey[official_docket]';";
                  $conn->query($update_calendar);


                  $update_complainant_record = "UPDATE complainant_record SET docket_no='$new_docket' WHERE docket_no='$convey[official_docket]';";
                  $conn->query($update_complainant_record);

                  $update_investigator_record = "UPDATE investigator_record SET docket_no='$new_docket' WHERE docket_no='$convey[official_docket]';";
                  $conn->query($update_investigator_record);

                  $update_offense = "UPDATE offense SET docket_no='$new_docket' WHERE docket_no='$convey[official_docket]';";
                  $conn->query($update_offense);

                  $update_pulis_record = "UPDATE pulis_record SET docket_no='$new_docket' WHERE docket_no='$convey[official_docket]';";
                  $conn->query($update_pulis_record);

                  header("Location: ../html/iframe_inv/initial_inves.php");
                   exit();                  


                        }else if($status=='Initial Evaluation Archive'){
                                
                  
                  $pulis = "UPDATE c SET status='Initial Evaluation Archive' where docket='$convey[official_docket]' && status='Initial Evaluation';";
                  $conn->query($pulis);
                  header("Location: ../html/iframe_inv/initial_inves.php");
                  exit();

                          }  
                
                 
                 }     

              }
           }



?>


                 <script type="text/javascript">
                  function drug(){
                    if(document.getElementById('yes').checked){
                      document.getElementById('pop').style.display='block';
                    }
                  }
                  function not_me(){
                     if(document.getElementById('init').checked){
                      document.getElementById('pop').style.display="none";
                     }
                  }
                 </script>


<?php

     if(isset ($_POST['edit'])){
      

               $number=$_POST['edit'];


          $pulis_details = "SELECT * from viewthings  where status_given='Initial Evaluation' ";

                  
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

                      echo"</form>";


                      echo "</center>";

                        echo "
                        <form action='initial_eval_update_edit.php' method='POST' style='width:40%; padding-left:10%; float:right;'>

                       <input type='submit' name='go_back'  class='btn btn-default' 'style='width:40%; float:left; margin-left:40%;' value='Go back without saving'>
                      
                       </form>";
                  

                    }


                  }

   }

?>


<?php

include_once'dbh.inc.php';

    if(isset($_POST['submit_one'])){
         $evaluate = $_POST['search'];

         if($evaluate==null){

           header("Location: ../html/iframe_inv/initial_inves.php");
           exit();
         }else{

        $pulis_details = "SELECT * from viewthings where status_given='Initial Evaluation' &&(com_first like '%$evaluate%' || com_last like '%$evaluate%' || pulis_first like '%$evaluate%' || pulis_last like '%$evaluate%' || official_docket like '%$evaluate%' || unit_base like '%$evaluate%' || status_given like '%$evaluate%' || official_docket like '%$evaluate%')";
        $pd = $conn->query($pulis_details);


if($pd->num_rows > 0){

echo "
 <div style='width:23%; height:15%; float:left; padding-right:4px; padding-left:20px;'>
 <img src='../images/legend.png' style='width:80%; height:100%; float:left; padding-right:2px; padding-left:2px;' > 
 </div>
 ";

echo"<link href='../css/table.css' type='text/css' rel='stylesheet'>";

echo "<form action='initial_eval_update_edit.php' method='POST' style='float:right; margin-right:20px;'>";
echo "<input class='btn btn-default' type='submit' name = 'submit_one' value='search' style='float:right;'>&nbsp;";
echo "<input class='btn btn-default' type='search' name='search' ";
echo "placeholder='Enter keyword' style='float:right;'>";



$c=0;

echo"<table class='table table-striped table-hover' style='float:left;'>";

    echo "<input type='text' name='status' value='Motu-proprio Investigation' style='display:none'>";
  echo"<th colspan=2 >Pulis Name</th><th>Unit</th><th colspan=2>complainant</th><th>Date of cognitance</th><th colspan=2>Investigator on case</th><th>Status</th><th>Day</th><th>Docket No.</th><th colspan=2>Action</th>";
  echo"<tr>";
  while($col1 = $pd->fetch_assoc()){

   $resultyy = "SELECT mo,da,ye FROM deadline WHERE docket='$col1[official_docket]'";
          $pd3tt = $conn->query($resultyy);
          $pd19=$pd3tt->fetch_assoc();

         $y = $pd19['ye'];
         $m = $pd19['mo'];
         $d = $pd19['da'];

        $now1 = time(); // or your date as well
        $your_date1 = strtotime("$y-$m-$d");
        $datediff1 = $now1 - $your_date1;
        $roar1 =  floor($datediff1 / (60 * 60 * 24));

          $c++;

    if($roar1>=4 && $roar1<6){
    echo"<tr class='warning'>";

    }
   else if($roar1>=6){
    echo"<tr class='danger'>";
   }
   else{
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
  echo $roar1;
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
  echo "</form>";

}
else{

echo "<form action='initial_eval_update_edit.php' method='POST' style='float:right; margin-right:20px;'>";
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

</body>
</html>