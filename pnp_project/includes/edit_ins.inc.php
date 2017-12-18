    <?php
session_start();

if(!isset($_SESSION['user_name'])){
 
  echo"please log-in";
 
  header("Location= ../index.php?please-login");
 
  exit();
}

?>


<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
   html{
    margin-left: 10px;
   }

  </style>

  </head>
 <body>

<?php
include_once 'dbh.inc.php';


if(isset($_POST['insert'])){

$number=$_POST['insert'];

if($number>0){


$pulis_details = "SELECT * from deliquency_report";
$pd = $conn->query($pulis_details);

$c=0;

while($convey=$pd->fetch_assoc()){
     $c++;
    if($c==$number){

    echo"<form action='edit_ins_inner.inc.php' method='POST'>";
    
    echo "<label for='email' style='padding-left:5px;'>Police Record</label> <br><br>";
    
    echo"<input type='text' name='or_f' value='$convey[first]' style='display:none;'>";

    echo"<input type='text' name='or_l' value='$convey[last]' style='display:none;'>";
    
    echo"<input type='text' name='or_un' value='$convey[unit]' style='display:none;'>";
    
    echo"<input type='text' name='or_no_de' value='$convey[counter]' style='display:none;'>";
    
    echo"<input type='text' name='or_de' value='$convey[report_text]' style='display:none;'>";
    
    echo"<input type='text' name='entered_date_day' value='$convey[entered_date_day]' style='display:none;'>";
    
    echo"<input type='text' name='entered_date_month='$convey[entered_date_month]' style='display:none;'>";
    
    echo"<input type='text' name='entered_date_year='$convey[entered_date_year]' style='display:none;'>";


    
    echo"&nbsp;&nbsp;<b>First Name:</b> ";

    echo"<input type='text' name='fi' class='btn btn-default' value='$convey[first]' required='required'>"."&nbsp;&nbsp;";
    
    echo"&nbsp;&nbsp;<b>Last Name:</b> ";
    
    echo"<input type='text' class='btn btn-default' name='la' value='$convey[last]'required='required'>"."<br><br>";
    
    echo"&nbsp;&nbsp;<b>Unit :</b> ";
    
    echo"<input type='text' class='btn btn-default' name='un' value='$convey[unit]' required='required'>"."<br><br>";
    
    echo"&nbsp;&nbsp;<b> Total Number of Demirets : ";
    
    echo"<input type='text' class='btn btn-default' name='no_de' value='$convey[counter]' required='required'>"."<br><br>";

  
  
?>

<table class='table table-striped table-hover'>
<th>Date of Cognitance</th><th>Infractions</th><th>Demiret Value</th>
<?php echo "$convey[report_text]"; ?>
</table>
<?php



                       echo"&nbsp;&nbsp;DATE :  Month : ";
                       echo"<select name='month' id='monthddl'>";

                       echo"<option value='$convey[entered_date_month]'>$convey[entered_date_month]</option>";
                        
                        for($bn=1;$bn<13;$bn++){
                             if($convey['entered_date_month']==$bn){
         
                             }
                             else{
                                echo "<option value='$bn'>$bn</option>";
                             }
                        }
                        
                        echo"</select>";



                       echo "Day";
                       echo"<select name='day' id='dayddl'>";

                       echo"<option value='$convey[entered_date_day]'>$convey[entered_date_day]</option>";
                        
                        for($b=1;$b<32;$b++){
                             if($convey['entered_date_day']==$b){
         
                             }
                             else{
                                echo "<option value='$b'>$b</option>";
                             }
                        }
                        
                        echo"</select>";


                        echo "&nbsp;&nbsp;Year";
                        echo "<select name='year' id='blah'>";
                         
                         echo "<option value='$convey[entered_date_year]'>$convey[entered_date_year]</option>";
                         
                        $year=date('Y');
                        for($c=$year;$c>=1970;$c--){

                            if($convey['entered_date_year']==$c){

                              }
                              else{
                                echo "<option value='$c'>$c</option>";
                             }
                        }
                         
                        echo "</select>";    

    
    echo"<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo"<input type='submit' class='btn btn-default' name='update' value='update' style='margin-left:5%;'>";
    echo "<input type='submit' class='btn btn-default' name='cancel' value='go back without changing' style='margin-left:5%;'> </form>";
       
          }
       
       }
   
   }
}


else if (isset($_POST['edit'])){

$pulis_details = "SELECT * from deliquency_report";
$pd = $conn->query($pulis_details);

$c=0;

while($convey=$pd->fetch_assoc()){
    
    if($_COOKIE['f']==$convey['first'] && $_COOKIE['l']==$convey['last'] && $_COOKIE['u']==$convey['unit']){

    echo"<form action='edit_ins_inner.inc.php' method='POST'>";
    
    echo "&nbsp;&nbsp;<b><h3>Police Record</h3></b><br><br>";
    
    echo"<input type='text' name='or_f' value='$convey[first]' style='display:none;'>";

    echo"<input type='text' name='or_l' value='$convey[last]' style='display:none;'>";
    
    echo"<input type='text' name='or_un' value='$convey[unit]' style='display:none;'>";
    
    echo"<input type='text' name='or_no_de' value='$convey[counter]' style='display:none;'>";
    
    echo"<input type='text' name='or_de' value='$convey[report_text]' style='display:none;'>";
    
    echo"<input type='text' name='entered_date_day' value='$convey[entered_date_day]' style='display:none;'>";
    
    echo"<input type='text' name='entered_date_month='$convey[entered_date_month]' style='display:none;'>";
    
    echo"<input type='text' name='entered_date_year='$convey[entered_date_year]' style='display:none;'>";


    
    echo"&nbsp;&nbsp;<b>First :</b> ";

    echo"<input type='text' class='btn btn-default' name='fi' value='$convey[first]' required='required'>"."&nbsp;&nbsp;";
    
    echo"&nbsp;&nbsp;<b>Last :</b> ";
    
    echo"<input type='text' class='btn btn-default' name='la' value='$convey[last]'required='required'>"."<br><br>";
    
    echo"&nbsp;&nbsp;<b>Unit :</b> ";
    
    echo"<input type='text'  class='btn btn-default' name='un' value='$convey[unit]' required='required'>"."<br><br>";
    
    echo"&nbsp;&nbsp;<b>Total number of Demirets : </b>";
    
    echo"<input type='text'  class='btn btn-default' name='no_de' value='$convey[counter]' required='required'>"."<br><br>";

    
    
?>
<table class='table table-striped table-hover'>
<th>Date of Cognitance</th><th>Infractions</th><th>Demerit Value</th>
<?php echo "$convey[report_text]"; ?>
</table>
<?php
                       echo"&nbsp;&nbsp;DATE :  Month : ";
                       echo"<select name='month' id='monthddl'>";

                       echo"<option value='$convey[entered_date_month]'>$convey[entered_date_month]</option>";
                        
                        for($bn=1;$bn<13;$bn++){
                             if($convey['entered_date_month']==$bn){
         
                             }
                             else{
                                echo "<option value='$bn'>$bn</option>";
                             }
                        }
                        
                        echo"</select>";




                         echo "Day";
                       echo"<select name='day' id='dayddl'>";

                       echo"<option value='$convey[entered_date_day]'>$convey[entered_date_day]</option>";
                        
                        for($b=1;$b<32;$b++){
                          if($convey['entered_date_day']==$b){

                          }else{
                                echo "<option value='$b'>$b</option>";
                             }
                        }
                        
                        echo"</select>";


                        echo "&nbsp;&nbsp;Year";
                        echo "<select name='year' id='blah'>";
                         
                        $year=date('Y');

                         echo "<option value='$convey[entered_date_year]'>$convey[entered_date_year]</option>";

                        for($c=$year;$c>=1970;$c--){

                          if($convey['entered_date_year']==$c){

                          }else{
                                echo "<option value='$c'>$c</option>";
                             }
                        }
                         
                        echo "</select>";             
    
    echo"<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;<input type='submit' class='btn btn-default' name='update' value='update' style='margin-left:13%;'>";
    echo "</form>";
          }
        
        }

    }




$conn->close();
?>

</body>
</html>