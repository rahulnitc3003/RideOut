<?php

session_start();

echo $_SESSION['emailid'];
?>


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
                 <li><a rel="nofollow" href="passenger_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Home</a></li>
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
          <li><a rel="nofollow" href="passenger_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Home</a></li>
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
<form class="form-horizontal" method="POST" action="booking_status.php">
<div class="form-group">
<label  class="col-sm-2 control-label" for="sel1" style="color:aqua">Select Your Ride Id:</label>
<div class="col-sm-6">
<select class="form-control" id="rideid" name="rideid">

<?php
include 'database.php';
$db=new db();

$postdata=$db->book_status1($_SESSION['emailid']);
$i=0;
foreach($postdata as $post)
	{
    $i++;
		?>
    <option><?php echo $post["ride_id"];?></option>
<?php
	}
  if($i==0)
  {
    echo "<script>alert('You Have Not Added Any Journey')</script>";
    echo "<script>window.open('passenger_panal.php','_self')</script>";
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

<?php
$db=new db();
if(isset($_POST['submit1']))
{
	$rideidi=$_POST['rideid'];
	//echo $journeyidi;
    $db->book_status2($rideidi);
}	
	
?>

</form>
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