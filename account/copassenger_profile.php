<?php
include 'database.php';
$db=new db();
$var = $_GET['email'];
$result = $db->profile($var);
$i=0;
foreach($result as $res)
{
$i++;
$fname = $res['first_name'];
$lname = $res['last_name'];
$email = $res['email'];
$address = $res['address'];
$addh = $res['uid'];
$con = $res['contact_no'];
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
  #set{padding-top: 80px;}
  #align{padding-right: 2px;}  
  body{padding-top:30px;}

  .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

  small {
  display: block;
  line-height: 1.428571429;
  color: #999;
  }
</style>

<!--navigation menu start here-->
<div id="templatemo_mobile_menu">
  <ul class="nav nav-pills nav-stacked">
    <li><a rel="nofollow" href="passenger_panal.php?email=<?php echo @$_GET['email'] ?>" class="external-link">
        <i class="glyphicon glyphicon-user"></i>Back</a>
    </li>
    <li><a rel="nofollow" href="change_password.php?email=<?php echo @$_GET['email'] ?>" class="external-link">
        <i class="glyphicon glyphicon-user"></i>Change Password</a>
    </li>
    <li><a rel="nofollow" href="../logout.php" class="external-link">
        <i class="glyphicon glyphicon-user"></i>Logout</a>
    </li>
    <li><a rel="nofollow" href="copassenger_profile.php?email=<?php echo @$_GET['email']; ?>" class="external-link"><i class="glyphicon glyphicon-forward"></i>Slide Right</a></li>
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
          <li><a rel="nofollow" href="passenger_panal.php?email=<?php echo @$_GET['email'] ?>" class="external-link">
              <i class="glyphicon glyphicon-user"></i>Back</a>
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
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-8">
      <div class="well well-sm"><center><h2><b>PROFILE</b></h2></center>
        <div class="row">
          <div class="col-sm-6 col-md-4"><img src="../images/profile.png" alt="images" class="img-rounded img-responsive" width="500" height="900" /></div>
            <div class="col-sm-6 col-md-6">
              <h4><b>First Name:</b></h4><p><?php echo $fname; ?></p>
              <h4><b>Last Name:</b></h4><p><?php echo $lname; ?></p>
              <h4><b>Email:</h4></b><p><?php echo @$_GET['email']; ?></p>
              <h4><b>Addhar Number:</b></h4><p><?php echo $addh; ?></p>
              <h4><b>Contact:</h4></b><p><?php echo $con; ?></p>
              <h4><b>Address:</h4></b><p><?php echo $address; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="templatemo_footer" style="background-color:#f15556"><p id="footer">Copyright &copy; 2017 RideOut System</p></div>

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