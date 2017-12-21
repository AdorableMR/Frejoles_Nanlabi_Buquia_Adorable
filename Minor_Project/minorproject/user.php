<?php
require('server.php');
if(empty($_SESSION['username'])) {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>
    Index
  </title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
  <div class="home-header">
  <?php if (isset($_SESSION["username"])): ?>
      <p class="btnLogout"><a href="index.php?logout='1'" style="color:#5f9ea0;"><b>Logout</b></a></p>
    <?php endif ?>
    <h2 style="font-size: 35px"><b> iWant Books </b></h2>
  </div>
  
  

    <?php if (isset($_SESSION["username"])): ?>
    <div>
    <nav class="navbar">
    <a href="user.php" style="color:#5f9ea0;"><b>Home</b></a>
    <a href="aboutus.php" style="color:#5f9ea0;"><b>About Us</b></a>
    </nav>
    </div>


    <?php endif ?>
  </div>
  <form action="user.php" method="POST">
  <div class="sidenav">
                 
         <center><h5 style="color:#5f9ea0">Borrowed Books</h5></center>
         <button name="borrowed_books" class='btn btn-default' style='color:white; width:90%; background-color:#5f9ea0;'>Borrowed Books</button><br>
           <br> 
        <center><h5 style="color:#5f9ea0" >Books Logs </h5></center>  
        <button name='books_logs' class='btn btn-default' style='color:white; width:90%;   background-color:#5f9ea0;'>Books Logs</button><br>


        <center><h2 style="color:#5f9ea0">Genres: </h2></center><br>
        <button name='action' class='btn btn-default' style='color:white; width:90%; background-color:#5f9ea0;'>Action</button><br><br>
            
        <button name='drama' class='btn btn-default' style='color:white; width:90%;   background-color:#5f9ea0;'>Drama</button><br><br>
            
        <button name='romance' class='btn btn-default' style='color:white; width:90%;  background-color:#5f9ea0;'>Romance</button><br><br>
            
        <button name='fiction' class='btn btn-default' style='color:white; width:90%;  background-color:#5f9ea0;' >Fiction</button><br><br>
            
        <button name='children' class='btn btn-default' style='color:white; width:90%;  background-color:#5f9ea0;'>Children Stories</button><br><br>
          

        </div></form>

 <div id ="fixed-thing" style="margin-right:30px;">
  
  <?php 
    if(isset($_POST['borrowed_books'])){
    $db_query = "SELECT * from borrow_list where username='$_SESSION[username]'";
                                 $verify= $db->query($db_query);

                                if($verify->num_rows > 0){
                                  echo"<table class='table table-striped table-hover' style='width:85%; float:right;'><h1 style='text-align:center;'>LIST OF CURRENTLY BORROWED BOOKS</h1>";
                                  echo"<th>Title</th><th>author</th><th>Image</th><th>Description</th><th>Category</th><th>Borrowed Date</th><th>Due Date</th>";
                                   while ($col1=$verify->fetch_assoc()){

                                                $youth = "SELECT id from books where title='$col1[title]' limit 1";
                                                $youth2=mysqli_query($db,$youth);
                                    
                                                while($ink=$youth2->fetch_assoc()){
                                                  $ink2=$ink['id'];
                                                }

                                  
                                    echo "<tr><td>$col1[title]</td> <td>$col1[author]</td><td><img src='images/$ink2.jpg' width='70px';' height='60px;' ></td><td>$col1[description]</td><td>Category</td><td>$col1[col_date]</td><td>$col1[deadline]</td></tr>";
                                   }

                                   echo"</table>";

                                   echo"";
                                }else{
                                   echo"<center>NO HISTORY OF BORROWED BOOKS
                                   </center>";
                                 }
                                   


    }
   else if(isset($_POST['books_logs'])){
       $all = "SELECT * from borrow_list_logs where username='$_SESSION[username]' ";
      if($like = mysqli_query($db,$all)){
                                echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><h1 style='text-align:center;'>LIST OF BOOKS LOGS</h1><th>User Name</th><th>Category</th><th>Title</th><th>Borrow Date</th><th>Due Date</th><th>Return Date</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[username]</td><td>$come[category]</td><td>$come[title]</td><td>$come[col_date]</td><td>$come[deadline]</td><td>$come[return_date]</td></tr>";
                                  }

                                echo"</table>";
     }else{

     }      

    exit();
   }else if(isset($_POST['action'])){
        $all = "SELECT * from books where category='action' ";
        if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='action_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ></td><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
        }else{

        }      

       exit();  


   }
   else if($one = isset($_POST['action_search'])){
      

       $one = $_POST['action_search'];

       if($_POST['action_search'] == null){
             $all = "SELECT * from books where category='action' ";
              if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='action_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

       }else{

             $all = "SELECT * from books where title like '%$one%' || category like '%$one%' || description like '%$one%' || status like '%$one%' || author like '%$one%' && category='action' ";
        
              if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='action_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";
                                   

                                   if($like->num_rows <=0){
                                    echo "<center>O results</center>";
                                    exit();
                                   }
                                  
                                  echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ></td><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

         }

   }

      else if($one = isset($_POST['drama_search'])){
      

       $one = $_POST['drama_search'];

       if($_POST['drama_search'] == null){
             $all = "SELECT * from books where category='drama' ";
              if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='drama_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

       }else{

             $all = "SELECT * from books where title like '%$one%' || category like '%$one%' || description like '%$one%' || status like '%$one%' && category='drama' ";
        
              if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='drama_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";
                                   

                                   if($like->num_rows <=0){
                                    echo "<center>O results</center>";
                                    exit();
                                   }
                                  
                                  echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

         }

   }
        else if($one = isset($_POST['fiction_search'])){
      

       $one = $_POST['fiction_search'];

       if($_POST['fiction_search'] == null){
             $all = "SELECT * from books where category='fiction' ";
              if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='fiction_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

       }else{

             $all = "SELECT * from books where title like '%$one%' || category like '%$one%' || description like '%$one%' || status like '%$one%' && category='fiction' ";
        
              if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='fiction_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";
                                   

                                   if($like->num_rows <=0){
                                    echo "<center>O results</center>";
                                    exit();
                                   }
                                  
                                  echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

         }

   }
         else if($one = isset($_POST['romance_search'])){
      

       $one = $_POST['romance_search'];

       if($_POST['romance_search'] == null){
             $all = "SELECT * from books where category='romance' ";
              if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='romance_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

       }else{

             $all = "SELECT * from books where title like '%$one%' || category like '%$one%' || description like '%$one%' || status like '%$one%' && category='romance' ";
        
              if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='romance_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";
                                   

                                   if($like->num_rows <=0){
                                    echo "<center>O results</center>";
                                    exit();
                                   }
                                  
                                  echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

         }

   }
         else if($one = isset($_POST['children_search'])){
      

       $one = $_POST['children_search'];

       if($_POST['children_search'] == null){
             $all = "SELECT * from books where category='children_stories' ";
              if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='children_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

       }else{

             $all = "SELECT * from books where title like '%$one%' || category like '%$one%' || description like '%$one%' || status like '%$one%' && category='children_stories' ";
        
              if($like = mysqli_query($db,$all)){
                                 
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='children_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";
                                   

                                   if($like->num_rows <=0){
                                    echo "<center>O results</center>";
                                    exit();
                                   }
                                  
                                  echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

         }

   }

   else if(isset($_POST['drama'])){
        $all = "SELECT * from books where category='drama' ";
        if($like = mysqli_query($db,$all)){
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='drama_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                 echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
        }else{

        }      

       exit();  


   }

    else if(isset($_POST['fiction'])){
         $all = "SELECT * from books where category='fiction' ";
        if($like = mysqli_query($db,$all)){
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='fiction_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                 
                                 echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
        }else{

        }      

       exit();  


   }
      else if(isset($_POST['romance'])){
        $all = "SELECT * from books where category='romance' ";
        if($like = mysqli_query($db,$all)){
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='romance_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                 echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th></th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
        }else{

        }      

       exit();  


   }
      else if(isset($_POST['children'])){
        $all = "SELECT * from books where category='children_stories' ";
        if($like = mysqli_query($db,$all)){
                                 echo "<form action='user.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='children_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                 echo"<table class='table table-striped table-hover'  style='width:85%; float:right;'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
        }else{

        }      

       exit();  


   }



      else{
        echo"<img class='bg' src='images/girlreading.jpg'>";
    }
  ?>


 </div>
</body>
</html>