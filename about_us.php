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

if (isset($_SESSION['token'])) {
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
        /*$output = '<h1>Google+ Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Logged in with : Google';
        $output .= '<br/>Logout from <a href="logout.php">Google</a>';*/
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
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
    <li><a rel="nofollow" href="about_us.php" class="external-link"><i class="glyphicon glyphicon-forward"></i>Slide Right</a></li>
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
         <a href="index.php"><img src="images/logo.png" id="logo_img" title="Car Ride" /></a>
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



<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/about2.jpg" alt="New York" width="1200" height="700">
             
      </div>

      <div class="item">
        <img src="images/about1.jpg" alt="Chicago" width="1200" height="700">
              
      </div>
    
      <div class="item">
        <img src="images/about3.jpg" alt="Los Angeles" width="1200" height="700">
        
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

<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3><b>ABOUT US</b></h3>
  <p>Who we are and what we do We are an environmentally conscious organisation that provides safe carpooling solutions with the aim of reducing the burden on the environment and the economy.We provide a safe and up-to-date web application for conscientious citizens to exchange relevant information, based on which they can find suitable and safe carpooling options. We are a reliable platform for people to connect for the purpose of sharing a ride and thereby, share the cost of travel.</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Flexibility</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="images/aimg1.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo" class="collapse">
        <p>RideOut  provides an ease of flexibility.
         RideOut users can find their desired rides and co-passengers
          with just a few clicks.</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Reliability</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="images/aimg2.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo2" class="collapse">
        <p>RideOut provides with the facility of reliability.
        Ride Id and Book Id Alloted to Passengers does the work.</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Overall efficiency</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="images/aimg3.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p>RideOut provides the overall efficiency 
          as the rideout users enjoy its smooth working.</p>
      </div>
    </div>
  </div>
</div>



</br></br>

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
</body>
</html>