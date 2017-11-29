<?php
class db
{
	public $host= "localhost";
	public $user="id1068737_rideout";
	public $pass="rideout";
	public $db_name="id1068737_rideout";
	
	public $conn;
	public $error;
	
	public function __construct()
	{
		$this->connect();
	}
	private function connect()
	{
		$this->conn=new mysqli($this->host,$this->user,$this->pass,$this->db_name);
		if(!$this->conn)
		{
			$this->error ="Connect fail ".$this->conn->connect_error;
		}
	}

    //corrected code
	public function validate($carnum,$doj)
	{
		$sql="select * from journey where car_no='$carnum' and doj='$doj'";
		$result = $this->conn->query($sql);
    	if($result->num_rows > 0)
		{
		   return 1;
		}
		else 
		{
		   return 0;
		}
	}

	public function insert($sql)
	{
		$result=$this->conn->query($sql);
		
		if($result)
		{
		echo "<script>alert('Your Journey Added !')</script>";
		}
		else
		{
			echo "<script>alert('Journey Addition failed , check your data')</script>";
		}
	}
	
	public function update($tbl_name,$var)
	{
		$array= array();
		$sql="select journey_id from $tbl_name where email='$var'";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array; 
	}
	
	public function update1($tbl_name,$journeyidi)
	{
		$array= array();
		$sql="select * from ".$tbl_name." where journey_id = ".$journeyidi."";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array; 
	}
	
	public function update3($sql3)
	{
		$result=$this->conn->query($sql3);
		
		if($result)
		{
		echo "<script>alert('Your Journey updated')</script>";
		}
		else
		{
			echo "<script>alert('Updation of Journey failed ! check your data !')</script>";
		}
	}

	/* my code start here*/

	public function mail_list($journeyidi2)
	{
		$array= array();
		$sql_mail="select email from ride where journey_id = $journeyidi2";
		$result = mysqli_query($this->conn,$sql_mail);
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array;
	}

	public function delete_booking($sql_del)
	{
		$result=$this->conn->query($sql_del);
		
		if($result)
		{
		echo "<script>alert('All Previous Booking is Deleted')</script>";
		}
		else
		{
			echo "<script>alert('some error in query')</script>";
		}
	}
	/* my code end here */
	
	public function searchride($tbl_name,$source,$desti,$dateofjour,$seats)
	{
		//echo $source;
		//echo $desti;
		$array= array();
	    $sql4="select * from $tbl_name where source='$source' and destination='$desti' and doj='$dateofjour' and seats_avail>='$seats'";
		$result = mysqli_query($this->conn,$sql4);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array; 
	}
	public function book_ride($sql)
	{
		$result=$this->conn->query($sql);
		if($result)
		{
		echo "<script>alert('Your Booking Sucess')</script>";
		}
		else
		{
			echo "<script>alert('Booking failed ! check your data')</script>";
		}
	}
	
	public function booking_details($tbl_name,$ride_id)
	{
		$array= array();
		$sql="select ride_id from $tbl_name where email='$ride_id'";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array;
		//echo $sql;
	}

	public function booking_status($journeyidi)
	{
		$array= array();
		$sql="select * from ride where ride_id not in (select booking.ride_id from booking,ride where ride.ride_id =booking.ride_id) and journey_id='$journeyidi'";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array;
	}
	
	
	public function booking_confirm($tbl_name,$journeyidi)
	{
		$array= array();
		$sql="select * from ".$tbl_name." where journey_id = ".$journeyidi."";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array;
	}

	public function journey_record($tbl_name,$jid)
	{
		$array= array();
		$sql="select car_no,source,destination,doj from ".$tbl_name." where journey_id = ".$jid."";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array; 
	}

	

	/*----passenger details----*/
	public function passenger_profile($tbl_name,$email)
	{
		$sql="select * from ".$tbl_name." where email = ".$email."";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row=$result->fetch_assoc())
			{
				return $row;
			}
		}
		
	}

	/*------my code-----*/
	// working
	public function journey_details($tbl_name,$id)
	{
		$sql="select * from ".$tbl_name." where journey_id = ".$id."";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row=$result->fetch_assoc())
			{
				return $row;
			}
		}
		
	}

	public function check_seat($jid,$seat)
	{
		$array= array();
		$sql="select * from journey where journey_id ='$jid' ";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array;
	    	
	}

    public function coinsert($sql)
	{
        $result=$this->conn->query($sql);
		if($result)
		{
    		echo '<script type="text/javascript">'; 
            echo 'alert("Your Profile Has been Recored Please Login for Continue");'; 
            echo 'window.location.href = "copassenger_login.php";';
            echo '</script>';
		}
		else
		{
			echo "<script>alert('Account is Already Exit')</script>";
		}
	}

      
    public function check($email,$pass)
	{
		$sql="select * from copassenger where email='$email'";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0)
		{
        	$sql1="select * from copassenger where email='$email' and password='$pass'";
            $result1 = $this->conn->query($sql1);
            if($result1->num_rows > 0)
		    {
            	//echo "<script>alert('Welcome')</script>"; 
                echo "<script>window.open('passenger_panal.php?email=$email','_self')</script>";
        	}
            else
            {
            	echo "<script>alert('Wrong password! Try again')</script>";
            }
    	}
        else
        {
       	 echo "<script>alert('Not Registered !! Please SignUp .')</script>";   
        }
	}

    //--------forget password-----------
    public function forget_pass($email)
    {
    	$sql_query="select * from copassenger where email='$email'";
		$r=$this->conn->query($sql_query);
		$result=mysqli_fetch_assoc($r);
		if(mysqli_num_rows($r)>0)
		{
			
			$pass=$result['password'];
			$msg = "Forget Password";
			$header = "From: <rideoutsys@gmail.com>";
			if(mail($email,$header,"Your password: ".$pass,$msg))
			{
				echo '<script> alert("Password is sent to your Email please check Email")</script>';
				echo "<script>window.open('copassenger_login.php','_self')</script>";
			}
			else{
				echo "<script> alert('some error is occured !!!')</script>";
			}
		}
		else
		{
			echo '<script> alert("Your Email is not Registered Please SignUp !!")</script>';
			echo "<script>window.open('copassenger_signup.php','_self')</script>";
		}
    }
    //----------forget password end here----------

    public function book_status1($var) 
	{ 
		//echo "hello";
		$sql="select * from ride where email='$var'";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array;
    }

    public function book_status2($var) 
	{ 
	
		$sql="select * from booking where ride_id='$var' ";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0)
		{
			echo "<script>alert('Your Journey Is Confirmed ! Happy journey !!')</script>";
			while($row=$result->fetch_assoc())
			{
				$tem = $row["book_id"];
				echo "<script>alert('Your Booking Id Is  '+ $tem +'  Do not Forget it')</script>";
			}
		}
		else
		{
			echo "<script>alert('Your Journey Is Not Confirmed !Kindly Wait !!')</script>";
		
		}
	}
	
	public function show_request($var)
	{
		$array= array();
		$sql="select *from ride where ride_id = '$var'";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array; 
	}
	
	public function final_book($sql,$var,$r,$mail)
	{
		
		$result=$this->conn->query($sql);
		
		
		if($result)
		{
			echo "<script>alert('Booking Ride Is Confirmed')</script>";
			$sql1="update journey,(select seats_avail from journey where journey_id='$var') as e1,
				(select seats_book from ride,booking where ride.journey_id='$var' and  ride.ride_id=booking.ride_id ) as e2 set journey.seats_avail=e1.seats_avail-e2.seats_book where journey.journey_id='$var'";
			$result1=$this->conn->query($sql1);
			if($result1){
			    echo "<script>alert('Seat availablitity updated')</script>";
			    echo "<script>window.open('confirm_booking_panal.php','_self')</script>";
			}
			else{
				echo "<script>alert('Seat availablitity not updated')</script>";
			}
		}
		else
		{
			echo "<script>alert('Booking Ride Not Confirmed!')</script>";
		}
	}
	
	public function exist($var)
	{
		//$array= array();
		$sql="select * from booking where ride_id = '$var'";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0)
		{
			//echo "<script>alert('You have already confirmed your journey !!')</script>";
		      return 1;
		}
	}
	public function profile($email)
	{
		$array= array();
		$sql="select *from copassenger where email = '$email'";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array;	
	}

	public function change_password($email,$old_pass,$new_pass)
	{
		$sql="update copassenger set password = '$new_pass' where email = '$email' and password = '$old_pass'";
		$result =$this->conn->query($sql);
		if($result)
		  return 1;
		else
		  return 0;
	}
	
	
	/*my extra code */
	public function show_details($email)
	{
    	$array= array();
		$sql="select *from journey where email = '$email'";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array;	
	}
	
	public function show_ride_details($email)
	{
    	$array= array();
		$sql="select *from ride where email = '$email'";
		$result = mysqli_query($this->conn,$sql);
		
		while($row = $result->fetch_assoc())
		{
			$array[]=$row;
		}
		return $array;	
	}
}
?>