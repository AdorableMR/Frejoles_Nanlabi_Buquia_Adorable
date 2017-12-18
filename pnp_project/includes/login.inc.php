<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ias_database";

 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
    }

if(isset($_POST['submit'])){


    $uid=mysqli_real_escape_string($conn,$_POST['username']);
    $pwd=mysqli_real_escape_string($conn,$_POST['password']);

    if(empty($uid)||empty($pwd)){
        header("Location: ../index.php?login=emptyfield");
        exit();

    }
    

    $sql_query="SELECT * FROM admin_table where admin_name='$uid'";
    $result_query=mysqli_query($conn,$sql_query);
    $resultCheck_query=mysqli_num_rows($result_query);

    if($resultCheck_query>0){
        
        if($row_query=mysqli_fetch_assoc($result_query)){
            if($pwd==$row_query['admin_password']){
             $_SESSION['user_name'] = 'admin_name';
             $_SESSION['user_admin'] = 'admin_name';
             $_SESSION['password']  = 'admin_password';
             header("Location: ../html/iframe_inv/investigation_admin.php");

            }else{
             header("Location: ../index.php?login=userfield");
             exit();
            }   

    }
}else{

    $sql="SELECT * FROM userNames where user_name='$uid'";
    $result=mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);

    if($resultCheck<1){
        header("Location: ../index.php?login=userfield");
        exit();     
    }else{
        if($row=mysqli_fetch_assoc($result)){
            if($pwd==$row['port']){
             $_SESSION['user_name'] = 'user_name';
             $_SESSION['password']  = 'port';
             header("Location: ../html/investigation.php");

            }else{
             header("Location: ../index.php?login=userfield");
             exit();
            }   

        }

    }

}

  }
?>