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
    <!--li><a rel="nofollow" href="../index.php" class="external-link"><i class="glyphicon glyphicon-phone-alt"></i>
            Home Page</a>
    </li-->

    <li><a rel="nofollow" href="user_profile.php" class="external-link">
        <i class="glyphicon glyphicon-user"></i>Profile</a>
    </li>
    <li><a rel="nofollow" href="../logout.php" class="external-link">
        <i class="glyphicon glyphicon-lock"></i>Logout</a>
    </li>
<li><a rel="nofollow" href="login_panal.php" class="external-link"><i class="glyphicon glyphicon-forward"></i>Slide Right</a></li>
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
          <!--li><a rel="nofollow" href="../index.php" class="external-link"><i class="glyphicon glyphicon-phone-alt"></i>
            Home Page</a>
          </li-->

          <li><a rel="nofollow" href="user_profile.php" class="external-link"><i class="glyphicon glyphicon-phone-alt"></i>
            Profile</a>
          </li>
          <li><a rel="nofollow" href="../logout.php" class="external-link"><i class="glyphicon glyphicon-lock"></i>
              Logout</a>
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
          <h1 style="font-size:40px">Login Panel</h1>
          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_left">
              <div class="event_box_img"><img src="../images/book_jur.jpg" class="img-responsive" alt="traffic" /></div>
              <div class="event_box_caption">
                <a href="add_journey.php"><h1><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Add Journey</h1></a>
                <p>Car owner can add the journey details here..</p>
                <p>In add journey the car owner can add his journey details like source,destination,car number,
				number of seats available,date of journey,mobile number..</p>
              </div>
            </div>
          </div>
        
          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_right">
              <div class="event_box_img"><img src="../images/save_money.jpg" class="img-responsive" alt="save_money" /></div>
              <div class="event_box_caption">
                <a href="update_journey.php"><h1><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Update Journey</h1></a>
                <p>Car owner can update the journey here..</p>
                <p>In update journey the car owner can update journey like source,destination,car number,
				number of seats available,date of journey,mobile number..</p>
              </div>
            </div>
          </div>
          
          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_left">
              <div class="event_box_img"><img src="../images/save_fuel.jpg" class="img-responsive" alt="fual" /></div>
              <div class="event_box_caption">
                <a href="booking_panal.php"><h1><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Check Booking List</h1></a>
                <p>Car owner can check the booking status here..</p>
                <p>In booking status the car owner can check the booking status of those passengers who have requested for his ride but has not been booked</p>
              </div>
            </div>
          </div>

          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_left">
              <div class="event_box_img"><img src="../images/conf.jpg" class="img-responsive" alt="fual" /></div>
              <div class="event_box_caption">
                <a href="confirm_booking_panal.php"><h1><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Confirm Booking</h1></a>
                <p>Car owner can confirm his booking of copassengers here..</p>
                <p>After selecting his journey_id, the carowner will confirm the rides requested by co-passengers..</p>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>

<div id="templatemo_footer" style="background-color:#f15556">
  <div><p id="footer">Copyright &copy; 2017 RideOut System</p></div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.singlePageNav.min.js"></script>
<script src="../js/unslider.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="../js/templatemo_script.js"></script>

</body>
</html>