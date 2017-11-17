<?php 
	class flight{
		
		public function searchFlight($ori,$des,$depart_d){
			//Db connection file included at flight_itinerary
			$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			
			$ddate = date("Y-m-d",strtotime($depart_d));
			$sql = "SELECT * FROM uia_flight_itinerary WHERE depart_airport LIKE '%$ori%' OR arrive_airport LIKE '%$des%' OR depart_date = $ddate";
			$result = mysqli_query($connection,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			if($result){
				foreach($result as $row){
					echo "<tr>";
					echo "<td>".$row['flight_no']."</td>";
					echo "<td>".$row['depart']." - ".$row['depart_airport']."<br>TIME:".$row['depart_date']."</td>";
					echo "<td>".$row['arrive']." - ".$row['arrive_airport']."<br>TIME:".$row['arrive_date']."</td>";
					echo "<td> RM".$row['price']."</td>";
					if(isset($_GET['m'])){
						echo "<td><a href='purchase.php?m=".$_GET['m']."&fid=".$row['id']."'><button class='btn btn-info margin-bottom-10'>Purchase</button></a></td>";
					}
					echo "</tr>";
				}
			}else{
				echo '<div class="alert alert-danger"><strong>FAILED ! </strong> Sorry, Not Found.</div>';
			}
		}
		
		public function purchaseTicket($email,$uid,$title,$first_name,$last_name,$date_of_birth,$nationality,$contact,$country,$state,$town,$flight_no,$depart,$depart_airport,$depart_date,$arrive,$arrive_airport,$arrive_date,$price,$cdate){
			//Db connection file included at purchase
			$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			
			$sql = "INSERT INTO uia_member_purchase (email,uid,title,first_name,last_name,date_of_birth,nationality,contact,country,state,town,flight_no,depart,depart_airport,depart_date,arrive,arrive_airport,arrive_date,price,cdate) VALUES ('$email','$uid','$title','$first_name','$last_name','$date_of_birth','$nationality','$contact','$country','$state','$town','$flight_no','$depart','$depart_airport','$depart_date','$arrive','$arrive_airport','$arrive_date','$price','$cdate')";
			$result = mysqli_query($connection,$sql);
			if($result){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>SUCCESS ! </strong> You have successfully purchased air ticket. <br> Please print out for reference <input class="btn btn-danger" type="button" onclick="window.print();" value="Print"> </div>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>FAILED ! </strong> Sorry, Please try again.</div>';
				echo $sql;
			}
		}
	}
?>