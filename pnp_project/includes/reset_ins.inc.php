<?php
session_start();

if(!isset($_SESSION['user_name'])){
  
  echo"please log-in";
  
  header("Location= ../index.php?please-login");
  
  exit();
}

?>


<?php

include_once 'dbh.inc.php';


   if(isset($_POST['insert'])){


          $holder = $_POST['insert'];

          $current=date("m-d-Y") ;
  

          $pulis = "SELECT * from deliquency_report where alert_date='$current' ";

          mysqli_query($conn,$pulis);
  
          $pd = $conn->query($pulis);

           if($pd->num_rows>0){
                   
                   $c=0;
                  
                  while ($col1=$pd->fetch_assoc()) {
          
                         $c++;

          
                         if($c==$holder){
         
            
                                      $reset = "DELETE from deliquency_report where alert_date='$current' and first='$col1[first]' and last='$col1[last]' and unit='$col1[unit]' ";

                                      mysqli_query($conn,$reset);


                                      $reset1oo = "INSERT into deliquency_reset_record (first,last,unit,mo,da,ye,total)
                                      values ('$col1[first]','$col1[last]','$col1[unit]','$col1[entered_date_month]','$col1[entered_date_day]','$col1[entered_date_year]','$col1[counter]');";
                                      mysqli_query($conn,$reset1oo);


                                      header("Location: deadline.inc.php");

                                      exit();
           
                          }
      
                  }

          }

   }



    if(isset($_POST['delete_all'])){


          $current=date("m-d-Y") ;
            
          $reset = "DELETE from deliquency_report where alert_date='$current' ";
         
          mysqli_query($conn,$reset);

          $reset1oo = "INSERT into deliquency_reset_record (first,last,unit,mo,da,ye,demirets,total)
          values ('$col1[first]','$col1[last]','$col1[unit]','$col1[entered_date_month]','$col1[entered_date_day]','$col1[entered_date_year]','$col1[report_text]','$col1[counter]');";
          mysqli_query($conn,$reset1oo);


          header("Location: deadline.inc.php");
                                     
          exit();
                

   }

 

$conn->close();

?>
