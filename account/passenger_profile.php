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
    	<li><a rel="nofollow" href="login_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Home</a></li>
        <li><a rel="nofollow" href="confirm_booking_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
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
          <li><a rel="nofollow" href="login_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Home</a></li>
          <li><a rel="nofollow" href="confirm_booking_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
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
<?php
$email = @$_GET['id'];
//echo $email;
?>

<?php
	/*include 'database.php';
   	$db=new db();
   	$run = $db->passenger_profile('copassenger',$email);
   	echo $run['email'];*/

        $user = 'id1068737_rideout';
	$pass = 'rideout';
	$db = 'id1068737_rideout';
	$conn = new mysqli('localhost',$user,$pass,$db) or die ('error in database connection');
	
  $que = "select *from copassenger where email = '$email'";
	$run = mysqli_query($conn,$que);
	while($row = mysqli_fetch_array($run))
	{
    ?>
    <div class="container">
      <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td align="center" colspan="4"><h2><b>Co-Passenger Details</b><h2></td>
            </tr>
            <tr>
                <td align="center"><h4><b>First Name:</b></h4></td>
                <td><?php echo $row["first_name"]; ?></td>
            </tr>
            <tr>
                <td align="center"><h4><b>Last Name:</b></h4></td>
                <td><?php echo $row["last_name"]; ?></td>
            </tr>
            <tr>
                <td align="center"><h4><b>Email:</b></h4></td>
                <td><?php echo $row["email"];?></td>
            </tr>
            <tr>
                <td align="center"><h4><b>Address:</b></h4></td>
                <td><?php echo $row["address"];?></td>
            </tr>
            
            <tr>
                <td align="center"><h4><b>Addhar Number:</b></h4></td>
                <td><?php echo $row["uid"]; ?></td>
            </tr>
            <tr>
                <td align="center"><h4><b>Contact Number:</b></h4></td>
                <td><?php echo $row["contact_no"];?></td>
            </tr>
        </table>
      </div>
      <?php
	}
	?>
    </div>
  </body>
</html>
