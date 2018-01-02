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
			<a class="navbar-brand" href="login_panal.php"><img src="../images/logo.jpg" height="30" width="80" /></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>">Home</a></li>
				<li><a href="search_panal.php?email=<?php echo @$_GET['email']; ?>">Back</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>


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
    <?php
    $id = @$_GET['id'];
    //echo $id;
    ?>

    <?php
        include 'database.php';
        $db=new db();
        $run = $db->journey_details('journey',$id);
        ?>
        <div class="container">
            <div class="table-responsive">
                <table class="table" border="2">
                    <tr><td align="center" colspan="2"><h2><b>CarOwner Details</b><h2></td></tr>
                    <tr>
                        <td align="center"><h4><b>Journey Id:</b></h4></td>
                        <td><?php echo $run["journey_id"]; ?></td>
                    </tr>
                    
                    <tr>
                        <td align="center"><h4><b>Email:</b></h4></td>
                        <td><?php echo $run["email"]; ?></td>
                    </tr>
                    <tr>
                        <td align="center"><h4><b>Car Number:</b></h4></td>
                        <td><?php echo $run["car_no"]; ?></td>
                    </tr>
                    <tr>
                        <td align="center"><h4><b>Mobile Number:</b></h4></td>
                        <td><?php echo $run["mobno"]; ?></td>
                    </tr>
                </table>
            </div>
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