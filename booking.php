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
		
			<div class = "formbox"><br><br><br>
			<h1>Hello, <?php print_r($_SESSION['customer_name']); ?><br></h1>
			
			<h2>To book your seats, please follow the steps given below systematically! Press "Go!" once you're done with each step.</h2>
			<h3>			STEP1: Select movie
		</h3>
		
		<form method="post">
		<?php
			$query = ("select movie_name from currentmovies"); // Run your query
         	$result = mysqli_query($conn, $query);

         	echo '<select name="Movie_Name" class = "dropdownmov">'; // Open your drop down box

         	// Loop through the query results, outputing the options one by one
         	while ($row = mysqli_fetch_array($result)) {
         	   echo '<option value="'.$row['movie_name'].'">'.$row['movie_name'].'</option>';
         	}
         	echo $_POST["Movie_Name"];
         	echo '</select>';// Close your drop down box
            
         ?>
         	
         <br><br>         
        <input type="submit" name="submit" value="Go!" class = "gobtn" />
		<?php

            if(isset($_POST['submit'])){
				$selected_val = $_POST['Movie_Name'];  // Storing Selected Value In Variable
				$findmovid = "select movie_id from currentmovies where movie_name = '".$selected_val."'";
				$resultfindid = mysqli_query($conn,$findmovid);
				$movid = mysqli_fetch_array($resultfindid);
				if(mysqli_num_rows($resultfindid)==1)
				{
					$movie_id = $movid["movie_id"];
					//echo "SOS".$movie_id;
				
				echo "<br>You have selected :" .$selected_val;  // Displaying Selected Value
				$_SESSION["movie_id"] = $movie_id;
				$_SESSION["movie_name"] = $selected_val;
			header('Location: bookingtheatre.php');
		}
			}

		?>
	</form>
</div>
</body>
</html>
