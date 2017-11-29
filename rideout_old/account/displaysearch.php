<?php
session_start();
if(!$_SESSION['email'])
{
	header('location:copassenger_login.php');
}
?>
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
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>
</head>
<body>
<style>
#set{
padding-top : 120px; 

}
</style>
<!--navigation menu start here-->
<div id="templatemo_mobile_menu">
  <ul class="nav nav-pills nav-stacked">
    <li>
      <a rel="nofollow" href="search_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link">
      <i class="glyphicon glyphicon-export"></i>Modify Search</a>
    </li>
    <li>
      <a rel="nofollow" href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link">
      <i class="glyphicon glyphicon-export"></i>Back</a>
    </li>
    <li>
      <a rel="nofollow" href="../logout.php" class="external-link">
      <i class="glyphicon glyphicon-export"></i>Logout</a>
    </li>
    <li><a rel="nofollow" href="search_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link"><i class="glyphicon glyphicon-forward"></i>Slide Right</a></li>
  </ul>
</div>
<div class="container_wapper">
  <div id="templatemo_banner_menu">
    <div class="container-fluid">
      <div class="col-xs-4 templatemo_logo"><a href="#"><img src="../images/logo.png" id="logo_img" alt="dragonfruit website template" title="Car Ride" /></a>
      </div>
      <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li>
            <a rel="nofollow" href="search_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link">
            <i class="glyphicon glyphicon-export"></i>Modify Search</a>
          </li>
          <li>
            <a rel="nofollow" href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link">
            <i class="glyphicon glyphicon-export"></i>Back</a>
          </li>
          <li>
            <a rel="nofollow" href="../logout.php" class="external-link">
            <i class="glyphicon glyphicon-export"></i>Logout</a>
          </li>
        </ul>
      </div>
      <div class="col-xs-8 visible-xs"><a href="#" id="mobile_menu"><span class="glyphicon glyphicon-th-list"></span></a></div>
    </div>
  </div>
</div>
<!--navigation menu end here-->
<div id="set">
  <div class="container">
    <div class="table-responsive">
      <table class="table" border="2">
        <tr>
          <td colspan="6" align="center"><h1><b>Ride Available</b></h1></td>
        </tr>
        <tr align="center">
          <td><h4><b>Journey Id</b></h4></td>
          <!--td><h4><b>Email</b></h4></td>
          <td><h4><b>Car Number</b></h4></td-->
          <td><h4><b>Source</b></h4></td>
          <td><h4><b>Destination<b></h4></td>
          <td><h4><b>Date Of Journey</b></h4></td>
          <td><h4><b>Seats available</b></h4></td>
          <!--td><h4><b>Mobile Number</b></h4></td-->
          <td><h4><b>Profile</b></h4></td>
        </tr>
        <?php
        
        // after find bug it is included
        if(!isset($_POST['src']))
        {
           echo "<script>window.open('search_panal.php','_self')</script>";
           exit(0);
        }
        
    include 'database.php';
    $db=new db();
    $email = $_GET['email'];
	$source=$_POST['src'];
	$desti=$_POST['dest'];
	$dateofjour=$_POST['doj'];
	$seats=$_POST['seatsbook'];
	
   if($source == $desti)
   {
     echo "<script>alert('Source And Destination Can not Be Same')</script>";
     echo "<script>window.open('search_panal.php','_self')</script>";
     exit(0);
   }

  $postdata=$db->searchride('journey',$source,$desti,$dateofjour,$seats);
  $i=0;
  foreach($postdata as $post1)
	{
    $i++;
      ?>		
    	<tr align="center">
        <td><?php echo $post1["journey_id"] ?></td>
        <!--td--><!--?php echo $post1["email"] ?></td-->
        <!--td--><!--?php echo $post1["car_no"] ?></td-->
        <td><?php echo $post1["source"] ?></td>
        <td><?php echo $post1["destination"] ?></td>
        <td><?php echo $post1["doj"] ?></td>
        <td><?php echo $post1["seats_avail"] ?></td>
        <!--td--><!--?php echo $post1["mobno"] ?></td-->
 
        <td>
        <a href="carowner_profile.php?id=<?php echo $post1["journey_id"];?>&email=<?php echo @$_GET['email']; ?>">
          <button class="btn btn-info-default" name="submit" value="submit" type="submit" >View Details</button>
        </a>
        </td>
		  </tr>
      <?php
      }
      if($i==0)
      {
        echo "<script>alert('Search Not Founded')</script>";
        echo "<script>window.open('search_panal.php?email=$email','_self')</script>";
        exit(0);
      }
      ?>
    </table>
    </div>
  </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js'></script>
<script src="../../js/index.js"></script>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/jquery-ui.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.singlePageNav.min.js"></script>
<script src="../../js/unslider.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="../../js/templatemo_script.js"></script>
</body>
</html>