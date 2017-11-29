<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Ride System</title>
    <meta name="description" content="Car Ride System Provide facility to passenger to book a particular ride" />
    
    <meta name="author" content="templatemo">
    <link rel="shortcut icon" href="../favicon.png" />
    <!-- Font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template  -->
    <link href="../css/templatemo_style.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>
</head>
<body>
  <style>
    *,
    *:before,
    *:after {
      box-sizing: border-box;
    }

    h4,h1 {
      color: black;
    }
   .container {
      max-width: 38em;
      padding: 1em 3em 2em 3em;
      margin: 0em auto;
      background-color: white;
      border-radius: 4.2px;
      box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
    }
    .row {
      zoom: 1;
    }
    .row:before,
    .row:after {
      content: "";
      display: table;
    }
    .row:after {
      clear: both;
    }
    .col-half {
      padding-right: 10px;
      float: left;
      width: 50%;
    }
    .col-half:last-of-type {
      padding-right: 0;
    }
    .col-third {
      padding-right: 10px;
      float: left;
      width: 33.33333333%;
    }
    .col-third:last-of-type {
      padding-right: 0;
    }
    @media only screen and (max-width: 540px) {
      .col-half {
        width: 100%;
        padding-right: 0;
      }
    }
    #set{padding-top: 100px;}
  </style>

  <!--navigation menu start here-->
  <div id="templatemo_mobile_menu">
              <ul class="nav nav-pills nav-stacked">
                   <li><a rel="nofollow" href="../index.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Home</a></li>
                   <li><a rel="nofollow" href="copassenger_signup.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Sign Up</a></li>
                   <li><a rel="nofollow" href="copassenger_login.php" class="external-link"><i class="glyphicon glyphicon-forward"></i>Slide Right</a></li>
              </ul>
  </div>
  <div class="container_wapper">
    <div id="templatemo_banner_menu">
      <div class="container-fluid">
        <div class="col-xs-4 templatemo_logo"><a href="#"><img src="../images/logo.png" id="logo_img" alt="Rideout System" title="Car Ride" /></a>
        </div>
        <div class="col-sm-8 hidden-xs">
          <ul class="nav nav-justified">
            <li><a rel="nofollow" href="../index.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Home</a></li>
            <li><a rel="nofollow" href="copassenger_signup.php" class="external-link"><i class="glyphicon glyphicon-export"></i>SignUp</li>
          </ul>
        </div>
        <div class="col-xs-8 visible-xs"><a href="#" id="mobile_menu"><span class="glyphicon glyphicon-th-list"></span></a></div>
      </div>
    </div>
  </div>
  <!--navigation menu end here-->

  <div id="set">
    <div class="container">
      <form class="form-horizontal" method="POST" action="copassenger_login.php">
        <div class="row">
          <center><h1>Login Form</h1></center><br>
          <h4>User Email</h4><input type="gmail" class="form-control" id="src" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Valid Email"></br>
          <h4>Password</h4><input type="password" class="form-control" id="pass" name="pass" required placeholder="[Minimum 6 Characters]" pattern="^.{6,35}$"></br>
          <div class="text-center">
            <button class="btn btn-danger " name="submit" value="submit" type="submit" >Login</button>
    		    <h4><span class="glyphicon glyphicon-hand-right"></span><a href="forget_password.php">&nbsp;Forget Password</a></h4>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js'></script>
<script src="../js/index.js"></script>

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.singlePageNav.min.js"></script>
<script src="../js/unslider.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="../js/templatemo_script.js"></script>
</html>

<?php
include 'database.php';
$db=new db();

if(isset($_POST['submit']))
{
    $a1=$_SESSION['email']=$_POST['email'];
    $emailid=$_POST['email'];
    $password=$_POST['pass'];
   
   $_SESSION['emailid']=$emailid;
    
    $answer=$db->check($emailid,$password);
}
?>