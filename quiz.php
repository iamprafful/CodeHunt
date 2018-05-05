<?php
include('config.php');
session_start();
if($_SESSION["user"]=="candidate"){
   $email=$_SESSION["email"];
    $id=$_SESSION["id"];
}
else {
    header("Location: login/login.html");
}
?>
<?php  
		
		
        $conn = new mysqli($servername, $musername, $mpassword, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    
                     $sql="select * from candidate where email='".$email."' limit 1";
                     
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                       
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
							$test_status =$row["test_status"];
                        }
                    } else {
                        

                    }
                    if($test_status=="not attempted")
                    {
                        $t=time();
                        try {
                             $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $musername, $mpassword);
                             // set the PDO error mode to exception
                             $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $sql="update candidate set test_status='".$t."' where receipt='".$id."'";
                                         $conn1->exec($sql);
                             }
                        catch(PDOException $e)
                        {
                             echo $sql . "<br>" . $e->getMessage();
                        }
                    }
                    else
                    {
                       echo '<script language="javascript">';
                       echo 'alert("You have already attempted the test");
                       window.location = "profile.php";';
                      echo '</script>';
                    }

                    $conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Code Hunt Round 1</title>
  <meta charset="utf-8">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="icon" type="image/png" href="img/ch_logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/normalbootstrap.css">
   <script src="/js/jq.js"></script>
  <script src="js/bootstrap.min.js"></script>
 <script src="js/validate.js" type="text/javascript"></script>
<!--    <script src="js/timer.js" type="text/javascript"></script>-->
  <link href="css/animate.css" rel="stylesheet">
<style>
#overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.8);
    z-index: 20;
    cursor: pointer;
}
#sub {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.8);
    z-index: 20;
    cursor: pointer;
}
#text{
    position: absolute;
    top: 40%;
    left: 50%;
    font-size: 30px;
    color: white;
    transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
}
</style>
<style>

    /* Remove the navbar's primary margin-bottom and rounded borders */ 
     body{
		background-color: #f1f1f1;
       
	 }
      table { border-collapse: separate; border-spacing: 5px; }
      
      .navbar {
        font-family:FontAwesome;
      margin-bottom: 0;
      border-radius: 0;

      position: fixed;
      top: 0;
      width: 100%;
      overflow: hidden;
       z-index: 3;

      
        
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      
      background-color: #ffffff;
      height: 100%;
      width: 280px;
        
        position: fixed;
        z-index: 2;
    
    
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
	
	/* The container */
.container1 {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container1 input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container1:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container1 input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container1 input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container1 .checkmark:after {
 	top: 6.2px;
	left: 6.2px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
.circle {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  font-size: 18px;
  color: #fff;
  line-height: 30px;
  text-align: center;
  background: #3366cc;
  
}
    


	
	
  </style>
</head>
<body>
<div id="overlay">
  <center><div id="text"><img src="img/ch_logo_white.png"  width="250px"><br>Time UP!<br>Keep Calm and sit back<br> We are checking your answers<br><br><img src="img/status.gif"></div></center>
</div>
<div id="sub">
  <center><div id="text"><img src="img/ch_logo_white.png"  width="250px"><br>Submitting....<br>Keep Calm and sit back<br>We are checking your answers<br><br><img src="img/status.gif"></div></center>
</div>
<nav class="navbar navbar-inverse navbar-fixed-top ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" href="#">Code Hunt 2K18</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><div><font color="white">Time left = <span id="timer"></span></font></div></a></li>
        <li><a onclick="sub_fn()"><span class="glyphicon glyphicon-log-in"></span>&nbsp;End test</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav w3-panel w3-card-4 w3-animate-left">
        <br><br><br>
   <div class="w3-container w3-row">
    <div class="w3-col s3">
      <img src="img/user.png" class="w3-margin-right" style="width:60px">
    </div>
    <div class="w3-col s9 w3-bar">
        
      <span>Welcome,<br><strong><?php echo ucfirst($_SESSION["name"]);?></strong></span>
    </div>
  </div><br>
        <table>
            
        
        <?php
           for($i=1; $i<=45; $i++)
           {
               
               if($i%5==1 || $i==1)
               {
                   echo '<tr>';
               }
               if($i<10)
               {
                   echo '
                         <td>
                            <a href="#'.$i.'" class="btn btn-primary" id="flag'.$i.'">0'.$i.'</a>
                         </td>';
               }
               else
               {
                   echo '
                          <td>
                             <a href="#'.$i.'" class="btn btn-primary" id="flag'.$i.'">'.$i.'</a>
                          </td>';
               }
               
               if($i%5==0)
               {
                   echo '</tr>';
               }
           }
        ?>
        </table>
        <div class="w3-panel w3-card-4 w3-animate-zoom" style="text-align: left; color:white; background-color:#c60909; border-radius: 10px; padding: 10px;">A product by <strong>Prafful Lachhwani</strong><br></div>
   </div>
    <div class="col-sm-12 text-left" style="padding-left: 300px; margin-top: 50px; z-index: 1; ">
      <h1>Code Hunt 2K!8 Round 1</h1>
     <form id="quiz" name="quiz" action="check.php" method="post">
        
        <?php  
		$no=0;
		
        $conn = new mysqli($servername, $musername, $mpassword, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    
                     $sql="SELECT * FROM questions order by rand() limit 45";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                       
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
							$no=$no+1;
                            $qid=$row["id"];
                            
                             echo '<br><a name='.$no.'></a><div class="w3-container" ><div class="w3-panel w3-card-4 w3-animate-zoom"  style="background-color: #ffffff; margin-bottom:0px;" ><br><table><tr><td valign="top"><div class="circle">'.$no.'</div></td><td valign="top"><font size="4px">'.$row["question"].'</font></td></tr></table><br> 
                             <input type="hidden" id="qid'.$no.'" name="qid'.$no.'" value='.$qid.'>
                             
                             <div style="display:none;"><input type="radio"   name="opt'.$no.'" value="null" checked></div>
                             <div style="padding-left:15px">
                             <label class="container1">'.$row["option_1"].'
                             <input type="radio"  name="opt'.$no.'" value="a" onclick="fn'.$no.'()">
                             <span class="checkmark"></span>
                             </label>
		
		                     <label class="container1">'.$row["option_2"].'
                             <input type="radio"  name="opt'.$no.'" value="b" onclick="fn'.$no.'()">
                             <span class="checkmark"></span>
                             </label>
		
		                     <label class="container1">'.$row["option_3"].'
                             <input type="radio"  name="opt'.$no.'" value="c" onclick="fn'.$no.'()">
                             <span class="checkmark"></span>
                             </label>
		
		                     <label class="container1">'.$row["option_4"].'
                             <input type="radio"  name="opt'.$no.'" value="d" onclick="fn'.$no.'()">
                             <span class="checkmark"></span>
                             </label><br><input type="button" id="flon'.$no.'" class="btn btn-warning" onclick="fl'.$no.'()" value="Flag This Question"></div><br><br></div></div>
                             <script>
                             var st=0;
                             function fn'.$no.'()
                                    {
                                        document.getElementById("flag'.$no.'").className="btn btn-success";
                                    }
                              function fl'.$no.'()
                                    {
                                        if(st==0)
                                        {
                                        st=1;
                                        document.getElementById("flag'.$no.'").className="btn btn-warning";
                                        document.getElementById("flon'.$no.'").className="btn btn-info";
                                        document.getElementById("flon'.$no.'").value="Unflag This Question";
                                        
                                        }
                                        else if(st==1)
                                        {
                                        st=0;
                                        document.getElementById("flag'.$no.'").className="btn btn-primary";
                                        document.getElementById("flon'.$no.'").className="btn btn-warning";
                                        document.getElementById("flon'.$no.'").value="Flag This Question";
                                        
                                        }
                                        
                                    }
                             </script>
                             
                             
                             
                             ';
                                             }
                    } else {
                        

                    }

                    $conn->close();



?>
         <br><center><a name="submit"></a><button type="button" class="btn btn-primary" onclick="sub_fn()">Submit Test</button></center><br>
         <div style="display: none;"><button type="submit" class="btn btn-primary" onclick="sub_fn()">Submit Test</button></div>
        </form>
    </div>
    
  </div>
</div>
<script>
    
    function sub_fn()
    {
        document.getElementById("sub").style.display = "block";
        document.getElementById("quiz").submit();
    }
document.getElementById('timer').innerHTML =
  30 + ":" + 00;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59)
  {
      m=m-1
  }
  if(m<0){
      document.getElementById("overlay").style.display = "block";
      document.getElementById("quiz").submit();
  }
    else{
        document.getElementById('timer').innerHTML =
    m + ":" + s;
  setTimeout(startTimer, 1000);
    }
  
  
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
    
    
} 
    
    

    
</script>
<script type='text/javascript'>
    document.addEventListener('contextmenu', event => event.preventDefault());
  $(document).keydown(function(e){
    e.preventDefault();
    
  });
</script>
  <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/script.js"></script>
	<!-- StikyMenu -->
	<script src="js/stickUp.min.js"></script>
	<script type="text/javascript">
	  jQuery(function($) {
		$(document).ready( function() {
		  $('.navbar-default').stickUp();
		  
		});
	  });
	
	</script>
	<!-- Smoothscroll -->
	<script type="text/javascript" src="js/jquery.corner.js"></script> 
	<script src="js/wow.min.js"></script>
	<script>
	 new WOW().init();
	</script>
	<script src="js/classie.js"></script>
	<script src="js/uiMorphingButton_inflow.js"></script>
	<!-- Magnific Popup core JS file -->
	<script src="js/jquery.magnific-popup.js"></script> 

	
</body>
</html>
