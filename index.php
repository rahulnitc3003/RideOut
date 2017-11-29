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
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Ride Out online Ride sharing Website One page parallax responsive HTML Template ">
        
        <meta name="author" content="Rideout System">
		
        <title>RideOut</title>
		
		<!-- Mobile Specific Meta
		================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="images/favicon.png">
		
		<!-- CSS
		================================================== -->
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="plugins/themefisher-font/style.css">
		<!-- bootstrap.min css -->
        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
		<!-- Animate.css -->
        <link rel="stylesheet" href="plugins/animate-css/animate.css">
        <!-- Magnific popup css -->
        <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
		<!-- Slick Carousel -->
        <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
        <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/style.css">

			
    </head>
	
    <body id="body" data-spy="scroll" data-target=".navbar" data-offset="50">
	    <!--
	    Start Preloader
	    ==================================== -->
		<div id="preloader">
			<div class="preloader">
				<div class="sk-cube-grid">
				  <div class="sk-cube sk-cube1"></div>
				  <div class="sk-cube sk-cube2"></div>
				  <div class="sk-cube sk-cube3"></div>
				  <div class="sk-cube sk-cube4"></div>
				  <div class="sk-cube sk-cube5"></div>
				  <div class="sk-cube sk-cube6"></div>
				  <div class="sk-cube sk-cube7"></div>
				  <div class="sk-cube sk-cube8"></div>
				  <div class="sk-cube sk-cube9"></div>
				</div>
			</div>
		</div>
        <!--
        End Preloader
        ==================================== -->

 <!--Welcome Slider
==================================== -->

<section class="hero-area">
	<div class="block">
		
		<h1>Experience The World Of Ride Sharing</h1>
		<p>Fully AirConditioned cars that you can share with others depending upon your route and location</p>
		<a data-scroll href="#about" class="btn btn-transparent">Explore Us</a>
	</div>
</section>	

 <!-- 
  Fixed Navigation
  ==================================== -->
    <header id="navigation" class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
              <!-- responsive nav button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- /responsive nav button -->
                <a href="index.php" class="w3-bar-item w3-button w3-red w3-mobile"><img src="../images/logo.jpg" height="40" width="100" /></a>
          
                <!-- logo -->
                <!--a class="navbar-brand logo" href="#body">
                    
                    <svg width="40px" height="40px" viewBox="0 0 45 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Group" transform="translate(2.000000, 2.000000)" stroke="#57CBCC" stroke-width="3">
                                <ellipse id="Oval" cx="20.5" cy="20" rx="20.5" ry="20"></ellipse>
                                <path d="M6,7 L33.5,34.5" id="Line-2" stroke-linecap="square"></path>
                                <path d="M21,20 L34,7" id="Line-3" stroke-linecap="square"></path>
                            </g>
                        </g>
                    </svg>
                </a-->
            <!-- /logo -->
        </div>

        <!-- main nav -->
        <nav class="collapse navbar-collapse navbar-right" role="Navigation">
            <ul id="nav" class="nav navbar-nav navigation-menu">
                <li><a data-scroll href="#body">Home</a></li>
                <li><a data-scroll href="#about">About Us</a></li>
                <li><a data-scroll href="#overview">Overview</a></li>
                <!--<li><a data-scroll href="#skill">Skill</a></li>-->
                <li><a data-scroll href="#support">Support</a></li>
                <li><a data-scroll href="#our-team">Team</a></li>
                <li><a data-scroll href="#contact-us">Contact</a></li>
                <li>
 		           <div class="dropdown">
        		      	<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Login
              				<span class="caret"></span>
              			</button>
              			<ul class="dropdown-menu">
                			<li><a rel="nofollow" href=<?php echo $output; ?> class="external-link">Car Owner</a></li>
                			<li><a rel="nofollow" href="account/copassenger_login.php" class="external-link">CoPassenger</a></li>
              			</ul>
            		</div>
    			</li>
            </ul>
        </nav>
        <!-- /main nav -->
  
      </div>
  </header>
  <!--
  End Fixed Navigation
  ==================================== -->

<!--
		Start About Section
		==================================== -->
		<section class="bg-one about section" id="about">
			<div class="container">
				<div class="row">
				
					<!-- section title -->
					<div class="title text-center wow fadeIn" data-wow-duration="1500ms" >
						<h2>About <span class="color">Us</span> </h2>
						<div class="border"></div>
					</div>
					<!-- /section title -->
					
					<!-- About item -->
					<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" >
						<div class="block">							
							<div class="icon-box">
								<i class="tf-tools"></i>
							</div>					
							<!-- Express About Yourself -->
							<div class="content text-center">
								<h3 class="ddd">Flexibility</h3>								
								<p>RideOut provides an ease of flexibility. RideOut users can find their desired rides and co-passengers with just a few clicks.</p>
							</div>
						</div>
					</div> 
					<!-- End About item -->
					
					<!-- About item -->
					<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="250ms">
						<div class="block">
							<div class="icon-box">
								<i class="tf-strategy"></i>
							</div>
							<!-- Express About Yourself -->
							<div class="content text-center">
								<h3>Reliability</h3>
								<p>RideOut provides with the facility of reliability. Ride Id and Book Id Alloted to Passengers does the work.</p>
							</div>
						</div>
					</div> 
					<!-- End About item -->
					
					<!-- About item -->					
					<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
						<div class="block kill-margin-bottom">
							<div class="icon-box">
								<i class="tf-anchor2"></i>
							</div>
							<!-- Express About Yourself -->
							<div class="content text-center">
								<h3>Overall efficiency</h3>
								<p>RideOut provides the overall efficiency as the rideout users enjoy its smooth working.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
							</div>
						</div>
					</div> 
					<!-- End About item -->
					
				</div> 		<!-- End row -->
			</div>   	<!-- End container -->
		</section>   <!-- End section -->

<section class="section about-2 padding-0 bg-dark">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 padding-0 ">
				<img class="img-responsive" src="images/about/about-business-man.jpg" alt="">
			</div>
			<div class="col-md-6">
				<div class="content-block">
					<h2>Who we are and what we do </h2>
					<p>We are an environmentally conscious organisation that provides safe carpooling solutions with the aim of reducing the burden on the environment and the economy.We provide a safe and up-to-date web application for conscientious citizens to exchange relevant information, based on which they can find suitable and safe carpooling options. We are a reliable platform for people to connect for the purpose of sharing a ride and thereby, share the cost of travel.
					<div class="row">
						<div class="col-md-6">
							<div class="media">
								<div class="pull-left">
									<i class="tf-circle-compass"></i>	
								</div>
								<div class="media-body">
									<h4 class="media-heading">Easy Booking</h4>
									<p>We provide a platform for easy booking,alteration and if you change your plan,we don't charge you anything.</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="media">
								<div class="pull-left">
									<i class="tf-hotairballoon"></i>	
								</div>
								<div class="media-body">
									<h4 class="media-heading">Work for Society</h4>
									<p>As a good citizen, we give ten percent of what we get from you to ISHA foundation for a better society.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Start Services Section
==================================== -->

<section id="overview" class="bg-one section">
	<div class="container">
		<div class="row">
			
			<!-- section title -->
			<div class="title text-center wow fadeIn" data-wow-duration="500ms">
				<h2><span class="color">Overviews</span></h2>
				<div class="border"></div>
			</div>
			<!-- /section title -->
			
            <!-- Single Service Item -->
			<article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms">
				<div class="service-block text-center">
					<div class="service-icon text-center">
						<i class="tf-globe"></i>
					</div>
					<h3>You're in control</h3>
					<p>

Verified member profiles and their ride Ids mean you know exactly who you're travelling with.</p>
				</div>
			</article>
            <!-- End Single Service Item -->
            
            <!-- Single Service Item -->
			<article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
				<div class="service-block text-center">
					<div class="service-icon text-center">
						<i class="tf-ion-laptop"></i>
					</div>
					<h3>Carpool with confidence</h3>
					<p>Book Id and Ride Id allotment adds another level of security to member profiles.</p>
				</div>
			</article>
            <!-- End Single Service Item -->
            
            <!-- Single Service Item -->
			<article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="400ms">
				<div class="service-block text-center">
					<div class="service-icon text-center">
						<i class="tf-genius"></i>
					</div>
					<h3>Get going faster</h3>
					<p>No need to travel across town, catch a ride leaving near you</p>
				</div>
			</article>
			
				
		</div> 		<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->
	

<!-- Start Team Skills
		=========================================== -->
		
		<!--<section id="skill" class="parallax-section section section-bg overly">-->
		<!--	<div class="container">-->
		<!--		<div class="row" >-->
					<!-- section title -->
		<!--			<div class="col-md-12">-->
		<!--				<div class="title text-center">-->
		<!--					<h2>Our <span class="color">Skills</span></h2>-->
		<!--					<div class="border"></div>-->
		<!--				</div>-->
		<!--			</div>-->
					<!-- /section title -->
		<!--		</div>  		<!-- End row -->
		<!--		<div class="row">-->
		<!--			<div class="col-md-6">-->
		<!--				<h2>We’ve skilled in wide range of web and <br>-->
		<!--					Other digital market tools.</h2>-->
		<!--					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis magni explicabo cum aperiam recusandae sunt accusamus totam. Quidem quos fugiat sapiente numquam accusamus quas hic, itaque in libero reiciendis tempora!</p>-->
		<!--					<img class="img-responsive" src="images/about/company-growth.png" alt="">-->
		<!--			</div>-->
		<!--			<div class="col-md-6">-->
		<!--				<ul class="skill-bar">-->
		<!--					<li>-->
		<!--						<p><span>01-</span> Business Development</p>-->
		<!--						<div class="progress">-->
		<!--							<div class="progress-bar" role="progressbar" aria-valuenow="70"-->
		<!--							aria-valuemin="0" aria-valuemax="100" style="width:90%">-->
		<!--							</div>-->
		<!--						</div>-->
		<!--					</li>-->
		<!--					<li>-->
		<!--						<p><span>02-</span> Analysis</p>-->
		<!--						<div class="progress">-->
		<!--							<div class="progress-bar" role="progressbar" aria-valuenow="70"-->
		<!--							aria-valuemin="0" aria-valuemax="100" style="width:70%">-->
		<!--							</div>-->
		<!--						</div>-->
		<!--					</li>-->
		<!--					<li>-->
		<!--						<p><span>03-</span> Design</p>-->
		<!--						<div class="progress">-->
		<!--							<div class="progress-bar" role="progressbar" aria-valuenow="70"-->
		<!--							aria-valuemin="0" aria-valuemax="100" style="width:85%">-->
		<!--							</div>-->
		<!--						</div>-->
		<!--					</li>-->
		<!--					<li>-->
		<!--						<p><span>04-</span> IOS Development</p>-->
		<!--						<div class="progress">-->
		<!--							<div class="progress-bar" role="progressbar" aria-valuenow="70"-->
		<!--							aria-valuemin="0" aria-valuemax="100" style="width:60%">-->
		<!--							</div>-->
		<!--						</div>-->
		<!--					</li>-->
		<!--					<li>-->
		<!--							<p><span>04-</span> Andriod Development</p>-->
		<!--							<div class="progress">-->
		<!--								<div class="progress-bar" role="progressbar" aria-valuenow="70"-->
		<!--								aria-valuemin="0" aria-valuemax="100" style="width:94%">-->
		<!--								</div>-->
		<!--							</div>-->
		<!--						</li>-->
		<!--				</ul>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>   
		<!--</section>   

<!-- Start Portfolio Section
		=========================================== -->
		





		

<!-- Start Testimonial
		=========================================== -->


	
<!--
Start Blog Section
=========================================== -->
		
<section id="support" class="section">
	<div class="container">
		<div class="row">

			<div class="title text-center wow fadeInDown">
				<h2> Our <span class="color">Support</span></h2>
				<div class="border"></div>
			</div>
			<!-- /section title -->

			<div class="clearfix">
			
				<!-- single blog post -->
				<article class="col-md-3 col-sm-6 col-xs-12 clearfix wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
					<div class="post-block">
						<div class="media-wrapper">
							<img src="images/blog/blog-post-2.jpg" alt="amazing caves coverimage" class="img-responsive">
						</div>
						
						<div class="content">
							<center><h3>Reduce Traffic</h3></center>
							<p>Carpooling is also seen as an environmental friendly way to travel as sharing journeys reduces air pollution, traffic congestion, and parking space.
If you carpool to and from work you would probably cut your transportation emissions number in half,or even better. Every carpooling participant takes another car off the road , which means less congested roads and highways</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
							<!--<a class="btn btn-transparent" href="single-post.html">Read more</a>-->
						</div>
					</div>						
				</article>
				<!-- /single blog post -->
				
				<!-- single blog post -->
				<article class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
					<div class="post-block">
						<div id="gallery-post" class="media-wrapper">
							<div class="item">
								<img src="images/blog/blog-post-1.jpg" alt="blog post" class="img-responsive">
							</div>
							<!--<div class="item">-->
							<!--	<img src="images/blog/blog-post-3.jpg" alt="blog post" class="img-responsive">-->
							<!--</div>-->
							<!--<div class="item">-->
							<!--	<img src="images/blog/blog-post-1.jpg" alt="blog post | img" class="img-responsive">-->
							<!--</div>-->
						</div>
						
						<div class="content">
							<center><h3>Save Money</h3></center>
							<p>By splitting the fare, you will save your money See what other carpoolers are spending on routes and destinations you might be interested in.</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
							<!--<a class="btn btn-transparent" href="single-post.html">Read more</a>-->
						</div>
					</div>						
				</article>
				<!-- end single blog post -->
				
				<!-- single blog post -->
				<article class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="400ms">
					<div class="post-block">
						<div class="media-wrapper">
							<img src="images/blog/blog-post-3.jpg" alt="amazing caves coverimage" class="img-responsive">
						</div>
						
						<div class="content">
							<center><h3>Save Fuel</h3></center>
							<p>You can save money on gas and such by diving up the gas fees among your carpool passengers.
The more people you have the more you can save.Carpooling also helps you save on the cost of vehicle repairs and maintenance if you rotate vehicle use between the members of your carpool team.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<!--<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>-->
							<!--<a class="btn btn-transparent" href="single-post.html">Read more</a>-->
						</div>
					</div>						
				</article>


				<article class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="400ms">
					<div class="post-block">
						<div class="media-wrapper">
							<img src="images/blog/blog-post-4.jpg" alt="amazing caves coverimage" class="img-responsive">
						</div>
						
						<div class="content">
							<center><h3>Save Green</h3></center>
							<p>Carpooling will reduce Vehicle Emissions,traffic volumes and Congestion, thereby helping in going Green.
Carpooling will help in reducing travel expenses, need for a second car, improved travel time. Carpooling Reduces vehicular pollution (benefits local citizens), Green House Gas emissions,road rage investment in transport infrastructure</p>
							<!--<a class="btn btn-transparent" href="single-post.html">Read more</a>-->
						</div>
					</div>						
				</article>


				<!-- end single blog post -->
			</div>

			<!--<div class="all-post text-center">-->
			<!--	<a class="btn btn-main" href="blog.html">View All Post</a>-->
			<!--</div>-->

		</div> <!-- end row -->
	</div> <!-- end container -->
</section> <!-- end section -->
		
<!-- 
Start Our Team
=========================================== -->

<section id="our-team" class="testimonial overly section bg-2">
 	<div class="container">
 		<div class="row">
		
			  <!--section title -->
 			<div class="title text-center wow fadeInUp" data-wow-duration="500ms"> 
 				<h2>Our <span class="color">Team</span></h2> 
 				<div class="border"></div> 
 			</div> 
			  <!--/section title -->
			
			  <!--team member -->
 			<div class="col-md-3 col-sm-6 col-xs-12  wow fadeInDown" data-wow-duration="500ms"> 
                <div class="team-member"> 
 					<div class="member-photo"> 
						 <img class="img-responsive" src="images/team/team-2.jpg" alt="img"> 
						   <div class="mask"> 
 							<ul class="list-inline"> 
 								<li><a href="http://facebook.com/rahulnitc3003/" target="_blank"><i class="tf-ion-social-facebook"></i></a></li> 
 								<li><a href="http://www.twitter.com/rjrahulabc30/" target="_blank"><i class="tf-ion-social-twitter"></i></a></li> 
 								<li><a href="http://linkedin.com/in/rahulnitc3003/" target="_blank"L><i class="tf-ion-social-linkedin"></i></a></li> 
 								<li><a href="https://plus.google.com/u/0/104177842580817757452" target="_blank"><i class="tf-ion-social-dribbble-outline"></i></a></li> 
 							</ul> 
 						  </div> 
					</div> 
					
					<div class="member-meta"> 
 						<center><h3>Rahul Kumar</h3>
 						<span><p>Full Stack Developer & Database Manager</p></span>
 						</center>
 					</div> 
					
                </div> 
             </div> 
			<!-- end team member-->  
			
			<!-- team member -->
			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms"> 
                <div class="team-member"> 
 					<div class="member-photo"> 
						 <img class="img-responsive" src="images/team/team-1.jpg" alt="img">
						  <div class="mask"> 
 							<ul class="list-inline"> 
 								<li><a href="#"><i class="tf-ion-social-facebook"></i></a></li> 
 								<li><a href="#"><i class="tf-ion-social-twitter"></i></a></li> 
 								<li><a href="#"><i class="tf-ion-social-linkedin"></i></a></li> 
 								<li><a href="#"><i class="tf-ion-social-dribbble-outline"></i></a></li> 
 							</ul> 
 						</div> 
					</div> 
					
					<div class="member-meta"> 
 						<center><h3>Lakshit Garg</h3>
 						<span><p>Database Administrator</p></span>
 						</center>
 						
 					</div>
				</div> 
             </div> 
			 
			 <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="400ms"> 
                <div class="team-member"> 
 					<div class="member-photo"> 
						<img class="img-responsive" src="images/team/team-3.jpg" alt="img"> 
						<div class="mask"> 
 							<ul class="list-inline"> 
 								<li><a href="#"><i class="tf-ion-social-facebook"></i></a></li> 
 								<li><a href="#"><i class="tf-ion-social-twitter"></i></a></li> 
 								<li><a href="#"><i class="tf-ion-social-linkedin"></i></a></li> 
 								<li><a href="#"><i class="tf-ion-social-dribbble-outline"></i></a></li> 
 							</ul> 
 						</div> 
					</div> 
			
					<div class="member-meta"> 
 						<center><h3>Pratyush Agarwal</h3>
 						<span><p>Back End Developer</p></span>
 						</center>
 					</div> 
			    </div> 
             </div> 
			
			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms"> 
                <div class="team-member"> 
 					<div class="member-photo"> 
						<img class="img-responsive" src="images/team/shivam.jpg" alt="img"> 
						<div class="mask"> 
 							<ul class="list-inline"> 
 								<li><a href="#"><i class="tf-ion-social-facebook"></i></a></li> 
 								<li><a href="#"><i class="tf-ion-social-twitter"></i></a></li> 
 								<li><a href="#"><i class="tf-ion-social-linkedin"></i></a></li> 
 								<li><a href="#"><i class="tf-ion-social-dribbble-outline"></i></a></li> 
 							</ul> 
 						</div> 
					</div> 
			
					<div class="member-meta"> 
 						<center><h3>Shivam Agarwal</h3>
 						<span><p>Database Administrator</p></span>
 						</center>
 					</div> 
		        </div> 
             </div> 
			
 		</div> 
 	</div>     
 </section>
 
 
 

<!-- Srart Contact Us>
==========================================-->
<section id="contact-us" class="contact-us section-bg">
	<div class="container">
		<div class="row">
			
			<!-- section title -->
			<div class="title text-center wow fadeIn" data-wow-duration="500ms">
				<h2>Get In <span class="color">Touch</span></h2>
				<div class="border"></div>
			</div>
			<!-- /section title -->
			
			<!-- Contact Details -->
			<div class="contact-info col-md-6 wow fadeInUp" data-wow-duration="500ms">
				<h3>Contact Details</h3>
				
				<div class="contact-details">
					<div class="con-info clearfix">
						<i class="tf-map-pin"></i>
						<span>RideOut (India), NIT Campus Kozhikode, Kerala (India)</span>
					</div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-ios-telephone-outline"></i>
						<span>Phone: +91-9061543942</span>
					</div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-iphone"></i>
						<span>Fax: +91-9061543942</span>
					</div>
					
					<div class="con-info clearfix">
						<i class="tf-ion-ios-email-outline"></i>
						<span>Email: support@rideout.com</span>
					</div>

					<div class="con-info clearfix">
						<i class="tf-ion-ios-email-outline"></i>
						<span>Customer Support: support@rideout.com</span>
					</div>

				</div>
			</div>
			<!-- / End Contact Details -->
				
			<!-- Contact Form -->
			<div class="contact-form col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
				<form id="contact-form" method="post" action="index.php" role="form">
				
					<div class="form-group">
						<input type="text" placeholder="Your Name" class="form-control" name="name" id="name" required>
					</div>
					
					<div class="form-group">
						<input type="email" placeholder="Your Email" class="form-control" name="email" id="email" required>
					</div>
					
					<div class="form-group">
						<input type="text" placeholder="Subject" class="form-control" name="subject" id="subject" required>
					</div>
					
					<div class="form-group">
						<textarea rows="6" placeholder="Message" class="form-control" name="message" id="message" required></textarea>	
					</div>
					
					<div id="mail-success" class="success">
						Thank you. The Mailman is on His Way :)
					</div>
					
					<div id="mail-fail" class="error">
						Sorry, don't know what happened. Try later :(
					</div>
					
					<div id="cf-submit">
						<input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
					    
					</div>						
					
				</form>
			</div>
			<!-- ./End Contact Form -->
		
		</div> <!-- end row -->
	</div> <!-- end container -->
	
	<!-- Google Map -->
	<div class="google-map">
	    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3912.2459020658002!2d75.92883074999334!3d11.316728791916782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba6431c4324d82f%3A0x491730b975583623!2sNIT+Calicut+Campus+Bulding!5e0!3m2!1sen!2s!4v1496130974229" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen="">
	    </iframe>
	</div>
	<!-- /Google Map -->
	
</section> <!-- end section -->
	

<!--
Start Counter Section
==================================== -->
		
<section id="counter" class="parallax-section bg-1 section overly">
	<div class="container">
		<div class="row">
		
			<!-- first count item -->
			<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms">
				<div class="counters-item">
					<i class="tf-ion-iphone"></i>
					<span data-speed="3000" data-to="320">320</span>
					<h3>Happy Clients</h3>
				</div>
			</div>
			<!-- end first count item -->
		
			<!-- second count item -->
			<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">
				<div class="counters-item">
					<i class="tf-ion-archive"></i>
					<span data-speed="3000" data-to="565">10000+</span>
					<h3>Trips Completed</h3>
				</div>
			</div>
			<!-- end second count item -->
		
			<!-- third count item -->
			<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="400ms">
				<div class="counters-item">
					<i class="tf-ion-thumbsup"></i>
					<span data-speed="3000" data-to="95">1000</span>
					<h3>Positive feedback</h3>
					
				</div>
			</div>
			<!-- end third count item -->
			
			<!-- fourth count item -->
			<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
				<div class="counters-item kill-margin-bottom">
					<i class="tf-ion-coffee"></i>
					<span data-speed="3000" data-to="2500">2500</span>
					<h3>Cups of Coffee</h3>
				</div>
			</div>
			<!-- end fourth count item -->
			
		</div> 		<!-- end row -->
	</div>   	<!-- end container -->
</section>   <!-- end section -->

		
		
		<!-- end Contact Area
		========================================== -->
		
		<footer id="footer" class="bg-one">
			<div class="container">
			    <div class="row wow fadeInUp" data-wow-duration="500ms">
					<div class="col-lg-12">
						
						<!-- Footer Social Links -->
						<div class="social-icon">
							<ul class="list-inline">
								<li><a href="coming_soon.php"><i class="tf-ion-social-facebook"></i></a></li>
								<li><a href="coming_soon.php"><i class="tf-ion-social-twitter"></i></a></li>
								<li><a href="coming_soon.php"><i class="tf-ion-social-google-outline"></i></a></li>
								<li><a href="coming_soon.php"><i class="tf-ion-social-youtube"></i></a></li>
								<li><a href="coming_soon.phpcoming_soon.php"><i class="tf-ion-social-linkedin"></i></a></li>
								<li><a href="coming_soon.php"><i class="tf-ion-social-dribbble-outline"></i></a></li>
								<li><a href="coming_soon.php"><i class="tf-ion-social-pinterest-outline"></i></a></li>
							</ul>
						</div>
						<!--/. End Footer Social Links -->

						<!-- copyright -->
						<div class="copyright text-center">
							<br />
							
							<p>Copyrigh&copy; <script>document.write(new Date().getFullYear())</script>Team RideOut 2017. All Rights Reserved.</p>
						</div>
						
					</div> <!-- end col lg 12 -->
				</div> <!-- end row -->
			</div> <!-- end container -->
		</footer> <!-- end footer -->

		
		
		
		<!-- 
		Essential Scripts
		=====================================-->
		
		<!-- Main jQuery -->
		<script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.1 -->
		<script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Slick Carousel -->
		<script type="text/javascript" src="plugins/slick-carousel/slick/slick.min.js"></script>
		<!-- Portfolio Filtering -->
		<script type="text/javascript" src="plugins/mixitup/dist/mixitup.min.js"></script>
		<!-- Smooth Scroll -->
		<script type="text/javascript" src="plugins/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
		<!-- Magnific popup -->
		<script type="text/javascript" src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<!-- Google Map API -->
		<script type="text/javascript"  src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<!-- Sticky Nav -->
		<script type="text/javascript" src="plugins/Sticky/jquery.sticky.js"></script>
		<!-- Number Counter Script -->
		<script type="text/javascript" src="plugins/count-to/jquery.countTo.js"></script>
		<!-- wow.min Script -->
		<script type="text/javascript" src="plugins/wow/dist/wow.min.js"></script>
		<!-- Custom js -->
		<script type="text/javascript" src="js/script.js"></script>
		
    </body>
</html>
