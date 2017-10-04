<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
    //header('Location: login_panal.html');
}

if(isset($_SESSION['token'])){
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    //Initialize User class
    $user = new User();
    
    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'picture'       => $gpUserProfile['picture']
    );
    $userData = $user->checkUser($gpUserData);
    
    //Storing user data into session
    $_SESSION['userData'] = $userData;
    //Render facebook profile data
    if(!empty($userData)){
      header('Location:account/login_panal.php');
    }
    else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
}
else{
    $authUrl = $gClient->createAuthUrl();
    //$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">Login</a>';
    $output = filter_var($authUrl, FILTER_SANITIZE_URL);
    //header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Ride System</title>
    <meta name="description" content="Car Ride System Provide facility to passenger to book a particular ride" />
    <!-- templatemo 411 dragonfruit -->
    <meta name="author" content="templatemo">
    <!-- Favicon-->
    <link rel="shortcut icon" href="./favicon.png" />
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template  -->
    <link href="css/templatemo_style.css" rel="stylesheet">
</head>
<body>

<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  #set{padding-top: 70px;}
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 120px 25px;
      font-family: Montserrat, sans-serif;
  }
  
  
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
</style>

<!--navigation menu start here-->
<div id="set">
<div id="templatemo_mobile_menu">
  <ul class="nav nav-pills nav-stacked">
    <li><a rel="nofollow" href="index.php" class="external-link"><i class="glyphicon glyphicon-home"></i>Home</a></li>
    <li><a rel="nofollow" href="about_us.php" class="external-link">
        <i class="glyphicon glyphicon-list"></i>About Us</a>
    </li>
    <li><a rel="nofollow" href="contact_us.php" class="external-link">
        <i class="glyphicon glyphicon-phone-alt"></i>Contact Us</a>
    </li>
    <li><a rel="nofollow" href="our_team.html" class="external-link"><i class="glyphicon glyphicon-user"></i>Our Team</a></li>
    <li><a rel="nofollow" href="index.php" class="external-link"><i class="glyphicon glyphicon-forward"></i>Slide Right</a></li>
    <li>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#f15556">
              <i class="glyphicon glyphicon-lock"></i>Login
              <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a rel="nofollow" href=<?php echo $output; ?> class="external-link">Car Owner</a></li>
                <li><a rel="nofollow" href="account/copassenger_login.php" class="external-link">CoPassenger</a></li>
              </ul>
            </div>
    </li>
  </ul>
</div>

<div class="container_wapper">
  <div id="templatemo_banner_menu">
    <div class="container-fluid">
      <div class="col-xs-4 templatemo_logo">
        <a href="index.php"><img src="images/logo.png" alt="Rideout System" title="Car Ride" /></a>
      </div>
      <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li><a rel="nofollow" href="index.php" class="external-link"><i class="glyphicon glyphicon-home"></i>Home</a></li>
          <li><a rel="nofollow" href="about_us.php" class="external-link"><i class="glyphicon glyphicon-list"></i>
              About Us</a></li>
          <li><a rel="nofollow" href="contact_us.php" class="external-link"><i class="glyphicon glyphicon-phone-alt"></i>
              Contact Us</a></li>
          <li><a rel="nofollow" href="our_team.html" class="external-link"><i class="glyphicon glyphicon-user"></i>
              Our Team</a></li>
          <!--li><a rel="nofollow" href=<?php echo $output; ?> class="external-link"><i class="glyphicon glyphicon-lock"></i>
              Login</a></li-->
          <li>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
              <i class="glyphicon glyphicon-lock"></i>Login
              <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a rel="nofollow" href=<?php echo $output; ?> class="external-link">Car Owner</a></li>
                <li><a rel="nofollow" href="account/copassenger_login.php" class="external-link">CoPassanger</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-xs-8 visible-xs"><a href="#" id="mobile_menu"><span class="glyphicon glyphicon-th-list"></span></a></div>
    </div>
  </div>
</div>
</div>
<!--navigation menu end here-->

<!--========slider start here===========-->
<br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/slider1.jpg" alt="Chania" width="460" height="345">
      </div>

      <div class="item">
        <img src="images/slider2.jpg" alt="Chania" width="460" height="345">
      </div>
    
      <div class="item">
        <img src="images/slider3.jpg" alt="Flower" width="460" height="345">
      </div>

      <div class="item">
        <img src="images/slider4.jpg" alt="Flower" width="460" height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<!--============slider end here===========-->

<div id="templatemo_about" class="container_wapper">
  <div class="container-fluid">
    <h1>Overviews</h1>
    <div class="col-sm-6 col-md-3 about_icon">
      <div class="imgwap mission"><i class="fa fa-car"></i></div>
      <h2>You're in control</h2>
      <p>Verified member profiles and their ride Ids mean you know exactly who you're travelling with.</p>
    </div>
    <div class="col-sm-6 col-md-3 about_icon">
      <div class="imgwap product"><i class="fa fa-cubes"></i></div>
      <h2>Carpool with confidence</h2>
      <p>Book Id and Ride Id allotment adds another level of security to member profiles.</p>
    </div>
    <div class="col-sm-6 col-md-3 about_icon">
      <div class="imgwap testimonial"><i class="fa fa-rocket"></i></div>
      <h2>Get going faster</h2>
      <p>No need to travel across town, catch a ride leaving near you.</p>
    </div>
    <div class="col-sm-6 col-md-3 about_icon">
      <div class="imgwap statistic"><i class="fa fa-comments"></i></div>
      <h2>Social Work</h2>
      <p>Carpooling solves all problems related to transportation costs and is available to all.</p>
    </div>

    <div class="clearfix testimonial_top_bottom_spacer"></div>
    <div class="col-xs-1 pre_next_wap" id="prev_testimonial">
      <a href="#"><span class="glyphicon glyphicon-chevron-left pre_next" style="color: #f15556"></span></a>
    </div>
    
    <div id="testimonial_text_wap" class="col-xs-9 col-sm-10">
        <div class="testimonial_text">
          <div class="col-sm-3">
            <img src="images/img1.jpg" class="img-responsive" alt="Business Development Manager" />
          </div>
          <div class="col-sm-9">
            <h2>OFFER/LOOK FOR A RIDE</h2>
            <p>Register with us as a DRIVER or RIDE SEEKER for a hassle free, economical and safe trip.</p>
          </div>
        </div><!--.testimonial_text-->
         
        <div class="testimonial_text">
          <div class="col-sm-3">
            <img src="images/img2.jpg" class="img-responsive" alt="Public Relation Officer" />
          </div>
          <div class="col-sm-9">
            <h2>PLAN YOUR ROUTE</h2>
            <p>Enter details of your route (starting point, destination, seats available, date of journey if any) and find others who can share the trip as you are the car-owner.</p>
          </div>
        </div><!--.testimonial_text-->
        
        <div class="testimonial_text">
          <div class="col-sm-3"><img src="images/img3.jpg" class="img-responsive" alt="Marketing Executive" /></div>
          <div class="col-sm-9">
            <h2>GO TO A SAFE RIDE</h2>
            <p>Carpooling saves your time, your money in this mordern era ,Carpooling is something that will benefit all of us.Have a happy and safe ride !</p>
          </div>
        </div><!--.testimonial_text-->
        
        <div class="testimonial_text">
          <div class="col-sm-3"><img src="images/img4.jpg" class="img-responsive" alt="Chief Executive Officer" /></div>
          <div class="col-sm-9">
            <h2>CHOOSE YOUR RIDE</h2>
            <p>There are a number of benefits when two or more people share a ride in one vehicle.Avail it before it goes in vain.</p>
          </div>
        </div><!--.testimonial_text-->
    </div><!--#testimonial_text_wap-->
    
    <div class="col-xs-1 pre_next_wap" id="next_testimonial">
      <a href="#"><span class="glyphicon glyphicon-chevron-right pre_next"style="color: #f15556"></span></a>
    </div>
    <div class="clearfix testimonial_top_bottom_spacer"></div>
  </div>
</div><!--templatemo_about-->

<div id="templatemo_events" class="container_wapper" style="background-color:#f15556">
    <div class="container-fluid">
        <h1 style="font-size:40px">Our Supports</h1>
        <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_left">
                <div class="event_box_img">
                    <img src="images/traffic.jpg" class="img-responsive" />
                </div>
               <div class="event_box_caption">
                    <h1><span class="glyphicon glyphicon-road"></span>&nbsp;&nbsp;Reduce Traffic</h1>
                    <p>Carpooling is also seen as an environmental friendly way to travel as sharing journeys reduces air pollution, traffic congestion, and parking space.</p>
                    <p>If you carpool to and from work you would probably cut your transportation emissions number in half,or even better. Every carpooling participant takes another car off the road , which means less congested roads and highways..</p>
                </div>
            </div>
        </div>
        
        <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_right">
                <div class="event_box_img">
                    <img src="images/save_money.jpg" class="img-responsive" />
                </div>
               <div class="event_box_caption">
                    <h1><span class="glyphicon glyphicon-usd"></span>&nbsp;&nbsp;Save Money</h1>
                    <p>By splitting the fare, you will save your money</p>
                    <p>See what other carpoolers are spending on routes and destinations you might be interested in.</p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_left">
                <div class="event_box_img">
                    <img src="images/save_fuel.jpg" class="img-responsive" />
                </div>
               <div class="event_box_caption">
                    <h1><span class="glyphicon glyphicon-tint"></span>&nbsp;&nbsp;Save Fuel</h1>
                    <p>You can save money on gas and such by diving up the gas fees among your carpool passengers.</p>
                    <p>The more people you have the more you can save.Carpooling also helps you save on the cost of vehicle repairs and maintenance if you rotate vehicle use between the members of your carpool team.Additionally,you and everyone else can save money on road fees because with more carpooling there are fewer cars on the road and therefore less wear and damage to the roads that need to be repaired each year..</p>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_right">
                <div class="event_box_img">
                    <img src="images/save_tree.jpg" class="img-responsive" alt="" />
                </div>
                <div class="event_box_caption">
                    <h1><span class="glyphicon glyphicon-tree-conifer"></span>&nbsp;&nbsp;Save Green</h1>
                    <p>Carpooling will reduce Vehicle Emissions,traffic volumes and Congestion, thereby helping in going Green.</p>
                    <p>Carpooling will help in reducing travel expenses, need for a second car, improved travel time. Carpooling Reduces vehicular pollution (benefits local citizens), Green House Gas emissions,road rage investment in transport infrastructure..</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2 style="padding-top:1650px">SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-road logo-small"></span>
      <h4>Speed</h4>
      <p>The app is sufficiently fast in matching passengers with drivers. All hail complex algorithms!</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-star logo-small"></span>
      <h4>Review</h4>
      <p>See the person's you have confirmed your ride with. This feature ensures users put their best foot forward.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-user logo-small"></span>
      <h4>Buddies</h4>
      <p>Enjoyed riding with someone?
Make them your buddy!</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>Security</h4>
      <p>All are users will be screened on google as they have to login via gmail_id. to help make rides safe.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-map-marker logo-small"></span>
      <h4>Recurring Rides</h4>
      <p>Just post your ride once using Add Your Journey. Carpool everyday. Carpooling was never so easy.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo-small"></span>
      <h4 style="color:#303030;">Goals</h4>
      <p>Make personal goals, and measure the miles you have shared and the carbon emissions you have saved.</p>
    </div>
  </div>
</div>
</br></br></br></br>

<div id="templatemo_footer" style="background-color:#f15556">
    <div>
        <p id="footer">Copyright &copy; 2017 RideOut System</p>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.singlePageNav.min.js"></script>
<script src="js/unslider.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="js/templatemo_script.js"></script>

  <!--extra added files-->
</body>
</html>