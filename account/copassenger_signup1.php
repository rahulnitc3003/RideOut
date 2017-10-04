<?php
session_start();
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
                 <li><a rel="nofollow" href="../index.php" class="external-link"><i class="glyphicon glyphicon-export"></i>HomePage</a></li>
                 <li><a rel="nofollow" href="copassenger_login.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Login</a></li>
            </ul>
</div>
<div class="container_wapper">
  <div id="templatemo_banner_menu">
    <div class="container-fluid">
      <div class="col-xs-4 templatemo_logo"><a href="#"><img src="../images/logo.png" id="logo_img" alt="dragonfruit website template" title="Car Ride" /></a>
      </div>
      <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li><a rel="nofollow" href="../index.php" class="external-link"><i class="glyphicon glyphicon-export"></i>HomePage</a></li>
          <li><a rel="nofollow" href="copassenger_login.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Login</li>
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

<!--navigation menu end here-->
<style>
#set{
padding-top : 150px; 
padding-left: 150px;
}

.container{
 background-image: url("../images/img12.jpg");
}
</style>
<div id="set">
  <div class="container">
    <h2 align="center" style="color:aqua">Sign Up Form</h2><br><br><br>
    <form class="form-horizontal" method="POST" action="copassenger_signup.php">
      
 <div class="form-group">
        <label class="col-sm-2 control-label" for="src" style="color:aqua">First Name:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="src" name="fname" required placeholder="Enter First Name">
        </div>
      </div>
 <div class="form-group">
        <label class="col-sm-2 control-label" for="src" style="color:aqua">Last Name:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="src" name="lname" required placeholder="Enter Second Name">
        </div>
      </div>
<div class="form-group">
        <label class="col-sm-2 control-label" for="src" style="color:aqua">Email:</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" id="src" name="emailid" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Enter Valid Email">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="carno" style="color:aqua">Password:</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" id="pass" style="width:10" name="pass" required placeholder="Enter Password">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="src" style="color:aqua">Address:</label>
        <div class="col-sm-6">
         <!--input type="textarea" class="form-control" id="src" name="add" required placeholder="Enter Your Address"-->
          <textarea class="form-control" rows="2" id="add" name="add" required placeholder="Enter Your Address"></textarea>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label" for="uid" style="color:aqua">Addhar Number:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="uid" name="uid" required placeholder="Enter Valid Addhar Number" pattern="[0-9]{12}" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="carno" style="color:aqua">Contact No:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="pass" style="width:10" name="cno" required placeholder="Enter Mobile Number" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" />
        </div>
      </div>
      <div class="form-group"> 
        <div class="text-center"><button class="btn btn-default " name="submit" value="submit" type="submit" >submit</button></div>
      </div>
     
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

<?php
include 'database.php';
$db=new db();

if(isset($_POST['submit']))
{
    
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $email_i=$_POST['emailid'];
    $passw=$_POST['pass'];
    $addr=$_POST['add'];
    $uid = $_POST['uid'];
    $contactno=$_POST['cno'];
     
    
	$_SESSION['emailid']=$email_i;

 
    $sql="insert into copassenger values ('$firstname','$lastname','$email_i','$passw','$addr','$uid','$contactno')";
    $db->coinsert($sql);

    
}

?>