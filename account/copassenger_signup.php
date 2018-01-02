<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideOut</title>
    <meta name="description" content="Car Ride System Provide facility to passenger to book a particular ride" />
    
    <meta name="author" content="templatemo">
    <link rel="shortcut icon" href="../images/favicon.png" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body class="w3-light-grey">
  <nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="login_panal.php"><img src="../images/logo.jpg" height="30" width="80" /></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="../index.php">Home</a></li>
				<li><a href="copassenger_login.php">Login</a></li>
			</ul>
		</div>
	</div>
</nav>
    
</head>

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
</style>

<!--navigation menu end here-->

<div id="set">
<div class="container">
  <form class="form-horizontal" method="POST" action="copassenger_signup.php">
    <div class="row">
      <center><h1>Sign Up Form</h1></center><br>
      	<h4>First Name*</h4><input type="text" class="form-control" id="src" name="fname" required placeholder="First Name"></br>
        <h4>Second Name*</h4><input type="text" class="form-control" id="src" name="lname" required placeholder="Second Name"></br>
        <h4>Email*</h4><input type="email" class="form-control" id="src" name="emailid" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Valid Email"></br>
        <h4>Password*</h4><input type="password" class="form-control" id="pass" style="width:10" name="pass" required placeholder="[Minimum 6 Characters]" pattern="^.{6,35}$"></br>
        <h4>Address*</h4><textarea class="form-control" rows="2" id="add" name="add" required placeholder="Your Address"></textarea></br>
        <h4>Aadhaar Number*</h4><input type="text" class="form-control" id="uid" name="uid" required placeholder="Valid 12 digit Aadhaar Number" pattern="[0-9]{12}" /></br> 
        <h4>Contact Number*</h4><input type="text" class="form-control" id="pass" style="width:10" name="cno" required placeholder="Contact Number" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" /></br></br>
	  <div class="form-group"> 
        <div class="text-center"><button class="btn btn-danger " name="submit" value="submit" type="submit" >Sign Up</button></div>
      </div>
    </div>
  </form>
</div>
</div>
</body>
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
    
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $email_i=$_POST['emailid'];
    $passw=$_POST['pass'];
    $addr=$_POST['add'];
    $uid = $_POST['uid'];
    $contactno=$_POST['cno'];
    $_SESSION['emailid']=$email_i;
    $sql="insert into copassenger values ('$firstname','$lastname','$email_i','$passw','$addr','$uid','$contactno')";
    $db->coinsert($sql);   
}
?>