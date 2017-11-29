<?php
session_start();
$ver=$_SESSION['emailid'];
if(!$_SESSION['emailid'])
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
    <meta name="author" content="RideOut Online System">
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

<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  #set{padding-top: 50px;}
  #align{padding-right: 2px;}
</style>

<!--navigation menu start here-->
<div id="templatemo_mobile_menu">
  <ul class="nav nav-pills nav-stacked">
    <li><a rel="nofollow" href="../logout.php" class="external-link">
        <i class="glyphicon glyphicon-user"></i>Logout</a>
    </li>
    <li><a rel="nofollow" href="change_password.php?email=<?php echo @$_GET['email'] ?>" class="external-link">
        <i class="glyphicon glyphicon-user"></i>Change Password</a>
    </li>
    <li><a rel="nofollow" href="copassenger_profile.php?email=<?php echo @$_GET['email'] ?>" class="external-link">
        <i class="glyphicon glyphicon-user"></i>Profile</a>
    </li>
    <li><a rel="nofollow" href="passenger_panal.php?email=<?php echo @$_GET['email'] ?>" class="external-link">
        <i class="glyphicon glyphicon-forward"></i>Slide Right</a>
    </li>
  </ul>
</div>

<div class="container_wapper">
  <div id="templatemo_banner_menu">
    <div class="container-fluid">
      <div class="col-xs-4 templatemo_logo">
        <a href="../index.php"><img src="../images/logo.png" id="logo_img" alt="website logo" title="Car Ride" /></a>
      </div>
      <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li><a rel="nofollow" href="copassenger_profile.php?email=<?php echo @$_GET['email'] ?>" class="external-link">
              <i class="glyphicon glyphicon-user"></i>Profile</a>
          </li>
          <li><a rel="nofollow" href="change_password.php?email=<?php echo @$_GET['email'] ?>" class="external-link">
              <i class="glyphicon glyphicon-user"></i>Change Password</a>
          </li>
          <li><a rel="nofollow" href="../logout.php" class="external-link">
              <i class="glyphicon glyphicon-user"></i>Logout</a>
          </li>
        </ul>
      </div>
      <div class="col-xs-8 visible-xs"><a href="#" id="mobile_menu"><span class="glyphicon glyphicon-th-list"></span></a></div>
    </div>
  </div>
</div>
<!--navigation menu end here-->

<div id="set">
  <div id="templatemo_events" class="container_wapper" style="background-color:#f15556">
      <div class="container-fluid">
          <h1 style="font-size:40px">Passanger Panel</h1>
          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_left">
              <div class="event_box_img"><img src="../images/search.jpg" class="img-responsive" alt="traffic" /></div>
              <div class="event_box_caption">
                <a href="search_panal.php?email=<?php echo @$_GET['email']; ?>"><h1><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Search Ride</h1></a>
                <p>Copassenger can search the ride available here..</p>
                <p>Copassenger can search all the ride and their details after login..Copassenger can enter his ride preferences and can see the
				ride which are available..</p>
              </div>
            </div>
          </div>
        
          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_right">
              <div class="event_box_img"><img src="../images/book.jpg" class="img-responsive" alt="save_money" /></div>
              <div class="event_box_caption">
                <a href="ride_booking.php?email=<?php echo @$_GET['email']; ?>"><h1><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Book Ride</h1></a>
                <p>After searching ride ,copassenger can book the desired ride here.. </p>
                <p>When copassenger find the matched ride then he can book the ride to the car owner..</p>
              </div>
            </div>
          </div>
          
          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_left">
              <div class="event_box_img"><img src="../images/status.jpg" class="img-responsive" alt="fual" /></div>
              <div class="event_box_caption">
                <a href="booking_status.php?email=<?php echo @$_GET['email']; ?>"><h1><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Check Booking Confirmation</h1></a>
                <p>Copassenger can check his/her booking status here..</p>
                <p>When copassenger will book the ride ,after that car owner confirms the ride then he can check his booking status whether the ride has been booked or not..</p>
              </div>
            </div>
          </div>

          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_left">
              <div class="event_box_img"><img src="../images/feedback.jpg" class="img-responsive" alt="fual" /></div>
              <div class="event_box_caption">
                <a href="feedback.php?email=<?php echo @$_GET['email']; ?>"><h1><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;FeedBack</h1></a>
                <p>The sharing of car journeys so that more than one person travels in a car.</p>
                <p>Carpooling reduces each person's travel costs such as fuel costs, tolls, and the stress of driving. Carpooling is also a more environmentally friendly and sustainable way to travel as sharing journeys reduces carbon emissions, traffic congestion on the roads, and the need for parking spaces.</p>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>

<div id="templatemo_footer" style="background-color:#f15556"><p id="footer">Copyright &copy; 2017 RideOut System</p></div>

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.singlePageNav.min.js"></script>
<script src="../js/unslider.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="../js/templatemo_script.js"></script>

</body>
</html>