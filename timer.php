<?php
//header("Content-Type: text/event-stream");
//header("Cache-Control: no-cache");
// 
//// Get the current time on server
//session_start();
// 
////Check to see if our timer session variable
////has been set. If it hasn't been set, "initialize it".
//if(!isset($_SESSION['timer'])){
//    //Set the current timestamp.
//    $_SESSION['timer'] = time();
//}
// 
////Get the current timestamp.
//$now = time();
//$min=29;
////Calculate how many seconds have passed.
//$hours=0;
//$sec =$now - $_SESSION['timer'];
//$mins =floor($sec / 60 % 60);
//$secs =floor($sec % 60);
//$timeformat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
//$interval = strtotime('00:25:00')-strtotime($timeformat);
//$time= gmdate("i:s", $interval);
//// Send it in a message
//echo "retry: 1\n";
//echo "data: " . $time . "\n\n";
//flush();
for($i=1; $i<=45; $i++)
{
    echo '$qid'.$i.'=$_POST["qid'.$i.'"];<br>';
}
?>
