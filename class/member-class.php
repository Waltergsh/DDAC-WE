<?php 
	class member{
		
		public function insertMember($uemail,$upass,$utitle,$ufirst_name,$ulast_name,$udob,$unationality,$ucontact,$ucountry,$ustate,$utown,$cdate){
			//Db connection file included at registration
			$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			
			$sql = "INSERT INTO uia_member (email,password,title,first_name,last_name,date_of_birth,nationality,contact,country,state,town,cdate) VALUES ('$uemail','$upass','$utitle','$ufirst_name','$ulast_name','$udob','$unationality','$ucontact','$ucountry','$ustate','$utown','$cdate')";
			$result = mysqli_query($connection,$sql);
			if($result){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>SUCCESS ! </strong> You have successfully registered an account.</div>';
				header('Refresh: 2; URL=login.php');
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>FAILED ! </strong> Sorry, Please try again.</div>';
				header('Refresh: 2;');
			}
		}
		
		public function searchMember($uemail,$upass){
			//Db connection file included at login
			$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			
			$sql = "SELECT id,email,password FROM uia_member WHERE email='$uemail' AND password='$upass' LIMIT 1";
			$result = mysqli_query($connection,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			if($result){
				$myid = $row['id'];
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>SUCCESS ! </strong> You have successfully login.</div>';
				header('Refresh: 2; URL = home.php?m='.$myid);
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>FAILED ! </strong> Sorry, Please try again.</div>';
				header('Refresh: 2;');
			}
		}
		
		public function searchMemberName($uid){
			//Db connection file included at home,purchase
			$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			
			$sql = "SELECT last_name FROM uia_member WHERE id='$uid' LIMIT 1";
			$result = mysqli_query($connection,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			if($result){
				$uname = $row['last_name'];
			}
			return $uname;
		}
	}
?>