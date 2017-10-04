<?php
//start_session();
session_start();
$ver=$_SESSION['emailid'];
echo $ver;
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
                 <li><a rel="nofollow" href="passenger_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
                 <li><a rel="nofollow" href="../index.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Homepage</a></li>
            </ul>
</div>
<div class="container_wapper">
  <div id="templatemo_banner_menu">
    <div class="container-fluid">
      <div class="col-xs-4 templatemo_logo"><a href="#"><img src="../images/logo.png" id="logo_img" alt="dragonfruit website template" title="Car Ride" /></a>
      </div>
      <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li><a rel="nofollow" href="passenger_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
          <li><a rel="nofollow" href="../index.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Homepage</li>
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
   background-image: url("../images/image22.jpg");
}
</style>
<div id="set">
	<div class="container">
		<h2 align="center" style="color:aqua">Booking Panal</h2><br><br><br>
		<form action ="ride_booking.php" method="post">
			<div class="form-group">
	        	<label class="col-sm-2 control-label" for="jid" style="color:aqua">Journey Id:</label>
	        	<div class="col-sm-6">
	          	  <input type="text" class="form-control" id="jid" name="jid" required placeholder="Enter Journey Id" pattern="^[0-9]*$" />
	        	</div>
	      	</div>
			    <div class="form-group"> 
        		<button class="btn btn-default " name="submit" value="submit" type="submit" >submit</button>
      		</div>
			<?php
			include 'database.php';
			$db=new db();
			if(isset($_POST['submit']))
			{
				$jid=$_POST['jid'];
				
			    $postdata1=$db->journey_record('journey',$jid);
			    $i=0;
				foreach($postdata1 as $post1)
				{
					$i++;
					?>
					<!--input type="gmail" class="form-control" id="src" name="src" value="<?php echo $var ?>" readonly-->
				   	<div class="form-group">
        						<label class="col-sm-2 control-label" for="carno" style="color:aqua">Car Number:</label>
        						<div class="col-sm-6">
          							<input type="text" class="form-control" id="carno" name="carno" value="<?php echo $post1["car_no"]?>" readonly>
        						</div>
							</div><br><br>
							<div class="form-group">
        						<label class="col-sm-2 control-label" for="src" style="color:aqua">Source:</label>
        						<div class="col-sm-6">
          							<input type="text" class="form-control" id="src" name="src" value="<?php echo $post1["source"]?>" readonly>
        						</div>
							</div><br><br>
							<div class="form-group">
        						<label class="col-sm-2 control-label" for="dest" style="color:aqua">Destination:</label>
        						<div class="col-sm-6">
          							<input type="text" class="form-control" id="dest" name="dest" value="<?php echo $post1["destination"]?>" readonly />
        						</div>
							</div><br><br>
							<div class="form-group">
        						<label class="col-sm-2 control-label" for="doj" style="color:aqua">Doj:</label>
        						<div class="col-sm-6">
          							<input type='text' class="form-control" name="doj" value="<?php echo $post1["doj"]?>" readonly />
        						</div>
							</div><br><br>
							<div class="form-group">
        						<label class="col-sm-2 control-label" for="jid" style="color:aqua">Journey Id:</label>
        						<div class="col-sm-6">
          							<input type='text' class="form-control" name="jid" value="<?php echo $jid?>" readonly />
        						</div>
							</div><br><br>
							<div class="form-group">
        						<label class="col-sm-2 control-label" for="seat" style="color:aqua">Enter Booking Seats:</label>
        						<div class="col-sm-6">
          							<input type='text' class="form-control" name="seat" required placeholder="Enter Seats Number ( upto 2 digits )" pattern="[1-5]" />
        						</div>
							</div><br><br>
							<div class="form-group">
        						<label class="col-sm-2 control-label" for="mobno" style="color:aqua">Enter Mobile:</label>
        						<div class="col-sm-6">
          							<input type='text' class="form-control" name="mobno" required placeholder="Enter Mobile Number" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" />
        						</div>
							</div><br><br>

						   	<div class="form-group"> 
        						<div class="text-center"><button class="btn btn-default " name="submit2" value="submit" type="submit" >Submit</button></div>
      						</div>
						 	<?php
						}
						if($i==0)
            			{
              				echo "<script>alert('Journey Id Not Found ! Search Your Journey Id')</script>";
              				echo "<script>window.open('search_panal.php','_self')</script>";
              				exit(0);
            			}
					}
					    $db=new db();
						if (isset($_POST['submit2'])) {
						$carno = $_POST['carno'];
						$src = $_POST['src'];
						$dest = $_POST['dest'];
						$doj = $_POST["doj"];
						$mobno = $_POST['mobno'];
						$seat = $_POST['seat'];
						$jid = $_POST['jid'];
						
						$postdata=$db->check_seat($jid,$seat);
						foreach($postdata as $post1)
						{
							$var=$post1["seats_avail"];
						}
				
						if($var < $seat)
						{
							echo "<script>alert('Seats insufficient ! Try again')</script>";
							exit(0);
						}
						
					     else
						 {
						$sql="insert into ride (email,source,destination,seats_book,doj,journey_id,mobno) values ('$ver','$src','$dest','$seat','$doj','$jid','$mobno')";
						$db->book_ride($sql);
						 }

					}
				?>
</form>