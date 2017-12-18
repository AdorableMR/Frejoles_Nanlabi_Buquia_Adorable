<?php
session_start();

if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
?>

<?php
if(isset($_POST['summary'])){
/*	echo "<br>";
	echo "start date :$_POST[month] $_POST[day] $_POST[year]<br>";
	echo "End date :$_POST[month2] $_POST[day2] $_POST[year2]";*/
}
?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
#summary_of_cases_title,#motu_proprio_title,#non_motu_proprio_title{
	border-style: solid;
	font-size: 15px;
	text-align: center;
	letter-spacing: 7px;
	border-width: 1px;
}
th,td{
   border-style: solid;
   border-width:1px;

}
table{
	width: 100%;
	font-size: 25px;
	text-align: center;
}

</style>


</head>
    
     <body>

      <?php

      include_once '../../includes/dbh.inc.php';

      $month=$_POST['month'];
      $month2=$_POST['month2'] ;
      $day2=$_POST['day2'];
      $year2=$_POST['year2'];

/*
      if($month==1 && $month2==9 || $month==2 && $month2==10 || $month==3 && $month2==11 || $month==4 && $month2==12 || $month==5 && $month2==1 || $month==6 && $month2==2 || $month==7 && $month2==3 || $month==8 && $month2==4 || 
         $month==9 && $month2==5 || $month==10 && $month2==6 || $month==11 && $month2==7 || $month==12 && $month2==8){



*/


       if($month==1 && $month2==9){

        $first_start=1;
        $first_end=3;
        $second_start=4;
        $second_end=6;
        $third_start=7;
        $third_end=9;

       }
       else if($month==2 && $month2==10){

        $first_start=2;
        $first_end=4;
        $second_start=5;
        $second_end=7;
        $third_start=8;
        $third_end=10;

       } 
       else if($month==3 && $month2==11){


        $first_start=3;
        $first_end=5;
        $second_start=6;
        $second_end=8;
        $third_start=9;
        $third_end=11;


       } 
       else if($month==4 && $month2==12){

        $first_start=4;
        $first_end=6;
        $second_start=7;
        $second_end=9;
        $third_start=10;
        $third_end=12;

       }
       else if($month==5 && $month2==1){

        $first_start=5;
        $first_end=7;
        $second_start=8;
        $second_end=10;
        $third_start=11;
        $third_end=1;


       }
       else if($month==6 && $month2==2){
         
        $first_start=6;
        $first_end=8;
        $second_start=9;
        $second_end=11;
        $third_start=12;
        $third_end=2;
       
       }
       else if($month==7 && $month2==3){
          
        $first_start=7;
        $first_end=9;
        $second_start=10;
        $second_end=12;
        $third_start=1;
        $third_end=3;
       
       }
       else if($month==8 && $month2==4){
        
        $first_start=8;
        $first_end=10;
        $second_start=11;
        $second_end=1;
        $third_start=2;
        $third_end=4;

       }
       else if($month==9 && $month2==5){

        $first_start=9;
        $first_end=11;
        $second_start=12;
        $second_end=2;
        $third_start=3;
        $third_end=5;

       }
       else if($month==10 && $month2==6){
        
        $first_start=10;
        $first_end=12;
        $second_start=1;
        $second_end=3;
        $third_start=4;
        $third_end=6;

       }
       else if($month==11 && $month2==7){
       
        $first_start=11;
        $first_end=1;
        $second_start=2;
        $second_end=4;
        $third_start=5;
        $third_end=7;

       }
       else if($month==12 && $month2==8){

        $first_start=12;
        $first_end=2;
        $second_start=3;
        $second_end=5;
        $third_start=6;
        $third_end=8;

       }else{
        header("Location: summary_of_cases.php");
       }

      if($month=='01'){
         $month_text="JAN";

         $prev="Dec";
      }
      else if($month=='02'){
         $month_text="FEB";

         $prev="Jan";
      }
      else if($month=='03'){
        $month_text="MAR";

        $prev="Feb";

      }
      else if($month=='04'){
        $month_text="APR";

        $prev="Mar";
      }
      else if($month=='05'){
        $month_text="MAY";

        $prev="Apr";
      }

      else if($month=='06'){
        $month_text="JUN";

        $prev="May";
      }

         else if($month=='07'){
        $month_text="JUL";

        $prev="Jun";
      }

      else if($month=='08'){
        $month_text="AUG";

        $prev="Jul";
      }
      else if($month=='09'){
        $month_text="SEPT";

        $prev="Aug";
      }
      else if($month=='10'){
        $month_text="OCT";

        $prev="Sep";

       }
        else if($month=='11'){
        $month_text="NOV";

        $prev="Sep";
      }
        else if($month=='12'){
        $month_text="DEC";

        $prev="Nov";
      }

      if($month2=='01'){
         $month_text2="JAN";
      }
      else if($month2=='02'){
         $month_text2="FEB";
      }
      else if($month2=='03'){
        $month_text2="MAR";
      }
      else if($month2=='04'){
        $month_text2="APR";
      }
      else if($month2=='05'){
        $month_text2="MAY";
      }

      else if($month2=='07'){
        $month_text2="JUN";
      }
      else if($month2=='08'){
        $month_text2="JUL";
      }
      else if($month2=='09'){
        $month_text2="SEP";
      }
      else if($month2=='10'){
        $month_text2="OCT";
      }
        else if($month2=='11'){
        $month_text2="NOV";
      }
        else if($month2=='12'){
        $month_text2="DEC";
      }

    
$total_case = 0;

$pulis_details = "SELECT deadline.ye,deadline.mo,deadline.da,docket,viewthings.status_given from deadline,viewthings where deadline.docket=viewthings.official_docket";
$pd = $conn->query($pulis_details);
if($pd->num_rows > 0){
    while($col1 = $pd->fetch_assoc()){

      //if($col1['status_given']==)

     // echo $col1['mo']."=".$col1['docket']."=".$col1['status_given']."<br>";
       
      // $total_case++;
      
    }

}


echo $total_case;
      ?>
        
        <br>
     	<button id="sum" onclick="javascript:s();">SUMMARY OF CASES</button>
     	<button id="motu" onclick="javascript:m();">MOTU PROPRIO CASES</button>
     	<button id="non" onclick="javascript:n();">NON MOTU PROPRIO CASES</button><br><br>

     	<div id ="summary_of_cases_title">
         <p>SUMMARY OF CASES RECEIVED AND RESOLVED <br> 
          <b><?php  echo $month_text ?>-<?php  echo $month_text2 ?> <?php echo $day2 ?>,<?php echo $year2 ?> </b>
         </p>

     	</div>
	     <table id="summary">
	     	<th colspan=4>1st Qrtr</th><th colspan=4>2nd Qrtr</th><th colspan=4>3rd Qrtr( as of  <b><?php  echo $month_text2 ?> <?php echo $day2 ?>,<?php echo $year2 ?> </b>)</th>
	     	<tr>
	     		 <td colspan=2>Received Cases</td>
	     		 <td colspan=2>Recolved Cases</td>

	     		 <td colspan=2>Received Cases</td>
	     		 <td colspan=2>Recolved Cases</td>

	     		 <td colspan=2>Received Cases</td>
	     		 <td colspan=2>Recolved Cases</td>

             </tr>
                  <td>This Quarter</td>
                  <td>Carry over(4th qrtr <?php $subtract = $year2-1; echo $subtract; ?>)</td>
                  <td>MPI</td>
                  <td>NMP</td>
                  <td>This Quarter</td>
                  <td>Carry over prev Qrtr</td>
                  <td>MPI</td>
                  <td>NMP</td>
                  <td>This Quarter</td>
                  <td>Carry over prev Qrtr</td>
                  <td>MPI</td>
                  <td>NMP</td>
             <tr>
                
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>

             </tr>
	     		     	
	     	 <tr>
	     		 <td colspan=2 style="visibility:hidden;"></td>
	     		 <td colspan=2>100%</td>

	     		 <td colspan=2 style="visibility:hidden;"></td>
	     		 <td colspan=2>70%</td>

	     		 <td colspan=2 style="visibility:hidden;"></td>
	     		 <td colspan=2>60%</td>

             </tr>

	     	<table>





	     <div id ="motu_proprio_title" style="display:none;">
         <p>MOTU PROPRIO CASES<br> 
          <b><?php  echo $month_text ?>-<?php  echo $month_text2 ?> <?php echo $day2 ?>,<?php echo $year2 ?> </b></p>
     	</div>
	     <table id="motu_proprio" style="display:none;">
	     	<th colspan=4>1st Qrtr</th><th colspan=4>2nd Qrtr</th><th colspan=4>3rd Qrtr( as of  <b><?php  echo $month_text2 ?> <?php echo $day2 ?>,<?php echo $year2 ?> </b>)</th>
	     	<tr>
	     		 <td colspan=2>Received Cases</td>
	     		 <td colspan=2>Recolved Cases</td>

	     		 <td colspan=2>Received Cases</td>
	     		 <td colspan=2>Recolved Cases</td>

	     		 <td colspan=2>Received Cases</td>
	     		 <td colspan=2>Recolved Cases</td>

             </tr>
                  <td>This Quarter</td>	
                  <td>Carry over(<?php echo $prev;?> <?php echo $subtract; ?>)</td>
                  <td>Drug</td>
                  <td>Non Drug</td>
                  <td>This Quarter</td>
                  <td>Carry over prev Qrtr</td>
                  <td>Drug</td>
                  <td>Non Drug</td>
                  <td>This Quarter</td>
                  <td>Carry over prev Qrtr</td>
                  <td>Drug</td>
                  <td>Non Drug</td>
             <tr>
                
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>

             </tr>
	     		     	
	     	 <tr>
	     		 <td colspan=2 style="visibility:hidden;"></td>
	     		 <td colspan=2>100%</td>

	     		 <td colspan=2 style="visibility:hidden;"></td>
	     		 <td colspan=2>60%</td>

	     		 <td colspan=2 style="visibility:hidden;"></td>
	     		 <td colspan=2>55%</td>

             </tr>

	     	<table>





	     		 <div id ="non_motu_proprio_title"  style="display:none;">
         <p>NON MOTU PROPRIO CASES<br> 
          <b><?php  echo $month_text ?>-<?php  echo $month_text2 ?> <?php echo $day2 ?>,<?php echo $year2 ?> </b></p>
     	</div>
	     <table id="non_motu_proprio"  style="display:none;">
	     	<th colspan=4>1st Qrtr</th><th colspan=4>2nd Qrtr</th><th colspan=4>3rd Qrtr( as of  <b><?php  echo $month_text2 ?> <?php echo $day2 ?>,<?php echo $year2 ?> </b>)</th>
	     	<tr>
	     		 <td colspan=2>Received Cases</td>
	     		 <td colspan=2>Recolved Cases</td>

	     		 <td colspan=2>Received Cases</td>
	     		 <td colspan=2>Recolved Cases</td>

	     		 <td colspan=2>Received Cases</td>
	     		 <td colspan=2>Recolved Cases</td>

             </tr>
                  <td>This Quarter</td>	
                  <td>Carry over(4th qrtr <?php echo $subtract ?>)</td>
                  <td>Drug</td>
                  <td>Non Drug</td>
                  <td>This Quarter</td>
                  <td>Carry over prev Qrtr</td>
                  <td>Drug</td>
                  <td>Non Drug</td>
                  <td>This Quarter</td>
                  <td>Carry over prev Qrtr</td>
                  <td>Drug</td>
                  <td>Non Drug</td>
             <tr>
                
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>

             </tr>
	     		     	
	     	 <tr>
	     		 <td colspan=2 style="visibility:hidden;"></td>
	     		 <td colspan=2>100%</td>

	     		 <td colspan=2 style="visibility:hidden;"></td>
	     		 <td colspan=2>60%</td>

	     		 <td colspan=2 style="visibility:hidden;"></td>
	     		 <td colspan=2>55%</td>

             </tr>

	     	<table>

	</body>

</html>

<script type="text/javascript">
function s(){

    document.getElementById('summary_of_cases_title').style.display='block';
	document.getElementById('summary').style.display='block';

    document.getElementById('non_motu_proprio_title').style.display='none';
	document.getElementById('non_motu_proprio').style.display='none';


    document.getElementById('motu_proprio_title').style.display='none';
	document.getElementById('motu_proprio').style.display='none';


}
function m(){

	document.getElementById('summary_of_cases_title').style.display='none';
	document.getElementById('summary').style.display='none';

    document.getElementById('non_motu_proprio_title').style.display='none';
	document.getElementById('non_motu_proprio').style.display='none';


    document.getElementById('motu_proprio_title').style.display='block';
	document.getElementById('motu_proprio').style.display='block';




}
function n(){

	document.getElementById('summary_of_cases_title').style.display='none';
	document.getElementById('summary').style.display='none';

	 document.getElementById('motu_proprio_title').style.display='none';
	document.getElementById('motu_proprio').style.display='none';


    document.getElementById('non_motu_proprio_title').style.display='block';
	document.getElementById('non_motu_proprio').style.display='block';




}

</script>


<?php
  /*    }else{
        header("Location: summary_of_cases.php");
        
      }*/
?>