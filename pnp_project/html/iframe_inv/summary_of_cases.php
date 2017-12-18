<?php
session_start();

if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
?>
<!DOCTYPE html>
<head>
<title>
</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">

  th,td{
  	padding: 20px;
  }
  </style>

</head>
<body>
	<table>
		<tr>
			<td>

	<form action="summary_inner_frame.php" method="POST">
      
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 Start MONTH :
<select name='month' id='monthddl'>
<option value='01'>Jan</option>
<option value='02'>Feb</option>
<option value='03'>Mar</option>
<option value='04'>Apr</option>
<option value='05'>May</option>
<option value='06'>Jun</option>
<option value='07'>Jul</option>
<option value='08'>Aug</option>
<option value='09'>Sep</option>
<option value='10'>Oct</option>
<option value='11'>Nov</option>
<option value='12'>Dec</option>
</select>




&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

End Date :
<select name='month2' id='monthddl2'>
<option value='01'>Jan</option>
<option value='02'>Feb</option>
<option value='03'>Mar</option>
<option value='04'>Apr</option>
<option value='05'>May</option>
<option value='06'>Jun</option>
<option value='07'>Jul</option>
<option value='08'>Aug</option>
<option value='09'>Sep</option>
<option value='10'>Oct</option>
<option value='11'>Nov</option>
<option value='12'>Dec</option>
</select>
<?php

                       echo "Day";
                       echo"<select name='day2' id='dayddl'>";
                        
                        for($b=1;$b<32;$b++){
                                echo "<option value='$b'>$b</option>";
                             
                        }
                        
                        echo"</select>";


                        echo "&nbsp;&nbsp;Year";
                        echo "<select name='year2' id='blah'>";
                         
                        $year=date('Y');
                        for($c=$year;$c>1970;$c--){
                                echo "<option value='$c'>$c</option>";
                             
                        }
                        ?>
</select>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button class='btn btn-default'  target="if" name='summary' style="margin-left:3%;">Calculate</button>

</form>

<!--
    </td>
	<td>

<br>
<b>Valid Quarter Months</b>
<table border=1>
<th>Start Month</th><th>End Month</th>
<tr>
	 <td>
	 	January
	 </td>
	 <td>
	 	September
	 </td>

</tr>

<tr>
	<td>
		February
	</td>
	<td>
		October
	</td>

</tr>
<tr>
	<td>
		March
	</td>
	<td>
		November
	</td>

</tr>
<tr>
	<td>
		April
	</td>
	 <td>
	 	December
	</td>

</tr>
<tr>
	<td>
		May
	</td>
	<td>
		January
	</td>

</tr>



<table>

<td>
	</tr>
	</table>
-->
</body>
</html>

