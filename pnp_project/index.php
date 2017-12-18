<?php
session_start();
/*$one=date('n-j-Y');
echo $one;
*/
if(isset($_SESSION['user_name']) || isset($_SESSION['user_admin'])){
  echo"you are already log-in ";
  header("Location= ../index.php?please-login");
  exit();
}

?>


<!DOCTYPE html>
<html>
     <head>

   <link href = "css/login_layout.css" type = "text/css" rel = "stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
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

#main{
	
	  animation: fadeIn ease 5s;
     -webkit-animation: fadeIn ease 5s;
     -moz-animation: fadeIn ease 5s;
     -o-animation: fadeIn ease 5s;
     -ms-animation: fadeIn ease 5s;
}

</style>


<script type="text/javascript">
window.addEventListener("load",function(){
  var loader = document.getElementById("loader");
  document.body.removeChild(loader);

});
</script>

<!--
<script type="text/javascript">
window.addEventListener("load",function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);
});
</script>

<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
    
    --> </head>
  
     
           <body>
   <div id="loader"></div>

   <!--<div id="load_screen"><div id="loader"></div></div>-->


	         <div id = "main">

	    
	         <div id = "header">
	    
	           <img src = "images/pnp-png2.png" width = "90%" height = "100%">
	    
	          </div>
	    
	            	<div id = "inner-body">
	    
	            		<fieldset>
	    
	            			<legend>Login</legend>
	    

	            			<form action="includes/login.inc.php" method="POST">
	            		
	            				<label>UserName</label><br><input type="text"  class="form-control"  name="username" required="required"/><br><br>
	    
	            				<label>Password</label><br><input type="password"  class="form-control" name="password" required="required"/></label><br>
	    
	            				<button value="login" style="margin-left:65%;" class="btn btn-default btn-lg" name='submit'><p class="glyphicon glyphicon-log-in"></p> Login </button><br>
	    
	            			</form>
        
                    	</fieldset>
	    
	            	</div>

	             <p class="login-need" style="visibility:hidden;">register</a><br><br><br>

	            <div id = "footer">
	    
	            <p><b>&copy; IAS 2017</b></p>
	    
	            <br>
	    
	            </div>
	    
	        </body>


        <div>

</html> 


