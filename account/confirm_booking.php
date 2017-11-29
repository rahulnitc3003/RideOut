<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideOut</title>
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
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <body class="w3-light-grey">

        <!-- Navigation Bar -->
        <div class="w3-bar w3-white w3-large">
          <a href="login_panal.php" class="w3-bar-item w3-button w3-red w3-mobile"><img src="../images/logo.png" height="30" width="80" /></a>
          <a href="user_profile.php" class="w3-bar-item w3-button w3-mobile">Profile</a>
          <a href="login_panal.php" class="w3-bar-item w3-button w3-mobile">Back</a>
          <a href="../logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
        </div>
</head>

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