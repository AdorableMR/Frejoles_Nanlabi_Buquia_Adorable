<?php
session_start();

if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
?>
<! DOCTYPE html>
<html>
<div class ="main_container">
<head>
    
    <link href="../css/home_layout.css" type="text/css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
     .head{
      margin-top: 20px;
      width: 350px;
     }
    </style>

<title>inspection</title>
</head>


<body>

    <div id="header">
      <a class="logout">
        <form action="../includes/logout.inc.php" method="POST">
        <button type="submit" name="submit" class="glyphicon glyphicon-log-out" style="background-color:gray;" >logout</button>
      </form>
        </a>
    </div>

      
    
         <div class = "head">
          <h3><span><img src="../images/main.png" width="4%" height="2%">INSPECTION AND AUDIT</h3></span>
         <div class="tail1">
          <h5><a href = "investigation.php">INVESTIGATION</h5></a>
         </div>   
    </div>

    
     

    <div id ="body">
     <iframe src="iframe_ins/holder_inspection.php" width="100%" height="100%" overflow="auto" border="transparent"></iframe>
        

    </body>
    <br>
    <br>
    
    <!--<div class = "final2footer">
        <b>&copy; IAS 2017</b>
    </div>-->

 </div>

</html>

