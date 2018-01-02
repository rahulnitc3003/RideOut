<?php
session_start();
$ver=$_SESSION['emailid'];
if(!$_SESSION['email'])
{
	header('location:copassenger_login.php');
}
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
			<a class="navbar-brand" href="#"><img src="../images/logo.jpg" height="30" width="80" /></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>">Back</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

<style>
  
</style>
<div id="set">
  <div class="container">
    <form action ="ride_booking.php?email=<?php echo @$_GET['email']; ?>" method="post">
      <table class="table" border="5">
        <tr>
          <td colspan="2" align="center"><h3>Booking Ride</h3></td>
        </tr>
        <tr>
          <td>Journey Id</td>   
          <td><input type="text" class="form-control" id="jid" name="jid" required placeholder="Enter Only Digits" pattern="^[0-9]*$" />
          </td>
<script type="text/javascript">
                 document.getElementById('jid').value = "<?php echo $_POST['jid'];?>";
                </script>
        </tr>
        <tr>
         <td align="center" colspan="2"><button class="btn btn-danger" name="submit" value="submit" type="submit" >Details</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="search_panal.php?email=<?php echo @$_GET['email']; ?>">Don't Know Journey id</a>
         </td>
        </tr>
        <tr>
          <?php
          include 'database.php';
          $db=new db();
          $email = $_GET['email'];
          if(isset($_POST['submit']))
          {
            $jid=$_POST['jid'];
            
              $postdata1=$db->journey_record('journey',$jid);
              $i=0;
            foreach($postdata1 as $post1)
            {
              $i++;
              ?>
            <td>Car Number</td>
            <td><input type="text" class="form-control" id="carno" name="carno" value="<?php echo $post1["car_no"]?>" readonly></td>
          </tr>
          <tr>
            <td>Source</td>
            <td><input type="text" class="form-control" id="src" name="src" value="<?php echo $post1["source"]?>" readonly></td>
          </tr>
          <tr>
            <td>Destination</td>
            <td><input type="text" class="form-control" id="dest" name="dest" value="<?php echo $post1["destination"]?>" readonly /></td>
          </tr>
          <tr>
            <td>Journey Date</td>
            <td><input type='text' class="form-control" name="doj" value="<?php echo $post1["doj"]?>" readonly /></td>
          </tr>
          <tr>
            <td>Journey Id</td>
            <td><input type='text' class="form-control" name="jid" value="<?php echo $jid?>" readonly /></td>
          </tr>
          <tr>
            <td>Required Seats</td>
            <td><input type='text' class="form-control" name="seat" required placeholder="1 to 5" pattern="[1-5]" /></td>
          </tr>
          <tr>
            <td>Mobile Number</td>
            <td><input type='text' class="form-control" name="mobno" required placeholder="Valid Mobile Number" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <div class="text-center"><button class="btn btn-danger " name="submit2" value="submit" type="submit" >Book Ride</button></div>
            </td>
          </tr>
          <?php
             }
              if($i==0)
                    {   
                        echo "<script>alert('Journey Id Not Found ! Search Your Journey Id')</script>";
                        echo "<script>window.open('search_panal.php?email=$email','_self')</script>";
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
      </table>
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