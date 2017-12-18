<?php

session_start();

if(!isset($_SESSION['user_admin'])){

    echo"Contact the Authority";

  header("Location= ../index.php?please-login");

  exit();
}

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
              </head>
              <body>
<?php
if(isset($_POST['option'])){

	header("Location: ../html/iframe_ins/known.php");
}


else if(isset($_POST['delete_user'])){

    $delete =$_POST['delete_user'];

    echo"

    <form action='known.inc.php' method='post' role='form'>
     
     <center><strong><h2>Confirm Action</h2></strong><br><br>
     <label for='email'>User Name</label><input type='text' name='u_name' placeholder='User Name'  required='required' class='form-control' style='width:30%;'><br>
     <label for='email'>Password</label><input type='password' name='p_name' placeholder='Password' required='required' class='form-control' style='width:30%;'>
     <br>
     <button type='submit' name='de_confirm' value='$delete' class='form-control' style='width:30%;'>Confirm Action</button></center><br>
    </form>

    <form action='../html/iframe_ins/known.php' method='post'>
     
     <center><button type='submit' class='form-control' style='width:20%;'>Go Back Without Changes</button></center>

    </form>
    ";
}

else if(isset($_POST['de_confirm'])){

$counter=0;

$user=mysqli_real_escape_string($conn,$_POST["u_name"]);
$pass=mysqli_real_escape_string($conn,$_POST["p_name"]);

 $pu = "SELECT * from admin_table where admin_name='$user' && admin_password='$pass'";

$py = $conn->query($pu);
                   
    if($py->num_rows>0){

        $delete =$_POST['de_confirm'];

                     $ta = "SELECT * from usernames";

                      $pda = $conn->query($ta);

                       
                       if($pda->num_rows > 0){

                        $h=0;

                        while($col1 = $pda->fetch_assoc()){
                        
                        $h++;

                              if($delete==$h)

                              $det2="DELETE from usernames where user_name='$col1[user_name]' && port='$col1[port]' ";
                 
                              $conn->query($det2);
                                
                              $counter++;

                              if($counter==1){
                                 echo "
                                <br><br><br>
                                <center>
                                <div class='alert alert-success' style='width:20%'>
                                <strong>Success !</strong>
                                </div></center>'
                                <form action='../html/iframe_ins/known.php' method='POST'>
                                <center><button class='form-control' style='width:20%'>Okey</button></center>
                                </form>

                                ";
                                }

                              }

                         }



                         }else{
                          
                          echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Invalid User Field
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                          ";
                         }  

          

}
  

else if(isset($_POST['create_user'])){

  $user=mysqli_real_escape_string($conn,$_POST["username"]);
$pass=mysqli_real_escape_string($conn,$_POST["password"]);
$key=mysqli_real_escape_string($conn,$_POST["key"]);
$confirm=mysqli_real_escape_string($conn,$_POST["confirm"]);


    if(empty($user) || empty($key) || empty($pass) ||empty($confirm)){
                             echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Empty Field
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button class='form-control' name='create_user' style='width:20%'>Okey</button></center>
                             </form>

                          ";


    }
    
     if(!preg_match("/^[a-zA-Z]*$/",$user)){
                             echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Improper User Name Field
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button class='form-control' name='create_user' style='width:20%'>Okey</button></center>
                             </form>

                          ";

       }

             $sql="SELECT * FROM userNames where user_name='$user';";
             $result= mysqli_query($conn, $sql);
             $resultCheck= mysqli_num_rows($result);

             if($resultCheck>0){
                             echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> User Field
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button class='form-control' name='create_user' style='width:20%'>Okey</button></center>
                             </form>

                          ";
 
             }

             $sql2="SELECT * FROM secret_key where secret_key='$key';";
             $result2= mysqli_query($conn, $sql2);

             $resultCheck2= mysqli_num_rows($result2);
             if ($resultCheck2<1) {
                             echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Invalid Secret-key
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button class='form-control' name='create_user' style='width:20%'>Okey</button></center>
                             </form>

                          ";
   
             }
             else{
                      if($pass==$confirm){
                       //hashing the password
                      
                         //Insert the User 
                        $sql3="INSERT INTO userNames (user_name,port) VALUES
                        ('$user','$pass');";

                          mysqli_query($conn,$sql3);

                            echo "<form method='POST' action='../html/iframe_ins/known.php'>
                                 <input type='text' name='success' vlue='success' style='display:none;'>
                                 </form>";
                                 
                                 header('Location: ../html/iframe_ins/known.php');
                                       exit();


                       }
                       else{
                             echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Invalid User Field
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                          ";

                            header("Location: ../html/iframe_ins/known.php");
                          exit();

                        }
                    }


mysqli_close($conn);


}
else if(isset($_POST['edit_password'])){

    $confirm_password=mysqli_real_escape_string($conn,$_POST['confirm_password']);
    $new_password=mysqli_real_escape_string($conn,$_POST['new_password']);
    $User=mysqli_real_escape_string($conn,$_POST['User']);
    $Pass=mysqli_real_escape_string($conn,$_POST['password']);


             $pu = "SELECT * from admin_table where admin_name='$User' && admin_password='$Pass'";
                  
                  $py = $conn->query($pu);
                   
                   if($py->num_rows>0){
                                  
                 
                      

                                                 if($new_password !=$confirm_password){

                             echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Invalid User Field
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button name='password' class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                          ";

                                                 }
                                                 else
                                                 {
                                                     
                                                 $pie = "UPDATE admin_table set admin_password='$new_password' where admin_name='$User' && admin_password='$Pass'";
                                                 $conn->query($pie);
                              echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-success' style='width:20%'>
                             <strong>Success !</strong>
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button name='password' class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                          ";                                               
                                                  }


                   }
                   else{
                             echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Invalid User Field
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button name='password' class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                          ";
                   }

}



else if(isset($_POST['edit_username'])){

    $confirm_username=mysqli_real_escape_string($conn,$_POST['confirm_username']);
    $new_username=mysqli_real_escape_string($conn,$_POST['new_username']);
    $User=mysqli_real_escape_string($conn,$_POST['User']);
    $Pass=mysqli_real_escape_string($conn,$_POST['Pass']);


             $pu = "SELECT * from admin_table where admin_name='$User' && admin_password='$Pass'";
                  
                  $py = $conn->query($pu);
                   
                   if($py->num_rows>0){
                                  
                 
                      

                                                 if($new_username !=$confirm_username){

                            echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Invalid User Field
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button name='userName' class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                            ";

                                                 }
                                                 else
                                                 {
                                                     
                                                 $pie = "UPDATE admin_table set admin_name='$new_username' where admin_name='$User' && admin_password='$Pass'";
                                                 $conn->query($pie);
                            echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-success' style='width:20%'>
                             <strong>Success !</strong>
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button name='userName' class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                            ";                                                
                                                  }


                   }
                   else{
                            echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Invalid User Field
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button name='userName' class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                            ";

                   }

}



else if(isset($_POST['edit_secret-key'])){

	$old_key=mysqli_real_escape_string($conn,$_POST['old_key']);
    $new_key=mysqli_real_escape_string($conn,$_POST['new_key']);
    $confirm_key=mysqli_real_escape_string($conn,$_POST['confirm_key']);
    $User=mysqli_real_escape_string($conn,$_POST['User']);
    $Pass=mysqli_real_escape_string($conn,$_POST['Pass']);


             $pu = "SELECT * from admin_table where admin_name='$User' && admin_password='$Pass'";
                  
                  $pd = $conn->query($pu);
                   
                   if($pd->num_rows>0){

                  $pp = "SELECT * from secret_key where secret_key='$old_key'";
                  $pa = $conn->query($pp);



                                 if($pa->num_rows>0){

                                        if($new_key!=$confirm_key){
                            echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Invalid Key Field
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button name='s_k' class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                            ";

                                        }

                                         $pc = "UPDATE secret_key set secret_key='$new_key' where secret_key='$old_key'";
                                         $pb = $conn->query($pc);
                             echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-success' style='width:20%'>
                             <strong>Success !</strong>
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button name='s_k' class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                            ";
                                }

                     
                                 }
                                else{
                             echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Invalid Secret-Key
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button name='s_k' class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                            ";
                                }

                   }else{
                            echo "
                             <br><br><br>
                             <center>
                             <div class='alert alert-danger' style='width:20%'>
                             <strong>Error!</strong> Invalid Fields
                             </div></center>'
                             <form action='../html/iframe_ins/known.php' method='POST'>
                             <center><button name='s_k' class='form-control' style='width:20%'>Okey</button></center>
                             </form>

                            ";

                   }




?>

</body>
</html>

