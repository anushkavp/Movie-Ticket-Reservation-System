<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Password Reset
		</title>
	</head>
	<style>
		.goback {
			position: fixed;
			top: 48px;
			left: 710px;
			font-size: 23px;
		}
		body {
			font-family: Arial, Helvetica, sans-serif;
    		margin: 0;
    		color:#E95D0F;
    		background-image: url(images/booking1.jpg);
		}
		.forgetpasswordblock {
			background-color: white;
			border: 10px solid #C71585;
			width: 700px;
			position: absolute;
			top: 100px;
			left: 300px;
			height: 400px;
			background-color: rgb(255,192,203);
			border-radius: 50px;
			padding: 20px;
		}
		.submitbtn {
			height: 50px;
			margin-top: 6px;
			margin-right: 1px; 
			padding: 0px 20px 0px 20px;
			font-size: 20px;
			color: #E95D0F;
			background: white ;
			border: 10px solid #E95D0F;
			text-decoration: none;
		} 
		.submitbtn:hover {
			color: white;
			background-color: #E95D0F;
		}
		.box {
            border:#ededed solid 5px;
            height: 23px;

        }
	</style>
	<body>
		<div class = "forgetpasswordblock">
			<br><br>
			<h1>Please enter your email address!</h1>
			<form action="" method = "post">
			  	<b><h3>email id:</h3></b>
	  			<input type="text" name="email" class = "box" placeholder="Please Enter Your email_id" size=50><br><br>
	  			<input id = "reset" type="submit" value="Submit" class = "submitbtn">
	    	</form>
		


			<?php
	    		$conn = mysqli_connect("localhost", "root", "annu98", "illumine");

				if(isset($_POST['email']))
				{
    		
	    			$email=$_POST['email'];
	    			
	    			$sql="select * from customer where email='".$email."' limit 1";
	    			//$cust_id = "select * from customer where username = '".$uname."'";
	    			$result=mysqli_query($conn, $sql);
	    			//$result1 = mysqli_query($conn,$cust_id);
	    			
				    if(mysqli_num_rows($result)==1)
				    {
				    	$id = mysqli_fetch_array($result);
				    	$_SESSION["email"] = $email;
				    	$_SESSION["username"] = $id["username"]; 
				    	$_SESSION["password"] = $id["password"]; 
				    	echo "<h4>Hello ".$_SESSION["username"].", Welcome back!</h4>";
				    	echo "<h4>This is the password that you had used when you were registering: ".$_SESSION["password"]."</h4>";
				    }
				    else
				    { 
				    	$message = "Oops! Seems like this email doesn't exist in our database!";
						echo "<script type='text/javascript'>alert('$message');</script>";
				        exit();
				    }
        
				}
			?>
		</div>
		<h3 class = "goback"><a href = "login.php" style = "color:rgb(255,200,0)" >Go back? Click Here!</a></h3>
	</body>
</html>