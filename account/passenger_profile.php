<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideOut</title>
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
    <body class="w3-light-grey">

        <!-- Navigation Bar -->
        <div class="w3-bar w3-white w3-large">
          <a href="login_panal.php" class="w3-bar-item w3-button w3-red w3-mobile"><img src="../images/logo.png" height="30" width="80" /></a>
          <a href="login_panal.php" class="w3-bar-item w3-button w3-mobile">Home</a>
          <a href="confirm_booking_panal.php" class="w3-bar-item w3-button w3-mobile">Back</a>
          <a href="../logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
        </div>

<!--navigation menu end here-->
<style>
  

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
      <!--div class="table-responsive"-->
        <table class="table" border="5">
            <tr>
                <td align="center" colspan="2"><h2><b>Co-Passenger Details</b><h2></td>
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

</html>