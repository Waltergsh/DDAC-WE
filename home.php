<?php 
	require ('config/Dbconnection.php');
	require ('class/member-class.php');	
	
	if(isset($_POST['submit'])){
		$ori = $_POST['origin'];
		$des = $_POST['destination'];
		$date = $_POST['depart_d'];
		
		if(!empty($ori) && !empty($des) && !empty($date)){
			if(isset($_GET['m'])){
				$uid = $_GET['m'];
				header("Location: flight_itinerary.php?m=".$uid."&o=".$ori."&d=".$des."&dd=".$date);
			}else{
				header("Location: flight_itinerary.php?o=".$ori."&d=".$des."&dd=".$date);
			}
		}else{
			echo "<div class='alert alert-danger'><strong>FAILED ! </strong> Please make sure all fields are not empty.</div>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ukraine International Airlines - Home</title>
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
							<?php 
								if(!empty($_GET['m'])){
									echo '<li><a href="home.php">Logout &emsp;<span class="glyphicon glyphicon-log-out"></span></a></li>';
								}else{
									echo "<li class='dropdown'>";
									echo "<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Log in/Sign up<span class='caret'></span></a>";
									echo "<ul class='dropdown-menu'>";
									echo '<li><a href="login.php">Log In</a></li>';
									echo '<li><a href="registration.php">Sign Up</a></li>';
									echo "</ul>";
									echo "</li>";
								}
							?>
					<a class="navbar-brand" href=""><img src="img/logo/logo.png"></a>
					<p class="navbar-text" style="color:#006cb7;"><small>West Europe</small></p>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="background-cloud">
		<div class="background-plane">
			<div class="container height-100vh">
				<h2>Welcome, </h2>
				<h3 class="padding-left-30">Thank You For Choosing Ukraine International Airlines</h3>
				
				<div class="col-md-6 border-1">
					<h5 style="color: #fff;"><strong>Flight - ONE WAY</strong></h5>
					<form class="form-horizontal" method="POST">
						<div class="form-group">
							<div class="col-sm-12">
							<select class="form-control" name="origin">
								<option>Origin</option>
								<option disabled>--- Malaysia - MYS ---</option>
								<option value="KUL">Kuala Lumpur International Airport, Sepang</option>
								<option value="KCH">Kuching International Airport, Kuching</option>
								<option disabled>--- United Kingdom - GB ---</option>
								<option value="BHX">Birmingham, International</option>
								<option value="EDI">Edinburgh, Turnhouse</option>
								<option value="LGW">London, Gatwick</option>
								<option disabled>--- SWITZERLAND - CH ---</option>
								<option value="GVA">Geneva, Geneva International Airport</option>
								<option value="ZRH">Zurich, Zurich Kloten Airport</option>
								<option disabled>--- Germary - DE ---</option>
								<option value="TXL">Berlin, Tegel</option>
								<option value="CGN">Cologne, Koeln-Bonn</option>
								<option value="DUS">Dusseldorf, Dusseldorf Airport</option>
								<option value="HAM">Hamburg, Fuhlsbuettel</option>
							</select>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-12">
							<select class="form-control" name="destination">
								<option>Destination</option>
								<option disabled>--- Malaysia - MYS ---</option>
								<option value="KUL">Kuala Lumpur International Airport, Sepang</option>
								<option value="KCH">Kuching International Airport, Kuching</option>
								<option disabled>--- United Kingdom - GB ---</option>
								<option value="BHX">Birmingham, International</option>
								<option value="EDI">Edinburgh, Turnhouse</option>
								<option value="LGW">London, Gatwick</option>
								<option disabled>--- SWITZERLAND - CH ---</option>
								<option value="GVA">Geneva, Geneva International Airport</option>
								<option value="ZRH">Zurich, Zurich Kloten Airport</option>
								<option disabled>--- Germary - DE ---</option>
								<option value="TXL">Berlin, Tegel</option>
								<option value="CGN">Cologne, Koeln-Bonn</option>
								<option value="DUS">Dusseldorf, Dusseldorf Airport</option>
								<option value="HAM">Hamburg, Fuhlsbuettel</option>
							</select>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-12">
							<label style="color:#fff;">Depart Date</label>
							<input type="date" class="form-control" name="depart_d">
							</div>
						</div>
						
						<input class="btn btn-1 col-xs-12 input-lg margin-bottom-10" name="submit" type="submit" value="SEARCH FLIGHT">
					</form>
				
			</div>
		</div>
	</div>
	
	<div class="footer">
		<strong> Ukraine International Airlines (UIA) ALL RIGHTS RESERVED 2017 - SOUTHEAST ASIA</strong>
	</div>
	
</body>