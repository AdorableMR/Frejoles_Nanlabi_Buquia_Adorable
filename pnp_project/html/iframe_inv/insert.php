<!DOCTYPE html>
<head>
<title>
</title>

<link href="../../css/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="../../css/js/bootstrap-confirmation.js"></script>
   <script src="../../css/js/jquery-confirm.js"></script>
   <script src="../../css/js/jquery-confirm.min.js"></script>


  <style type="text/css">
  html{
    width: 100%;
  }
  td{
    width: 30%;
    padding-left:10px;
    padding-right: 10px;
  }
  </style>


</head>
<body>
    <div class ="field_insert" > 

      
         <table>

               <tr>
                
                <td>
                  <form action="../../includes/insert_inv.inc.php" method="POST" >  
                  <label>NAME OF POLICE :</label><input type="text"class="form-control"  name="first_name" required="required" placeholder="First Name" id="first_name"><br>
                  <input type="text" class="form-control"  name="last_name" placeholder="Last Name" required="required"><br>

    
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
                         </select>    

                  <br><br>
UNIT ASSIGNMENT :

<script type="text/javascript">
function othergroup(){
       if(document.getElementById('unit_assignment').value=='13'){
        document.getElementById('other_input').style.visibility='visible';
      }else{
          document.getElementById('other_input').style.visibility='hidden';
      }
       
}
</script>

<select name='united' class="form-control"  id='unit_assignment' onchange="javascript:othergroup()">
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

<input type ="text" class="form-control"  name='unit' id="other_input" style="visibility:hidden" placeholder="other unit assignment">

</select>


                  <label>NAME OF COMPLAINANT :</label><input type="text" class="form-control"  name="com_Fname" required="required" placeholder="First Name"><br>
                  <input type="text" class="form-control"  name="com_Lname" placeholder="Last Name" required="required"><br><br>

                         


                     </td>
                      <td>                    
                      
                        <label>OFFENSE :</label><textarea name="offense" class="form-control"  required="required" style="height:350px; width:350px;"></textarea><br>
                   

                      </td>

                       <td>

                        <label>INVESTIGATOR IN CASE :</label><input type="text" class="form-control"  name="inv_Fname" required="required" placeholder="First Name"><br>
                        <input type="text" name="inv_Lname" class="form-control"  placeholder="Last Name" required="required"><br>
              

            
                                           
                         <label>DOCKET. NO. :</label><input type="number" class="form-control"  name="docket" required="required" /><br><br>

                        <input type="radio" name="val" value="Motu-proprio Investigation" onclick="javascript:drug();" id="yes" required />
                         Motu-Proprio Investigation&nbsp;&nbsp; 
                        <input type="radio" name="val" value="Initial Evaluation" onclick="javascript:not_me()" id="init">Initial Evaluation<br>
                      
                        &nbsp;&nbsp; 
                        <select name='related' id='if_mot' style="visibility:hidden">
                        <option value='Not Drug related'>Not Drug related</option>
                        <option value='Drug-related'>Drug-related</option>
                        </select>
                        <br>
                        
                        
                        <button name='submit' value="submit" class="btn btn-default btn-lg" style="margin-left:85%;" >submit</button>

                      <script type="text/javascript">
                      function one()
                      {
                           if(document.getElementById("first_name").value==''){
                              window.alert("please fill all the required fields");
                           }
                           else if(confirm('Are you sure to insert this data ?'))
                          {
                           window.location.href='../../includes/insert_inv.inc.php';
                         }
                     }

                   </script>

                        </form>

                       </td>

                      </table>

  </div>
</body>
</html>
            <script type="text/javascript">
                  function drug(){
                    if(document.getElementById('yes').checked){
                      document.getElementById('if_mot').style.visibility='visible';
                    }else{
                        document.getElementById('if_mot').style.visibility="hidden";
                    }
                  }
                  function not_me(){
                     if(document.getElementById('init').checked){
                      document.getElementById('if_mot').style.visibility="hidden";
                     }
                  }
                 </script>


