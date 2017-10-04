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
    }else{
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
                 <li><a rel="nofollow" href="login_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
                 <li><a rel="nofollow" href="user_profile.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Profile</a></li>
                 <li><a rel="nofollow" href="../logout.php" class="external-link"><i class="glyphicon glyphicon-export"></i>logout</a></li>
                 <li><a rel="nofollow" href="add_journey.php" class="external-link"><i class="glyphicon glyphicon-forward"></i>Slide Right</a></li>
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

<!--google map script api start here-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOs735Nv4ymhLSmNDvkpK3NRCEOOvKlyg&libraries=places&callback=initMap" async defer>
</script>
<script>
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      mapTypeControl: false,
      center: {
        lat: -33.8688,
        lng: 151.2195
      },
      zoom: 13
    });

    new AutocompleteDirectionsHandler(map);
  }

function AutocompleteDirectionsHandler(map) {
  this.map = map;
  this.originPlaceId = null;
  this.destinationPlaceId = null;
  this.travelMode = 'WALKING';
  var originInput = document.getElementById('origin-input');
  var destinationInput = document.getElementById('destination-input');
  var modeSelector = document.getElementById('mode-selector');
  this.directionsService = new google.maps.DirectionsService;
  this.directionsDisplay = new google.maps.DirectionsRenderer;
  this.directionsDisplay.setMap(map);

  var originAutocomplete = new google.maps.places.Autocomplete(
    originInput, {
      placeIdOnly: true
    });
  var destinationAutocomplete = new google.maps.places.Autocomplete(
    destinationInput, {
      placeIdOnly: true
    });

  this.setupClickListener('changemode-walking', 'WALKING');
  this.setupClickListener('changemode-transit', 'TRANSIT');
  this.setupClickListener('changemode-driving', 'DRIVING');

  this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
  this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
}

// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
  var radioButton = document.getElementById(id);
  var me = this;
  radioButton.addEventListener('click', function() {
    me.travelMode = mode;
    me.route();
  });
};
</script>

<!--google map script api start here-->


<!--navigation menu end here-->
<div id="set">
  <div class="container">
    <form class="form-horizontal" method="POST" action="add_journey.php">
     <table class="table" border="5">
        <tr>
          <td colspan="2" align="center"><h3>Post Your Journey</h3></td>
        </tr>
        <tr>
          <td>Email</td>   
          <td><input type="gmail" class="form-control" id="src" name="src" value="<?php echo $var ?>" readonly>
          </td>
        </tr> 
        
        <tr>
          <td>Car Number</td>   
          <td><input type="text" class="form-control" id="carno" style="width:10" name="carno" required pattern="^[A-Za-z]{2}([ \-])[0-9]{2}[A-ZAa-z0-9]{1,2}[A-Za-z]\1[0-9]{4}$" placeholder="Format {XX-00XX-0000}">
          </td>
        </tr>
        <tr>
          <td>Source</td>   
          <td>
              <input id="origin-input" type="text" class="form-control" id="src" name="src" required placeholder="Source Location">
              </input>
          </td>
        </tr>
        <tr>
          <td>Destination</td>
          <td>
            <input id="destination-input" type="text" class="form-control" id="dest" name="dest" required placeholder="Destination Location">
            </input>
            <div id="map"></div>
          </td>
        </tr>
        <tr>
           <td>Date Of Journey</td>
           <td>
            <div class='input-group date' id='datetimepicker1'>
             <input type='text' class="form-control" name="doj" placeholder=year/mm/dd />
             <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </div>
           </td>
        </tr>
        <tr>
          <td>Available Seats</td>   
          <td><input type='text' class="form-control" name="seat" required placeholder="Upto 5 seats" pattern="[1-5]{1}" />
          </td>
        </tr>
        <tr>
          <td>Mobile Number</td>   
          <td><input type='text' class="form-control" name="mobno" required placeholder="Valid Mobile Number" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" />
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="text-center"><button class="btn btn-danger" name="submit" value="submit" type="submit" >submit</button>
            </div>
          </td>
        </tr>
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

  include 'database.php';
  $db=new db();
  //echo $var;
  $date1 = date("Y-m-d");
  if(isset($_POST['submit']))
  {
      
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
          echo "<script>alert('Current Or Previous Date Can not Be Entered')</script>";
          exit(0);
        }
        if($seats == 0)
        {
          echo "<script>alert('Seat Number Can Not Be Zero')</script>";
          exit(0);
        }
        if($mobno == "")
        {
          echo "<script>alert('Enter Mobile Number')</script>";
          exit(0);
        }
        //bug corrected code
        $ans=$db->validate($carnum,$dateofjour);
        if($ans==1)
        {
            echo "<script>alert('Entered Car Is Already Booked ! Please Choose A Different Car ! ')</script>";
                        exit(0);

        }
        else
        {
          $sql="insert into journey (email,car_no,source,destination,doj,seats_avail,mobno) values ('$var','$carnum','$source','$desti','$dateofjour','$seats','$mobno')";
          $db->insert($sql);
          
        } 
  }
?>