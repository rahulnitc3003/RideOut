<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideOut</title>
    <meta name="description" content="Car Ride System Provide facility to passenger to book a particular ride" />
    
    <meta name="author" content="RideOut System">
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
			<a class="navbar-brand" href="login_panal.php"><img src="../images/logo.jpg" height="30" width="80" /></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="user_profile.php">Profile</a></li>
				<li><a href="login_panal.php">Back</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

<?php
$ride_id = @$_GET['id'];
$mail = @$_GET['mail_id'];
//$var=$ride_id;
//echo $ride_id;
?>
<div id="set">
    <div class="container">
        <form class="form-horizontal" method="POST" action="confirm_booking.php">
            <table class="table" border="5">
                <?php
        	        include 'database.php';
                    $db=new db();
                    //echo "<script>alert('$var')</script>";
                    $postdata=$db->show_request($ride_id);
                    foreach($postdata as $post)
                    {
                        $email_id = $post["email"];
        	        ?>
        	            <tr>
                          <td colspan="2" align="center"><h3>Confirm Journey</h3></td>
                        </tr>
                        <tr>
                          <td>Ride Id</td>   
                          <td><input type="text" class="form-control" name="ride_id" value="<?php echo $post["ride_id"]; ?>" readonly />
                          </td>
                        </tr> 
                        
                        <tr>
                          <td>Journey Id</td>   
                          <td><input type="text" class="form-control" name="j_id" value="<?php echo $post["journey_id"]; ?>" readonly /></td>
                        </tr>
                        <tr>
                          <td>Email</td>   
                          <td>
                              <input type="text" class="form-control" name="email" value="<?php echo $post["email"]; ?>" readonly/>
                          </td>
                        </tr>
                        <tr>
                          <td>Source</td>
                          <td>
                            <input type="text" class="form-control" name="src" value="<?php echo $post["source"]; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                           <td>Destination</td>
                           <td>
                            <input type="text" class="form-control" name="destination" value="<?php echo $post["destination"]; ?>" readonly>
                           </td>
                        </tr>
                        <tr>
                          <td>Available Seats</td>
                          <td><input type="text" class="form-control" name="seats_book" value="<?php echo $post["seats_book"]; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>Date of Journey</td>   
                          <td><input type="text" class="form-control" name="doj" value="<?php echo $post["doj"]; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>Mobile Number</td>   
                          <td><input type="text" class="form-control" name="mobno" value="<?php echo $post["mobno"]; ?>" readonly >
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <div class="text-center"><button class="btn btn-default " name="book"  type="submit" >Confirm Book</button></div>
                            </div>
                          </td>
                        </tr>
                	   <?php
			        }
                ?>
            </table>
        </form>
      </div>
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
		
	    $db->final_book($sql,$j,$r,$mail);	
	
	}
	

	
}
?>