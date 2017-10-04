<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Ride System</title>
    <meta name="description" content="Car Ride System Provide facility to passenger to book a particular ride" />
    
    <meta name="author" content="templatemo">
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

<!--navigation menu start here-->
<div id="templatemo_mobile_menu">
            <ul class="nav nav-pills nav-stacked">
                 <li><a rel="nofollow" href="user_profile.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Profile</a></li>
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
          <li><a rel="nofollow" href="user_profile.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Profile</a></li>
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

<?php
$ride_id = @$_GET['id'];
//$var=$ride_id;
//echo $ride_id;
?>
<div id="set">
  <div class="container">
    <h2 align="center" style="color:aqua">Confirm Journey</h2><br><br><br>
    <form class="form-horizontal" method="POST" action="confirm_booking.php">
        <?php
	        include 'database.php';
          $db=new db();
          //echo "<script>alert('$var')</script>";
          $postdata=$db->show_request($ride_id);
          foreach($postdata as $post)
          {
	          ?>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="ride_id" style="color:aqua">Ride Id:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="ride_id" value="<?php echo $post["ride_id"]; ?>" readonly />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="j_id" style="color:aqua">Journey Id</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="j_id" value="<?php echo $post["journey_id"]; ?>" readonly />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="email" style="color:aqua">Email</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="email" value="<?php echo $post["email"]; ?>" readonly/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="src" style="color:aqua">Source:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="src" value="<?php echo $post["source"]; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="dest" style="color:aqua">Destination:</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="destination" value="<?php echo $post["destination"]; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="seat" style="color:aqua">Available Seats:</label>
              <div class="col-sm-6"> 
                <input type="text" class="form-control" name="seats_book" value="<?php echo $post["seats_book"]; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="seat" style="color:aqua">Journey Date:</label>
              <div class="col-sm-6"> 
                <input type="text" class="form-control" name="doj" value="<?php echo $post["doj"]; ?>" readonly>
              </div>
            </div>  
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="mobno" style="color:aqua">Mobile Number:</label>
              <div class="col-sm-6"> 
                <input type="text" class="form-control" name="mobno" value="<?php echo $post["mobno"]; ?>" readonly >
              </div>
            </div>
            <div class="form-group">
              <div class="text-center"><button class="btn btn-default " name="book"  type="submit" >Confirm Book</button></div>
            </div>
            
	        <?php
			     }
          ?>
      </div>
    </form>
  </div>
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


<?php

$db=new db();

if(isset($_POST['book']))
{	
    $r = $_POST["ride_id"];
	$j=$_POST["j_id"];
	$ans=$db->exist($r);
	if($ans==1)
	//echo $j;
    //echo $r;
	{
    echo "<script>alert('You have already confirmed your journey !!')</script>";
    echo "<script>window.open('confirm_booking_panal.php','_self')</script>";
	exit;
	}
	else
	{
		$sql="insert into booking (ride_id) values ('$r')";
	$db->final_book($sql,$j);	
	}
}
?>