<?php

session_start();

if(!isset($_SESSION['user_admin'])){

  echo"Contact the Authority";

  header("Location= ../index.php?please-login");

  exit();
}


?>

<! DOCTYPE html>

      <html>
        
            <div class ="main_container">
        
               <head>
                <link href="../../css/home_layout.css" type="text/css" rel="stylesheet">
                <link href="../../../css/holder.css" type="text/css" rel="stylesheet">
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

              
              <title></title>
      
              <style type="text/css">
              .head{
               margin-top: 20px;
               width: 350px;
              }
              ul{
                padding-top: 50px;
              }
              li{

              display: inline;
              padding-left: 20px;
              padding-right: 20px;
              }

          ul li a{
          text-decoration: none;
          color: maroon;
          }

              </style>

        </head>


      <body>

              <div id="header">
      
                  <a class="logout">
        
                  <form action="../../includes/logout.inc.php" method="POST">
        
                  <button type="submit" name="submit" class="glyphicon glyphicon-log-out" style="background-color:gray;" >logout</button>
      
                 </form>
                 </a>
          
          </div>


          <div id = "vertical1" width="300px" height="40px">
          
                <div class = "head">
          
                <h3><span><img src="../../images/main.png" width="2%" height="2%">INVESTIGATION</h3></span>
     
                <div class="tail2">
        
                <a href = "../iframe_ins/inspection_and_audit_admin.php">INSPECTION AND AUDIT</a>
      
                 </div> 

                </div>
     
          </div>
  
            
          <div id="choice" style="display:none; width:50%; float:left; padding-top:20px; padding-left:50px;">
            <ul>
              <li><a href = "../iframe_ins/inspection_and_audit_admin.php"><b>INSPECTION AND AUDIT</b></a></li>
              <li><a href = "../iframe_inv/investigation_admin.php"><b>INVESTIGATION</b></a></li>
            </ul>
          </div>

          <div id="admin" style="width:20%; float:right; padding-top:20px; padding-left:50px;"><a href = "../iframe_ins/known.php" target="iframe_b"><button id="v" onclick="javacript:one();" class="btn btn-default btn-lg"><h4>ADMINISTRATOR</h4></button></a></div>

          <div id ="body">
     
          <iframe src="holder_admin_investigation.php" name=iframe_b width = "100%" height="100%" overflow = "auto"></iframe>
     
    
    </body>
    
    <br><br>
    
    <!--<div class = "final2footer">
        <b>&copy; IAS 2017</b>
    </div>-->

 </div>

</html>

<script type="text/javascript">
function one(){
  document.getElementById("vertical1").style.display="none";
  document.getElementById("choice").style.display="block";
}
</script>
