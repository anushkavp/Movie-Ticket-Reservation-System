<!DOCTYPE html>
<html>
	<head>
		<title>
			Register
		</title>
	</head>
	<style type="text/css">
		body {
			text-align: right;
			position: absolute;
			right: 150px;
			background-image: url(images/registerimg.webp);
		}
		.canvas {
			position: absolute;
			top: 40px;
			right: 30px;
			background-color: #ededed;
			padding: 20px;
		}
		
	</style>
	<body>
		<br>
		<div class = "canvas">
		<h1>Create a new account</h1>
		<h4><i>It's free and always will be.</i></h4>
		
				<form action="" method = "post">
			<b><h3>FULL NAME:</h3></b>
	  	<input type="text" name="name" class = "box" placeholder="Please Enter Your Name" size=50>

		  	<b><h3>USERNAME:</h3></b>
	  	<input type="text" name="username" class = "box" placeholder="Please Enter Your Username" size=50>
	  	
	  		<b><h3>PASSWORD:</h3></b>
	  	<input type="password" name="password" class = "box" placeholder="Please Enter Your Password" size = 50>

	  		<!--br><h3>GENDER:</h3></b>
	  	<input type="radio" name="gender" value="male"> Male
  		<input type="radio" name="gender" value="female"> Female<br-->

  		<b><h3>GENDER:</h3></b>
	  	<input type="text" name="gender" class = "box" placeholder="Please Enter Your Gender" size = 50>

	  		<b><h3>EMAIL ADDRESS:</h3></b>
	  	<input type="text" name="email" class = "box" placeholder="Please Enter Your Email ID" size=50><br><br>
	  	<input id = "reset" type="submit" value="Submit">
		</form>
	</div>

<?php
	$conn = mysqli_connect("localhost", "root", "annu98", "illumine");


    if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['email']))
    {
    	$name = $_POST['name'];
        $username = $_POST['username'];
	    $password = $_POST['password'];
	    $gender = $_POST['gender'];
	    $email = $_POST['email'];
 
		if(preg_match('~[0-9]~', $password))
		{
		    //$query = "INSERT INTO customer (cust_id, name, username, password, gender, email) VALUES (NULL,'$name', '$username', '$password', '$gender','$email')";
		    $query = "call insertintocustomer('$name', '$username', '$password', '$gender', '$email')";
        	$query1 = "call insertintologin('".$username."', '".$password."')";
        	$result1 = mysqli_query($conn, $query1);
        	$result = mysqli_query($conn, $query);
        	if($result)
        	{
        	    echo "User Created Successfully.";
        	    header('Location: login.php');
       		}
       		else
       		{
            	echo "<script type='text/javascript'>alert('User Registration Failed.The username or the email id might already exist');</script>";
			}
		}
        else 
        {
        	echo "<script type='text/javascript'>alert('Your password should contain digits as well!');</script>";
			exit();
        }
    }
    	
    

?>
	</body>
</html>