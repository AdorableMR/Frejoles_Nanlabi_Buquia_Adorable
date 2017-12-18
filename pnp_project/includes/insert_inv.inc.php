<?php
session_start();
?>


<?php

include_once 'dbh.inc.php';




if(isset($_POST['submit'])){
	$fn=mysqli_real_escape_string($conn,$_POST['first_name']);
	$ln=mysqli_real_escape_string($conn,$_POST['last_name']);
	$un=mysqli_real_escape_string($conn,$_POST['united']);
  $cfn=mysqli_real_escape_string($conn,$_POST['com_Fname']);
	$cln=mysqli_real_escape_string($conn,$_POST['com_Lname']);
	$da=mysqli_real_escape_string($conn,$_POST['day']);
	$mo=mysqli_real_escape_string($conn,$_POST['month']);
	$ye=mysqli_real_escape_string($conn,$_POST['year']);
	$of=mysqli_real_escape_string($conn,$_POST['offense']);
	$do=mysqli_real_escape_string($conn,$_POST['docket']);
	$ifn=mysqli_real_escape_string($conn,$_POST['inv_Fname']);
	$iln=mysqli_real_escape_string($conn,$_POST['inv_Lname']);
  $ra=mysqli_real_escape_string($conn,$_POST['val']);
  $invs=mysqli_real_escape_string($conn,$_POST['related']);



  $test_docket = "SELECT * from viewthings where official_docket = '$do'";
   $one_day = $conn->query($test_docket);

?>


<?php
  if($one_day->num_rows > 0){
    ?>

                                <br><br><br>
                                <center>
                                <div class='alert alert-error' style='width:20%'>
                                <h2>Invalid ! </h2><strong>Docket Number already Exist</strong>
                                </div></center>'
                                <form action='../html/iframe_inv/insert.php' method='POST'>
                                <center><button class='form-control' style='width:20%'>Okay</button></center>
                                </form>
  
    <?php
        
    exit();
  }
  ?>

  <?php

if($un==13){
  $un=mysqli_real_escape_string($conn,$_POST['unit']);
}

$initial="Initial Evaluation";

$m=date("m") ;
$d=date("d") ;
$y=date("Y") ;


if($ra==$initial){


        $g7="$y-$m-$d";
        $date7 = new DateTime($g7);
        $date7->add(new DateInterval('P4D'));
        $mm7= $date7->format('m-d-Y');

$hy="$mo-$da-$ye";

          $line = "INSERT INTO deadline (mo,da,ye,docket)
                  VALUES
                  ('$m','$d','$y','$do');";
                  mysqli_query($conn,$line);

$cc="INSERT INTO c (status,docket,date)
      values('$ra','$do','$hy');";
      mysqli_query($conn,$cc);
                  

$pulis_record = "INSERT INTO pulis_record (first,last,unit,docket_no)
                  VALUES
                  ('$fn','$ln','$un','$do');";
                  mysqli_query($conn,$pulis_record);

$complainant_record = "INSERT INTO complainant_record(first,last,docket_no)
                        VALUES('$cfn','$cln','$do');";
                        mysqli_query($conn,$complainant_record);

$calendar= "INSERT INTO calendar(month,day,year,docket_no)
                       VALUES('$mo','$da','$ye','$do');";
                       mysqli_query($conn,$calendar);

$offen= "INSERT INTO offense (offense,docket_no)
                       VALUES('$of','$do');";
                       mysqli_query($conn,$offen);

$investigator_record = "INSERT INTO investigator_record(first,last,docket_no)
                        VALUES('$ifn','$iln','$do');";
                    
                        mysqli_query($conn,$investigator_record);     

if($invs==""){

 $invs="none";

$sta="INSERT INTO begin (status,description,docket)
          VALUES('$ra','$invs','$do');";
          mysqli_query($conn,$sta);

}else{
$sta="INSERT INTO begin (status,description,docket)
          VALUES('$ra','$invs','$do');";
          mysqli_query($conn,$sta);
}


          $conn -> close();
          header("Location: ../html/iframe_inv/insert.php");
          exit();


}else{
 

$g="$ye-$mo-$da";
$date = new DateTime($g);
$date->add(new DateInterval('P4D'));
$rr= $date->format('m-d-Y');




$line = "INSERT INTO deadline (mo,da,ye,docket)
                  VALUES
                  ('$m','$d','$y','$do');";
                  mysqli_query($conn,$line);



$pulis_record = "INSERT INTO pulis_record (first,last,unit,docket_no)
                  VALUES
                  ('$fn','$ln','$un','$do');";
                  mysqli_query($conn,$pulis_record);

$complainant_record = "INSERT INTO complainant_record(first,last,docket_no)
                        VALUES('$cfn','$cln','$do');";
                        mysqli_query($conn,$complainant_record);

$calendar= "INSERT INTO calendar(month,day,year,docket_no)
                       VALUES('$mo','$da','$ye','$do');";
                       mysqli_query($conn,$calendar);

$offen= "INSERT INTO offense (offense,docket_no)
                       VALUES('$of','$do');";
                       mysqli_query($conn,$offen);

$investigator_record = "INSERT INTO investigator_record(first,last,docket_no)
                        VALUES('$ifn','$iln','$do');";
                        mysqli_query($conn,$investigator_record);     



$your="INSERT INTO first_phase(status_first,description,docket)
          VALUES('$ra','$invs','$do');";
          mysqli_query($conn,$your);




$cc="INSERT INTO c (status,docket,date)
      values('$ra','$do','$rr');";
      mysqli_query($conn,$cc);


          $relate = "INSERT INTO motu_related(docket,related)
          VALUES('$do','$invs');";
           mysqli_query($conn,$relate);

          header("Location: ../html/iframe_inv/insert.php");
          exit();





   }

  }

    ?>