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
        <li><a rel="nofollow" href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link"><i class="glyphicon glyphicon-export"></i>Home</a></li>
        <li><a rel="nofollow" href="search_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
        <li><a rel="nofollow" href="../logout.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Logout</a></li>
        <li><a rel="nofollow" href="carowner_profile.php?id=<?php echo @$_GET['id']; ?>&email=<?php echo @$_GET['email']; ?>" class="external-link"><i class="glyphicon glyphicon-forward"></i>Slide Right</a></li>
    </ul>
</div>
<div class="container_wapper">
  <div id="templatemo_banner_menu">
    <div class="container-fluid">
      <div class="col-xs-4 templatemo_logo"><a href="#"><img src="../images/logo.png" id="logo_img" alt="dragonfruit website template" title="Car Ride" /></a>
      </div>
      <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li><a rel="nofollow" href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link"><i class="glyphicon glyphicon-export"></i>Home</a></li>
          <li><a rel="nofollow" href="search_panal.php?email=<?php echo @$_GET['email']; ?>" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
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
  }

  .container{
   background-image: url("../images/image2.jpg");
  }
</style>
<div id="set">
    <?php
    $id = @$_GET['id'];
    //echo $id;
    ?>

    <?php
        include 'database.php';
        $db=new db();
        $run = $db->journey_details('journey',$id);
        ?>
        <div class="container">
            <div class="table-responsive">
                <table class="table" border="2">
                    <tr><td align="center" colspan="2"><h2><b>CarOwner Details</b><h2></td></tr>
                    <tr>
                        <td align="center"><h4><b>Journey Id:</b></h4></td>
                        <td><?php echo $run["journey_id"]; ?></td>
                    </tr>
                    
                    <tr>
                        <td align="center"><h4><b>Email:</b></h4></td>
                        <td><?php echo $run["email"]; ?></td>
                    </tr>
                    <tr>
                        <td align="center"><h4><b>Car Number:</b></h4></td>
                        <td><?php echo $run["car_no"]; ?></td>
                    </tr>
                    <tr>
                        <td align="center"><h4><b>Mobile Number:</b></h4></td>
                        <td><?php echo $run["mobno"]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
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