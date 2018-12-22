<!DOCTYPE html>
<html>
	<head>
		<title>Customer Info</title>
	</head>
	<style>
		body {
			background-color: pink;
			background-image: url(images/pink.png);
			font-family: Arial, Helvetica, sans-serif;
		}

		a {
			position: absolute;
			left: 995px;
			top: 56px;
			color: white;
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
		.tables {
			position: relative;
			top:50px;
			left: 400px;
		}
	</style>
	<body>
		<a href = "admin.php">Go Back? Click here!</a>
		<br>
		<div class = "tables">
			<table>
				<tr>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Gender</th>
				</tr>

				<?php
					$conn = mysqli_connect("localhost","root", "annu98", "illumine");
					$sql = "select * from customer";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($result)) 
					{
					    echo "<tr>";
					    echo "<td>" . $row['name'] ."</td>";
					    echo "<td>" . $row['username'] . "</td>";
					    echo "<td>" . $row['email'] . "</td>";
					    echo "<td>" . $row['gender'] . "</td>";
					    echo "</tr>";
					}
				?>				
			</table>
		</div>
	</body>
</html>