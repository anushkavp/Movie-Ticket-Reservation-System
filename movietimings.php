<html>
	<head>

		<title>Movies Timings Page</title>

	</head>
	<style>
		body {
			background-image: url(images/divider.jpg);
			#color: white;
			
			color: #E95D0F;
			font-size: 20px;
			font-family: Arial, Helvetica, sans-serif;
		}
		h1 {
			position: absolute;
			top: 100px;
			right:40px;
			width: 20%;
			color:red;
		}
		
		form {
			#position: absolute;
			#float: right;
			background-color: white;
			border: 1px solid black;
			padding: 30px;
			border-radius: 20px;
			position: absolute;
			top: 80px;
			left:90px;
		}
		.dropdownmov {
			color: #E95D0F;
			#rgb(255,53,10);
			background: white ;
			border: 4px solid #E95D0F;
			#E00000;
			font-weight: bold;
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


			table {
    		border-collapse: collapse;
    		width: 70%;
		}

		th {
		    height: 50px;
		    padding: 15px;
		    border-bottom: 1px solid #ddd;
		}	
		td {
			height: 30px;
			padding: 10px;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color:#f5f5f5;
		}
		th {
			background-color: #E95D0F;
    		color: white;
		}
	</style>
	<body>
		<h1 class = "headings">MANAGE MOVIETIMINGS HERE!!</h1>
		
		<form method="post">
			<h2><b>Fill the form to add a new entry</h2></b>
		<?php
			$conn = mysqli_connect("localhost", "root", "annu98", "illumine");
			$query1 = ("select movie_name from currentmovies"); // Run your query
         	$result1 = mysqli_query($conn, $query1);

         	echo "STEP1: Select your desired movie<br><br>";
         	echo '<select name="Movie_name" class = "dropdownmov">'; // Open your drop down box

         	// Loop through the query results, outputing the options one by one
         	while ($row1 = mysqli_fetch_array($result1)) {
         	   echo '<option value="'.$row1['movie_name'].'">'.$row1['movie_name'].'</option>';
         	}
         	echo $_POST["Movie_name"];
         	echo '</select>';// Close your drop down box
         	echo "<br><br><br>";
            



         	$query2 = ("select theatre_name from theatre"); // Run your query
         	$result2 = mysqli_query($conn, $query2);

         	echo "STEP2: Select your nearest movie theatre<br><br>";
         	echo '<select name="Theatre_name" class = "dropdownmov">'; // Open your drop down box

         	// Loop through the query results, outputing the options one by one
         	while ($row2 = mysqli_fetch_array($result2)) {
         	   echo '<option value="'.$row2['theatre_name'].'">'.$row2['theatre_name'].'</option>';
         	}
         	echo $_POST["Theatre_name"];
         	echo '</select>';// Close your drop down box
         	echo "<br><br><br>";




         	$query3 = ("select screen_name from screen"); // Run your query
         	$result3 = mysqli_query($conn, $query3);

         	echo "STEP3: Select your nearest favourite screen<br><br>";
         	echo '<select name="Screen_name" class = "dropdownmov">'; // Open your drop down box

         	// Loop through the query results, outputing the options one by one
         	while ($row3 = mysqli_fetch_array($result3)) {
         	   echo '<option value="'.$row3['screen_name'].'">'.$row3['screen_name'].'</option>';
         	}
         	echo $_POST["Screen_name"];
         	echo '</select>';// Close your drop down box
         	echo "<br><br><br>";




         	echo "STEP4: Enter the date it needs to be aired<br><br>";
         	echo "<input type = 'date' class = 'dropdownmov' name='dates'>";
         	echo "<br><br><br>";





         	echo "STEP5: Enter the time that the movie needs to be aired<br><br>";
         	echo "<input type = 'time' class = 'dropdownmov' name = 'timings'>";
         	echo "<br><br><br>";



         	echo "STEP6: Enter the no of available seats<br><br>";
         	echo "<input type = 'text' class = 'dropdownmov' name = 'no_of_seats'>";
         	echo "<br><br>";
         ?>
         <input type="submit" name="submit1" value="Go!" class = "gobtn"/>
			<?php

	            if(isset($_POST['submit1']))
	            {
					$dates = $_POST['dates'];
					$timings = $_POST['timings'];
					$no_of_seats = $_POST['no_of_seats'] ;
					
					$findmovieid = "select movie_id from currentmovies where movie_name = '".$_POST["Movie_name"]."'";
					$resultfindmovieid = mysqli_query($conn,$findmovieid);
					$movieid = mysqli_fetch_array($resultfindmovieid);
					if(mysqli_num_rows($resultfindmovieid)==1)
					{
						$movie_id = $movieid["movie_id"];
						$_SESSION["movie_id"] = $movie_id;
					}



					$findtheatreid = "select theatre_id from theatre where theatre_name = '".$_POST["Theatre_name"]."'";
					$resultfindtheatreid = mysqli_query($conn,$findtheatreid);
					$theatreid = mysqli_fetch_array($resultfindtheatreid);
					if(mysqli_num_rows($resultfindtheatreid)==1)
					{
						$theatre_id = $theatreid["theatre_id"];
						$_SESSION["theatre_id"] = $theatre_id;
					}



					$findscreenid = "select screen_id from screen where screen_name = '".$_POST["Screen_name"]."'";
					$resultfindscreenid = mysqli_query($conn,$findscreenid);
					$screenid = mysqli_fetch_array($resultfindscreenid);
					if(mysqli_num_rows($resultfindscreenid)==1)
					{
						$screen_id = $screenid["screen_id"];
						$_SESSION["screen_id"] = $screen_id;
					}

					


					
					$finalsql = "INSERT INTO movietimings (movie_id, screen_id,theatre_id, date,timings, available_seats) VALUES ('".$_SESSION["movie_id"]."','".$_SESSION["screen_id"]."','".$_SESSION["theatre_id"]."','".$dates."','".$timings."','".$no_of_seats."')";
					

					$resultfinal = mysqli_query($conn,$finalsql);
					if($resultfinal)
		        	{
		        	    echo "row inserted Successfully";


		        	}






			//echo date("Y-m-d")."<br>";
			//$conn = mysqli_connect("localhost", "root", "annu98", "illumine");
			date_default_timezone_set("Asia/Kolkata");
			//echo date("H:i:s.0000000"); 

			$sql = "delete from movietimings where date < '".date("Y-m-d")."'";
			mysqli_query($conn,$sql);
			$sql1 = "delete from movietimings where date = '".date("Y-m-d")."' and timings < '".date('H:i:s.0000000')."'";
			mysqli_query($conn, $sql1);
				}
			?>
			<br><br><a href = "admin.php" style = "color:#E95D0F;">Go Back? Click here!</a>
     	</form>
	</body>
</html>