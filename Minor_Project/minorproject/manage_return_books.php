<!DOCTYPE html>
<html>
<head>
  <title>
    Index
  </title>
  <link rel="stylesheet" type="text/css" href="children_styles.css">
  <style>

  *{
    margin-right: 30px 
    margin-left:30px;
  }
  table{
    width: 90%;
    height: auto;
    float: right;
    z-index: 2;
    margin-left: 25px;
    margin-right: 5px;
    margin-top: 150px;
  }
  th{
    padding-left: 10px;
  }
   .home-header{

     height: 20%;
     width: 100%;
   }
   #eva{
    background-color: black;
    width: 100%;
    height: 50%;
   }

  </style>
  

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
  <div class="home-header">
  <?php if (isset($_SESSION["username"])){?>
      <p class="btnLogout"><a href="index.php?logout='1'" style="color:#5f9ea0;">Logout</a></p>
    <?php } ?>
    <h2 style="width: 97%;
     color: #5f9ea0;
     background: transparent;
     text-align: center;
     border-bottom: none;
     padding: 20px;
     position: fixed;font-size: 35px;font-family:Times New Roman;"><b> iWant Books ( Action ) </b></h2>
    <div>
    <nav class="navbar">
    <a href="index.php" style="font-size:23px;font-family:Times New Roman;color:white">Home</a>
    <a href="aboutus.php" style="font-size:23px;color:white;font-family:Times New Roman;">About Us</a>
    </nav>
    </div>
  </div>
  <div id = "eva" style="width:100%; height:20%;">
    
    Header

   </div>

<div id = "hit" style="width:100%; height:70%;">

<?php

include_once('server.php');

echo "asdfjklasdfjasdfljadsfkl";
?>



</div>

</body>
</html>