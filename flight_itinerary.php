<?php 
	require ('config/Dbconnection.php');
	require ('class/member-class.php');
	require ('class/flight-class.php');
	
	$country = array('KUL'=>'Kuala Lumpur','KCH'=>'Kuching','BHX'=>'Birmingham','EDI'=>'Edinburgh','LGW'=>'London','GVA'=>'Geneva','ZRH'=>'Zurich','TXL'=>'Berlin','CGN'=>'Cologne','DUS'=>'Dusseldorf','HAM'=>'Hamburg');
	$ori = $country[$_GET['o']];
	$des = $country[$_GET['d']];
	$depart_d = $_GET['dd'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ukraine International Airlines - Flight Itinerary</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- ICON -->
	<link rel="icon" href="img/icon.png"/>
	
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
				<div class="col-md-2">
					<?php  
						if(!empty($_GET['m'])){
							$member = new member();
							$uname = $member->searchMemberName($_GET['m']);
							echo "<div class='col-md-2'>";
							echo "<h5>Hi, ".$uname."</h5>";
							echo "</div>";
						}
					?>
				</div>
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
	

	<div class="container height-100vh">
		<div class="col-md-12 padding-top-20">
		<div class="col-md-12">
		<img src="img/logo/uia-icon.jpg" class="img-circle img-logo-1 img-thumbnail margin-bottom-10 pull-left">
		<h4 style="color:#006cb7;line-height:55px">&ensp; Ukraine International Airlines</h4>
		</div>
		
		<h4>FLIGHTS</h4>
		<div class="overflow-box">
		<table class="table table-striped">
		<tr>
			<th>Flight No.</th>
			<th>Depart</th>
			<th>Arrive</th>
			<th>Price</th>
			<?php 
				if(!empty($_GET['m'])){
					echo "<th>Action</th>";
				}
			?>
		<tr>
		<?php 
			$flight = new flight();
			echo $flight->searchFlight($ori,$des,$depart_d);
		?>
		</table>		
		</div>
		
		</div>

	</div>
	
	<div class="footer">
		<strong> Ukraine International Airlines (UIA) ALL RIGHTS RESERVED 2017 - SOUTHEAST ASIA</strong>
	</div>
	
</body>