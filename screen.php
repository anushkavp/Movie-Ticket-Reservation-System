<html>
<head>

<title>Screen Page</title>

</head>
<style>
	body {
		background-image: url(images/reel.jpg);

	}
	.deleting{
		float: left;
		position: fixed;
		top: 170px;
		left:100px;
		background-color: green;
		#height: 200px;
		border-radius: 30px;
		padding: 10px;
		margin: 10px;
		width: 450px;
	}
	.inserting {
		float: right;
		position: fixed;
		top: 170px;
		right:90px;
		background-color: pink;
		border-radius: 30px;
		padding: 10px;	
		margin:10px;
		width: 550px;
		height: 390px;
	}
	h1 {
		position: absolute;
		top:20px;
		left: 190px;
		height: 90px;
		padding: 0px 10px 0px 10px;
		color: red;
	}
	th, td {
		#width:20px;
		height: 40px;
		#border-radius: 10px;
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
</style>

<body>
<br>

<?php

$conn = mysqli_connect("localhost", "root", "annu98", "illumine")
or die('Error connecting to MySQL server');

?>

<h1>Manage your theatre screens here!!</h1>
<div class = "inserting">
<h2>To add theatre screens into the database, fill this form!</h2>
<form action="" method = "post">
			<b><h3>SCREEN NAME:</h3></b>
	  	<input type="text" name="screen_name" class = "box" placeholder="Please Enter Screen Name" size=50>

		  	<b><h3>TOTAL NUMBER OF SEATS IN THIS SCREEN</h3></b>
	  	<input type="text" name="no_of_seats" class = "box" placeholder="Please Enter the number of seats in this screen" size=50>

	  	<b><h3>NAME OF THE THEATRE IT BELONGS TO</h3></b>
	  	<input type="text" name="theatre_name" class = "box" placeholder="Please Enter the name of the theatre it belongs to" size=50>
	  	
	  		<br><br><input id = "reset" type="submit" value="Submit">
		</form>
	
	<?php
	if (isset($_POST['screen_name']) && isset($_POST['no_of_seats']) && isset($_POST['theatre_name']))
    {
    	$screen_name = $_POST['screen_name'];
        $no_of_seats = $_POST['no_of_seats'];
	    $theatre_name = $_POST['theatre_name'];

	    $resulttheatrename = mysqli_query($conn, "select theatre_id from theatre where theatre_name = '".$theatre_name."'");
	    $theatreid = mysqli_fetch_array($resulttheatrename);
	    if(mysqli_num_rows($resulttheatrename)==1)
		{
			//echo "hey";
			$theatre_id = $theatreid["theatre_id"];
	    
		   $query = "INSERT INTO screen (screen_id, theatre_id, screen_name, no_of_seats) VALUES (NULL,'$theatre_id', '$screen_name', '$no_of_seats')";
        	
        	$result = mysqli_query($conn, $query);
        	if($result)
        	{
        	    echo "screen inserted Successfully.";
        	    //header('Location: theatres.php');
       		}
       	}
    }
       		?>
       	</div>



<div class = "deleting">
<h2>Choose and delete selected Screens.</h2>
<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form name="form1" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="5" bgcolor="#FFFFFF"><strong>Delete multiple Screens</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>Screen ID</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Theatre Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Screen Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>no_of_seats</strong></td>
</tr>

<?php
$query = "select * from screen ORDER BY screen_id";

$result = mysqli_query($conn,$query)
or die('Error querying database');

$count=mysqli_num_rows($result);

while ($row=mysqli_fetch_array($result)) {
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="<?php echo $row['screen_id']; ?>"></td>
<td bgcolor="#FFFFFF"><?php echo $row['screen_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['theatre_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['screen_name']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['no_of_seats']; ?></td>
</tr>

<?php
}
?>

<tr>
<td colspan="5" align="center" bgcolor="#FFFFFF"><br><input id = "reset" name="delete" type="submit" value="Delete"></td>
</tr>





<?php

// Check if delete button active, start this 

if(isset($_POST['delete']))
{
    $checkbox = $_POST['checkbox'];

for($i=0;$i<count($checkbox);$i++){

$del_id = $checkbox[$i];
$sql = "DELETE FROM screen WHERE screen_id='$del_id'";
$result = mysqli_query($conn,$sql);
}
// if successful redirect to delete_multiple.php 
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=screen.php\">";
}
 }


?>

</table>
</form>
</td>
</tr>
</table>
</div>

<a href = "admin.php" style = "position: absolute;top: 150px; left: 200px; color:red; font-size: 18px;">Go Back? Click here!</a>


</html>