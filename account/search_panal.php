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
    <title>RideOut</title>
    <meta name="description" content="Car Ride System Provide facility to passenger to book a particular ride" />
    
    <meta name="author" content="templatemo">
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
			<a class="navbar-brand" href="login_panal.php"><img src="../images/logo.jpg" height="30" width="80" /></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>">Back</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

<style>
.container{
 background-image: url("../images/image2.jpg");
}
</style>

<!-- google map api start here-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOs735Nv4ymhLSmNDvkpK3NRCEOOvKlyg&libraries=places&callback=initMap" async defer>
</script>
<script>
 
  
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      mapTypeControl: false,
      center: {
        lat: -33.8688,
        lng: 151.2195
      },
      zoom: 13
    });

    new AutocompleteDirectionsHandler(map);
  }

function AutocompleteDirectionsHandler(map) {
  this.map = map;
  this.originPlaceId = null;
  this.destinationPlaceId = null;
  this.travelMode = 'WALKING';
  var originInput = document.getElementById('origin-input');
  var destinationInput = document.getElementById('destination-input');
  var modeSelector = document.getElementById('mode-selector');
  this.directionsService = new google.maps.DirectionsService;
  this.directionsDisplay = new google.maps.DirectionsRenderer;
  this.directionsDisplay.setMap(map);

  var originAutocomplete = new google.maps.places.Autocomplete(
    originInput, {
      placeIdOnly: true
    });
  var destinationAutocomplete = new google.maps.places.Autocomplete(
    destinationInput, {
      placeIdOnly: true
    });

  this.setupClickListener('changemode-walking', 'WALKING');
  this.setupClickListener('changemode-transit', 'TRANSIT');
  this.setupClickListener('changemode-driving', 'DRIVING');

  this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
  this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
}

// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
  var radioButton = document.getElementById(id);
  var me = this;
  radioButton.addEventListener('click', function() {
    me.travelMode = mode;
    me.route();
  });
};
</script>
<!-- google map api closed here-->

<div id="set">
  <div class="container">
    <form class="form-horizontal" method="POST" action="displaysearch.php?email=<?php echo @$_GET['email']; ?>">
	<div class="col-xs-12">
           <div class="table-responsive">
		<table class="table" border="5">	
			<tr align="center">
				<td colspan="2"><h3><b>Search Ride</b></h3></td>
			</tr>
			
			<tr>
        <div id="map"></div>
				<td>Source</td>
				<td>
          <input id="origin-input" type="text" class="form-control" id="src" name="src" required placeholder="Enter Source" />
          <!--input type="text" class="form-control" id="src" name="src" required /-->
        </td>
			</tr>
			<tr>
				<td>Destination</td>
				<td>
          <input id="destination-input"  type="text" class="form-control" id="dest" name="dest" required placeholder="Enter Destination" />
          <!--input type="text" class="form-control" id="dest" name="dest" required /-->
        </td>
			</tr>
			<tr>
				<td>Date Of Journey</td>
				<td>
				    
						<input type="text" name="doj" required id="datepicker">
						
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>	
$( function() {
    $( "#datepicker" ).datepicker({ minDate: 0 });
  } );   
</script>
</html>