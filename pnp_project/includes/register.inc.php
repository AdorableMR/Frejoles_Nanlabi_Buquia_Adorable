<?php
session_start();
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ias_database";

 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
    }

$user=mysqli_real_escape_string($conn,$_POST["username"]);
$pass=mysqli_real_escape_string($conn,$_POST["password"]);
$key=mysqli_real_escape_string($conn,$_POST["key"]);
$confirm=mysqli_real_escape_string($conn,$_POST["confirm"]);


    if(empty($user) || empty($key) || empty($pass) ||empty($confirm)){
            header("Location: ../html/register.php?register=empty");
            exit();

    }
    
     if(!preg_match("/^[a-zA-Z]*$/",$user)){
        header("Location: ../html/register.php?register=invalid=UseName");
        exit();
       }

if(isset($_POST['submit'])){



             $sql="SELECT * FROM userNames where user_name='$user';";
             $result= mysqli_query($conn, $sql);
             $resultCheck= mysqli_num_rows($result);

             if($resultCheck>0){
             header("Location: ../html/register.php?register=usertaken");
             exit();    
             }

             $sql2="SELECT * FROM secret_key where secret_key='$key';";
             $result2= mysqli_query($conn, $sql2);

             $resultCheck2= mysqli_num_rows($result2);
             if ($resultCheck2<1) {
             header("Location: ../html/register.php?register=error");
             exit();    
             }
             else{
                      if($pass==$confirm){
                       //hashing the password
                      
                         //Insert the User 
                        $sql3="INSERT INTO userNames (user_name,port) VALUES
                        ('$user','$pass');";

                          mysqli_query($conn,$sql3);
                          header("Location: ../index.php?register=success");
                          exit();

                       }
                       else{       
                            header("Location: ../html/register.php?register=password");
                          exit();

                        }
                    }


mysqli_close($conn);

}

 ?> 


