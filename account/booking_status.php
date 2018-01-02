<?php
session_start();
if(!$_SESSION['email'])
{
   header('location:copassenger_login.php');
}

include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideOut</title>
    <meta name="description" content="Car Ride System Provide facility to passenger to book a particular ride" />
    
    <meta name="author" content="templatemo">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
				<li class="active"><a href="copassenger_profile.php?email=<?php echo @$_GET['email']; ?>">Profile</a></li>
				<li><a href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>">Back</a></li>
				<li><button class="btn btn-danger "id="mabt">Show Bookings</button></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
    
</head>


<!--navigation menu end here-->
<style>
  #set{
  padding-top : 150px; 
  }

  .container{
   background-image: url("../images/image2.jpg");
  }

</style>

<div id="set">
  <div class="container">
  <div class="col-sm-6">
   <form class="form-horizontal" method="POST" action="booking_status.php?email=<?php echo @$_GET['email']; ?>">
    <table class="table" border="2">
      <tr>
        <td colspan="2" align="center"><h3>Booking Status</h3></td>
      </tr>
      <tr>
        <td align="center">Select Ride Id</td>
        <td>
          <select class="form-control" id="rideid" name="rideid">
           <?php
             //include 'database.php';
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
              echo "<script>alert('No booked History')</script>";
              echo "<script>window.open('passenger_panal.php?email=$_GET[email]','_self')</script>";
              exit(0);
             }
            ?>
          </select>
        </td>
      </tr>
     <tr>
      <td colspan="2" align="center"><button class="btn btn-danger" name="submit1" value="Update" type="submit" >Check Status</button></td>
     </tr>
    
    </table>
    <div id="tmp1">
        
        <table class="table" border="5">
                <?php
                        //include 'database.php';
                        $db=new db();
                        //echo $var;
                        $var = @$_GET['email'];
        	            $postdata=$db->show_ride_details($var);
                        $i=0;
        	            ?>
        	            <tr align="center">
                    <td><b>Ride Id</b></td>
                    <td><b>Source</b></td>
                    <td><b>Destination</b></td>
                    <td><b>Date Of Journey</b></td>
                    <td><b>Seats Booked</b></td>
                </tr>
                <?php
        	            foreach($postdata as $post)
        	            {
                          $i++;
        		?>
                
                <tr align="center">
                    <td><?php echo $post["ride_id"];?></td>
                            <td><?php echo $post["source"];?></td>
                            <td><?php echo $post["destination"];?></td>
                            <td><?php echo $post["seats_book"];?></td>
                            <td><?php echo $post["doj"];?></td>
                </tr>
                <?php
        	            }
                        /*if($i==0)
                        {
                          echo "<script>alert('No booked history')</script>";
                          echo "<script>window.open('passenger_panal.php','_self')</script>";
                          exit(0);
                        }*/
                ?>
                
                
            </table>
        
    </div>
   </form>
  </div>
  </div>
 </div>
<script type="text/javascript">
document.getElementById('journeyid').value = "<?php echo $_POST['journeyid'];?>";
</script>
<?php
$db=new db();
if(isset($_POST['submit1']))
{
	$rideidi=$_POST['rideid'];
	//echo $journeyidi;
    $db->book_status2($rideidi);
}	
	
?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#tmp1").hide();
    $("#mabt").click(function(){
       var mav=$("#mabt").text().trim();
       if(mav=="Show Bookings"){
           $("#mabt").text("Skip Details");
           $("#tmp1").show();
       }
       if(mav=="Skip Details"){
           $("#mabt").text("Show Bookings");
           $("#tmp1").hide();
       }
    });
});
</script>
</body>
</html>