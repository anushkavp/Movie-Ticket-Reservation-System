<!--FOR THEATRE-->
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
echo "cust_id-";
print_r($_SESSION['customer_id']); 
echo "<br>Movie_id-";
print_r($_SESSION['movie_id']);
echo "<br>Movie_name-";
print_r($_SESSION['movie_name']); ?-->

<div class = "formbox"><br><br><br><br>
	<h1>STEP2: Select the theatre near you!
		</h1>
		<form method="post">
		<?php
			$query1 = ("select theatre_name from theatre"); // Run your query
         	$result1 = mysqli_query($conn, $query1);

         	echo '<select name="Theatre_Name" class = "dropdownmov">'; // Open your drop down box

         	// Loop through the query results, outputing the options one by one
         	while ($row1 = mysqli_fetch_array($result1)) {
         	   echo '<option value="'.$row1['theatre_name'].'">'.$row1['theatre_name'].'</option>';
         	}
         	echo $_POST["Theatre_Name"];
         	echo '</select>';// Close your drop down box
            
         ?>
         	
         <br><br>         
        <input type="submit" name="submit1" value="Go!" class = "gobtn"/>
		<?php

            if(isset($_POST['submit1'])){
				$selected_val1 = $_POST['Theatre_Name'];  // Storing Selected Value In Variable
				$findtheatreid = "select theatre_id from theatre where theatre_name = '".$selected_val1."'";
				$resultfindtheatreid = mysqli_query($conn,$findtheatreid);
				$theatreid = mysqli_fetch_array($resultfindtheatreid);
				if(mysqli_num_rows($resultfindtheatreid)==1)
				{
					$theatre_id = $theatreid["theatre_id"];
					//echo "SOS".$theatre_id;
					echo "<br>You have selected :" .$selected_val1;  // Displaying Selected Value
					$_SESSION["theatre_id"] = $theatre_id;
					$_SESSION["theatre_name"] = $selected_val1;
					header('Location: bookingscreen.php');
				}
				//echo "<br>You have selected :" .$selected_val1;  // Displaying Selected Value
			}
		?>
	</form>
</div>

	</body>
	</html>
