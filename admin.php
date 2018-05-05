<?php
include('config.php');
session_start();
if($_SESSION["user"]=="admin"){

}
else {
    header("Location: login/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administrator</title>
  <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/ch_logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
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
        <a class="navbar-brand" href="#">Code Hunt 2K18 | <i class="fa fa-user"></i> Administrator</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login/logout.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
   
    <div class="col-sm-12 text-left" style=" margin-top: 60px; z-index: 1; ">
        <center> <h1><i class="fa fa-trophy"></i> Code Hunt 2K18 Leaderboard</h1><hr size="100%"></center>
    <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Receipt</th>
      <th>Name</th>
      <th>Score</th>
    </tr>
  </thead
        <?php
                class TableRows extends RecursiveIteratorIterator { 
                    function __construct($it) { 
                        parent::__construct($it, self::LEAVES_ONLY); 
                    }

                    function current() {
                        return "<td>" . parent::current(). "</td>";
                    }

                    function beginChildren() { 
                        echo "<tr>"; 
                    } 

                    function endChildren() { 
                        echo "</tr>" . "\n";
                    } 
                } 



                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $musername, $mpassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare('select @row_number:=@row_number+1 AS row_number,receipt,CONCAT(UCASE(MID(name,1,1)),MID(name,2)),score from candidate, (SELECT @row_number:=0) AS t where test_status!="not attempted" order by score desc;'); 
                    $stmt->execute();

                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                        echo $v;
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                echo "</table>";
           ?>
      <button onclick="Print()" class="btn btn-primary">Print Leaderboard</button>
        <div class="w3-panel w3-card-4 w3-animate-zoom " style="text-align: center; color:white; background-color:#c60909; border-radius: 10px; "><br>A product by <strong>Prafful Lachhwani</strong> | Supervisor: <strong>Rahan Sharma | Content Manager: <strong>Namit Sharda<br></strong><br></div>
    </div>
    
        
</div>
    
       
            
 
    
  <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/script.js"></script>
	<!-- StikyMenu -->

	<!-- Smoothscroll -->
	<script type="text/javascript" src="js/jquery.corner.js"></script> 
	<script src="js/wow.min.js"></script>
	<script>
        function Print() 
            {
                 window.print();
            }
	 new WOW().init();
	</script>
	<script src="js/classie.js"></script>
	<script src="js/uiMorphingButton_inflow.js"></script>
	<!-- Magnific Popup core JS file -->
	<script src="js/jquery.magnific-popup.js"></script> 

	
</body>
</html>
