<?php
session_start();

if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}
echo"<link href='../css/css/bootstrap.min.css' rel='stylesheet'>";
?>
<?php

include_once 'dbh.inc.php';

if(isset($_POST['Edit'])){

$official=$_POST['docket'];//newly entered docket

$official_docket=$_POST['official_docket'];//old_docket

$status_given=$_POST['status_given'];

     if($official != $official_docket){
                    $test_docket = "SELECT * from viewthings where official_docket = '$official'";
                    $one_day = $conn->query($test_docket);
                
                if($one_day->num_rows > 0){



     ?>

                                <br><br><br>
                                <center>
                                <div class='alert alert-error' style='width:20%'>
                                <h2>Invalid ! </h2><strong>Docket Number already Exist</strong>
                                </div></center>
                                 <?php
                                    if($status_given=="Motu-proprio Investigation"){
                                    echo "<form action='../html/iframe_inv/motu-propio-inves_search.php' method='POST'>";
                                    }else if($status_given=="Initial Evaluation"){
                                     echo "<form action='../html/iframe_inv/initial_inves.php' method='POST'>";
                                    }else if($status_given=="Pre-charge Investigation"){
                                      echo "<form action='../html/iframe_inv/pre-charge-inves_search.php' method='POST'>";
                                    }

                                 ?>
                                
                                <center><button class='form-control' style='width:20%'>Okay</button></center>
                                </form>

       <?php 
                       exit();
                  }

          }


$pulis_first=$_POST['pulis_first'];

$pulis_last=$_POST['pulis_last'];

$com_first=$_POST['com_first'];

$com_last=$_POST['com_last'];

$unit_base=$_POST['unit_base'];

$day=$_POST['day'];

$month=$_POST['month'];

$year=$_POST['year'];

$offense_given=$_POST['offense_given'];

$inves_last=$_POST['inves_last'];

$inves_first=$_POST['inves_first'];

$pulis_f=$_POST['first'];

$pulis_l=$_POST['last'];

$com_f=$_POST['c_first'];

$com_l=$_POST['c_last'];

$unit=$_POST['unit'];


$offense=$_POST['offense'];

$inves_l=$_POST['i_last'];

$inves_f=$_POST['i_first'];




$pulis = "UPDATE pulis_record SET last='$pulis_l',first='$pulis_f',unit='$unit',docket_no='$official' where docket_no='$official_docket'";
    mysqli_query($conn,$pulis);

$cs = "UPDATE deadline SET docket='$official' where docket='$official_docket'";
      mysqli_query($conn,$cs);



$complainant = "UPDATE complainant_record SET last='$com_l',first='$com_f',docket_no='$official' where docket_no='$official_docket'";
       mysqli_query($conn,$complainant);

$calendar = "UPDATE calendar SET docket_no='$official' where docket_no='$official_docket'";
      mysqli_query($conn,$calendar);

$offense = "UPDATE offense SET offense='$offense',docket_no='$official' where docket_no='$official_docket'";
     mysqli_query($conn,$offense);

$c = "UPDATE c SET docket='$official' where docket='$official_docket'";
      mysqli_query($conn,$c);

$investigator = "UPDATE investigator_record SET last='$inves_l',first='$inves_f',docket_no='$official' where docket_no='$official_docket'";
    mysqli_query($conn,$investigator);

$sta = "UPDATE status SET docket_no='$official' where docket_no='$official_docket'";
  mysqli_query($conn,$sta);

  if($status_given=='Motu-proprio Investigation'){
     
     $cy = "UPDATE motu_related SET docket='$official' where docket='$official_docket'";
      mysqli_query($conn,$cy);

  header("Location: ../html/iframe_inv/motu-propio-inves_search.php");
  exit();
  }
  else if($status_given=='Initial Evaluation'){

  header("Location: ../html/iframe_inv/initial_inves.php");
  exit();

  }
  else if($status_given=='Pre-charge Investigation'){
  header("Location: ../html/iframe_inv/pre-charge-inves_search.php");
  exit();

  }
  

}
else{
	echo "error";
}


$conn->close();
?>