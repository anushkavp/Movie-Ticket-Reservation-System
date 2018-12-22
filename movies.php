<html>
<head>

<title>Movies Page</title>

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
<h1>Manage your movies here!!</h1>

<?php

$conn = mysqli_connect("localhost", "root", "annu98", "illumine")
or die('Error connecting to MySQL server');
?>


<div class = "inserting">
<h2>To add movies into the database, fill this form!</h2>
<form action="" method = "post">
			<b><h3>MOVIE NAME:</h3></b>
	  	<input type="text" name="movie_name" class = "box" placeholder="Please Enter movie Name" size=50>

		  	<b><h3>LANGUAGE:</h3></b>
	  	<input type="text" name="language" class = "box" placeholder="Please Enter movie language" size=50>
	  	
	  		<br><br><input id = "reset" type="submit" value="Submit">
		</form>
	
	<?php
	if (isset($_POST['movie_name']) && isset($_POST['language']))
    {
    	$movie_name = $_POST['movie_name'];
        $language = $_POST['language'];
	    //$movposters = $_POST['movposters'];
	    
		   $query = "INSERT INTO currentmovies (movie_id, movie_name, language) VALUES (NULL,'$movie_name', '$language')";
        	
        	$result = mysqli_query($conn, $query);
        	if($result)
        	{
        	    echo "movie inserted Successfully.";
        	    //header('Location: login.php');
       		}}
       		?>
       	</div>






       	<div class = "deleting">
<h2>Choose and delete selected Movies.</h2>
<?php
$query = "select * from currentmovies ORDER BY movie_id";

$result = mysqli_query($conn,$query)
or die('Error querying database');

$count=mysqli_num_rows($result);
?>

<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form name="form1" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="3" bgcolor="#FFFFFF"><strong>Delete multiple links</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>Movie ID</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Movie Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Language</strong></td>
</tr>

<?php

while ($row=mysqli_fetch_array($result)) {
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="<?php echo $row['movie_id']; ?>"></td>
<td bgcolor="#FFFFFF"><?php echo $row['movie_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['movie_name']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['language']; ?></td>
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
$sql = "DELETE FROM currentmovies WHERE movie_id='$del_id'";
$result = mysqli_query($conn,$sql);
}
// if successful redirect to delete_multiple.php 
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=movies.php\">";
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