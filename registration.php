<?php
	require ('config/Dbconnection.php');
	require ('class/member-class.php');

	if(isset($_GET['m'])){
		header('Location: home.php?m='.$_GET['m']);
	}
	
	if(isset($_POST['submit'])){
		$uemail = $_POST['uemail'];
		$upass = $_POST['upass'];
		$upass_c = $_POST['urepass'];
		$utitle = $_POST['utitle'];
		$ufirst_name = $_POST['fname'];
		$ulast_name = $_POST['lname'];
		$udob = $_POST['birth_d'];
		$unationality = $_POST['nationality'];
		$ucontact = $_POST['pnumber'];
		$ucountry = $_POST['country'];
		$ustate = $_POST['state'];
		$utown = $_POST['city'];
		
		//Set Time Zone
		date_default_timezone_set('Asia/Kuala_Lumpur');
		//Get today date
		$mydate = date("Y-m-d H:i:s");

		if($upass_c != $upass){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>FAILED ! </strong> Please check your password. Re-type password must same with Password.</div>';
			header('Refresh: 2;');
		}else{
			$insert_member = new member();
			echo $insert_member->insertMember($uemail,$upass,$utitle,$ufirst_name,$ulast_name,$udob,$unationality,$ucontact,$ucountry,$ustate,$utown,$mydate);
		}
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
				<ul class="nav navbar-nav">
					<li class="active"><a href="home.php">Check Air Ticket</a></li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Log in/Sign up<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="login.php">Log In</a></li>
							<li><a href="registration.php">Sign Up</a></li>
						</ul>
					</li>
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
		<h4 class="text-left"><strong>Membership Registration</strong></h4>

			<div class="col-md-6">
				<h5 class="text-left">Login Information</h5>
				<form class="form-horizontal" method="POST">
					<div class="form-group">
						<div class="col-sm-12">
						<input type="email" class="form-control" placeholder="Email" name="uemail" required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
						<input type="password" class="form-control" placeholder="Password" name="upass" required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
						<input type="password" class="form-control" placeholder="Re-enter Password" name="urepass" required>
						</div>
					</div>
					<hr>
					
					<h5 class="text-left">Personal Details</h5>
					<div class="form-group">
						<div class="col-sm-12 form-inline">
						<label>Title &emsp;</label>
						<select class="form-control" name="utitle">
							<option value="Mr">Mr</option>
							<option value="Ms">Ms</option>
						</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
						<input type="text" class="form-control" placeholder="First Name" name="fname">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
						<input type="text" class="form-control" placeholder="Last Name" name="lname">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12 form-inline">
						<label>Date of Birth &emsp;</label>
						<input type="date" class="form-control" name="birth_d">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
						<input type="text" class="form-control" placeholder="Nationality" name="nationality">
						</div>
					</div>
					<hr>
					
					<h5 class="text-left">Contact Information</h5>
					<div class="form-group">
						<div class="col-sm-12">
						<input type="number" class="form-control" placeholder="Mobile Number" name="pnumber">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12 form-inline">
						<label>Country &emsp;</label>
						<select class="form-control" name="country" required>
							<option value="Argentina">Argentina</option>
							<option value="Australia">Australia</option>
							<option value="Bangladesh">Bangladesh</option>
							<option value="China">China</option>
							<option value="Malaysia">Malaysia</option>
						</select>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
						<input type="text" class="form-control" placeholder="State/Province" name="state">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
						<input type="text" class="form-control" placeholder="Town/City" name="city">
						</div>
					</div>
					<input class="btn btn-1 col-sm-12 margin-bottom-10 pull-right input-lg" name="submit" type="submit" value="SUBMIT">
				</form>

			</div>
		</div>

	</div>
	
	<div class="footer">
		<strong> Ukraine International Airlines (UIA) ALL RIGHTS RESERVED 2017 - SOUTHEAST ASIA</strong>
	</div>
	
</body>