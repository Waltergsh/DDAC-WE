<?php
	require ('config/Dbconnection.php');
	require ('class/member-class.php');
	
	if(isset($_GET['m'])){
		header('Location: home.php?m='.$_GET['m']);
	}
	
	if(isset($_POST['submit'])){
		$myusername = $_POST['uemail'];
        $mypassword = $_POST['upass'];
		
		$member = new member();
		echo $member->searchMember($myusername,$mypassword);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ukraine International Airlines - Login</title>
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
							<?php 
								if($user){
									echo '<li><a href="home.php">Logout</a></li>';
								}else{
									echo '<li><a href="login.php">Log In</a></li>';
									echo '<li><a href="registration.php">Sign Up</a></li>';
								}
							?>
						</ul>
					</li>
					<a class="navbar-brand" href=""><img src="img/logo/logo.png"></a>
					<p class="navbar-text" style="color:#006cb7;"><small>West Europe</small></p>
				</ul>
			</div>
		</div>
	</nav>
	

	<div class="container height-82vh">
		<div class="col-md-4"></div>
		<div class="col-md-4 padding-top-20" align="center">
		<img src="img/logo/uia-icon.jpg" class="img-circle img-logo img-thumbnail margin-bottom-10">

			<div class="col-md-12 border-1">
				<h5 class="text-left" style="color: #fff;"><strong>Login</strong></h5>
				<form class="form-horizontal" method="POST">
					<div class="form-group">
						<div class="col-sm-12">
						<input type="text" class="form-control" placeholder="Email" name="uemail">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
						<input type="password" class="form-control" placeholder="Password" name="upass">
						</div>
					</div>
					
					<input class="btn btn-1 col-xs-12 input-lg margin-bottom-10" name="submit" type="submit" value="SUBMIT">
				</form>
				
				<p style="color: #fff;">Haven't get an account? <a href="registration.php">Register</a></p>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	
	<div class="footer">
		<strong> Ukraine International Airlines (UIA) ALL RIGHTS RESERVED 2017 - SOUTHEAST ASIA</strong>
	</div>
	
</body>