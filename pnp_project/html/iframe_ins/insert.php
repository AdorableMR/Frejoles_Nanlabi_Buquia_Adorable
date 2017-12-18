<?php
session_start();

if(!isset($_SESSION['user_name'])){
  echo"please log-in";
  header("Location= ../index.php?please-login");
  exit();
}

echo"<link href='../../css/css/bootstrap.min.css' rel='stylesheet'>";

?>



<!DOCTYPE html>
<head>
<title>
</title>
<style type="text/css">
html{
  width: 80%;
}
</style>
</head>
<body>

         
		<div class ="field_insert">
		<fieldset>     
                  <form action="../../includes/insert_ins.inc.php" method="POST" style='margin-left:25px; margin-top:20px;' role="form"> 

      <div class="form-group row">
      <div class="col-xs-4">

	            		<label for="email">NAME OF POLICE:</label>
                  <input type="text"  class="form-control"  name="first_name" id="first_name" required="required" placeholder="First Name"><br>
	            		<input type="text"  class="form-control"  name="last_name" id="last_name"placeholder="Last Name" required="required">





                  <br>
                 <label for="email"> UNIT ASSIGNMENT :</label>


<script type="text/javascript">
function othergroup(){
       if(document.getElementById('unit_assignment').value=='13'){
        document.getElementById('other_input').style.visibility='visible';
      }else{
          document.getElementById('other_input').style.visibility='hidden';
      }
       
}
</script>


<select class="form-control inputstl" name='united' id='unit_assignment' onchange="javascript:othergroup()">
<option value='PS1-STA. ANA'>PS1-STA. ANA</option>
<option value='PS2-SAN. PEDRO'>PS2-SAN. PEDRO</option>
<option value='PS3-TALOMO'>PS3-TALOMO</option>
<option value='PS4-SASA'>PS4-SASA</option>
<option value='PS5-BUHANGIN'>PS5-BUHANGIN</option>
<option value='PS6-BUNAWAN'>PS6-BUNAWAN</option>
<option value='PS7-PAQUIBATO'>PS7-PAQUIBATO</option>
<option value='PS8-TORIL'>PS8-TORIL</option>
<option value='PS9-TUGBOK'>PS9-TUGBOK</option>
<option value='PS10-CALINAN'>PS10-CALINAN</option>
<option value='PS11-BAGUIO'>PS11-BAGUIO</option>
<option value='PS12-MARILOG'>PS12-MARILOG</option>
<option value='13'>OTHERS</option>
</select>
<input type ="text" class="form-control"  name='unit' id="other_input" style="visibility:hidden" placeholder="other unit assignment">
<br>
	     


<label for="email"> DELIQUENCY :</label>
<select class="form-control inputstl" name='del'>
<option value='1'>1.VIOLATION OF "TAMANG BIHIS"</option>
<option value='2'>a. Unuthorized or improper wearing of uniforms; insignias and accoutrements</option>
<option value='3'>b. Unathorized/Improper haircut</option>
<option value='4'>c. Dirty shoes/Unauthorized Shoes</option>
<option value='5'>d. Dirty uniform/Wearing of faded/tacked out athletic uniform/Wearing of colored rubber shoes</option>
<option value='6'>e. Unshaved mustache/Improper Shaving</option>
<option value='7'>f. Improper haircut/Colored nail polish/long and dirty finger nails</option>
<option value='8'>g. Not wearing hairnets/Inconspicously pinned or fastened or hair should not touch the collar</option>
<option value='9'>h. Standing on one leg during formations</option>
<option value='10'>i. No hanky/tickler/Miranda warning card (as required during inspection</option>
<option value='11'>j. No IP Card</option>
<option value='12'>k. Other similar/analogous minor infractions committed</option>
<option value='13'>2. TARDINESS IN REPORTING FOR DUTY/OFFICE WORK</option>
<option value='14'>3. TARDINESS IN REPORTING TO COMMAND ACTIVITIES</option>
<option value='15'>4. SMOKING IN PLACES NOT DESIGNATED AS "SMOKING AREA"</option>
<option value='16'>5. VIOLATION OF TRAFFIC, PEDESTRIAN AND PARKING REGULATIONS WITHIN THE CAMP</option>
<option value='17'>6. USE OF VULGAR OR INSULTING LANGUAGES OR EXHIBIT SIMILAR RUDENESS TO THE PUBLIC</option>
<option value='18'>7. SPITTING OR LITTERING IN PUBLIC AREAS</option>
<option value='19'>8. URINATING IN PLACES OTHER THAN THE DESIGNATED AREAS (RESTROOM, PUBLIC URINATING AREA)</option>
<option value='20'>9. LEAVING POST FOR MORE THAN FIVE MINUTES</option>
<option value='21'>10. DOZING ON POST</option>
<option value='22'>11. FAILURE TO INITIATE ACTIONS ON COMPLAINT/FAILURE TO PREPARE/SUBMIT POLICE REPORTS</option>
<option value='23'>12. ABSENT IN FORMATION AND OR ANY COMMAND ACTIVITES</option>
<option value='24'>13. NOT OBSERVING COURTESY TO OFFICES/SENIOR OFFICERS INSIDE AND OUTSIDE THE OFFICE</option>
<option value='25'>14. LOAFING</option>
<option value='26'>15. OTHERS SIMILAR MINOR INFRACTIONS<br> *Violation during troop formation/parade</option>
<!--<option value='27'>*Violation during troop formation/parade</option>-->
<option value='28'>a. Moving in ranks</option>
<option value='29'>b. Speaking while in formation</option>
<option value='30'>c. Use of cellular phones while in formation</option>
<option value='31'>d. Walking or roaming around while program is ongoing</option>
<option value='32'>e. others</option>
</select><br>
    

                </div>
    </div>
    
<label for="email">DATE :</label>
    
Month
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


                         Day
                        <select name='day' id='dayddl'>
                        <?php 
                        for($b=1;$b<32;$b++){
                          echo "<option value='$b'>$b</option>";
                        }
                         ?>
                        </select>


                        &nbsp;&nbsp;Year
                        <select name='year' id='blah'>
                        <?php 
                        $year=date('Y');
                        for($c=$year;$c>1970;$c--){
                          echo "<option value='$c'>$c</option>";
                        }
                         ?>
                         </select><br>

                       <button name='submit' value="submit" class="btn btn-default btn-lg" onclick="javascript:one();" style="margin-left:35%;">submit</button>

                      <script type="text/javascript">
                      function one()
                      {
                           if(document.getElementById("first_name").value==''){
                              window.alert("please fill all the required fields");
                           }
                           else if(document.getElementById("last_name").value==''){

                              window.alert("please fill all the required fields");
                           }
                          else if(confirm('Are you sure to insert this data ?'))
                          {
                           window.location.href='../../includes/insert_ins.inc.php';
                         }
                     }

                   </script>

</form>
</fieldset>

	</div>
</body>
</html>

