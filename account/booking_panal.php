<?php
include_once '../gpConfig.php';
include_once '../User.php';
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
        //'gender'        => $gpUserProfile['gender'],
        //'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        //'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
    
    //Storing user data into session
    $_SESSION['userData'] = $userData;
    
    //Render facebook profile data
    if(!empty($userData)){
		$var=$userData['email'];
    }
    else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
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
				<li class="active"><a href="login_panal.php">Back</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
    


<div id="set">
  <div class="container">
  <div class="table-responsive">
   <form class="form-horizontal" method="POST" action="booking_panal.php">
    <table class="table" border="2">
     <tr>
       <td align="center" colspan="2"><h3>Booking Status<h3></td>
     </tr>
     <tr>
       <td>Select Journey Id</td>
       <td><select class="form-control" id="journeyid" name="journeyid">
            <?php
            include 'database.php';
            $db=new db();
            $postdata=$db->update('journey',$var);
            $i=0;
          	foreach($postdata as $post)
          	{
                   $i++;
          		?>
              <option><?php echo $post["journey_id"];?></option>
              <?php
          	}
                if($i==0)
                {
                   echo "<script>alert('No Journey is Added')</script>";
                   echo "<script>window.open('login_panal.php','_self')</script>";
                   exit(0);
                }
            ?>	
          </select>
          <script type="text/javascript">
            document.getElementById('journeyid').value = "<?php echo $_POST['journeyid'];?>";
          </script>
         </td>
        </tr>
        <tr>
          <td align="center" colspan="2"><button class="btn btn-default " name="submit1" value="Update" type="submit" >submit</button></td>
        </tr>
      </table>
    </form>
    </div>
  <div class="table-responsive">
     <table class="table" border="2">
       <tr>
          <td align="center" colspan="8"><h3>Booking Status<h3></td>
       </tr>
        <tr align="center">
          <td><h4><b>Ride id</b></h4></td>
          <td><h4><b>Email</b></h4></td>
          <td><h4><b>Source</b></h4></td>
          <td><h4><b>Destination</b></h4></td>
          <td><h4><b>Booking Seats<b></h4></td>
          <td><h4><b>Journey Date</b></h4></td>
          <td><h4><b>Mobile Number</b></h4></td>
          <td><h4><b>Profile</b></h4></td>
        </tr>
        <?php
          $db=new db();
          if(isset($_POST['submit1']))
          {
            $journeyidi=$_POST['journeyid'];

            
            $postdata1=$db->booking_status($journeyidi);
            $i=0;
            foreach($postdata1 as $post1)
            {
              $i++;
              ?>
              <tr align="center">
                <td><?php echo $post1["ride_id"]; ?></td>
                <td><?php echo $post1["email"]; ?></td>
                <td><?php echo $post1["source"]; ?></td>
                <td><?php echo $post1["destination"]; ?></td>
                <td><?php echo $post1["seats_book"]; ?></td>
                <td><?php echo $post1["doj"]; ?></td>
                <td><?php echo $post1["mobno"]; ?></td>
                <td><a href='passenger_profile2.php?id=<?php echo $post1["email"]; ?>'><input type="button" value="Check Profile" /></a></td>
              <tr>
            <?php
            }
            if($i==0)
            {
              echo "<script>alert('No Booking Found For Your Journey Id')</script>";
              //exit(0);
            }
          }
        ?>
      </table>
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