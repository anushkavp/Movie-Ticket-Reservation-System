<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			LOGIN
		</title>
		<style>
			body {
				font-family: Arial, Helvetica, sans-serif;
    			margin: 0;
    			background-image: url("images/moviereel.v2.jpg");
			}
			header {
				background-color: black;
				color: rgb(255,215,0);
				width: 99%;
				display: inline;
				position: fixed;
				margin: 0 auto;
				text-align: center;								
			}
			.login {
				height: 200px;
				#top: 300px;
				position: absolute;
				left: 380px;
			}
			form {
				top: 100px;
				text-align: center;

			}
			#reset,button {
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

			#reset:hover {
			    color: white;
			    background-color: #E95D0F;
			}

			button:hover {
			    color: white;
			    background-color: #E95D0F;
			}

			.register {
				text-align: center;
				color: rgb(255,150,0);

			}
			 .box {
            border:#ededed solid 5px;
            height: 23px;

         }
         .color {
         	color: rgb(255,150,0);
         }
		</style>

	</head>
	
	<body>
		<header>
			<h3>Please note that you'll have to login before booking your movie tickets!!</h3>
		</header>
		<div class = "login">
			<br><br><br><br><br><br>
		<form action="" method = "post">
		  	<b><h3><div class = "color">USERNAME:</div></h3></b>
	  	<input type="text" name="username" class = "box" placeholder="Please Enter Your Username" size=50><br>
	  	
	  		<b><h3><div class = "color">PASSWORD:</div></h3></b>
	  	<input type="password" name="password" class = "box" placeholder="Please Enter Your Password" size = 50><br><br>
	  	<input id = "reset" type="submit" value="Submit">
		</form><br><br><br>
		<div class = "register">
			<h3>Not a member? Register now!!</h3>
			<button><a href = "register.php" style = "text-decoration: none; color: grey;">Register</button>
			<h3 style = "color: rgb(255,150,0);">Forgot Password?</h3>
			<button><a href = "forgotpassword.php" style = "text-decoration: none; color: grey;">Click here!</button>
		</div>
	</div>
	<?php

$conn = mysqli_connect("localhost", "root", "annu98", "illumine");

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    if($uname == "root" && $password == "annu98")
   		{
   			header('Location: admin.php');	
   		}

    $sql="select * from login where username='".$uname."'AND password='".$password."' limit 1";
    $cust_id = "select * from customer where username = '".$uname."'";
    $result=mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn,$cust_id);
    $id = mysqli_fetch_array($result1);
    if(mysqli_num_rows($result)==1 && mysqli_num_rows($result1)==1){
    	$_SESSION["usersname"] = $uname; 
   		$_SESSION["customer_id"] = $id["cust_id"];
   		$_SESSION["customer_name"] = $id["name"];
   		header('Location: illumine.php');
    }
    else{ 
    	$message = "Oops! Invalid password!";
		echo "<script type='text/javascript'>alert('$message');</script>";
        exit();
    }
        
}
?>
	</body>
	
</html>