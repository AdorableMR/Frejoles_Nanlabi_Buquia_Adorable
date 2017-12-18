<?php
session_start();
?>
<?php

include_once 'dbh.inc.php';
?>

<! DOCTYPE html>

      <html>
        
            <div class ="main_container">
        
               <head>
                <link href="../../css/home_layout.css" type="text/css" rel="stylesheet">
                <link href="../../../css/holder.css" type="text/css" rel="stylesheet">
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

              
              <title></title>

   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-dialog"> <div class="modal-content">
     <div class="modal-header"> 
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
       <h4 class="modal-title" id="myModalLabel"> This Modal title </h4> 
       </div>
        <div class="modal-body"> Press ESC button to exit. 
          </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close </button>
             <button type="button" name='submit' class="btn btn-primary" > Submit changes </button>
              </div>
               </div>
               <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                 </div><!-- /.modal -->

                 <script> $(function () { $('#myModal').modal({ keyboard: true })}); </script>
</head>
<body>
<?php

  if(isset($_POST['submit'])){
  $fn=mysqli_real_escape_string($conn,$_POST['first_name']);
  $ln=mysqli_real_escape_string($conn,$_POST['last_name']);
  $un=mysqli_real_escape_string($conn,$_POST['united']);
  $deli=mysqli_real_escape_string($conn,$_POST['del']);
  $da=mysqli_real_escape_string($conn,$_POST['day']);
  $mo=mysqli_real_escape_string($conn,$_POST['month']);
  $ye=mysqli_real_escape_string($conn,$_POST['year']);

  

if($deli=='1'){
  $value_given=3;
  $description="VIOLATION OF TAMANG BIHIS";

}
else if($deli=='2'){
  $value_given=3;
  $description="Unuthorized or improper wearing of uniforms; insignias and accoutrements";

}
else if($deli=='3'){
  $value_given=3;
  $description="Unauthorized/Improper haircut;";
}
else if($deli=='4'){
  $value_given=3;
  $description="Dirty shoes/Unauthorized Shoes";
}
else if($deli=='5'){
  $value_given=3;
  $description="Dirty uniform/Wearing of faded/tacked out athletic uniform/Wearing a colored rubber shoes";
  
}
 else if($deli=='6'){
  $value_given=3;
  $description="Unshaved mustache/Improper Shaving";
}
else if($deli=='7'){
  $value_given=3;
  $description="Improper haircut/Colored nail polish/long and dirty finger nails;";
  
}
else if($deli=='8'){
  $value_given=3;
  $description="Not wearing hairnets/Inconspicously pinned or fastened or hair should not touch the collar;";
  
}
else if($deli=='9'){
  $value_given=3;
  $description="Standing on one leg during formations";
}
else if($deli=='10'){
  $value_given=3;
  $description="No hanky/tickler/Miranda warning card (as required during inspection);";
  
}
else if($deli=='11'){
  $value_given=3;
  $description="No IP Card";
}
else if($deli=='12'){
  $value_given=3;
  $description="Other similar/analogous minor infractions committed";
  
}
else if($deli=='13'){
  $value_given=5;
  $description="Tadiness in reporting for duty/office work.";
}
else if($deli=='14'){
  $value_given=5;
  $description="Tardiness in reporting to command activities";
  
}
else if($deli=='15'){
  $value_given=5;
  $description="Smoking in places not designated as SMOKING AREA";
}
else if($deli=='16'){
  $value_given=5;
  $description="Violation of traffic, pedestrian and parking regulations within the camp.";
}
else if($deli=='17'){
  $value_given=7;
  $description="Use of vulgar or insulting languages or exhibit similar rudeness to the public";
}
else if($deli=='18'){
  $value_given=7;
  $description="Spitting or littering in public areas";
}
else if($deli=='19'){
  $value_given=10;
  $description="Urinating in places other than the designated areas(restroom,public urinating area)";
}
else if($deli=='20'){
  $value_given=15;
  $description="Leaving post for more than five minutes.";
}
else if($deli=='21'){
  $value_given=10;
  $description="Dozing in post";
}
else if($deli=='22'){
  $value_given=10;
  $description="Failure to initiate actions on complaint/failure to prepare/submit police reports.";
}
else if($deli=='23'){
  $value_given=20;
  $description="Absent in formation and or any command activities.";
}
else if($deli=='24'){
  $value_given=10;
  $description="Not observing courtesy to officers/senior officers inside and outside the office";
}
else if($deli=='25'){
  $value_given=10;
  $description="Loafing.";
}
else if($deli=='26'){
  $value_given=5;
  $description="Other similar minor infractions.";
}/*
else if($deli=='27'){
  $value_given=5;
  $description="*violation during troop formation/parade";
}*/
else if($deli=='28'){
  $value_given=5;
  $description="Moving in ranks";
}
else if($deli=='29'){
  $value_given=5;
  $description="Speaking while in formation";
  
}
else if($deli=='30'){
  $value_given=5;
  $description="Use of cellular phones while in formation";
}
else if($deli=='31'){
 $value_given=5;
 $description="Walking or roaming around while program is ongoing"; 
}
else if($deli=='32'){
  $value_given=5;
  $description="Other violation during troop formation/parade";
}
else{
  exit();
}


 $select = "SELECT *from deliquency_report where first='$fn' && last='$ln' && unit='$un';";
  $select_result= mysqli_query($conn, $select);
  $resultCheck= mysqli_num_rows($select_result);

      if($resultCheck<1){

            $one=date("m-d-Y") ;

            $g="$ye-$mo-$da";
            $date = new DateTime($g);
            $date->add(new DateInterval('P1M'));
            $rr= $date->format('m-d-Y');
            $go=$rr;

            $vv="<tr><td>$mo/$da/ $ye </td><td> $description </td><td>$value_given </td></tr>";

            $sql4="INSERT INTO deliquency_report (first,last,unit,counter,report_text,start_date,alert_date,entered_date_day,entered_date_month,entered_date_year)
            VALUES
            ('$fn','$ln','$un','$value_given','$vv','$one','$rr','$da','$mo','$ye')";
             mysqli_query($conn,$sql4);

            /* $update_logs= "INSERT INTO record_logs_insert (first_p,last,unit,id,action_p,changeon_p) 
             values ('$fn','$ln','$un','$_POST['user_name']','INSERT','Now()')";
             mysqli_query($conn,$update_logs);
             */
             header("Location: ../html/iframe_ins/insert.php");
            exit();
        }else{

         $row=mysqli_fetch_assoc($select_result);
         $cow=$row['counter'];
         $risk = $cow+$value_given;
         $fff = $row['first'];
         $lll = $row['last'];
         $unnn= $row['unit'];
         $cow2=$row['report_text'];
         $risk2= $cow2."<tr><td>".$mo."/".$da."/".$ye.'</td><td>'.$description.'</td>'."<td>$value_given </td></tr>";

          $update ="UPDATE deliquency_report set counter='$risk',report_text='$risk2' where first='$fff' && last='$lll' && unit='$unnn';";
          mysqli_query($conn,$update);
          header("Location: ../html/iframe_ins/insert.php");
         exit();
        }

}
?>

</body>
</html>