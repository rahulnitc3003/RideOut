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
    <meta name="description" content="Car Ride System Provide facility to passenger to book a particular ride" />
    <meta name="author" content="templatemo">
    <title>RideOut</title>
    <link rel="shortcut icon" href="../images/favicon.png">
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
      <a class="navbar-brand" href="login_panal.php"><img src="../images/logo.jpg" height="30" width="80" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="user_profile.php">Profile</a></li>
        <li><a href="login_panal.php">Back</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

    

        <!-- Navigation Bar -->
        <!--div class="w3-bar w3-white w3-large">
          <a href="login_panal.php" class="w3-bar-item w3-button w3-red w3-mobile"><img src="../images/logo.png" height="30" width="80" /></a>
          <a href="user_profile.php" class="w3-bar-item w3-button w3-mobile">Profile</a>
          <a href="login_panal.php" class="w3-bar-item w3-button w3-mobile">Back</a>
          <a href="../logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
        </div-->



<!--google map script api start here-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOs735Nv4ymhLSmNDvkpK3NRCEOOvKlyg&libraries=places&callback=initMap" async defer></script>
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
            <input type="text" name="doj" required id="datepicker">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>	
$( function() {
    $( "#datepicker" ).datepicker({ minDate: 0 });
  } );   
</script>
	
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
        /*if($dateofjour <= $date1)
        {
          echo "<script>alert('Current Or Previous Date Can not Be Entered')</script>";
          exit(0);
        }*/
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