<?php
$time_start = microtime(true);
include('config.php');
ini_set('max_execution_time', 1000000000);

$conn = mysqli_connect($servername,$musername,$mpassword,$dbname);
try {

$save_conn = new PDO("mysql:host=$servername;dbname=$dbname", $musername, $mpassword);
$save_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
for($i=1; $i<=118; $i++)
{
    $int=12000+$i;
    $name=$int."@gmail.com";
    $password=$int;
    $phone=$int."00000";
     $save_sql = "INSERT INTO candidate (name,email,password,phone,college,receipt,date_registerd)
    VALUES ('demo','$name','$password','$phone','oist','$password',sysdate())";
    // use exec() because no results are returned
    $save_conn->exec($save_sql);
}
    
}catch(PDOException $e)
    {
    echo $save_sql . "<br>" . $e->getMessage();
    }

$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start);

//execution time of the script
echo '<br><b>Total Execution Time:</b> '.$execution_time.' seconds';
?>