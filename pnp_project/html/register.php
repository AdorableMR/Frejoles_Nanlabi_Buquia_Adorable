<?php
session_start();

if(isset($_SESSION['user_name'])){
  echo"you are currently log-in";
  header("Location= ../index.php?please-login");
  exit();
}
?>
<!DOCTYPE html>
<html>
     <head>
	     <title>
	     </title>
	          <link href = "../css/register_layout.css" type = "text/css" rel = "stylesheet"> 
     </head>
  
       <div id = "main">
     
           <body>
	       
	         <div id = "header">
	           <img src = "../images/pnp-png2.png" width = "90%" height = "100%">
	           </div>
	      
	            <div id = "inner-body">
	            	    <fieldset>
	            	    	<legend>Register</legend>
	            	      &nbsp;
	            		<form class="register" action="../includes/register.inc.php" method="POST">
	            		
	            		<label>UserName</label><input type="text" name="username" required="required"/><br><br>
	            		<label>Secret-Key<input type="password" name="key" required="required"/></label><br><br>
	            		<label>Create Password<input type="password" name="password" required="required"/></label><br><br>
	            		<label>Confirm-Password<input type="password" name="confirm" required="required"/></label><br>
	            		<center style="margin-left:50%;"><button type="submit" name="submit">submit</button><br></center>
	            	    </form>
	            	    </fieldset>

                    
	      
	            </div>
	        
	         <div id = "footer">
	            <p><b>&copy; IAS 2017</b></p>
	            <br>
	            </div>
	         </body>


        <div>

</html> 