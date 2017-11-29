<?php
include_once '../gpConfig.php';
include_once '../User.php';
if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
    //header('Location: login_panal.html');
}
if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}
if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    //Initialize User class
    $user = new User();
    
    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        //'gender'        => $gpUserProfile['gender'],
        //'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        //'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
    
    //Storing user data into session
    $_SESSION['userData'] = $userData;
    
    //Render facebook profile data
    if(!empty($userData)){
    $var=$userData['email'];
    }
    else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
}
?>


<?php
$conn2=mysqli_connect("localhost","id1068737_rideout","rideout","id1068737_rideout") or die("Connection Failed");
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
    
    <body class="w3-light-grey">

        <!-- Navigation Bar -->
        <div class="w3-bar w3-white w3-large">
          <a href="login_panal.php" class="w3-bar-item w3-button w3-red w3-mobile"><img src="../images/logo.png" height="30" width="80" /></a>
          <a href="user_profile.php" class="w3-bar-item w3-button w3-mobile">Profile</a>
          <a href="login_panal.php" class="w3-bar-item w3-button w3-mobile">Back</a>
          <a href="../logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
        </div>
</head><!--navigation menu start here-->

<div id="set">
  <div class="container">
  <div class="table-responsive">
    <form class="form-horizontal" method="POST" action="confirm_booking_panal.php">
    <table class="table" border="2">
     <tr>
       <td align="center" colspan="2"><h3>Booking Status<h3></td>
     </tr>
     <tr>
       <td>Select Journey Id</td>
       <td>
        <select class="form-control" id="journeyid" name="journeyid">
        <?php
        include 'database.php';
        $db=new db();
         //echo "<script>alert('$var')</script>";
        $postdata=$db->update('journey',$var);
        $i=0;
        foreach($postdata as $post)
        {
          $i++;
          ?>
          <option><?php echo $post["journey_id"];?></option>
          <?php
        }
        if($i==0)
        {
            echo "<script>alert('No Any Journey Added')</script>";
            echo "<script>window.open('login_panal.php','_self')</script>";
            exit(0);
        }
        ?>  
      </select>
      <script type="text/javascript">
        document.getElementById('journeyid').value = "<?php echo $_POST['journeyid'];?>";
      </script>
      </td>
        </tr>
        <tr>
          <td align="center" colspan="2"><button class="btn btn-default " name="submit1" value="Submit" type="submit" >Submit</button>
</td>
        </tr>
      </table>
    </form>
   </div>
  <div class="table-responsive">
     <table class="table" border="2">
       <tr>
          <td align="center" colspan="9"><h3>Booking Status<h3></td>
       </tr>
        <tr align="center">
          <td><h4><b>Ride id</b></h4></td>
          <td><h4><b>Email</b></h4></td>
          <td><h4><b>Source</b></h4></td>
          <td><h4><b>Destination</b></h4></td>
          <td><h4><b>Booked Seats</b></h4></td>
          <td><h4><b>Date Of Journey</b></h4></td>
          <td><h4><b>Mobile Number</b></h4></td>
          <td><h4><b>Profile</b></h4></td>
          <td><h4><b>Confirmation</b></h4></td>
        </tr>
        <?php
    $db=new db();
    if(isset($_POST['submit1']))
    {
      $journeyidi=$_POST['journeyid'];

      
      $postdata1=$db->booking_confirm('ride',$journeyidi);
      $i=0;
      foreach($postdata1 as $post1)
      {
        $i++;
        $dummy=$post1["ride_id"];
        $q1="select book_id from booking where ride_id=$dummy";
        $q2=mysqli_query($conn2,$q1);
        if(mysqli_num_rows($q2)>0)
        {
            ?>
             <tr align="center">
          <!--td--><!--?php echo $post1["journey_id"]; ?></td-->
          <td><?php echo $post1["ride_id"]; ?></td>
          <td><?php echo $post1["email"]; ?></td>
          <td><?php echo $post1["source"]; ?></td>
          <td><?php echo $post1["destination"]; ?></td>
          <td><?php echo $post1["seats_book"]; ?></td>
          <td><?php echo $post1["doj"]; ?></td>
          <td><?php echo $post1["mobno"]; ?></td>
          <td><a href='passenger_profile.php?id=<?php echo $post1["email"]; ?>'><input type="button" value="Check Profile" /></a></td>
          <td><input type="text" style="color: green;" class="form-control" id="src" name="src" value="Confirmed" readonly></td>
        <tr> 
        <?php    
        }
        else
        {
            ?>
            <tr align="center">
          <!--td--><!--?php echo $post1["journey_id"]; ?></td-->
          <td><?php echo $post1["ride_id"]; ?></td>
          <td><?php echo $post1["email"]; ?></td>
          <td><?php echo $post1["source"]; ?></td>
          <td><?php echo $post1["destination"]; ?></td>
          <td><?php echo $post1["seats_book"]; ?></td>
          <td><?php echo $post1["doj"]; ?></td>
          <td><?php echo $post1["mobno"]; ?></td>
          <td><a href='passenger_profile.php?id=<?php echo $post1["email"]; ?>'><input type="button" value="Check Profile" /></a></td>
          <td><a href='confirm_booking.php?id=<?php echo $post1["ride_id"]?>&mail_id=<?php echo $post1['email']; ?>'><input type="button" value="Confirm" /></a></td>
        <tr> 
        <?php
        }
        
        
        
        
        ?>
       
      <?php
      }
      if($i==0)
      {
          echo "<script>alert('No Booking Of This Journey Id')</script>";
          echo "<script>window.open('confirm_booking_panal.php','_self')</script>";
          exit(0);
      }
    }
  ?>
     </table>
   </div>
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