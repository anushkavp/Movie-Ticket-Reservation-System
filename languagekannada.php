<?php
session_start();
$conn = mysqli_connect("localhost", "root", "annu98", "illumine");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Movie Tickets Reservation - Illumine</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="illumine.css" type="text/css" media="all">
    <script src="illumine.js" defer></script>
    <style>
    	.welcome {	
			float: right;
			position: absolute;
			right: 60px;
			top:130px;
			z-index: 10;
			#bottom: 100px;
			color:rgb(255,150,0);
			#background-color: black;
			text-align: center;
		}
	</style>
</head>
<body>
	<header class = "heading">
		<img src = "images/illumine.png">
		<h1 class = "header">Book Your Tickets here at Bangalore's largest Movie Theatre!!</h1>
		<div class= "welcome">
			<h3>Welcome <?php print_r($_SESSION['usersname']) ?>!!</h3>
			
		</div>
	</header>
	<div class = "nowshowing">
		<!--h2>Now Showing..</h2-->
		<h2>
		<div class="navbar">
	  		<a href="illumine.php">Home</a>
	  		<div class="subnav">
	    		<button class="subnavbtn">About </button>
	    		<div class="subnav-content">
	    		  <a href="aboutheatres.php">Theatres</a>
	    		  <a href="aboutteam.php">Team</a>
	      		</div>
	  		</div>
	  		<a href="#contact">Contact</a> 
	  		<div class="subnav">
	    		<button class="subnavbtn">Languages </button>
	    		<div class="subnav-content">
	    		  <a href="languageenglish.php">English</a>
	    		  <a href="languagehindi.php">Hindi</a>
	    		  <a href="languagekannada.php">Kannada</a>
	        	</div>
	  		</div> 
	  		<div class="subnav">
	  		  <button class="subnavbtn">Genres</button>
	  		  <div class="subnav-content">
	    		  <a href="#Action">Action</a>
	    		  <a href="#Romace">Romance</a>
	    		  <a href="#Horror">Horror</a>
	      	  </div>
	  		</div>
	  		<!--a href ="booking.php">Book Now!</a-->
	  		<a href = "login.php" style = "float: right; position: absolute; right: 80px;">Log Out</a>
	  	</div>
	</div>
	<div class = "movposters">
	  		<?php

	  		$sql = "select movposters from currentmovies where language = 'Kannada'"; 
	  		$result = mysqli_query($conn,$sql);
	  		//$resultfindlink = mysqli_query($conn,$findmovid);
			//$movposters = mysqli_fetch_array($result);
			while ($row = mysqli_fetch_array($result)) 
			{
				echo "<a href = 'booking.php' ><img src = '".$row['movposters']."'></a>";
				//header('Location: bookingtheatre.php');
		}
	  		?>
</h2>
</div>
</body></html>