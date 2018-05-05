<?php

include('config.php');
$name=$_POST["InputName"];
$email=$_POST["InputEmail"];
$phone=$_POST["InputPhone"];
$clg=$_POST["InputClg"];
$receipt=$_POST["InputRN"];
$password=$receipt;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $musername, $mpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO candidate (name,email,password,phone,college,receipt,date_registerd)
    VALUES ('$name','$email','$password','$phone','$clg','$receipt',sysdate())";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo '<script language="javascript">';
    echo 'alert("Your application is successfully submitted");
    window.location = "index.html";';
    echo '</script>';
//    header("Location: login.html");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>