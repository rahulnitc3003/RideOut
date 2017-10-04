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
    <li><a rel="nofollow" href="passenger_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
    <li><a rel="nofollow" href="../logout.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Logout</a></li>
  </ul>
</div>
<div class="container_wapper">
  <div id="templatemo_banner_menu">
    <div class="container-fluid">
      <div class="col-xs-4 templatemo_logo"><a href="#"><img src="../images/logo.png" id="logo_img" title="Car Ride" /></a>
      </div>
      <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li><a rel="nofollow" href="passenger_panal.php" class="external-link"><i class="glyphicon glyphicon-export"></i>Back</a></li>
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
</style>
<div id="set">
  <div class="container">
    <form action ="ride_booking.php" method="post">
      <table class="table" border="5">
        <tr>
          <td colspan="2" align="center"><h3>Booking Ride</h3></td>
        </tr>
        <tr>
          <td>Journey Id</td>   
          <td><input type="text" class="form-control" id="jid" name="jid" required placeholder="Enter Journey Id in digits only" pattern="^[0-9]*$" />
          </td>
<script type="text/javascript">
                 document.getElementById('jid').value = "<?php echo $_POST['jid'];?>";
                </script>
        </tr>
        <tr>
         <td align="center" colspan="2"><button class="btn btn-danger" name="submit" value="submit" type="submit" >Details</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="search_panal.php">Don't Know Journey id</a>
         </td>
        </tr>
        <tr>
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
            <td><input type='text' class="form-control" name="seat" required placeholder="Enter Required Seats [1 to 5]" pattern="[1-5]" /></td>
          </tr>
          <tr>
            <td>Mobile Number</td>
            <td><input type='text' class="form-control" name="mobno" required placeholder="Enter Mobile Number" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" /></td>
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