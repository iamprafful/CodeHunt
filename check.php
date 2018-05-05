<?php
$time_start = microtime(true);
include('config.php');
ini_set('max_execution_time', 1000000000);
session_start();
$id=$_SESSION["id"];
$incorrect=0;
$correct=0;
$conn = mysqli_connect($servername,$musername,$mpassword,$dbname);
try {

$save_conn = new PDO("mysql:host=$servername;dbname=$dbname", $musername, $mpassword);
$save_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
for($i=1; $i<=45; $i++)
{
    $qid=$_POST["qid".$i];
//    echo $qid." ";
    $opt=$_POST["opt".$i];
//    echo $opt."<br>";
    if($_POST["opt".$i]!="null")
    {
        $qid=$_POST["qid".$i];
        $opt=$_POST["opt".$i];
        if(count($_POST)>0) 
        {
	         
             $sql="SELECT * FROM questions WHERE id='$qid' and correct_answer='$opt'";
	         $result = mysqli_query($conn,$sql);
	         //echo $sql;
             $count  = mysqli_num_rows($result);
	         if($count==0) 
             {  
                 $status="incorrect";
                 $incorrect=$incorrect+1;
	         } 

             else
             {                 
//                 echo $qid." ";                 
//                 echo $opt." correct<br>";
                 $status="correct";
                 $correct=$correct+1; 
	         }
        
        
        }
    $save_sql = "INSERT INTO response(candidate_id,qusestion_id,response,status)
    VALUES ('$id','$qid','$opt','$status')";
    // use exec() because no results are returned
    $save_conn->exec($save_sql);
    }
}
$score=($correct*4)-$incorrect;
echo "correct answers =".$correct;
echo "\nincorrect answers =".$incorrect;
 $update_sql="update candidate set correct_attempts='".$correct."', incorrect_attempts='".$incorrect."', score='".$score."' where receipt='".$id."'";
    echo $update_sql;
 $save_conn->exec($update_sql);
    header("location: profile.php");
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