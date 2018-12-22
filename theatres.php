<html>
<head>

<title>Theatre Page</title>

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
		height: 300px;
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
				#margin-top: 6px;
				#margin-right: 1px; 
				#padding: 0px 10px 0px 10px;
				font-size: 20px;
				color: grey;
			    #background: white ;
			    #border: 3px solid grey;
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

<h1>Manage your theatres here!!</h1>
<div class = "inserting">
<h2>To add theatres into the database, fill this form!</h2>
<form action="" method = "post">
			<b><h3>THEATRE NAME:</h3></b>
	  	<input type="text" name="theatre_name" class = "box" placeholder="Please Enter theatre Name" size=50>

		  	<b><h3>THEATRE ADDRESS:</h3></b>
	  	<input type="text" name="theatre_address" class = "box" placeholder="Please Enter theatre address" size=50>
	  	
	  	<br><br><input id = "reset" type="submit" value="Submit">
		</form>
	
	<?php
	if (isset($_POST['theatre_name']) && isset($_POST['theatre_address']))
    {
    	$theatre_name = $_POST['theatre_name'];
        $theatre_address = $_POST['theatre_address'];
	    //$movposters = $_POST['movposters'];
	    
		   $query = "INSERT INTO theatre (theatre_id, theatre_name, theatre_address) VALUES (NULL,'$theatre_name', '$theatre_address')";
        	
        	$result = mysqli_query($conn, $query);
        	if($result)
        	{
        	    echo "theatre inserted Successfully.";
        	    //header('Location: theatres.php');
       		}}
       		?>
       	</div>



<div class = "deleting">
<h2>Choose and delete selected Theatres.</h2>
<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form name="form1" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="3" bgcolor="#FFFFFF"><strong>Delete multiple Theatres</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>Theatre ID</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Theatre Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Theatre Address</strong></td>
</tr>

<?php
$query = "select * from theatre ORDER BY theatre_id";

$result = mysqli_query($conn,$query)
or die('Error querying database');

$count=mysqli_num_rows($result);

while ($row=mysqli_fetch_array($result)) {
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="<?php echo $row['theatre_id']; ?>"></td>
<td bgcolor="#FFFFFF"><?php echo $row['theatre_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['theatre_name']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['theatre_address']; ?></td>
</tr>

<?php
}
?>

<tr>
<td colspan="4" align="center" bgcolor="#FFFFFF"><br><input id = "reset" name="delete" type="submit" value="Delete"></td>
</tr>





<?php

// Check if delete button active, start this 

if(isset($_POST['delete']))
{
    $checkbox = $_POST['checkbox'];

for($i=0;$i<count($checkbox);$i++){

$del_id = $checkbox[$i];
$sql = "DELETE FROM theatre WHERE theatre_id='$del_id'";
$result = mysqli_query($conn,$sql);
}
// if successful redirect to delete_multiple.php 
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=theatres.php\">";
}
 }


?>

</table>
</form>
</td>
</tr>
</table>
</div>

<a href = "admin.php" style = "position: absolute;top: 600px; left: 550px; color:red">Go Back? Click here!</a>
</body>

</html>