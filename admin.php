<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
	</head>
	<style>
		body {
			background-image: url(images/deadpool.jpg);
			font-family: Arial, Helvetica, sans-serif;
			color: pink;
		}
		.navbar {
		 	background-color: #333; 
		    width: 30%;
		    margin: 50px;
		    height: 645px;
		}

		.navbar a {
			top: 20px;
			#position: absolute;
		    float: left;
		    font-size: 20px;
		    color: white;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		    #margin: 0;
		}
		a:hover{
		    background-color: blue;
		    width: 50%;
		    text-align: center;
		    #margin: 0;
		    #left: 0;
		}
		
	</style>
	<body>
		<h1><br>
			<center><b><i>Welcome back, Admin!<br></center></b></i>
			<div class="navbar">
		  		<a href="admin.php">Home Page</a><br><br>
		  		<a href="movies.php">Movies</a><br><br>
		  		<a href ="theatres.php">Theatres</a><br><br>
		    	<a href="screen.php">Screens</a> <br><br>
		  		<a href ="movietimings.php">Movie Timings</a><br><br>
		  		<a href ="movietimingsee.php">Movie Schedule</a><br><br>
		    	<a href ="userbookings.php">User Bookings</a><br><br>
		    	<a href ="customer.php">Customers Info</a><br><br>
		    	<a href = "login.php">Log Out</a>
		  	</div>
		  	
	    </h1>
	</body>
</html>