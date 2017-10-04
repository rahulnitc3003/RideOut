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
    <link rel="shortcut icon" href="../favicon.png" />
    <!-- Font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template  -->
    <link href="../css/templatemo_style.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>
</head>
<body>

<!--navigation menu start here-->
<div id="templatemo_mobile_menu">
            <ul class="nav nav-pills nav-stacked">
                <li><a rel="nofollow" href="login_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
                <li><a rel="nofollow" href="../logout.php" class="external-link"><i class="glyphicon glyphicon-export"></i>logout</a></li>
            </ul>
</div>
<div class="container_wapper">
  <div id="templatemo_banner_menu">
    <div class="container-fluid">
      <div class="col-xs-4 templatemo_logo"><a href="#"><img src="../images/logo.png" id="logo_img" alt="dragonfruit website template" title="Car Ride" /></a>
      </div>
      <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li><a rel="nofollow" href="login_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
          <li><a rel="nofollow" href="../logout.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Logout</li>
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
  padding-left: 150px;
  }

  .container{
   background-image: url("../images/image2.jpg");
  }
</style>

<div id="set">
  <div class="container">
    <h2 align="center" style="color:aqua">Booking Status</h2><br><br><br>
    <form class="form-horizontal" method="POST" action="booking_panal.php">
      <div class="form-group">
        <label  class="col-sm-2 control-label" for="sel1" style="color:aqua">Select Your Journey Id:</label>
        <div class="col-sm-6">
          <select class="form-control" id="journeyid" name="journeyid">
            <?php
            include 'database.php';
            $db=new db();
             //echo "<script>alert('$var')</script>";
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
                   echo "<script>alert('No Any Journey is Added')</script>";
                   echo "<script>window.open('login_panal.php','_self')</script>";
                   exit(0);
                }
            ?>	
          </select>
          <script type="text/javascript">
            document.getElementById('journeyid').value = "<?php echo $_POST['journeyid'];?>";
          </script>
        </div>
      </div>
      <div class="form-group"> 
        <div class="text-center">
          <button class="btn btn-default " name="submit1" value="Update" type="submit" >submit</button>
        </div>
      </div>
    </form>
  <div class="table-responsive">
      <table border="5" class="table table-bordered">
        <thead>
          <tr>
            <td colspan="20" align="center"><h1><b>Booking Status</b></h1></td>
          </tr>
        </thead>
        
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
                <!--td--><!--?php echo $post1["journey_id"]; ?></td-->
                <td><?php echo $post1["ride_id"]; ?></td>
                <td><?php echo $post1["email"]; ?></td>
                <td><?php echo $post1["source"]; ?></td>
                <td><?php echo $post1["destination"]; ?></td>
                <td><?php echo $post1["seats_book"]; ?></td>
                <td><?php echo $post1["doj"]; ?></td>
                <td><?php echo $post1["mobno"]; ?></td>
                <td><button><a href='passenger_profile2.php?id=<?php echo $post1["email"]; ?>'>Check Profile</button></a></td>
              <tr>
            <?php
            }
            if($i==0)
            {
              echo "<script>alert('No Booking Found For Your Journey Id')</script>";
              exit(0);
            }
          }
        ?>
      </table>
    </div>
  </div>
</div>
</body>
</html>