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
echo "Movie_name-";
print_r($_SESSION['movie_name']);
echo "Theatre_name-";
print_r($_SESSION['theatre_name']); ?-->
<!--FOR SCREEN-->
<div class = "formbox"><br><br><br><br>
	<h1>STEP3: Select the screen suitable for you!
		</h1>
		<form method="post">
		<?php

			$query2 = ("select screen_name from screen where theatre_id = '".$_SESSION['theatre_id'] ."'"	); // Run your query
         	$result2 = mysqli_query($conn, $query2);

         	echo '<select name="Screen_Name" class = "dropdownmov">'; // Open your drop down box

         	// Loop through the query results, outputing the options one by one
         	while ($row2 = mysqli_fetch_array($result2)) {
         	   echo '<option value="'.$row2['screen_name'].'">'.$row2['screen_name'].'</option>';
         	}
         	echo $_POST["Screen_Name"];
         	echo '</select>';// Close your drop down box
            
         ?>
         	
         <br><br>         
        <input type="submit" name="submit2" value="Go!" class = "gobtn"/>
		<?php

            if(isset($_POST['submit2'])){
				$selected_val2 = $_POST['Screen_Name'];  // Storing Selected Value In Variable
				$findscreenid = "select screen_id from screen where screen_name = '".$selected_val2."' and theatre_id = '".$_SESSION["theatre_id"]."'";
				$resultfindscreenid = mysqli_query($conn,$findscreenid);
				$screenid = mysqli_fetch_array($resultfindscreenid);
				if(mysqli_num_rows($resultfindscreenid)==1)
				{
					$screen_id = $screenid["screen_id"];

					//echo "SOS".$screen_id;
					echo "<br>You have selected :" .$selected_val2;  // Displaying Selected Value
					$_SESSION["screen_id"] = $screen_id;
					$_SESSION["screen_name"] = $selected_val2;
					//header('Location: bookingavailableseats.php');
					header('Location: bookingtimings.php');
				}
				//echo "<br>You have selected :" .$selected_val2;  // Displaying Selected Value
			}
		?>
	</form>
</body>
</html>
