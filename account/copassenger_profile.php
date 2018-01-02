<?php
include 'database.php';
$db=new db();
$var = $_GET['email'];
$result = $db->profile($var);
$i=0;
foreach($result as $res)
{
$i++;
$fname = $res['first_name'];
$lname = $res['last_name'];
$email = $res['email'];
$address = $res['address'];
$addh = $res['uid'];
$con = $res['contact_no'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Ride System</title>
    <meta name="description" content="Car Ride System Provide facility to passenger to book a particular ride" />
    <meta name="author" content="RideOut Online System">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>

<body class="w3-light-grey">
  <nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="#"><img src="../images/logo.jpg" height="30" width="80" /></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="passenger_panal.php?email=<?php echo @$_GET['email'] ?>">Back</a></li>
				<li><a href="change_password.php?email=<?php echo @$_GET['email'] ?>">Change Password</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
 
  #align{padding-right: 2px;}  
  
  .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

  small {
  display: block;
  line-height: 1.428571429;
  color: #999;
  }
</style>





<div id="set">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-8">
      <div class="well well-sm"><center><h2><b>PROFILE</b></h2></center>
        <div class="row">
          <div class="col-sm-6 col-md-4"><img src="../images/profile.png" alt="images" class="img-rounded img-responsive" width="500" height="900" /></div>
            <div class="col-sm-6 col-md-6">
              <h4><b>First Name:</b></h4><p><?php echo $fname; ?></p>
              <h4><b>Last Name:</b></h4><p><?php echo $lname; ?></p>
              <h4><b>Email:</h4></b><p><?php echo @$_GET['email']; ?></p>
              <h4><b>Addhar Number:</b></h4><p><?php echo $addh; ?></p>
              <h4><b>Contact:</h4></b><p><?php echo $con; ?></p>
              <h4><b>Address:</h4></b><p><?php echo $address; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


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

</body>
</html>