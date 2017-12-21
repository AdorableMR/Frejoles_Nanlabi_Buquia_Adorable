<?php
require('server.php');
if(! isset($_SESSION['admin'])){
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Index
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">

html{
  margin-left:20px;
  margin-right: 20px;
  margin-bottom: 10px;
  margin-top: 10px; 

}
</style>

<script type="text/javascript">
function change(){
       if(document.getElementById('choose_category').value=='action'){
        document.getElementById('action').style.display='block';
        document.getElementById('fiction').style.display='none';
        document.getElementById('romance').style.display='none';
        document.getElementById('drama').style.display='none';
        document.getElementById('children_stories').style.display='none';
         document.getElementById('all').style.display='none';

      
      }

        if(document.getElementById('choose_category').value=='all'){
        document.getElementById('all').style.display='block';
         document.getElementById('action').style.display='none';
        document.getElementById('fiction').style.display='none';
        document.getElementById('romance').style.display='none';
        document.getElementById('drama').style.display='none';
        document.getElementById('children_stories').style.display='none';

      
      }

      else if(document.getElementById('choose_category').value=='fiction'){
        document.getElementById('action').style.display='none';
        document.getElementById('fiction').style.display='block';
        document.getElementById('romance').style.display='none';
        document.getElementById('drama').style.display='none';
        document.getElementById('children_stories').style.display='none';
        document.getElementById('all').style.display='none';

      
      }
      else if(document.getElementById('choose_category').value=='romance'){
        document.getElementById('action').style.display='none';
        document.getElementById('fiction').style.display='none';
        document.getElementById('romance').style.display='block';
        document.getElementById('drama').style.display='none';
        document.getElementById('children_stories').style.display='none';
        document.getElementById('all').style.display='none';

  
      }
        else if(document.getElementById('choose_category').value=='drama'){
        document.getElementById('action').style.display='none';
        document.getElementById('fiction').style.display='none';
        document.getElementById('romance').style.display='none';
        document.getElementById('drama').style.display='block';
        document.getElementById('children_stories').style.display='none';
        document.getElementById('all').style.display='none';
      
      }
        else if(document.getElementById('choose_category').value=='children_stories'){
        document.getElementById('action').style.display='none';
        document.getElementById('fiction').style.display='none';
        document.getElementById('romance').style.display='none';
        document.getElementById('drama').style.display='none';
        document.getElementById('children_stories').style.display='block';
        document.getElementById('all').style.display='none';
      
      }



    }

</script>


</head>
<body>
<!--	<div class="home-header">
	<?php if (isset($_SESSION["username"])): ?>
			<p class="btnLogout"><a href="index.php?logout='1'" style="color:#5f9ea0;">Logout</a></p>
		<?php endif ?>
		<h2 style="font-size: 35px"><b> iWant Books </b></h2>
	</div>-->



		<?php if (isset($_SESSION["username"])): ?>
		<div>
		<nav class="navbar">
		<?php if ( ! isset($_SESSION['admin'])){ ?> <a href="index.php" style="color:black">Home</a><?php } ?>

    <?php if (isset($_SESSION['admin'])){ ?><?php } ?>
    
     <a href="register.php" style="color:#5f9ea0;">Create User</a>
		<!--<a href="aboutus.php" style="color:#5f9ea0; margin-right:20px;">About Us</a>-->
    <a href="index.php?logout='1'" style="color:#5f9ea0;"><button class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Logout</button></a>
		</nav>
		</div>
       
		<?php if ( ! isset($_SESSION['admin'])){ ?> <img class="bg" src="images/girlreading.jpg"><?php } ?>

		<?php endif ?>
	</div>
	

	<?php if ( ! isset($_SESSION['admin'])){ ?>
	<div class="sidenav">

				<h2 style="color:#5f9ea0">Genres: </h2><br />
				<a href="action.php">Action</a>
						
				<a href="drama.php">Drama</a>
						
				<a href="romance.php">Romance</a>
						
				<a href="fiction.php">Fiction</a>
						
				<a href="children.php">Children Stories</a>
						
				</div>



        <div id="fixed-things" style="padding-left:20px; padding-right:20px;">

         	<?php }

            /*all the data are for admin only  */
            if(isset($_SESSION['admin'])){

           ?>
          <?php


        if(isset($_POST['All'])){


        $all = "SELECT * from books ";
        if($like = mysqli_query($db,$all)){
                                 

                        echo "<form action='index.php' method='POST' style='float:left;'>
                        <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                        <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                        <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                        </form> ";

                                 echo "<form action='index.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='all_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                echo"<table class='table table-striped table-hover'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ></td><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
        }else{

        }      

       exit();  


   }
   if($one = isset($_POST['all_search'])){
      

       $one = $_POST['all_search'];

       if($_POST['all_search'] == null){
             $all = "SELECT * from books ";
              if($like = mysqli_query($db,$all)){
                                   
                                   echo "<form action='index.php' method='POST' style='float:left;'>
                                  <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                                  <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                                  <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                                  </form> ";

                                 
                                 echo "<form action='index.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='all_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                echo"<table class='table table-striped table-hover'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

       }else{

             $all = "SELECT * from books where title like '%$one%' || category like '%$one%' || description like '%$one%' || author like '%$one%' ";
        
              if($like = mysqli_query($db,$all)){
                                  
                                  echo "<form action='index.php' method='POST' style='float:left;'>
                                  <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                                  <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                                  <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                                   </form> ";

                                 
                                 echo "<form action='index.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='all_search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";
                                   

                                   if($like->num_rows <=0){
                                   
                                   echo "
                                   <br><br><br>
                                   <center>
                                   <div class='alert alert-warning' style='width:20%'>
                                   <strong>0 result</strong> 
                                   </div></center>'";

                                    exit();
                                   }
                                  
                                  echo"<table class='table table-striped table-hover'><th>Title of The Book</th><th>Book Cover</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th>";

                                  while ($come = $like->fetch_assoc()) {
                                    echo"<tr><td>$come[title]</td><td><img src='images/$come[id].jpg' width='70px';' height='60px;' ></td><td>$come[author]</td><td>$come[category]</td><td>$come[description]</td><td>$come[status]</td></tr>";
                                  }

                                echo"</table>";
              }     

             exit(); 

         }

   }

                    if(isset($_POST['borrow_button'])){

                    $value = $_POST['username'];
                    
                    $validate_user = "SELECT * from accounts where username='$value' ";
                    $one_d = mysqli_query($db,$validate_user);

                    if($one_d->num_rows <= 0){
                       
                       echo "<form action='index.php' method='POST' style='float:left;'>
                        <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                        <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                        <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                        </form> <br><br>";

                       echo "<br><br><br><center>
                       <div class='alert alert-danger' style='width:20%'>
                        <strong>Error!</strong> Invalid User Field
                        </div></center>'";
                        exit();
                      
                    }
                    $r=0;

                     $value_log = "SELECT from books where id='$_POST[borrow_button]' limit 1";
                    
                    if($air = mysqli_query($db,$value_log)){
                           
                            $date_now = date('m-d-Y');
                            $g=date("Y-m-d");
                            $date = new DateTime($g);
                            $date->add(new DateInterval('P1M'));
                            $date_due= $date->format('m-d-Y');


                           while($c=$air->fetch_assoc()) {
                          $r++;
                          if($r==1){
                           $value_part = "UPDATE books set status = 'Not available' where title='$c[title]' && category='$c[category]'";
                           mysqli_query($db,$value_part);

                                
                                $inn = "INSERT INTO borrow_list (username,author,description,category,col_date,deadline,title)
                                values('$value','$c[author]','$c[description]','$c[category]','$date_now','$date_due','$c[title]')";
                                mysqli_query($db,$inn);

                            }
                         }

  
                      }

              }

                    if(isset($_POST['borrow_button'])){

                    $value = $_POST['username'];
                    
                    $validate_user = "SELECT * from accounts where username='$value' ";
                    $one_d = mysqli_query($db,$validate_user);

                    if($one_d->num_rows <= 0){
                       
                       echo "<form action='index.php' method='POST' style='float:left;'>
                        <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                        <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                        <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                        </form> <br><br>";

                                          echo "<br><br><br><center>
                                          <div class='alert alert-danger' style='width:20%'>
                                          <strong>Invalid Field !</strong>
                                          </div></center>'";
                                          exit();

                      
                    }


                    $value_log = "SELECT * from books where id='$_POST[borrow_button]' limit 1";
                    
                    if($air = mysqli_query($db,$value_log)){
                           
                            $date_now = date('m-d-Y');
                            $g=date("Y-m-d");
                            $date = new DateTime($g);
                            $date->add(new DateInterval('P1M'));
                            $date_due= $date->format('m-d-Y');


                           while($c=$air->fetch_assoc()) {
                        
                           $value_part = "UPDATE books set status = 'Not available' where title='$c[title]' && category='$c[category]'";
                           mysqli_query($db,$value_part);

                                
                                $inn = "INSERT INTO borrow_list (username,author,description,category,col_date,deadline,title)
                                values('$value','$c[author]','$c[description]','$c[category]','$date_now','$date_due','$c[title]')";
                                mysqli_query($db,$inn);

                         }
  
                      }

              }
                    if(isset($_POST['borrow_logs'])){
                    
                                $all = "SELECT * from borrow_list_logs";
                                
                                

                                       echo "<form action='index.php' method='POST' style='float:left;'>
                                       <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                                       <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                                       <button class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Return Book</button>
                                      </form> ";



                                 echo "<form action='index.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='search_logs' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";
                                if($like = mysqli_query($db,$all)){
                                echo"<table class='table table-striped table-hover'><th>User Name</th><th>Category</th><th>Title</th><th>Borrow Date</th><th>Due Date</th><th>Return Date</th>";

                                while ($come = $like->fetch_assoc()) {


                                  echo"<tr><td>$come[username]</td><td>$come[category]</td><td>$come[title]</td><td>$come[col_date]</td><td>$come[deadline]</td><td>$come[return_date]</td></tr>";
                                }
                                echo"</table>";
                                 }      


                                exit();
                          
                              }


                                if(isset($_POST['search_logs'])){
                                

                                if(empty($_POST['search_logs'])){
                                  $all = "SELECT * from borrow_list_logs";
                                
                                

                                       echo "<form action='index.php' method='POST' style='float:left;'>
                                       <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                                       <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                                       <button class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Return Book</button>
                                      </form> ";



                                    echo "<form action='index.php' method='POST' style='float:right; '>";
                                    echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                    echo "<input class='btn btn-default' type='search' name='search_logs' ";
                                    echo "placeholder='Enter keyword' style='float:right;'>"; 
                                    echo "</form>";
                                    if($like = mysqli_query($db,$all)){
                                    echo"<table class='table table-striped table-hover'><th>User Name</th><th>Category</th><th>Title</th><th>Borrow Date</th><th>Due Date</th><th>Return Date</th>";

                                    while ($come = $like->fetch_assoc()) {
                                   echo"<tr><td>$come[username]</td><td>$come[category]</td><td>$come[title]</td><td>$come[col_date]</td><td>$come[deadline]</td><td>$come[return_date]</td></tr>";
                                   }
                                   echo"</table>";
                                   }      


                                   exit();     
                                }
                                

                                
                                $all = "SELECT * from borrow_list_logs where title like '%$_POST[search_logs]%' || username like '%$_POST[search_logs]%' || title like '%$_POST[search_logs]%' || category like '%$_POST[search_logs]%' ";
                                


                                       echo "<form action='index.php' method='POST' style='float:left;'>
                                       <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                                       <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                                       <button class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Return Book</button>
                                      </form> ";



                                 echo "<form action='index.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='borrow_logs' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";
                                if($like = mysqli_query($db,$all)){
                                  if($like->num_rows > 0 ){
                                   echo"<table class='table table-striped table-hover'><th>User Name</th><th>Category</th><th>Title</th><th>Borrow Date</th><th>Due Date</th><th>Return Date</th>";
                                    
                                   }else{
                                        echo "<br><br><br><center>
                                          <div class='alert alert-warning' style='width:20%'>
                                          <strong>0</strong>Result
                                          </div></center>'";
                                          exit();
                                   }
                                while ($come = $like->fetch_assoc()) {
                                  echo"<tr><td>$come[username]</td><td>$come[category]</td><td>$come[title]</td><td>$come[col_date]</td><td>$come[deadline]</td><td>$come[return_date]</td></tr>";
                                }
                                echo"</table>";
                                       
                                }else{
                                 echo "<form action='index.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='borrow_logs' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";
                                         
                                          echo "<br><br><br><center>
                                          <div class='alert alert-warning' style='width:20%'>
                                          <strong>0</strong>Result
                                          </div></center>'";
                                          exit();


                                }

                                exit();
                          
                     }




         	if (isset($_SESSION['admin'])){

                
               if(isset($_POST['search_button_borrow'])){
                   $user_name = $_POST['name_user'];
                   $category = $_POST['category_one'];
                   $title = $_POST['search_title'];
                    
                    $validate_user = "SELECT * from accounts where username='$user_name' ";
                    $one_d = mysqli_query($db,$validate_user);

                    if($one_d->num_rows <= 0){
                       
                       echo "<form action='index.php' method='POST' style='float:left;'>
                        <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                        <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                        <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                        </form> <br><br>";

                                        echo "<br><br><br><center>
                                          <div class='alert alert-warning' style='width:20%'>
                                          <strong>Invalid ! </strong> Field
                                          </div></center>'";
                                          exit();
                      
                    }

                    $validate_use = "SELECT * from books where category='$category' &&  title='$title' && status='Available' ";
                    $one = mysqli_query($db,$validate_use);

                    if($one->num_rows > 0){
                       
                       echo "<form action='index.php' method='POST' style='float:left;'>
                        <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                        <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                        <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                        </form> <br><br>";

                             $date_now = date('m-d-Y');
                             $g=date("Y-m-d");
                             $date = new DateTime($g);
                             $date->add(new DateInterval('P1M'));
                             $date_due= $date->format('m-d-Y');

                              while ($c = $one->fetch_assoc()) {
                                 $author = $c['author'];
                                 $description = $c['description'];                       
                               }                        
                              $value_part = "UPDATE books set status = 'Not available' where title='$title' && category='$category'";
                              mysqli_query($db,$value_part);

                                
                                $inn = "INSERT INTO borrow_list (username,author,description,category,col_date,deadline,title)
                                values('$user_name','$author','$description','$category','$date_now','$date_due','$title')";
                                mysqli_query($db,$inn);
                                          
                                          echo "<br><br><br><center>
                                          <div class='alert alert-success' style='width:20%'>
                                          <strong>Operation Success ! </strong>
                                          </div></center>'";
                                          exit();

                      
                    }




               }

               if(isset($_POST['use_search_borrow'])){
                          
                          echo "<form action='index.php' method='POST' style='width:700px;'>
                                       <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                                       <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                                       <button class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Return Book</button>
                                       <button name='All' class='btn btn-default' style='color:white; background-color:gray;'>View All Books</button><br>
                                       </form>
                                       ";

                                          echo "<form action='index.php' method='POST' style='width:700px; margin-left:210px; float:left;'>
                                           <button name='borrow_book' class='btn btn-default' style='color:white; background-color:gray;' >Use Category</button>
                                           <button name='true_search_borrow' class='btn btn-default' style='color:white; background-color:gray;' >Direct title and category borrow</button>

                                           </form>
                                           <br>";

                           echo"<form action='index.php' method='POST' style='width:700px;'><br><br><br>
                            <b>Enter User Name:</b><br><input type='text' name='name_user' class='form-control' required='required'><br>
                          
                          <b>Category :</b>
                          <select name = 'category_one' class='form-control'>
                          <option value='action'>action</option>
                          <option value='drama'>Drama</option>
                          <option value='romance'>Romance</option>
                          <option value='fiction'>Fiction</option>
                          <option value='children_stories'>Children Stories</option>
                          </select><br><br>

                          <b>Enter Title: </b><br><input type='text' name='search_title' class='form-control' required='required' required='required'><br>
                          <button name='search_button_borrow' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Submit</button>


                          </form>";
                           
                           exit();
               }

                if(isset($_POST['true_search_borrow'])){
                                       echo "<form action='index.php' method='POST' style='width:700px;'>
                                       <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                                       <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                                       <button class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Return Book</button>
                                       <button name='All' class='btn btn-default' style='color:white; background-color:gray;'>View All Books</button><br>
                                       </form>
                                       ";

                                          echo "<form action='index.php' method='POST' style='width:700px; margin-left:310px; float:left;'>
                                           <button name='borrow_book' class='btn btn-default' style='color:white; background-color:gray;' >Use Category</button>
                                           </form>
                                           <br>";

                           echo"<form action='index.php' method='POST' style='width:700px;'><br><br><br>
                          <b>Enter Title: </b><br><input type='text' name='search_title_true' class='form-control' required='required' required='required'><br>
                          <button name='search_button_borrow_true' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Submit</button>


                          </form>";
                           
                           exit();

                }
                if(isset($_POST['search_button_borrow_true'])){

                                        echo "<form action='index.php' method='POST' style='width:700px;'>
                                       <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                                       <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                                       <button class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Return Book</button>
                                       <button name='All' class='btn btn-default' style='color:white; background-color:gray;'>View All Books</button><br>
                                       </form>
                                       ";

                                          echo "<form action='index.php' method='POST' style='width:700px; margin-left:210px; float:left;'>
                                           <button name='true_search_borrow' class='btn btn-default' style='color:white; background-color:gray;' >Direct Search</button>
                                           <button name='use_search_borrow' class='btn btn-default' style='color:white; background-color:gray;' >Direct title and category borrow</button>

                                           </form>
                                           <br>";

                    echo "<form action='index.php' method='post' style='width:900px;' >";

                    $one = $_POST['search_title_true'];

                     $all = "SELECT * from books where title like '%$one%' || category like '%$one%' || description like '%$one%' || author like '%$one%' && status='Available' ";
                     $verify = mysqli_query($db,$all);

                             if($verify->num_rows > 0){
                               echo" <br><br><b>Enter User Name :</b> <input type=text name='username' class='form-control' style='40%;' required='required'><br><br>";
                               echo"<table class='table table-striped table-hover'>";
                                 
                                   echo"<th>Title</th><th>category</th><th>Book Cover</th><th>author</th><th>Action</th>";
                                   while ($col1=$verify->fetch_assoc()){  
                                   echo "<tr><td>$col1[title]</td><td>$col1[category]</td></td><td><img src='images/$col1[id].jpg' width='70px';' height='60px;' ></td><td>$col1[author]</td><td><button name='borrow_button' onclick='javascript:one();' value = '$col1[id]' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow</button></center></td></tr>";
                                   echo"<input type=text value='$col1[category]' name='cat' style='display:none;'>";
                                   }
                                     echo"</table>";
                              }
                              else{
                                   echo"<center>NO BOOKS AVAILABLE";
                               }
                              echo"</form>";
                              exit();



                }

                if(isset($_POST['borrow_book'])){

                       echo "<form action='index.php' method='POST' style='width:700px;'>
                                       <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                                       <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                                       <button class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Return Book</button>
                                       <button name='All' class='btn btn-default' style='color:white; background-color:gray;'>View All Books</button><br>
                                       </form>
                                       ";

                                          echo "<form action='index.php' method='POST' style='width:700px; margin-left:210px; float:left;'>
                                           <button name='true_search_borrow' class='btn btn-default' style='color:white; background-color:gray;' >Direct Search</button>
                                           <button name='use_search_borrow' class='btn btn-default' style='color:white; background-color:gray;' >Direct title and category borrow</button>

                                           </form>
                                           <br>";
        

                    echo "<form action='index.php' method='post' style='width:900px;' >
                      
                          <input type='text' name='username' required='required' class='form-control' placeholder='Enter User Name'><br>
                          
                          <b>Category :</b>
                         <select name = 'cat' onchange='javascript:change()' id='choose_category'>
                         <option value='all'>All</option>
                         <option value='action'>action</option>
                         <option value='drama'>Drama</option>
                         <option value='romance'>Romance</option>
                         <option value='fiction'>Fiction</option>
                         <option value='children_stories'>Children Stories</option>
                         </select>
                   ";
                   ?>

                         <div id ='all'>
                          <?php
                                



                                 $db_query = "SELECT * from books where status='available'";
                                 $verify= $db->query($db_query);

                                if($verify->num_rows > 0){
                                  echo"<table class='table table-striped table-hover'><br><p style='text-align:center; font-size:13px; background-color:gray; color:white;'>LIST OF AVAILABLE BOOKS IN ALL CATEGORY</p>";
                                  


                                  echo"<th>Title</th><th>Book Cover</th><th>author</th><th>Action</th>";
                                   while ($col1=$verify->fetch_assoc()){
                                  
                                  echo "<tr><td>$col1[title]</td><td><img src='images/$col1[id].jpg' width='70px';' height='60px;' ></td><td>$col1[author]</td><td><button name='borrow_button' onclick='javascript:one();' value = '$col1[id]' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow</button></center></td></tr>";
                                   }

                                   echo"</table>";

                                   echo"";
                                }else{
                                   echo"<center>NO BOOKS AVAILABLE";
                                 }
                                   ?>
                         </div>




                         <div id ='action' style='display:none'>
                          <?php
                                



                                 $db_query = "SELECT * from books where status='available' && category='action' ";
                                 $verify= $db->query($db_query);

                                if($verify->num_rows > 0){
                                	echo"<table class='table table-striped table-hover'><br><p style='text-align:center; font-size:13px; background-color:gray; color:white;'>LIST OF AVAILABLE BOOKS IN CATEGORY ACTION</p>";
                                  


                                	echo"<th>Title</th><th>Book Cover</th><th>author</th><th>Action</th>";
                                   while ($col1=$verify->fetch_assoc()){
                                	
                                	echo "<tr><td>$col1[title]</td><td><img src='images/$col1[id].jpg' width='70px';' height='60px;' ></td><td>$col1[author]</td><td><button name='borrow_button' onclick='javascript:one();' value = '$col1[id]' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow</button></center></td></tr>";
                                   }

                                   echo"</table>";

                                   echo"";
                                }else{
                                   echo"<center>NO BOOKS AVAILABLE IN THE ACTION CATEGORY";
                                 }
                                   ?>
                         </div>

                         <div id ='drama' style='display:none'>
                          <?php

                              $action = "drama";
                              $avail = "available";

                                 $db_query = "SELECT * from books where status='available' && category='drama' ";
                                 $verify= $db->query($db_query);

                                if($verify->num_rows > 0){
                                	echo"<table class='table table-striped table-hover'><p style='text-align:center; font-size:13px; background-color:gray; color:white;'>LIST OF AVAILABLE BOOKS IN CATEGORY DRAMA</p>";
                                	echo"<th>Title</th><th>Book Cover</th><th>author</th><th>Action</th>";
                                   while ($col1=$verify->fetch_assoc()){
                                	
                                	echo "<tr><td>$col1[title]</td><td><img src='images/$col1[id].jpg' width='70px';' height='60px;' ></td><td>$col1[author]</td><td><button name='borrow_button' onclick='javascript:one();' value = '$col1[id]' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow</button></td></tr>";
                                   }

                                   echo"</table>";

                                   echo"";
                                }else{
                                	  echo"<center>NO BOOKS AVAILABLE IN THE DRAMA CATEGORY</center>";
                                }
                                   ?>
                         </div>
                         

                         
                         <div id ='romance' style='display:none'>
                          <?php

                              $action = "romance";
                              $avail = "available";

                                 $db_query = "SELECT * from books where status='available' && category='romance' ";
                                 $verify= $db->query($db_query);

                                if($verify->num_rows > 0){
                                	echo"<table class='table table-striped table-hover'><p style='text-align:center; font-size:13px; background-color:gray; color:white;'>LIST OF AVAILABLE BOOKS IN CATEGORY ROMANCE</p>";
                                	echo"<th>Title</th><th>Book Cover</th><th>author</th><th>Action</th>";
                                   while ($col1=$verify->fetch_assoc()){
                                	
                                	echo "<tr><td>$col1[title]</td><td><img src='images/$col1[id].jpg' width='70px';' height='60px;' ></td><td>$col1[author]</td><td><button name='borrow_button' onclick='javascript:one();' value = '$col1[id]' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow</button></td></tr>";
                                   }

                                   echo"</table>";

                                   echo"";
                                }else{
                                	  echo"<center>NO BOOKS AVAILABLE IN THE ROMANCE CATEGORY</center>";
                                }
                                   ?>
                         </div>
                         
                         <div id ='fiction' style='display:none'>
                          <?php

                              $action = "fiction";
                              $avail = "available";

                                 $db_query = "SELECT * from books where status='available' && category='fiction' ";
                                 $verify= $db->query($db_query);

                                if($verify->num_rows > 0){
                                	echo"<table class='table table-striped table-hover'><p style='text-align:center; font-size:13px; background-color:gray; color:white;'>LIST OF AVAILABLE BOOKS IN CATEGORY FICTION</p>";
                                	echo"<th>Title</th><th>Book Cover</th><th>author</th><th>Action</th>";
                                   while ($col1=$verify->fetch_assoc()){
                                	
                                	echo "<tr><td>$col1[title]</td><td><img src='images/$col1[id].jpg' width='70px';' height='60px;' ></td><td>$col1[author]</td><td><button name='borrow_button' onclick='javascript:one();' value = '$col1[id]' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow</button></td></tr>";
                                   }

                                   echo"</table>";

                                   echo"";
                                }else{
                                	  echo"<center>NO BOOKS AVAILABLE IN THE FICTION CATEGORY</center>";
                                }
                                   ?>
                         </div>

                         <div id ='children_stories' style='display:none'>
                          <?php

                              $action = "children_stories";
                              $avail = "available";

                                 $db_query = "SELECT * from books where status='available' && category='children_stories' ";
                                 $verify= $db->query($db_query);

                                if($verify->num_rows > 0){
                                	echo"<table class='table table-striped table-hover'><p style='text-align:center; font-size:13px; background-color:gray; color:white;'>LIST OF AVAILABLE BOOKS IN CATEGORY CHILDREN STORIES</p>";
                                	echo"<th>Title</th><th>Book Cover</th><th>author</th><th>Action</th>";
                                   while ($col1=$verify->fetch_assoc()){
                                	
                                	echo "<tr><td>$col1[title]</td><td><img src='images/$col1[id].jpg' width='70px';' height='60px;' ></td><td>$col1[author]</td><td><button name='borrow_button' onclick='javascript:one();' value = '$col1[id]' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow</button></td></tr>";
                                   }

                                   echo"</table>";

                                   
                                }else{
                                	  echo"<center>NO BOOKS AVAILABLE IN THE CHILDREN STORIES CATEGORY</center>";
                                }
                                   ?>
                         </div>


                         <?php
                        
                        echo"</form>";

                	exit();

                }

         		 if (isset($_POST['add_book'])) {
         		       
         		       echo "<form action='index.php' method='POST' style='width:700px; padding-left:100px;'>
                        <button class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Return Book</button>
                        <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                        <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                        <button name='All' class='btn btn-default' style='color:white; background-color:gray;'>View All Books</button>
                        </form><br>";


                        
                         echo "
                             
                             <form action='cancel.php' method='POST'>
                             <b>SELECT CATEGORY :</b>
                             <select name='category' class='form-control'>
                             <option value='action'>Action</option>
                             <option value='drama'>Drama</option>
                             <option value='romance'>Romance</option>
                             <option value='fiction'>Fiction</option>
                             <option value='children_stories'>Children Stories</option>
                             </select> <br><br>

                             <b> Title :</b> <input type='text' name='title' required='required' class='form-control'><br><br>
                             <b>Author : </b><input type='text' name='author' required='required' class='form-control'><br><br>
                             <b>Description:</b><input type='text' name='description' height:70%;' required='required' class='form-control'><br><br> 
                              
                             
                             ";
                             
                             
                             echo"<br><button name='add_books_db' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Add Book </button></form>";


                       exit();


         		 }

                       echo "<form action='index.php' method='POST' style='float:left; width:700px;'>
                       <button name='add_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;' >Add Book</button>
                       <button name='borrow_logs' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>View Borrow Logs</button>
                        <button name='borrow_book' class='btn btn-default' style='color:white; background-color:#5f9ea0;'>Borrow Book</button>
                        <button name='All' class='btn btn-default' style='color:white; background-color:gray;'>View All Books</button>
                        </form> ";

                 
         		 if(isset($_POST['search'])){

         		 	            $value = $_POST['search'];


                               
                                if(isset($_POST['search'])){
                                 
                      
                                 $p = "SELECT * from borrow_list where username like '%$value%' || title like '%$value%' || category like '%$value%'   ";
                                 $query_select= $db->query($p);
                 
                                  if($query_select->num_rows > 0){
                    
                                 echo "<form action='index.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search' name='search' ";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";
                                 echo "<table class='table table-striped table-hover'><th>User Name</th><th>title</th><th>Book Cover</th><th>Category</th><th>Description</th><th>Borrow Date</th><th>Due Date</th><th>Action</th>";
         		                 while($col2=$query_select->fetch_assoc()){
         		 	             echo "<tr><td>$col2[username]</td><td>$col2[title]</td><td><img src='images/$col2[id].jpg' width='70px';' height='60px;' ></td><td>$col2[category]</td><td>$col2[description]</td><td>$col2[col_date]</td><td>$col2[deadline]</td><td><button  class='btn btn-default' style='color:white; background-color:#5f9ea0;' name='return' value = '$col2[id]'>Return</button></td></tr>";
         		                 }

                                 echo "</table>";

                                 }else{
                                 
                                 echo "<form action='index.php' method='POST' style='float:right; '>";
                                 echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                                 echo "<input class='btn btn-default' type='search'";
                                 echo "placeholder='Enter keyword' style='float:right;'>"; 
                                 echo "</form>";

                                  echo "
                                 <br><br><br>
                                 <center>
                                 <div class='alert alert-warning' style='width:20%'>
                                 <strong>0 result</strong> 
                                  </div></center>'";

                                 }


                                 }


         		 }else{
                 $p = "SELECT * from borrow_list";
                 $query_select= $db->query($p);
                 
                 if($query_select->num_rows > 0){
                    
                    echo "<center><form action='index.php' method='POST' style='float:right; '>";
                    echo "<input class='btn btn-default' type='submit' name = 'submit' value='search' style='float:right;'>&nbsp;";
                    echo "<input class='btn btn-default' type='search' name='search' ";
                    echo "placeholder='Enter keyword' style='float:right;'>"; 
                    echo "</form></center>";
                    

                   echo"<table class='table table-striped table-hover'>";
                   echo "<form action='cancel.php' method='POST'>
                         
                         <th>User Name</th><th>title</th><th>Book Cover</th><th>Category</th><th>Description</th><th>Borrow Date</th><th>Due Date</th><th>Action</th>";
                   }
         		   while($col2=$query_select->fetch_assoc()){
                                                $youth = "SELECT id from books where title='$col2[title]' limit 1";
                                                $youth2=mysqli_query($db,$youth);
                                    
                                                while($ink=$youth2->fetch_assoc()){
                                                  $ink2=$ink['id'];
                                                }

         		    	echo "<tr><td>$col2[username]</td><td>$col2[title]</td><td><img src='images/$ink2.jpg' width='70px';' height='60px;' ></td><td>$col2[category]</td><td>$col2[description]</td><td>$col2[col_date]</td><td>$col2[deadline]</td><td><button onclick='javascript:one();' class='btn btn-default' style='color:white; background-color:#5f9ea0;' name='return' value = '$col2[id]'>Return</button></td></tr>";
         		   }

                  echo "</form></table>";
                  }


              }

           ?>

           <?php } /*End of admin process*/?>



 </div>
</body>
</html>

           <script type="text/javascript">
                      function one()
                      {    

                          if(confirm('Are you sure you want to return this book '))
                          {
                               window.location.href='cancel.php';
                          }else{
                                window.location.href='index.php';
                          }

                     }

                   </script>