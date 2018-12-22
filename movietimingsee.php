<!DOCTYPE html>
<html>
	<head>
		<title>Movie Timings List</title>
	</head>
	<style>
		body {
			background-color: pink;
			background-image: url(images/pink.png);
			font-family: Arial, Helvetica, sans-serif;
		}
		
		table {
    		border-collapse: collapse;
    		#width: 80%;
		}

		th {
		    height: 50px;
		    padding: 15px;
		    border-bottom: 1px solid #ddd;
		}	
		td {
			height: 40px;
			#width: 50%;
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
			top:45px;
			left: 270px;
		}
	</style>
	<body>
		<div class = "tables">
			<table border="0" cellspacing="1" cellpadding="0">
				<tr>
				<td>
				<form name="form1" method="post" action="">
				<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
				<tr>
				<td bgcolor="#FFFFFF">&nbsp;</td>
				<td colspan="8" bgcolor="#FFFFFF"><strong>Delete multiple bookings</strong> </td>
				</tr>
				<tr>
				<td align="center" bgcolor="#FFFFFF">#</td>
				<td align="center" bgcolor="#FFFFFF"><strong>Movie Timings ID</strong></td>
				<!--td align="center" bgcolor="#FFFFFF"><strong>Movie Name</strong></td-->
				<td align="center" bgcolor="#FFFFFF"><strong>Movie Name</strong></td>
				<td align="center" bgcolor="#FFFFFF"><strong>Theatre Name</strong></td>
				<td align="center" bgcolor="#FFFFFF"><strong>Screen Name</strong></td>
				
				<td align="center" bgcolor="#FFFFFF"><strong>Date</strong></td>
				<td align="center" bgcolor="#FFFFFF"><strong>Timing</strong></td>
				<td align="center" bgcolor="#FFFFFF"><strong>No of seats</strong></td>
				</tr>

				<?php
					$conn = mysqli_connect("localhost","root","annu98","illumine");
					$query = "select * from movietimings";
					$result = mysqli_query($conn,$query);
					$count=mysqli_num_rows($result);
				?>
				<?php
					while ($row=mysqli_fetch_array($result)) {
				?>
				<tr>
				<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="<?php echo $row['movietimings_id']; ?>"></td>
				<td bgcolor="#FFFFFF"><?php echo $row['movietimings_id']; ?></td>
				<td bgcolor="#FFFFFF"><?php
				$resultmoviename = mysqli_query($conn, "select movie_name from currentmovies where movie_id = '".$row['movie_id']."'");
				$movid = mysqli_fetch_array($resultmoviename);
			    if(mysqli_num_rows($resultmoviename)==1)
				{
					$movie_name = $movid["movie_name"];
				}
				echo $movie_name; ?></td>

				<td bgcolor="#FFFFFF"><?php 
				$resulttheatrename = mysqli_query($conn, "select theatre_name from theatre where theatre_id = '".$row['theatre_id']."'");
				$theatreid = mysqli_fetch_array($resulttheatrename);
					    if(mysqli_num_rows($resulttheatrename)==1)
						{
							//echo "hey";
							$theatre_name = $theatreid["theatre_name"];
						}
				echo $theatre_name; ?></td>

				<td bgcolor="#FFFFFF"><?php 
				$resultscreenname = mysqli_query($conn, "select screen_name from screen where screen_id = '".$row['screen_id']."'");
				$screenid = mysqli_fetch_array($resultscreenname);
					    if(mysqli_num_rows($resultscreenname)==1)
						{
							//echo "hey";
							$screen_name = $screenid["screen_name"];
						}
				echo $screen_name; ?></td>
				
				<td bgcolor="#FFFFFF"><?php echo $row['date']; ?></td>
				<td bgcolor="#FFFFFF"><?php echo $row['timings']; ?></td>
				<td bgcolor="#FFFFFF"><?php echo $row['available_seats']; ?></td>
				</tr>

				<?php
				}
				?>
				<tr>
				<td colspan="9" align="center" bgcolor="#FFFFFF"><br><input id = "reset" name="delete" type="submit" value="Delete"></td>
				</tr>





				<?php
					if(isset($_POST['delete']))
					{
					    $checkbox = $_POST['checkbox'];
						for($i=0;$i<count($checkbox);$i++)
						{
							$del_id = $checkbox[$i];
							$sql = "DELETE FROM movietimings WHERE movietimings_id='$del_id'";
							$result = mysqli_query($conn,$sql);
						}
						if($result)
						{
							echo "<meta http-equiv=\"refresh\" content=\"0;URL=movietimingsee.php\">";
						}
					}
				?>
				
			 	</table>
				</form>
				</td>
				</tr>
				<center><a href = "admin.php" style = "color:white">Go Back? Click here!</a></center>
			</table>
		</div>
	</body>
</html>