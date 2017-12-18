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
	<title></title>
  <link href="../../css/holder.css" type="text/css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
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
	<ul class="nav nav-pills">
		<li><a href = "insert.php" target="iframe_a">Deliquency Report</a></li>
		<li><a href = "search.php" target="iframe_a">Search</a></li>
		


		<?php
       include_once '../../includes/dbh.inc.php';       

        $alert=date("m-d-Y") ;

        $pulis_details = "SELECT * from deliquency_report where alert_date='$alert';";
        $pd = $conn->query($pulis_details);

        $count=0;

        if($pd->num_rows>0){

            while($col1=$pd->fetch_assoc()){
            
                     if($col1['alert_date']==$alert){
                
                       $count++;

                      }

               }

         echo"<li><a id='hide' href = '../../includes/deadline.inc.php' target='iframe_a'>Daily deadline <span class='badge badge-warning'>$count</span></a></li>";
              
        }else{
      
      echo"<li><a id='hide' href = '../../includes/deadline.inc.php' target='iframe_a'>Daily deadline</a></li>";
  
   
        }

 ?> 

	<!--	<li><a href = "history.php" target="iframe_a">History</a></li>-->

    <li><a href ="reset_logs.php" target="iframe_a">View Reset Logs</a></li>
	</ul>

  
<iframe src="insert.php" name="iframe_a"></iframe>
</body>
</html>


<?php

if(isset($_POST['reset_back'])){

     $value=$_POST['reset_back'];

        if($value=="reset_back"){
        
        header("Location: ../../includes/deadline.inc.php");
        }
}

?>

<script type="text/javascript">

$("#hide").click(function(){
    $(".badge").hide();
});

</script>