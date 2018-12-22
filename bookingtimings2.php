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
echo "date-";
print_r($_SESSION['date']); 
//echo "Number of seats booked-";
//print_r($_SESSION['no_of_seats']); 
?>
		<FOR TIMINGS-->
		<div class = "formbox"><br>
	<h1>STEP5: When shall we expect you at our theatres??!
		</h1>
		<form method="post">
			
			TIME:
			<?php
			$query2 = ("select distinct timings from movietimings where  movie_id = '".$_SESSION["movie_id"]."' and screen_id = '".$_SESSION["screen_id"]."' and theatre_id = '".$_SESSION["theatre_id"]."' and date = '".$_SESSION["date"]."'"); // Run your query
         	$result2 = mysqli_query($conn, $query2);

         	echo '<select name="timings" class = "dropdownmov">'; // Open your drop down box

         	// Loop through the query results, outputing the options one by one
         	while ($row2 = mysqli_fetch_array($result2)) {
         	   echo '<option value="'.$row2['timings'].'">'.$row2['timings'].'</option>';
         	}
         	echo $_POST["timings"];
         	echo '</select>';// Close your drop down box 
         	?>

			
	        <br><br>         
        	<input type="submit" name="submit4" value="Go!" class = "gobtn"/>
		    <?php
			
            if(isset($_POST['submit4']))
            {
				/*$selected_val4 = $_POST['date'];*/
				$selected_val5 = $_POST['timings'];  // Storing Selected Value In Variable
				$_SESSION["timings"] = $selected_val5;
				header('Location: bookingavailableseats.php');
				//$finq = "INSERT INTO user_bookings (cust_id, movie_id, screen_id,theatre_id,user_seats, dates ,timings) VALUES ('".$_SESSION["customer_id"]."', '".$_SESSION["movie_id"]."','".$_SESSION["screen_id"]."','".$_SESSION["theatre_id"]."','".$_SESSION["no_of_seats"]."','".$selected_val4."','".$selected_val5."')";

				//$result = mysqli_query($conn, $finq);
    		  	// if($result)
        	// 	{

        	// 	    echo "<br><h3>Booking Done Successfully.</h3>";
        	// 	    echo "<h2>Dear ".$_SESSION["customer_name"].", we would be expecting you at ".$_SESSION["theatre_name"]." illumine in ".$_SESSION["screen_name"]." on ".$selected_val4." at ".$selected_val5.". Enjoy your movie, [".$_SESSION["movie_name"]."]</h2>";
        		    
             
         //    	}

				

				
			}
		?>
		<br><br>
		
	</form>
		
</body>
</html>