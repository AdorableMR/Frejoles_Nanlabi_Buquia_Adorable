<?php
/*
session_start();

if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();*/

?>
<!DOCTYPE html>
<head>
    <link href="../../css/holder.css" type="text/css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <style>

  html{
    width: 100%;
    height: 200px;
    overflow: hidden;


  }
  .inner_frame{
 background-color: gray;

}


li{
display: inline;

}
iframe{
border-style: none;
  width: 100%;
  height: 374px;
}
ul li a {
  text-decoration: none;
  color: white;
}
.d {
  text-decoration: none;
  color: white;
  background-color: black;
}
  #loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('css/gif/processing.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}

</style>


<script type="text/javascript">
window.addEventListener("load",function(){
  var loader = document.getElementById("loader");
  document.body.removeChild(loader);

});
</script>

  <title></title>
<style>

.inner_frame{
 background-color: gray;

}


li{
display: inline;

}
iframe{
border-style: none;
  width: 100%;
  height: 374px;
}
ul li a {
  text-decoration: none;
  color: white;
}
.d {
  text-decoration: none;
  color: white;
  background-color: black;
}

  .badge {
  padding: 1px 9px 2px;
  font-size: 12.025px;
  font-weight: bold;
  white-space: nowrap;
  color: #ffffff;
  background-color: #999999;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}
.badge:hover {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
}
.badge-error {
  background-color: #b94a48;
}
.badge-error:hover {
  background-color: #953b39;
}
.badge-warning {
  background-color: #f89406;
}
.badge-warning:hover {
  background-color: #c67605;
}
.badge-success {
  background-color: #468847;
}
.badge-success:hover {
  background-color: #356635;
}
.badge-info {
  background-color: #3a87ad;
}
.badge-info:hover {
  background-color: #2d6987;
}
.badge-inverse {
  background-color: #333333;
}
.badge-inverse:hover {
  background-color: #1a1a1a;
}
</style>


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






  <ul class="nav nav-pills">
<!--
<span class="badge">1</span>
<span class="badge badge-success">2</span>
<span class="badge badge-warning">4</span>
<span class="badge badge-error">6</span>
<span class="badge badge-info">8</span>
<span class="badge badge-inverse">10</span>-->



    
    <li class="d" ><a href = "motu-propio-inves_search.php" id="hide2" target="if"><!--<span id="two" class="badge badge-error">78</span>-->Motu-proprio Investigation</a></li>

    <li class="d"><a href = "initial_inves.php" target="if" id="hide1">
      <?php 

       if($initial_alert>0){
       echo"<span id='one' class='badge badge-error'>$initial_alert </span>";
       }else{

       }
    ?>

    Initial Evaluation</a></li>

    <li class="d"><a href = "pre-charge-inves_search.php" id="hide3" target="if">

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
      <li role="presentation"><a role="menuitem" tabindex="-1" href="initial-eval-archive_search.php" target="if">Initial Evaluation Archive</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="motu-propio-archive_search.php" target="if">Motu-proprio Archive</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="pre-charge-archive_search.php" target="if">Precharge Archive</a></li>
    </ul>
  </div>

    </li>
  </ul>



<br>

<center><iframe src= "motu-propio-inves_search.php" name="if"></iframe></center>
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
