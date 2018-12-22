<?php
session_start();
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
			<?php 
			//echo date("Y-m-d")."<br>";
			$conn = mysqli_connect("localhost", "root", "annu98", "illumine");
			
			date_default_timezone_set("Asia/Kolkata");
			//echo date("H:i:s.0000000"); 

			$sql = "delete from movietimings where date < '".date("Y-m-d")."'";
			mysqli_query($conn,$sql);
			$sql1 = "delete from movietimings where date = '".date("Y-m-d")."' and timings < '".date('H:i:s.0000000')."'";
			mysqli_query($conn, $sql1);
			?>
			
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
	  		<a href="contact.php">Contact</a> 
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
		<a href = "booking.php"><img src="https://resize.indiatvnews.com/en/resize/newbucket/715_-/2018/06/pjimage-1528287939.jpg" alt = "stree"></a>
		<a href = "booking.php"><img src = "https://images-na.ssl-images-amazon.com/images/I/91RiAG8OhbL._SX425_.jpg" alt = "Sanju"></a>
		<a href = "booking.php"><img src= "http://filmmusicreporter.com/wp-content/uploads/2018/05/incredibles-2.jpg" alt = "incredibles2"></a>
	</div>

</body>
</html>