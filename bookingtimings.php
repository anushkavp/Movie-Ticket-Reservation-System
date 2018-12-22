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
echo "Number of seats booked-";
print_r($_SESSION['no_of_seats']); 
?-->
		<!--FOR TIMINGS-->
		<div class = "formbox"><br><br><br>
	<h1>STEP4: What date shall we expect you at our theatres??!
		</h1>
		<form method="post">
			DATE:
			<?php
			$query1 = ("select distinct date from movietimings"); // Run your query
         	$result1 = mysqli_query($conn, $query1);

         	echo '<select name="date" class = "dropdownmov">'; // Open your drop down box

         	// Loop through the query results, outputing the options one by one
         	while ($row1 = mysqli_fetch_array($result1)) {
         	   echo '<option value="'.$row1['date'].'">'.$row1['date'].'</option>';
         	}
         	echo $_POST["date"];
         	echo '</select>';// Close your drop down box ?>
			<!--select name = "date" class = "dropdownmov">
				<option value = "2018-11-09">2018:11:09</option>
				<option value = "2">2</option>
				<option value = "3">3</option>
				<option value = "4">4</option>
				<option value = "5">5</opiton-->
			</select--><br><br>
			<input type="submit" name="submitdate" value="Go!" class = "gobtn"/>
			
			<?php
			if(isset($_POST['submitdate']))
            {
				$selected_val4 = $_POST['date'];
				$_SESSION["date"] = $selected_val4;
					//header('Location: bookingavailableseats.php');
				header('Location: bookingtimings2.php');
				
				//echo "<br>You have selected :" .$selected_val2;  // Displaying Selected Value
			}
		?>
	</form>
</body>
</html>

			