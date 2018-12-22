<!DOCTYPE html>
<html>
	<head>
		<title>Movies Page</title>
	</head>
	<style>
	
		body {
			background-image: url(images/pink.png);
		}
		h1 {
			position: absolute;
			top:30px;
			right: 190px;
			height: 90px;
			padding: 0px 10px 0px 10px;
			color: white;
		}
		h2 {
			position: absolute;
			top: 90px;
			right: 100px;
			height: 90px;
			padding: 0px 10px 0px 10px;
			color: white;
		}
		}
		th {
		    height: 50px;
		    padding: 25px;
		    border-bottom: 1px solid #ddd;
		}	
		td {
			height: 30px;
			padding: 20px;
			border-bottom: 1px solid #ddd;
			width: 800px;
		}
		th {
			background-color: #E95D0F;
    		color: white;
    		#padding: 20px;
		}
		#reset {
		height: 30px;
		font-size: 20px;
		color: grey;
		text-decoration: none;
		}
		#reset:hover {
		    color: white;
		    background-color: grey;
		}
		form {
			position: absolute;
			right: 40px;
			top: 30px;
			width: 90%;
		}
		table {
			width: 100%;
			position: absolute;
			right: 20px;
			top: 90px;
		}
	</style>
	<body>
		<h1><br>ALL USER BOOKINGS</h1>
		<?php

$conn = mysqli_connect("localhost", "root", "annu98", "illumine")
or die('Error connecting to MySQL server');
?>
	<div class = "deleting">
<h2></h2>
<?php
$query = "select * from user_bookings ORDER BY booking_id";

$result = mysqli_query($conn,$query)
or die('Error querying database');

$count=mysqli_num_rows($result);
?>
<br><br><br><br><br><br>
<table border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form name="form1" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<!--tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="8" bgcolor="#FFFFFF"><strong>Delete multiple bookings</strong> </td>
</tr-->
<tr>
<!--td align="center" bgcolor="#FFFFFF">#</td-->
<td align="center" bgcolor="#FFFFFF"><strong>Booking ID</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Customer Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Movie Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Theatre Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Screen Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>No of seats</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Date</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Timing</strong></td>
</tr>

<?php

while ($row=mysqli_fetch_array($result)) {
?>

<tr>
<!--td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="<?php echo $row['booking_id']; ?>"></td-->
<td bgcolor="#FFFFFF"><?php echo $row['booking_id']; ?></td>
<td bgcolor="#FFFFFF"><?php
$resultcustname = mysqli_query($conn, "select name from customer where cust_id = '".$row['cust_id']."'");
$custid = mysqli_fetch_array($resultcustname);
	    if(mysqli_num_rows($resultcustname)==1)
		{
			//echo "hey";
			$cust_name = $custid["name"];
		}
echo $cust_name;
 ?></td>
<td bgcolor="#FFFFFF"><?php 
$resultmoviename = mysqli_query($conn, "select movie_name from currentmovies where movie_id = '".$row['movie_id']."'");
$movid = mysqli_fetch_array($resultmoviename);
	    if(mysqli_num_rows($resultmoviename)==1)
		{
			//echo "hey";
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
<td bgcolor="#FFFFFF"><?php echo $row['user_seats']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['dates']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['timings']; ?></td>
</tr>

<?php
}

?>

<tr>
<!--td colspan="9" align="center" bgcolor="#FFFFFF"><br><input id = "reset" name="delete" type="submit" value="Delete"></td-->
<td colspan="9" align="center" bgcolor="#FFFFFF"><br></td>
</tr>







<!--?php

// Check if delete button active, start this 

	if(isset($_POST['delete']))
	{
	    $checkbox = $_POST['checkbox'];
	    //$array = [];
	    //echo "<script type='text/javascript'>alignert($checkbox);</script>";
		for($i=0;$i<count($checkbox);$i++)
		{

			$del_id = $checkbox[$i];
			$sql = "DELETE FROM user_bookings WHERE booking_id='$del_id'";
			//echo "<script type='text/javascript'>alignert($del_id);</script>";
			$result = mysqli_query($conn,$sql);
			//echo "<script type='text/javascript'>alert($del_id);</script>";
			//$query1 = "update movietimings m,user_bookings u set available_seats = available_seats+(select user_seats from user_bookings where booking_id = '144') where m.movie_id = u.movie_id and m.screen_id = u.screen_id and m.theatre_id = u.theatre_id and m.date = u.dates and m.timings = u.timings and booking_id = '144'";
			//deleteuserbookings($del_id);
			//$query1 = "call deleteuserbookings1('".$del_id."')";
			//$result1 = mysqli_query($GLOBALS['conn'], $query1);
			//$array[] = "'".$del_id."'";
		}
		// if successful redirect to delete_multiple.php 
		// for($j=0;$j<count($array);$j++)
		// {
		// 	$book_id = $array[$j];
		// 	$query1 = "update movietimings m,user_bookings u set available_seats = available_seats+(select user_seats from user_bookings where booking_id = '$book_id') where m.movie_id = u.movie_id and m.screen_id = u.screen_id and m.theatre_id = u.theatre_id and m.date = u.dates and m.timings = u.timings and booking_id = 'book_id'";
		// 		$result1 = mysqli_query($conn, $query1);
		// }
	 	
		if($result)
		{
	 		echo "<meta http-equiv=\"refresh\" content=\"0;URL=userbookings.php\">";
	 	}
	 	
	 }


?-->

</table>
<a href = "admin.php" style = "color:white;">Go Back? Click here!</a>
</form>
</td>
</tr>
</table>

</div>
<br><br>
	</body>
</html>