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
  <?php if (isset($_SESSION["username"])): ?>
      <p class="btnLogout"><a href="index.php?logout='1'" style="color:#5f9ea0;">Logout</a></p>
    <?php endif ?>
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

$user = $_SESSION['username'];

if(isset($_POST['all_delete'])){
  
   $delete_data = "DELETE from borrow_list";
    mysqli_query($db,$delete_data);
                  
                echo"<div>";
                  echo "<center><img style='background-color:lightgray;padding:10px;margin-top:150px;width:20%;height:20%' src='images/books.png'></center>";
                echo "
                <center>
                <div class='alert alert-success' style='margin-top:40px;width:40%'>
                <strong>Book/s are returned successfully !</strong>
                 </div></center>;";
                echo "";
                echo "<center>
                      <div id='hot'  style='width:20%'>
                      <form action='action.php' method='POST'>
                      <button name='go_back' type='submit' class='btn btn-default' style='color:white; background-color:#5f9ea0; width:100%; margin-left:50%;'>Done</button>
                      </form>
                      </div>
                      </center><br />";
                echo "";
                echo "</div>";
            
   exit();
}
if(isset($_POST['action'])){

	$delete = $_POST['action'];
	$delete_data = "DELETE from borrow_list where title='$delete' && username='$_SESSION[username]' limit 1";
    mysqli_query($db,$delete_data);

                /*
                echo"<div>";
                echo "<center><img style='background-color:lightgray;padding:10px;margin-top:150px;width:20%;height:20%' src='images/books.png'></center>";
                echo "<br />
                <center>
                <div class='alert alert-success' style='width:40%'>
                <strong>Book/s are returned successfully!</strong>
                 </div></center>;";
                echo "";
                echo "</div>";*/
                

}



if(isset($_POST['submit'])){
    
    $title=$_POST['title'];
    $author=$_POST['author'];
	  $para=$_POST['para'];
    $cat  = $_POST['submit'];

    $one=date('m-d-Y');

  echo "<table class='table table-striped table-hover'>
        <th>NEWLY BORROWED</th><th>User Name </th><th>AUTHOR</th><th>CATEGORY/GENRE</th><th>DESCRIPTION</th><th>DATE</th>";
	echo "<tr class='alert alert-success'><td>$_SESSION[username]</td><td>$title</td><td>$author</td><td>$cat</td><td>$para</td><td>$one</td></tr>";
	echo "</table>";





	$sql_query ="INSERT INTO borrow_list (username,title,author,description,col_date,category)
	            values('$user','$title','$author','$para','$one','$cat')";
	             mysqli_query($db,$sql_query);
	}
?>

<?php

    $gg = "SELECT * from borrow_list ";
          $go =  mysqli_query($db,$gg);

?>
    <table  class='table table-striped table-hover'>
      <?php
        if($go->num_rows > 0){
  	    echo "<th>User Name </th><th>Title</th><th>author</th><th>category</th><th>description</th><th>borrowed Date</th><th>Action</th>";
        }

     ?>
<?php
    while($col1 = $go->fetch_assoc()){

?>
    <tr>
    <td><?php echo $col1['username']?></td>
  	<td><?php echo $col1['title']?></td>
    <td><?php echo $col1['author']?></td>
    <td><?php echo $col1['category']?></td>
    <td><?php echo $col1['description']?></td>
     <td><?php echo $col1['col_date']?></td>
    <td><form action="action_function.php" method="POST">
    	<button name="action"  class='btn btn-default' style='color:white; background-color:#5f9ea0;' value="<?php echo $col1['title'] ?>">Return</button>
         </form>
    </td>
    </tr>
<?php
     }

       echo "</table>";
     if($go->num_rows > 0){
       ?>
         <div id = 'bb' style='float:right;'><br /><br />
          <form action="action_function.php" method="POST" >
           <button name="all_delete" style='background-color:#5f9ea0; margin-right:5px;' class='btn btn-info'>Return All Books</button>
           </form>
        </div>

       <?php
     }

?>
    
          <center><div id = 'two' style='margin-bottom:20px ;width:80%; float:right;' ><br /><br />
          <form action="action.php" >
   	       <button name="go_back" style='margin-left:300px ;width:30%; height:40%; background-color:#5f9ea0;' class='btn btn-info'>Back</button>
           </form>
        </div></center>
 

</div>

</body>
</html>