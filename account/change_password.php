<?php
session_start();
?>
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
          <a href="#" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Logo</a>
          <a href="passenger_panal.php?email=<?php echo @$_GET['email']; ?>" class="w3-bar-item w3-button w3-mobile">Back</a>
          <a href="copassenger_profile.php?email=<?php echo @$_GET['email']; ?>" class="w3-bar-item w3-button w3-mobile">Profile</a>
          <a href="../logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
        </div>
  <style>
    *,
    *:before,
    *:after {box-sizing: border-box;}
    h4,h1 {color: black;}
    .container {
      max-width: 38em;
      padding: 1em 3em 2em 3em;
      margin: 0em auto;
      background-color: white;
      border-radius: 4.2px;
      box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
    }
    .row {zoom: 1;}
    .row:before,
    .row:after {
      content: "";
      display: table;
    }
    .row:after {clear: both;}
    .col-half {
      padding-right: 10px;
      float: left;
      width: 50%;
    }
    .col-half:last-of-type {padding-right: 0;}
    .col-third {
      padding-right: 10px;
      float: left;
      width: 33.33333333%;
    }
    .col-third:last-of-type {padding-right: 0;}
    @media only screen and (max-width: 540px) {
      .col-half {
        width: 100%;
        padding-right: 0;
      }
    }
    
  </style>

  

  <div id="set">
    <div class="container">
      <form class="form-horizontal" method="POST" action="change_password.php?email=<?php echo @$_GET['email']; ?>">
        <div class="row">
          <center><h3>Change Password</h3></center><br>
          
          <h5>Email*</h5>
          <input type="text" class="form-control" value=<?php echo @$_GET['email']; ?> readonly></br>

          <h5>Old Password*</h5>
          <input type="password" class="form-control" name="old" required pattern="^.{6,35}$" placeholder="[ Mininum 6 Characters ]"></br>
          
          <h5>New Password*</h5>
          <input type="password" class="form-control" name="new" required pattern="^.{6,35}$" placeholder="[ Mininum 6 Characters ]"></br>
          
          <h5>Confirm Password*</h5>
          <input type="password" class="form-control" name="conf" required pattern="^.{6,35}$" placeholder="[ Mininum 6 Characters ]"></br>
          <div class="text-center">
            <button class="btn btn-danger" name="submit" type="submit" >Reset Password</button>
          </div>
        </div>
      </form>
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

<?php
include 'database.php';
$db=new db();
$email = $_GET['email'];
if(isset($_POST['submit']))
{
  $old = $_POST['old'];
  $new = $_POST['new'];
  $conf = $_POST['conf'];
  if($new!= $conf)
  {
    echo "<script>alert('Confirm Password does not match')</script>";
    exit(0);
  }
  else{
    $result = 0;
    /*$a1=$_SESSION['email']=$_POST['email'];
    $emailid=$_POST['email'];
    $_SESSION['emailid']=$emailid;*/
    $result = $db->change_password($email,$old,$new);
    if($result == 1)
      echo "<script>alert('Password Sucessfully Changed Please Login To Continue')</script>";
    else if($result == 0)
      echo "<script>alert('Password Does Not Match !!!')</script>";
  }
}
?>