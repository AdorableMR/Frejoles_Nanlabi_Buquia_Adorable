<?php       
      include_once('server.php');

               if(isset($_POST['return'])){

                 $value_log = "SELECT * from borrow_list where id='$_POST[return]' limit 1";
                 $air = mysqli_query($db,$value_log);
                  
                 $date_now = date('m-d-Y');

                 while($c=$air->fetch_assoc()) {
                 	$value_part = "UPDATE books set status = 'Available' where title='$c[title]' && category='$c[category]'";
                 	mysqli_query($db,$value_part);

                 	$inn = "INSERT INTO borrow_list_logs (username,author,description,category,col_date,deadline,title,return_date)
                 	        values('$c[username]','$c[author]','$c[description]','$c[category]','$c[col_date]','$c[deadline]','$c[title]','$date_now')";
                 	        mysqli_query($db,$inn);

                 }

                 $query_select = "DELETE from borrow_list where id='$_POST[return]' limit 1 ";
                 $valid = mysqli_query($db,$query_select);
                 header("Location:index.php");

                 }

                 if(isset($_POST['add_books_db'])) {
                 	$query_select = "SELECT from books where category = '$_POST[category]',title='$_POST[title]' ";
                 	$valid = mysqli_query($db,$query_select);

                 	if($valid->num_rows > 0 ){
                 	   echo "<form action='index.php' method='POST'>
                        <button name='add_book'>Book is already Exist</button>
                        </form> ";
                        	
                 	}else{
                 		$insert="INSERT INTO books (category,title,description,status,author)
                 		        values ('$_POST[category]','$_POST[title]','$_POST[description]','Available','$_POST[author]')";
                 		        mysqli_query($db,$insert);
                 		        header("Location:index.php");
                 	}
                 }



               

?>