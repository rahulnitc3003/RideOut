<?php
session_start();
$ver=$_SESSION['emailid'];
if(!$_SESSION['emailid'])
{
	header('location:copassenger_login.php');
}
?>

<!DOCTYPE html>
<html>
<title>RideOut</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
</style>
<body class="w3-light-grey">

<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-large">
  <a href="login_panal.php" class="w3-bar-item w3-button w3-red w3-mobile"><img src="../images/logo.png" height="30" width="80" /></a>
  <a href="copassenger_profile.php?email=<?php echo @$_GET['email'] ?>" class="w3-bar-item w3-button w3-mobile">Profile</a>
  <a href="change_password.php?email=<?php echo @$_GET['email'] ?>" class="w3-bar-item w3-button w3-mobile">Change Password</a>
 
  <a href="../logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
  <img class="w3-image" src="https://www.w3schools.com/w3images/london2.jpg" alt="London" width="1500" height="700">
  <div class="w3-display-middle" style="width:65%">
    <div class="w3-bar w3-black">
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'add');"><i class="fa fa-car w3-margin-right"></i>Search Ride</button>
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'update');"><i class="fa fa-car w3-margin-right"></i>Book Ride</button>
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'book');"><i class="fa fa-list w3-margin-right"></i>Confirmations</button>
      
    </div>

    <!-- Tabs -->
    <div id="add" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Ride with awesome company</h3>
      <p>Find a friendly company to travel with</p>
      <!--<p>We know hotels - we know comfort.</p>-->
      <p><a href="search_panal.php?email=<?php echo @$_GET['email']; ?>"><button class="w3-button w3-dark-grey">Search</button></a></p>
    </div>

    <div id="update" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Got a companion? Tell him too.</h3>
      <p>Request the car owner you want to ride with.</p>
      <!--<p>We know hotels - we know comfort.</p>-->
      <p><a href="ride_booking.php?email=<?php echo @$_GET['email']; ?>"><button class="w3-button w3-dark-grey">Book</button></a></p>
    </div>

    <div id="book" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Hurray!!! You got a ride</h3>
      <p>Check whether your request is confirmed or not.</p>
      <!--<p>We know hotels - we know comfort.</p>-->
      <p><a href="booking_status.php?email=<?php echo @$_GET['email']; ?>"><button class="w3-button w3-dark-grey">Status</button></a></p>
    </div>

    

  </div>
</header>



<!-- Footer -->
<footer class="w3-container w3-center w3-opacity w3-margin-bottom">
  <h5>Find Us On</h5>
  <div class="w3-xlarge w3-padding-16">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <div class="copyright text-center">
							<br>
							
							<p>Copyrigh© <script>document.write(new Date().getFullYear())</script>&nbsp;&nbsp;Team RideOut. All Rights Reserved.</p>
						</div>
</footer>

<script>
// Tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>




</body>
</html>