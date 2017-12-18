<?php
session_start();
?>

<!DOCTYPE html>
<head>
	<style>
    html{
    	margin:0px 0px 0px 0px;
    	padding: 0px 0px 0px 0px;

    }
    body{
    	margin:0px 0px 0px 0px;
    	padding: 0px 0px 0px 0px;
    }


</style>
<title>
</title>
</head>
<body>

&nbsp;&nbsp;
<select name='united' id='unit_assignment' onchange="javascript:othergroup()">
<option value='All'>All</option>
<option value='Initial'>Initial Evaluation</option>
<option value='Motu-proprio'>Motu-proprio Investigation</option>
<option value='Precharge-Inves'>Pre-charge Investigation</option>
<option value='Initial Archive'>Initial Evaluation Archive</option>
<option value='Motu-proprio Archive'>Motu-proprio Archive</option>
<option value='Precharge Archive'>Pre-charge Investigation Archive</option>

</select>
<br>

<div id="all">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ias_database";


if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
    }

$pulis_details = "SELECT * from viewThings";


$pd = $conn->query($pulis_details);


if($pd->num_rows > 0){



echo "<input type='search' name='search' style='margin-left:81%;'";
echo "placeholder='Enter keyword' />";
echo "<input type='text' name='search_value' value='all' style='display:none'>";
echo "<input type='submit' name = 'submit' value='search' /><br>";
$c=0;

echo"<table>";
    echo "<form action='../../includes/investigation_search.inc.php' method='POST' style='float:right; margin-right:20px;'>";
    echo "<input type='text' name='status' value='all' style='display:none'>";
	echo"<style>th,td{padding:7px 7px 7px 7px;} th{background-color:maroon; color:white; font-family:arial; font-size:15px;}table{margin:5px 5px 5px 5px;}</style>";
	echo"<th colspan=2 >Pulis Name</th><th>Unit</th><th colspan=2>complainant</th><th>Date of cognitance</th><th>Offense</th><th colspan=2>Investigator on case</th><th>Status</th><th>Docket No.</th><th>Action</th>";
	echo"<tr>";
	while($col1 = $pd->fetch_assoc()){
	$c++;
	echo "<td>";
	echo $col1["pulis_first"];
	echo"</td>";


    $cute1[$c]=$col1["pulis_first"];

	echo"<td>";
	echo $col1["pulis_last"];
	echo "</td>";

    echo"<td>";
	echo $col1["unit_base"];
	echo"</td>";
	
	echo "<td>";
	echo $col1["com_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["com_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["mo"]."/";
	echo $col1["da"]."/";
	echo $col1["ye"];
	echo "</td>";

	echo "<td>";
	echo $col1["offense_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["inves_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["inv_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["status_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["official_docket"];
	echo "</td>";

echo"<td>";
echo "<input type='submit' name='insert' value='$c'> &nbsp;&nbsp;";
echo "</td>";
echo"</tr>";

	}
	echo "</form>";

}
else{
	echo " 0 results";
}
echo"</table>";

$conn->close();

?>
</div>

<div id="motu" style="display:none">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ias_database";


if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
    }

$pulis_details = "SELECT * from viewThings where status_given='Motu-proprio Investigation'";


$pd = $conn->query($pulis_details);

echo"all";





if($pd->num_rows > 0){



echo "<input type='search' name='search' style='margin-left:81%;'";
echo "placeholder='Enter keyword' />";
echo "<input type='text' name='search_value' value='all' style='display:none'>";
echo "<input type='submit' name = 'submit' value='search' /><br>";
$c=0;

echo"<table>";
    echo "<form action='../../includes/investigation_search.inc.php' method='POST' style='float:right; margin-right:20px;'>";
    echo "<input type='text' name='status' value='Motu-proprio Investigation' style='display:none'>";
	echo"<style>th,td{padding:7px 7px 7px 7px;} th{background-color:maroon; color:white; font-family:arial; font-size:15px;}table{margin:5px 5px 5px 5px;}</style>";
	echo"<th colspan=2 >Pulis Name</th><th>Unit</th><th colspan=2>complainant</th><th>Date of cognitance</th><th>Offense</th><th colspan=2>Investigator on case</th><th>Status</th><th>Docket No.</th><th>Action</th>";
	echo"<tr>";
	while($col1 = $pd->fetch_assoc()){
	$c++;
	echo "<td>";
	echo $col1["pulis_first"];
	echo"</td>";


    $cute1[$c]=$col1["pulis_first"];

	echo"<td>";
	echo $col1["pulis_last"];
	echo "</td>";

    echo"<td>";
	echo $col1["unit_base"];
	echo"</td>";
	
	echo "<td>";
	echo $col1["com_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["com_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["mo"]."/";
	echo $col1["da"]."/";
	echo $col1["ye"];
	echo "</td>";

	echo "<td>";
	echo $col1["offense_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["inves_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["inv_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["status_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["official_docket"];
	echo "</td>";

echo"<td>";
echo "<input type='submit' name='insert' value='$c'> &nbsp;&nbsp;";
echo "</td>";
echo"</tr>";

	}
	echo "</form>";

}
else{
	echo " 0 results";
}
echo"</table>";

$conn->close();

?>
</div>

<div id="initial" style="display:none">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ias_database";


if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
    }

$pulis_details = "SELECT * from viewThings where status_given='Initial Evaluation'";


$pd = $conn->query($pulis_details);

echo "Initial Evaluation";

if($pd->num_rows > 0){


echo "<input type='search' name='search' style='margin-left:81%;'";
echo "placeholder='Enter keyword' />";
echo "<input type='text' name='search_value' value='all' style='display:none'>";
echo "<input type='submit' name = 'submit' value='search' /><br>";

echo "<form action='../../includes/investigation_search.inc.php' method='POST' style='float:right; margin-right:20px;'>";
echo"<table>";

	echo"<style>th,td{padding:7px 7px 7px 7px;} th{background-color:maroon; color:white; font-family:arial; font-size:15px;}table{margin:5px 5px 5px 5px;}</style>";
	echo"<th colspan=2 >Pulis Name</th><th>Unit</th><th colspan=2>complainant</th><th>Date of cognitance</th><th>Offense</th><th colspan=2>Investigator on case</th><th>Status</th><th>Docket No.</th><th>Action</th>";
	echo"<tr>";
	while($col1 = $pd->fetch_assoc()){
	echo "<td>";
	echo $col1["pulis_first"];
	echo"</td>";

	echo"<td>";
	echo $col1["pulis_last"];
	echo "</td>";

    echo"<td>";
	echo $col1["unit_base"];
	echo"</td>";
	
	echo "<td>";
	echo $col1["com_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["com_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["mo"]."/";
	echo $col1["da"]."/";
	echo $col1["ye"];
	echo "</td>";

	echo "<td>";
	echo $col1["offense_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["inves_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["inv_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["status_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["official_docket"];
	echo "</td>";

  echo"<td>";
  echo "<input type='submit' name='insert' value='Edit'> &nbsp;&nbsp;";
  echo "</td>";
  echo"</tr>";

	}

}
else{
	echo " 0 results";
}
echo"</table>";

$conn->close();

?>
</div>



<div id="inves" style="display:none">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ias_database";


if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
    }

$pulis_details = "SELECT * from viewThings where status_given='Pre-charge Investigation'";


$pd = $conn->query($pulis_details);

echo "Pre-charge Investigation";


if($pd->num_rows > 0){
echo "<form action='../../includes/investigation_search.inc.php' method='POST' style='float:right; margin-right:20px;'>";
echo "<input type='search' name='search' ";
echo "placeholder='Enter keyword' />";
echo "<input type='submit' name = 'submit' value='search' /><br>";
echo "</form>";
echo"<table>";

	echo"<style>th,td{padding:7px 7px 7px 7px;} th{background-color:maroon; color:white; font-family:arial; font-size:15px;}table{margin:5px 5px 5px 5px;}</style>";
	echo"<th colspan=2 >Pulis Name</th><th>Unit</th><th colspan=2>complainant</th><th>Date of cognitance</th><th>Offense</th><th colspan=2>Investigator on case</th><th>Status</th><th>Docket No.</th><th>Action</th>";
	echo"<tr>";
	while($col1 = $pd->fetch_assoc()){
	echo "<td>";
	echo $col1["pulis_first"];
	echo"</td>";

	echo"<td>";
	echo $col1["pulis_last"];
	echo "</td>";

    echo"<td>";
	echo $col1["unit_base"];
	echo"</td>";
	
	echo "<td>";
	echo $col1["com_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["com_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["mo"]."/";
	echo $col1["da"]."/";
	echo $col1["ye"];
	echo "</td>";

	echo "<td>";
	echo $col1["offense_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["inves_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["inv_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["status_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["official_docket"];
	echo "</td>";

  echo"<td>";
  echo "<input type='submit' name='insert' value='Edit'> &nbsp;&nbsp;";
  echo "</td>";
  echo"</tr>";

	}

}
else{
	echo " 0 results";
}
echo"</table>";

$conn->close();

?>
</div>

<div id="motu-archive" style="display:none">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ias_database";


if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
    }

$pulis_details = "SELECT * from viewThings where status_given='Motu-proprio Archive'";


$pd = $conn->query($pulis_details);

echo "Motu-proprio Archive";


if($pd->num_rows > 0){
echo "<form action='../../includes/investigation_search.inc.php' method='POST' style='float:right; margin-right:20px;'>";
echo "<input type='search' name='search' ";
echo "placeholder='Enter keyword' />";
echo "<input type='submit' name = 'submit' value='search' /><br>";
echo "</form>";
echo"<table>";

	echo"<style>th,td{padding:7px 7px 7px 7px;} th{background-color:maroon; color:white; font-family:arial; font-size:15px;}table{margin:5px 5px 5px 5px;}</style>";
	echo"<th colspan=2 >Pulis Name</th><th>Unit</th><th colspan=2>complainant</th><th>Date of cognitance</th><th>Offense</th><th colspan=2>Investigator on case</th><th>Status</th><th>Docket No.</th><th>Action</th>";
	echo"<tr>";
	while($col1 = $pd->fetch_assoc()){
	echo "<td>";
	echo $col1["pulis_first"];
	echo"</td>";

	echo"<td>";
	echo $col1["pulis_last"];
	echo "</td>";

    echo"<td>";
	echo $col1["unit_base"];
	echo"</td>";
	
	echo "<td>";
	echo $col1["com_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["com_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["mo"]."/";
	echo $col1["da"]."/";
	echo $col1["ye"];
	echo "</td>";

	echo "<td>";
	echo $col1["offense_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["inves_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["inv_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["status_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["official_docket"];
	echo "</td>";

  echo"<td>";
  echo "<input type='submit' name='insert' value='Edit'> &nbsp;&nbsp;";
  echo "</td>";
  echo"</tr>";

	}

}
else{
	echo " 0 results";
}
echo"</table>";

$conn->close();
?>
</div>

<div id="pre-archive" style="display:none">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ias_database";


if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
    }

$pulis_details = "SELECT * from viewThings where status_given='Pre-charge Investigation Archive'";


$pd = $conn->query($pulis_details);

echo "Precharge Investigation Archive";

if($pd->num_rows > 0){
echo "<form action='../../includes/investigation_search.inc.php' method='POST' style='float:right; margin-right:20px;'>";
echo "<input type='search' name='search' ";
echo "placeholder='Enter keyword' />";
echo "<input type='submit' name = 'submit' value='search' /><br>";
echo "</form>";
echo"<table>";

	echo"<style>th,td{padding:7px 7px 7px 7px;} th{background-color:maroon; color:white; font-family:arial; font-size:15px;}table{margin:5px 5px 5px 5px;}</style>";
	echo"<th colspan=2 >Pulis Name</th><th>Unit</th><th colspan=2>complainant</th><th>Date of cognitance</th><th>Offense</th><th colspan=2>Investigator on case</th><th>Status</th><th>Docket No.</th><th>Action</th>";
	echo"<tr>";
	while($col1 = $pd->fetch_assoc()){
	echo "<td>";
	echo $col1["pulis_first"];
	echo"</td>";

	echo"<td>";
	echo $col1["pulis_last"];
	echo "</td>";

    echo"<td>";
	echo $col1["unit_base"];
	echo"</td>";
	
	echo "<td>";
	echo $col1["com_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["com_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["mo"]."/";
	echo $col1["da"]."/";
	echo $col1["ye"];
	echo "</td>";

	echo "<td>";
	echo $col1["offense_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["inves_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["inv_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["status_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["official_docket"];
	echo "</td>";

  echo"<td>";
  echo "<input type='submit' name='insert' value='Edit'> &nbsp;&nbsp;";
  echo "</td>";
  echo"</tr>";

	}

}
else{
	echo " 0 results";
}
echo"</table>";

$conn->close();

?>
</div>

<div id="initial-archive" style="display:none">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ias_database";


if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
    }

$pulis_details = "SELECT * from viewThings where status_given='Initial Evaluation Archive'";


$pd = $conn->query($pulis_details);

echo "Initial Evaluation Archive";


if($pd->num_rows > 0){
echo "<form action='../../includes/investigation_search.inc.php' method='POST' style='float:right; margin-right:20px;'>";
echo "<input type='search' name='search' ";
echo "placeholder='Enter keyword' />";
echo "<input type='submit' name = 'submit' value='search' /><br>";
echo "</form>";
echo"<table>";

	echo"<style>th,td{padding:7px 7px 7px 7px;} th{background-color:maroon; color:white; font-family:arial; font-size:15px;}table{margin:5px 5px 5px 5px;}</style>";
	echo"<th colspan=2 >Pulis Name</th><th>Unit</th><th colspan=2>complainant</th><th>Date of cognitance</th><th>Offense</th><th colspan=2>Investigator on case</th><th>Status</th><th>Docket No.</th><th>Action</th>";
	echo"<tr>";
	while($col1 = $pd->fetch_assoc()){
	echo "<td>";
	echo $col1["pulis_first"];
	echo"</td>";

	echo"<td>";
	echo $col1["pulis_last"];
	echo "</td>";

    echo"<td>";
	echo $col1["unit_base"];
	echo"</td>";
	
	echo "<td>";
	echo $col1["com_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["com_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["mo"]."/";
	echo $col1["da"]."/";
	echo $col1["ye"];
	echo "</td>";

	echo "<td>";
	echo $col1["offense_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["inves_first"];
	echo "</td>";
	echo "<td>";
	echo $col1["inv_last"];
	echo "</td>";

	echo "<td>";
	echo $col1["status_given"];
	echo "</td>";

	echo "<td>";
	echo $col1["official_docket"];
	echo "</td>";

  echo"<td>";
  echo "<input type='submit' name='insert' value='Edit'> &nbsp;&nbsp;";
  echo "</td>";
  echo"</tr>";

	}

}
else{
	echo " 0 results";
}
echo"</table>";

$conn->close();

?>
</div>
</body>
</html>


<script type="text/javascript">
function othergroup(){
       if(document.getElementById('unit_assignment').value=='All'){
        document.getElementById('all').style.display='block';
        document.getElementById('motu').style.display='none';
        document.getElementById('initial').style.display='none';
        document.getElementById('inves').style.display='none';
        document.getElementById('motu-archive').style.display='none';
        document.getElementById('pre-archive').style.display='none';
        document.getElementById('initial-archive').style.display='none';

      }
      else if(document.getElementById('unit_assignment').value=='Motu-proprio'){
      	document.getElementById('motu').style.display='block';

      	document.getElementById('all').style.display='none';
        document.getElementById('initial').style.display='none';
        document.getElementById('inves').style.display='none';
        document.getElementById('motu-archive').style.display='none';
        document.getElementById('pre-archive').style.display='none';
        document.getElementById('initial-archive').style.display='none';

      }
       else if(document.getElementById('unit_assignment').value=='Initial'){
       document.getElementById('initial').style.display='block';

        document.getElementById('motu').style.display='none';
        document.getElementById('all').style.display='none';
        document.getElementById('inves').style.display='none';
        document.getElementById('motu-archive').style.display='none';
        document.getElementById('pre-archive').style.display='none';
        document.getElementById('initial-archive').style.display='none';

      }
       else if(document.getElementById('unit_assignment').value=='Precharge-Inves'){
       document.getElementById('inves').style.display='block';

        document.getElementById('motu').style.display='none';
        document.getElementById('initial').style.display='none';
        document.getElementById('all').style.display='none';
        document.getElementById('motu-archive').style.display='none';
        document.getElementById('pre-archive').style.display='none';
        document.getElementById('initial-archive').style.display='none';

      }
       else if(document.getElementById('unit_assignment').value=='Motu-proprio Archive'){
      	document.getElementById('motu-archive').style.display='block';
      	document.getElementById('motu').style.display='none';
        document.getElementById('initial').style.display='none';
        document.getElementById('inves').style.display='none';
        document.getElementById('all').style.display='none';
        document.getElementById('pre-archive').style.display='none';
        document.getElementById('initial-archive').style.display='none';
      }
       else if(document.getElementById('unit_assignment').value=='Precharge Archive'){
       document.getElementById('pre-archive').style.display='block';

        document.getElementById('motu').style.display='none';
        document.getElementById('initial').style.display='none';
        document.getElementById('inves').style.display='none';
        document.getElementById('motu-archive').style.display='none';
        document.getElementById('all').style.display='none';
        document.getElementById('initial-archive').style.display='none';

      }
      else if(document.getElementById('unit_assignment').value=='Initial Archive'){
      	document.getElementById('initial-archive').style.display='block';

      	document.getElementById('motu').style.display='none';
        document.getElementById('initial').style.display='none';
        document.getElementById('inves').style.display='none';
        document.getElementById('motu-archive').style.display='none';
        document.getElementById('pre-archive').style.display='none';
        document.getElementById('all').style.display='none';
      }
       
}
</script>