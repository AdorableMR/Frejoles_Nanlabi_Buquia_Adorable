<?php
session_start();

if(!isset($_SESSION['user_admin'])){
   echo"Contact the Authority";
  header("Location= ../index.php?please-login");
  exit();
}
?>
<!DOCTYPE html>
<head>
  
  <link href="../../css/holder.css" type="text/css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title></title>
	<link href="../../css/holder.css" type="text/css" rel="stylesheet">
</head>
<body>

<?php

include_once '../../includes/dbh.inc.php';

$rr= date('m-d-Y');

$pulis_details = "SELECT deadline.ye,deadline.mo,deadline.da from deadline,viewthings where deadline.docket=viewthings.official_docket && viewthings.status_given='Initial Evaluation' ";

$pd = $conn->query($pulis_details);

 $initial_alert=0;

  if($pd->num_rows>0){

       while($col1=$pd->fetch_assoc()){

         $y = $col1['ye'];
         $m = $col1['mo'];
         $d = $col1['da'];

        $now1 = time(); // or your date as well
        $your_date1 = strtotime("$y-$m-$d");
        $datediff1 = $now1 - $your_date1;
        $roar1 =  floor($datediff1 / (60 * 60 * 24));

         
          if($roar1>=4){
           $initial_alert++;
         }

      }
  }


$pulis_x = "SELECT deadline.ye,deadline.mo,deadline.da from deadline,viewthings where deadline.docket=viewthings.official_docket && viewthings.status_given='Pre-charge Investigation' ";

$pd2 = $conn->query($pulis_x);

 $pre_alert=0;

  if($pd2->num_rows>0){

       while($col2=$pd2->fetch_assoc()){

         $y2 = $col2['ye'];
         $m2 = $col2['mo'];
         $d2 = $col2['da'];


$now = time(); // or your date as well
$your_date = strtotime("$y2-$m2-$d2");
$datediff = $now - $your_date;
$roar =  floor($datediff / (60 * 60 * 24));



         
          if($roar>=18){
           $pre_alert++;
         }

      }
  }

?>

	<ul  class="nav nav-pills">

		
		<li><a href = "insert.php" target="iframe_a">Insert</a></li>

 <li class="d" ><a href = "motu-propio-inves_search.php" id="hide2" target="iframe_a"><!--<span id="two" class="badge badge-error">78</span>-->Motu-proprio Investigation</a></li>

    <li class="d"><a href = "initial_inves.php"  target="iframe_a" id="hide1">
      <?php 

       if($initial_alert>0){
       echo"<span id='one' class='badge badge-error'>$initial_alert </span>";
       }else{

       }
    ?>

    Initial Evaluation</a></li>

    <li class="d"><a href = "pre-charge-inves_search.php" id="hide3"  target="iframe_a">

      <?php 

       if($pre_alert>0){
       echo"<span id='three' class='badge badge-error'>$pre_alert</span>";
       }else{

       }
    ?>

    Pre-charge Investigation</a></li>

    


    <li>
  
  <div class="dropdown" style="margin-left:10px;">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">View Archive
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="initial-eval-archive_search.php"  target="iframe_a">Initial Evaluation Archive</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="motu-propio-archive_search.php"  target="iframe_a">Motu-proprio Archive</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="pre-charge-archive_search.php"  target="iframe_a">Precharge Archive</a></li>
    </ul>
  </div>

    </li>

	<!--	<li><a href = "../iframe_ins/known.php" target="iframe_a">Admin</a></li>-->

		<!--	<li><a href = "history.php" target="iframe_a">History</a></li>-->

	</ul>
<iframe src="insert.php" name="iframe_a"></iframe>



</body>
</html>

<script type="text/javascript">

$("#hide").click(function(){
    $("#one").hide();
});

$("#hide1").click(function(){
    $("#one").hide();
});

$("#hide2").click(function(){
    $("#two").hide();
});

$("#hide3").click(function(){
    $("#three").hide();
});
</script>