<?php
	require ('config/Dbconnection.php');
	require ('class/member-class.php');
	require ('class/flight-class.php');
	
	if(empty($_GET['m'])){
		header('Location: index.php');
	}
	$uid = $_GET['m'];
	$member_sql = "SELECT * FROM uia_member WHERE id=$uid";
	$member_result = mysqli_query($connection,$member_sql);
	$member_row = mysqli_fetch_array($member_result,MYSQLI_ASSOC);
	
	$fid = $_GET['fid'];
	$flight_sql = "SELECT * FROM uia_flight_itinerary WHERE id=$fid";
	$flight_result = mysqli_query($connection,$flight_sql);
	$flight_row = mysqli_fetch_array($flight_result,MYSQLI_ASSOC);
	
	if(isset($_POST['submit'])){
		//Set Time Zone
		date_default_timezone_set('Asia/Kuala_Lumpur');
		//Get today date
		$mydate = date("Y-m-d H:i:s");
		
		$email=$member_row['email'];
		$title=$_POST['title'];
		$first_name=$_POST['fname'];
		$last_name=$_POST['lname'];
		$date_of_birth=$_POST['birth_d'];
		$nationality=$_POST['nationality'];
		$contact=$_POST['pnumber'];
		$country=$_POST['country'];
		$state=$_POST['state'];
		$town=$_POST['city'];
		$flight_no=$flight_row['flight_no'];
		$depart=$flight_row['depart'];
		$depart_airport=$flight_row['depart_airport'];
		$depart_date=$flight_row['depart_date'];
		$arrive=$flight_row['arrive'];
		$arrive_airport=$flight_row['arrive_airport'];
		$arrive_date=$flight_row['arrive_date'];
		$price=$flight_row['price'];
		$cdate=$mydate;
		
		$purchase = new flight();
		echo $purchase->purchaseTicket($email,$uid,$title,$first_name,$last_name,$date_of_birth,$nationality,$contact,$country,$state,$town,$flight_no,$depart,$depart_airport,$depart_date,$arrive,$arrive_airport,$arrive_date,$price,$cdate);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ukraine International Airlines - Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- ICON -->
	<link rel="icon" href="img/logo/icon.png"/>
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- Main Css -->
	<link rel="stylesheet" href="css/main.css">
	
	<!-- Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			</div>
			
			<div class="navbar-collapse collapse">
					<?php  
						if(!empty($_GET['m'])){
							$member = new member();
							$uname = $member->searchMemberName($_GET['m']);
							echo "<div class='col-md-2'>";
							echo "<h5>Hi, ".$uname."</h5>";
							echo "</div>";
						}
					?>
				<ul class="nav navbar-nav">
					<li class="active"><a href="home.php">Check Air Ticket</a></li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="home.php">Logout &emsp;<span class="glyphicon glyphicon-log-out"></span></a></li>
					<a class="navbar-brand" href=""><img src="img/logo/logo.png"></a>
					<p class="navbar-text" style="color:#006cb7;"><small>West Europe</small></p>
				</ul>
			</div>
		</div>
	</nav>
	

	<div class="container">
		<div class="col-md-12 padding-top-20">
		<div class="col-md-12">
		<img src="img/logo/uia-icon.jpg" class="img-circle img-logo-1 img-thumbnail margin-bottom-10 pull-left">
		<h4 style="color:#006cb7;line-height:55px">&ensp; Ukraine International Airlines</h4>
		</div>
		<h4 class="text-left"><strong>Purchase Information</strong></h4>
				
			<form class="form-horizontal" method="POST" action="">
			<div class="col-md-6">	
				<h5 class="text-left">Personal Details</h5>
				<div class="form-group">
					<div class="col-sm-12 form-inline">
					<label>Title &emsp;</label>
					<select class="form-control" name="title">
						<?php 
							if($member_row['title'] == "Mr"){
								echo "<option value='Mr' selected>Mr</option>";
								echo "<option value='Ms'>Ms</option>";
							}else{
								echo "<option value='Mr'>Mr</option>";
								echo "<option value='Ms' selected>Ms</option>";
							}
						?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $member_row['first_name']?>">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-12">
					<input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $member_row['last_name']?>">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-12 form-inline">
					<label>Date of Birth &emsp;</label>
					<input type="date" class="form-control" name="birth_d" value="<?php echo $member_row['date_of_birth']?>">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-12">
					<input type="text" class="form-control" placeholder="Nationality" name="nationality" value="<?php echo $member_row['nationality']?>">
					</div>
				</div>
				<hr>
				
				<h5 class="text-left">Contact Information</h5>
				<div class="form-group">
					<div class="col-sm-12">
					<input type="number" class="form-control" placeholder="Mobile Number" name="pnumber" value="<?php echo $member_row['contact']?>">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-12 form-inline">
					<label>Country &emsp;</label>
					<select class="form-control" name="country" required>
						<option value="Argentina" <?php $member_row['country'] == "Argentina"? "selected":""?>>Argentina</option>
						<option value="Australia" <?php $member_row['country'] == "Australia"? "selected":""?>>Australia</option>
						<option value="Bangladesh" <?php $member_row['country'] == "Bangladesh"? "selected":""?>>Bangladesh</option>
						<option value="China" <?php $member_row['country'] == "China"? "selected":""?>>China</option>
						<option value="Malaysia" <?php $member_row['country'] == "Malaysia"? "selected":""?>>Malaysia</option>
					</select>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-12">
					<input type="text" class="form-control" placeholder="State/Province" name="state" value="<?php echo $member_row['state']?>">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-12">
					<input type="text" class="form-control" placeholder="Town/City" name="city" value="<?php echo $member_row['town']?>">
					</div>
				</div>
			</div>
			
			<div class="col-md-6">	
				<h5 class="text-left">Flight</h5>
				<div class="form-group">
					<div class="col-sm-12 form-inline">
					<label>Flight No &emsp;&emsp;</label>
					<input type="text" class="form-control" style="background-color: #fff;border: 0; box-shadow: inset 0 1px 1px rgba(0,0,0,0);" name="flightno" value="<?php echo $flight_row['flight_no']?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12 form-inline">
					<label>Depart &emsp;&emsp;&emsp;&nbsp;</label>
					<input type="text" class="form-control" style="background-color: #fff;border: 0; box-shadow: inset 0 1px 1px rgba(0,0,0,0);" name="depart" value="<?php echo $flight_row['depart']?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12 form-inline">
					<label>Destination &emsp;</label>
					<input type="text" class="form-control" style="background-color: #fff;border: 0; box-shadow: inset 0 1px 1px rgba(0,0,0,0);" name="arrive" value="<?php echo $flight_row['arrive']?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12 form-inline">
					<label>Depart Date &emsp;</label>
					<input type="text" class="form-control" style="background-color: #fff;border: 0; box-shadow: inset 0 1px 1px rgba(0,0,0,0);" name="depart_d" value="<?php echo $flight_row['depart_date']?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12 form-inline">
					<label>Price &emsp;&emsp;&emsp;&emsp;</label>
					<input type="text" class="form-control" style="background-color: #fff;border: 0; box-shadow: inset 0 1px 1px rgba(0,0,0,0);" name="price" value="<?php echo $flight_row['price']?>" disabled>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<input class="btn btn-1 margin-bottom-10 pull-right" name="submit" type="submit" value="SUBMIT">
			</div>
			</form>
		</div>
	</div>
	
	<div class="footer">
		<strong> Ukraine International Airlines (UIA) ALL RIGHTS RESERVED 2017 - SOUTHEAST ASIA</strong>
	</div>
	
</body>