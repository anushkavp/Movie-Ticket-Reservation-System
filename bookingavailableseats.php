<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "annu98", "illumine");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			BOOK NOW!
		</title>
	</head>
	<style>
		body {
			background-image: url(images/booking.gif);
			#background-image: url(images/booking1.jpg);
			color: 	#E95D0F;
			#B80000;
			#color: red;
			text-align: center;
			
		}
		.dropdownmov {
			color: #E95D0F;
			#rgb(255,53,10);
			background: white ;
			border: 4px solid #E95D0F;
			#E00000;
			font-weight: bold;
		}


		select {
			width:200px;
			padding:5px;
		}
		.formbox {
			background-color: white;
			border: 10px solid #C71585;
			width: 700px;
			position: absolute;
			top: 100px;
			left: 300px;
			height: 400px;
			background-color: rgb(255,192,203);
			border-radius: 50px;
		}
		.gobtn {
			height: 50px;
			margin-top: 6px;
			margin-right: 1px; 
			padding: 0px 10px 0px 10px;
			font-size: 20px;
			color: #E95D0F;
			background: white;
			border: 8px solid #E95D0F;
			text-decoration: none;
		}

		.gobtn:hover {
			    color: white;
			    background-color: #E95D0F;
			}
	</style>
	<body>
		<br><br>
		<!--?php 
echo "Movie_id-";
print_r($_SESSION['movie_id']);
echo "Theatre_id-";
print_r($_SESSION['theatre_id']); 
echo "Screen_id-";
print_r($_SESSION['screen_id']);
echo "Movie_name-";
print_r($_SESSION['movie_name']);
echo "Theatre_name-";
print_r($_SESSION['theatre_name']); 
echo "Screen_name-";
print_r($_SESSION['screen_name']);-->
		<!--FOR NUMBER OF SEATS-->
		<div class = "formbox"><br>
	<h1>LAST STEP: Select the number of seats you want to book!
		</h1>
		<form method="post">
			<select name = "seatnumbers" class = "dropdownmov">
				<option value = "1">1</option>
				<option value = "2">2</option>
				<option value = "3">3</option>
				<option value = "4">4</option>
				<option value = "5">5</option>
			</select>
	        <br><br>         
        	<input type="submit" name="submit3" value="Go!" class = "gobtn" />
		<?php
			// echo $movie_id;
			// echo $theatre_id;
			// echo $screen_id;
            if(isset($_POST['submit3']))
            {
				$selected_val3 = $_POST['seatnumbers'];  // Storing Selected Value In Variable
				$findavailableseats = "select available_seats from movietimings where movie_id = '".$_SESSION["movie_id"]."' and screen_id = '".$_SESSION["screen_id"]."' and theatre_id = '".$_SESSION["theatre_id"]."' and date ='".$_SESSION["date"]."' and timings = '".$_SESSION["timings"]."'";
				$resultavailableseats = mysqli_query($conn, $findavailableseats);
				$availableseats = mysqli_fetch_array($resultavailableseats);
				if(mysqli_num_rows($resultavailableseats)==1)
				{
					echo "Availableseat: ".$availableseats["available_seats"]."<br>";
					if($selected_val3<$availableseats["available_seats"])
					{
						$no_of_seats = $availableseats["available_seats"];
						// "You have selected ".$no_of_seats." number of seats";
						$no_of_seats = $no_of_seats - $selected_val3;
						$sql = "update movietimings set available_seats = '".$no_of_seats."' where screen_id = '".$_SESSION["screen_id"]."' and theatre_id = '".$_SESSION["theatre_id"]."' and movie_id = '".$_SESSION["movie_id"]."' and date ='".$_SESSION["date"]."' and timings = '".$_SESSION["timings"]."'";
						//$resultupdate =
						mysqli_query($conn, $sql);
						$_SESSION["no_of_seats"] = $selected_val3;
					}	
					else
					{
						echo "<script type='text/javascript'>alert('Not enough available number of seats');</script>";
						exit();
					}
					$finq = "INSERT INTO user_bookings (cust_id, movie_id, screen_id,theatre_id,user_seats, dates ,timings) VALUES ('".$_SESSION["customer_id"]."', '".$_SESSION["movie_id"]."','".$_SESSION["screen_id"]."','".$_SESSION["theatre_id"]."','".$_SESSION["no_of_seats"]."','".$_SESSION["date"]."','".$_SESSION["timings"]."')";

					$result = mysqli_query($conn, $finq);
    		  	 	if($result)
        			{
       					echo "<br><h3>Booking Done Successfully for ".$_SESSION["no_of_seats"]." </h3>";
       				    echo "<h2>Dear ".$_SESSION["customer_name"].", we would be expecting you at ".$_SESSION["theatre_name"]." illumine in ".$_SESSION["screen_name"]." on ".$_SESSION["date"]." at ".$_SESSION["timings"].". Enjoy your movie, [".$_SESSION["movie_name"]."]</h2>";
							//header('Location: bookingtimings.php');
					}
				}
			}

		?>

	</form>
	<h3><a href = "illumine.php" style = "color:rgb(255,200,0)" >Go back? Click Here!</a></h3>
		
</body>
</html>