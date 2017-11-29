<?php
session_start();
if(!$_SESSION['email'])
{
	header('location:copassenger_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Ride System</title>
    <meta name="description" content="Car Ride System Provide facility to passenger to book a particular ride" />
    
    <meta name="author" content="templatemo">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../favicon.png" />
    <!-- Font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template  -->
    <link href="../css/templatemo_style.css" rel="stylesheet">
</head>
<body>

<!--navigation menu start here-->
<div id="templatemo_mobile_menu">
  <ul class="nav nav-pills nav-stacked">
    <li><a rel="nofollow" href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
    <li><a rel="nofollow" href="../logout.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Logout</a></li>
    <li><a rel="nofollow" href="search_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link"><i class="glyphicon glyphicon-forward"></i>Slide Right</a></li>
  </ul>
</div>
<div class="container_wapper">
  <div id="templatemo_banner_menu">
    <div class="container-fluid">
      <div class="col-xs-4 templatemo_logo"><a href="#"><img src="../images/logo.png" id="logo_img" alt="Rideout System" title="Car Ride System" /></a>
      </div>
      <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li>
            <a rel="nofollow" href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link">
            <i class="glyphicon glyphicon-export"></i>Back</a>
          </li>
          <li>
            <a rel="nofollow" href="../logout.php" class="external-link">
            <i class="glyphicon glyphicon-export"></i>Logout</a>
          </li>
        </ul>
      </div>
      <div class="col-xs-8 visible-xs"><a href="#" id="mobile_menu"><span class="glyphicon glyphicon-th-list"></span></a></div>
    </div>
  </div>
</div>

<!--navigation menu end here-->
<style>
#set{
padding-top : 150px;
}

.container{
 background-image: url("../images/image2.jpg");
}
</style>
<div id="set">
  <div class="container">
    <form class="form-horizontal" method="POST" action="displaysearch.php?email=<?php echo @$_GET['email']; ?>">
	<div class="col-sm-10">
           <div class="table-responsive">
		<table class="table" border="5">	
			<tr align="center">
				<td colspan="2"><h3><b>Search Ride</b></h3></td>
			</tr>
			
			<tr>
				<td>Source</td>
				<td><input type="text" class="form-control" id="src" name="src" required /></td>
			</tr>
			<tr>
				<td>Destination</td>
				<td><input type="text" class="form-control" id="dest" name="dest" required /></td>
			</tr>
			<tr>
				<td>Date Of Journey</td>
				<td>
					<div class='input-group date' id='datetimepicker1'>
						<input type='text' class="form-control" name="doj" />
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
					</div>
				</td>
			</tr>
			<tr>
				<td>Seats Required</td>
				<td><input type="text" class="form-control" id="dest" name="seatsbook" required placeholder="[1 to 5]" pattern="[1-5]" /></td>
			</tr>
			<tr>
				<td colspan="2"><div class="text-center"><button class="btn btn-danger " name="search" value="submit" type="submit" >Search</button></div></td>
			</tr>
		</table>
          </div>
	</div>
	</form>
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