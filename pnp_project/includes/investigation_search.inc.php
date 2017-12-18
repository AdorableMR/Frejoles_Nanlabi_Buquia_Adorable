<?php

//the deadone
session_start();

if(!isset($_SESSION['user_name'])){

  echo"please log-in";

  header("Location= ../index.php?please-login");

  exit();

 }
 echo"<link href='../css/css/bootstrap.min.css' rel='stylesheet'>";
?>



<script type="text/javascript">
  function othergroup(){ 
      if(document.getElementById('all_inner')){
       
        document.getElementById('ordinary').style.display='none';
       
        document.getElementById('update_all').style.display='block';
      }
  }

  function motu(){
        if(document.getElementById('popup_one')){
       
        document.getElementById('docket_gg').style.display='none';
       
        document.getElementById('popup_two').style.display='block';
       
        }

        if(document.getElementById('popup_two')){
       
        document.getElementById('docket_gg').style.display='block';
       
        document.getElementById('popup_one').style.display='block';
       
        }
  } 



</script>


<?php

include_once 'dbh.inc.php';

 if(isset($_POST['insert'])){

        $number=mysqli_real_escape_string($conn,$_POST['insert']);

        $status=mysqli_real_escape_string($conn,$_POST['status']);

            if($status=='all'){
                   
                   $number=$_POST['insert'];


                  $pulis_details = "SELECT * from viewthings";
                  
                  $pd = $conn->query($pulis_details);

                   $c=0;

                  while($convey=$pd->fetch_assoc()){
                  
                      $c++;
                  
                      if($c==$number){
                      

                      echo "<div id = 'ordinary' style='display:block;'>";
                  
                      echo"<form action='investigation_search_update.inc.php' method='POST'>";
                      

                      echo"<label><b>Status : </label>$convey[status_given]"."&nbsp;&nbsp;<input type='button' name='update_status' id='all_inner' value='Update status' onclick='javascript:othergroup()'></b><br>";


                      echo "Edit Pulis Report <br><br>";
                  
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
                      
                      echo"<label>Pulis Name : </label><br>";
                  
                      echo"<label>first : </label><input type='text' name='first' value='$convey[pulis_first]'> &nbsp;&nbsp;";
                  
                      echo"<label>last : </label><input type='text' name='last' value='$convey[pulis_last]'><br><br>";
                  
                      echo"<label>Complainant Name :<br>";
                  
                      echo"<label>first : </label><input type='text' name='c_first' value='$convey[com_first]'>&nbsp;&nbsp;";
                  
                      echo"<label>last : </label><input type='text' name='c_last' value='$convey[com_last]'><br><br>";
                  
                      echo"<label>Unit : </label><input type='text' name='unit' value='$convey[unit_base]'><br><br>";

                      echo "<label>Date : </label>";
                  
                      echo"<label>Day : </label><input type='text' name='m' value='$convey[da]' style='width:40; height:17;'>&nbsp;&nbsp;";
                  
                      echo"<label>Month : </label><input type='text' name='d' value='$convey[mo]' style='width:40; height:17;'>&nbsp;&nbsp;";
                  
                      echo"<label>Year : </label><input type='text' name='y' value='$convey[ye]' style='width:40; height:17;''><br><br>";

                      echo"<label>Offense : </label><input type='text' name='offense' value='$convey[offense_given]' style='width:40%; height:20%;'><br><br>";

                      echo"<label>Investigator Name : </label><br>";
                  
                      echo"<label>first: </label><input type='text' name='i_first' value='$convey[inves_first]'>&nbsp;&nbsp;";
                  
                      echo"<label>last : </label><input type='text' name='i_last' value='$convey[inv_last]'><br><br>";
                  
                      echo"<label>Docket No. : </label><input type='text' name='docket' value='$convey[official_docket]'&nbsp;&nbsp;&nbsp;>";
                  
                      echo"<input type='submit' name='Edit' value='Edit'>";

                      echo "</form>";
                  
                      echo "</div>";
                      
                      echo "<div id='update_all' style='display:none;'>";

                      if($convey['status_given']=='Initial Evaluation'){
                       
                       

                     }
                     else if($convey['status_given']=='Motu-proprio Investigation'){
                  
                       echo"<form action='Motu-proprio_Investigation_update.php'>";
                  
                       echo"<input type='radio' name='test' value='Motu-proprio_archive' value='Motu-proprio Archive' id='popup_one' onclick='javascript:motu()'>Motu-proprio Archive";
                  
                      echo"<input type='radio' name='test' value='Pre-charge Investigation Archive' id='popup_two' onclick='javascript:othergroup()'>Pre-charge Investigation <br>";
                  
                      echo"<input type='text' name=current_docket id='docket_gg' onclick='javascript:motu()'>";
                  
                      echo"</form>";


                     }
                  
                     else if($convey['status_given']=='Pre-charge Investigation'){



                     }

                     else if($convey['status_given']=='Initial Evaluation Archive'){



                     }

                     else if($convey['status_given']=='Motu-proprio Archive'){



                     }

                     else if($convey['status_given']=='Pre-charge Investigation Archive'){



                     }

                     else if($convey['status_given']==''){




                     }

                     else if($convey['status_given']==''){




                     }

                     else if($convey['status_given']==''){



                     }

                     else if($convey['status_given']==''){


                     }

                     else if($convey['status_given']==''){



                     }

                     else if($convey['status_given']==''){


                     }
                     else if($convey['status_given']==''){


                     }else{


                      echo "error";

                     }

                     echo"</div>";

                 }

            }

        }

          else if($status=='Initial Evaluation' || $status=='Motu-proprio Investigation' || $status=='Pre-charge Investigation' || $status=='Initial Evaluation Archive' || $status=='Motu-proprio Archive' || $status='Pre-charge Investigation Archive'){


                  $number=$_POST['insert'];


                  $pulis_details = "SELECT * from viewthings where status_given='$status'";

                  $pd = $conn->query($pulis_details);

                   $c=0;

                  while($convey=$pd->fetch_assoc()){

                      $c++;


                      if($c==$number){

                      echo "<div id='original2'>";

                      echo"<form action='investigation_search_update.inc.php' method='POST'>";


                      echo"<label><b>Status : </label>$convey[status_given]"."&nbsp;&nbsp;<input type='button' id='specify_inner' name='update_status' value='Update status' onclick='javascript:othergroup()'></b><br>";



                      echo "Edit Pulis Report <br><br>";

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

                      echo"<label>Pulis Name : </label><br>";

                      echo"<label>first : </label><input type='text' name='first' value='$convey[pulis_first]'> &nbsp;&nbsp;";

                      echo"<label>last : </label><input type='text' name='last' value='$convey[pulis_last]'><br><br>";
                      echo"<label>Complainant Name :<br>";
                      echo"<label>first : </label><input type='text' name='c_first' value='$convey[com_first]'>&nbsp;&nbsp;";
                      echo"<label>last : </label><input type='text' name='c_last' value='$convey[com_last]'><br><br>";
                      echo"<label>Unit : </label><input type='text' name='unit' value='$convey[unit_base]'><br><br>";

                      echo "<label>Date : </label>";
                      echo"<label>Day : </label><input type='text' name='m' value='$convey[da]' style='width:40; height:17;'>&nbsp;&nbsp;";
                      echo"<label>Month : </label><input type='text' name='d' value='$convey[mo]' style='width:40; height:17;'>&nbsp;&nbsp;";
                      echo"<label>Year : </label><input type='text' name='y' value='$convey[ye]' style='width:40; height:17;''><br><br>";

                      echo"<label>Offense : </label><input type='text' name='offense' value='$convey[offense_given]' style='width:40%; height:20%;'><br><br>";

                      echo"<label>Investigator Name : </label><br>";
                      echo"<label>first: </label><input type='text' name='i_first' value='$convey[inves_first]'>&nbsp;&nbsp;";
                      echo"<label>last : </label><input type='text' name='i_last' value='$convey[inv_last]'><br><br>";
                      echo"<label>Docket No. : </label><input type='text' name='docket' value='$convey[official_docket]'&nbsp;&nbsp;&nbsp;>";
                      echo"<input type='submit' name='Edit' value='Edit'>";


                      echo "</form>";
                      echo"</div>";

                      echo "<div id='update_specific'>";
                     
                      if($status=='Initial Evaluation'){

                      }


                      echo"</div>";
                     }
                 }


          }




}
  else{
	echo "error";
}


$conn->close();
?>