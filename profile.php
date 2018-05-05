<?php
session_start();
include('config.php');
if($_SESSION["user"]=="candidate"){
   $email=$_SESSION["email"];
}
else {
    header("Location: login/login.html");
}
?>
<?php  
		$no=0;
		
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
							$id =$row["receipt"];
                            $_SESSION["id"]=$id;
                            $name=$row["name"];
                            $_SESSION["name"]=$name;
                            $clg=$row["college"];
                            $correct_attempts=$row["correct_attempts"];
                            $incorrect_attempts=$row["incorrect_attempts"];
                            $score=$row["score"];
                        }
                    } else {
                        

                    }

                    $conn->close();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="login/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/ch_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo ucfirst($name);?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="login/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="login/assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="login/assets/css/demo.css" rel="stylesheet" />
</head>

<body class="profile-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="index.html">
                    Code Hunt 2K18
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="login/assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#instructions">Instrctions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login/logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('login/assets/img/bg5.jpg');">
            </div>
            <div class="container">
                <div class="content-center">
                    <div class="photo-container">
                        <img src="img/user.jpg" alt="">
                    </div>
                    <h3 class="title"><?php echo ucfirst($name);?></h3>
                    <p class="category"><?php echo $clg;?></p>
                    <div class="content">
                        <div class="social-description">
                            <h2><?php echo $correct_attempts; ?></h2>
                            <p>Correct Attempts</p>
                        </div>
                        <div class="social-description">
                            <h2><?php echo $incorrect_attempts; ?></h2>
                            <p>Incorrect Attempts</p>
                        </div>
                        <div class="social-description">
                            <h2><?php echo $score; ?></h2>
                            <p>Total score</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container"><div id="instructions"></div>
                <div class="button-container">
                    <button onclick='window.location.href="#instructions"'  class="btn btn-primary btn-round btn-lg">Get started</button>
                </div>
                <div id="instructions"></div>
                <h3 class="title">Instructions</h3>
                
                <p>
                    <strong>1#</strong> You will be provided with 45 multiple correct question to be solved in 30 mins time limit.
                   <br>
                   <strong>2#</strong> Judging will be on the basis of Total Marks scored by you in the test.
                   <br>
                   <strong>3#</strong> A cutoff will be decided on the basis of marks scored and those whose score is greater or equal to cutoff score will enter round 2.<br>
                   <strong>4#</strong> Use of Internet , text books etc are Not Allowed. If found guilty strict actions will be taken.
                    <br>
                    <strong>5#</strong> Dont Reload the quiz page. If you did your test will be submitted on the only moment with 0 score.
                    <br>
                    <strong>6#</strong> Disturbance to any other by the participant during contest will not be tollerated.
                    <br>
                    <strong>7#</strong> Any candidate found with doing changes in developers options will be disqualified at the only moment.
                    <br>
                    <strong>Note :</strong> There will be Negetative marking for the questions. That means +4 marks for every correct answer and -1 for wrong answer. 
                </p><br>
                <center>
                <form action="quiz.php" method="post">
                    <button class="btn btn-primary" type="submit">Start Test</button>
                </form>
                </center>
               
                
            </div>
        </div>
        <footer class="footer footer-default">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="index.html">
                                Code Hunt 2K18
                            </a>
                        </li>
                        <li>
                            <a href="index.html#about">
                                About Us
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    A product by
                    <a href="#" rel="tooltip" title="Full Stack developer">Prafful lachhwani</a>&nbsp;&nbsp;|&nbsp;&nbsp;Supervisor: <a href="#">Rahan Sharma</a>&nbsp;&nbsp;|&nbsp;&nbsp;Content Manager:  <a href="#" rel="tooltip" title="Full Stack developer">Namit Sharda</a>
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="login/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="login/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="login/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="login/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="login/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="login/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="login/assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>