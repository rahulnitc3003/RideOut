<?php
//Include GP config file && User class
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


<!DOCTYPE html>
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
</head>
<body>

<!--navigation menu start here-->
<div id="templatemo_mobile_menu">
            <ul class="nav nav-pills nav-stacked">
                 <li><a rel="nofollow" href="user_profile.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Profile</a></li>
                 <li><a rel="nofollow" href="../logout.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Logout</a></li>
                 <li><a rel="nofollow" href="login_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
                 <li><a rel="nofollow" href="update_journey.php" class="external-link"><i class="glyphicon glyphicon-forward"></i>Slide Right</a></li>
            </ul>
</div>
<div class="container_wapper">
  <div id="templatemo_banner_menu">
    <div class="container-fluid">
      <div class="col-xs-4 templatemo_logo"><a href="#"><img src="../images/logo.png" id="logo_img" alt="dragonfruit website template" title="Car Ride" /></a>
      </div>
      <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li><a rel="nofollow" href="login_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
          <li><a rel="nofollow" href="user_profile.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Profile</a></li>
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
  <div class="container">
    <form class="form-horizontal" method="POST" action="update_journey.php">
     <table class="table" border="5">
        <tr>
          <td colspan="2" align="center"><h3>Update Ride</h3></td>
        </tr>
        <tr>
          <td>Select Journey Id</td>
          <td><select class="form-control" id="journeyid" name="journeyid">
              <?php
                include 'database.php';
                $db=new db();

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
                  echo "<script>alert('You Are Not Added Any Journey')</script>";
                  echo "<script>window.open('login_panal.php','_self')</script>";
                  exit(0);
                }
              ?>	
              </select>
              <script type="text/javascript">document.getElementById('journeyid').value = "<?php echo $_POST['journeyid'];?>";
              </script>
          </td>
         </tr>
         <tr>
           <td colspan="2" align="center">
              <button class="btn btn-danger " name="submit1" value="Update" type="submit" >submit</button>
           </td>
         </tr>
         <?php
           $db=new db();
           if(isset($_POST['submit1']))
           {
	     $journeyidi=$_POST['journeyid'];
	
             $postdata1=$db->update1('journey',$journeyidi);
	     foreach($postdata1 as $post1)
	     {
               ?>
               <tr>
                 <td>Email</td>
                 <td>
                   <input type="gmail" class="form-control" id="src" name="src" value="<?php echo $var ?>" readonly></td>
               </tr>
               <tr>
                 <td>Car Number</td>
                 <td>
                   <input type="text" class="form-control" id="carno" style="width:10" name="carno" value="<?php echo $post1["car_no"]?>"
     required pattern="^[A-Za-z]{2}([ \-])[0-9]{2}[A-ZAa-z0-9]{1,2}[A-Za-z]\1[0-9]{4}$" placeholder="Format {XX-00XX-0000}">
                 </td>
               </tr>
               <tr>
                 <td>Source</td>
                 <td>
                   <input type="text" class="form-control" id="src" name="src" value="<?php echo $post1["source"]?>"
 required placeholder="Source Location">
                 </td>
               </tr>
               <tr>
                 <td>Destination</td>
                 <td>
                   <input type="text" class="form-control" id="dest" name="dest" value="<?php echo $post1["destination"]?>"
 required placeholder="Destination Location" />
                 </td>
               </tr>
               <tr>
                 <td>Date Of Journey</td>
	         <td>
	           <div class='input-group date' id='datetimepicker1'>
	            <input type='text' class="form-control" name="doj" value="<?php echo $post1["doj"]?>" />
	            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
	           </div>
	        </td>
               </tr>
               <tr>
                 <td>Available Seats</td>
                 <td>
                   <input type='text' class="form-control" name="seat" value="<?php echo $post1["seats_avail"]?>"
          required placeholder="[ 1 to 5 ]" pattern="[0-5]" />
                 </td>
               </tr>
               <tr>
                 <td>Mobile Number</td>
                 <td>
                   <input type='text' class="form-control" name="mobno" value="<?php echo $post1["mobno"]?>"
          required placeholder="Indian Mobile Number" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" />
                 </td>
               </tr>
               <tr>
                 <td colspan="2" align="center"><button class="btn btn-danger" name="submit2" value="submit" type="submit" >update</button></td>
               </tr>
            <?php
	    }
           }
	   ?>
       </table>
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
$date1 = date("Y-m-d");
if(isset($_POST['submit2']))
{
  $journeyidi2=$_POST['journeyid'];
	$carnum=$_POST['carno'];
	$source=$_POST['src'];
	$desti=$_POST['dest'];
	$dateofjour=$_POST['doj'];
	$seats=$_POST['seat'];
  $mobno=$_POST['mobno'];
  if($source == $desti)
      {
        echo "<script>alert('Source And Destination Can Not Be Equal')</script>";
        exit(0);
      }
      if($dateofjour <= $date1)
      {
        echo "<script>alert('Invalid Date Entered !')</script>";
        exit(0);
      }
      if($seats == 0)
      {
        echo "<script>alert('Seat Number Can Not Be Zero')</script>";
        exit(0);
      }
	$sql3="update journey set car_no='$carnum' ,source='$source',destination='$desti',doj='$dateofjour',seats_avail='$seats',mobno='$mobno' where journey_id='$journeyidi2'";
	$db->update3($sql3);

  $subject = "Booking Cancellation";
  $msg = "Sorry Your Booking Have Been Canceled Due To Changes Of Journey Details";
  $headers = "From : RideOut System<rjrahulabc30@gmail.com>";
  $mail = $db->mail_list($journeyidi2);
  foreach($mail as $post1)
  {
    $value = $post1['email'];
    mail($value, $subject, $msg,$headers);
    //echo "<script>alert('$value')</script>";
  }
  $sql_del = "delete from ride where journey_id = $journeyidi2";
  $db->delete_booking($sql_del);
}
?>