<?php
session_start();
include('../config.php');
$email=$_POST["email"];
$password=$_POST["password"];

$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect($servername,$musername,$mpassword,$dbname);
        $sql="SELECT * FROM candidate WHERE email='$email' and password='$password'";
	$result = mysqli_query($conn,$sql);
	//echo $sql;
        $count  = mysqli_num_rows($result);
	if($count==0) 
    {  
        if($email=="admin")
               {
                    $conn1 = mysqli_connect($servername,$musername,$mpassword,$dbname);
                    $result1 = mysqli_query($conn1,"SELECT * FROM admin WHERE password='$password'");
                    $count1  = mysqli_num_rows($result1);
                    if($count1==0)
                    {  
                            echo '<script language="javascript">';
                       echo 'alert("Invalid Admin Password");
                       window.location = "login.html";';
                      echo '</script>';
                    } 
                    else 
                    {
                        $message = "Admin Logged in";
                        $_SESSION["user"]="admin";
                        header("location: ../admin.php");                        
                    }
               }
        else
        {
            
                                  echo '<script language="javascript">';
                       echo 'alert("Invalid Email/Password");
                       window.location = "login.html";';
                      echo '</script>';
        }
		
	} 

    else
    {
        $message = "You are successfully authenticated!";
        $_SESSION["email"]=$email;
        $_SESSION["user"]="candidate";
        header("location: ../profile.php");      
	}
        echo $message;
        
}
$conn = null;
?>
