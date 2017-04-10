<?php 
	include 'php/dbConnect.php'; 
	session_start();
?>

<!doctype html>

<html>
	<head>
		<link type="text/css" rel="stylesheet" href="css/main.css" />
	</head>

	<body>

		<header>
			<nav>
				<ul>
					<?php if (!isset($_SESSION['user'])) { echo $_SESSION; ?>
					<li class="session"><a href="signin.php">Sign In</a></li>
					<li class="session"><a href="register.php">Register</a></li>
					<?php } else if(isset($_SESSION['user'])!="") { 
						echo '<li style="color:#111; font-size:20px; float:left; display:block; padding: 8px 16px">Welcome, ' . $_SESSION['user'] . '!</li>';
					?>
					<li class="session"><a href="logout.php?logout">Sign Out</a></li>
					<?php } ?>
					<li><a class="active" href="#home">Home</a></li>
					<li><a href="riley.php">Riley</a></li>
					<li><a href="lamaga.php">Latsko Machete Gang</a></li>
					<li><a href="https://natboehm.github.io/SteelHacks2017/">Pepe the Hypoallergenic Therapy Dog</a></li>
				</ul>
			</nav>
		</header>
		
		<h1 class="home_header">Riley</h1>
		<section id="photos">
		  <img src="images/can_u_like_not.png" alt="Riley looking salty af."/>
		  <img src="images/chillin_under_bureau.png" alt="Riley hiding under a piece of furniture.">
 		  <img src="images/looking_back.png" alt="Riley looking behind her.">
		  <img src="images/magical_girl.png" alt="Riley with sparkles.">
		  <img src="images/on_side.png" alt="Riley laying on her side.">
		  <img src="images/sleeping.png" alt="Riley dozing.">
		  <img src="images/sleeping2.png" alt="Riley dozing extra hard.">
		  <img src="images/hoodie_baby.png" alt="Riley in a hoodie.">
		  <img src="images/wow_wtf.png" alt="Riley looking surprised and ugly.">
		  <img src="images/bandana.png" alt="Riley in a bandana.">
		  <img src="images/warp_tongue.png" alt="Riley goin' fast.">
		  <img src="images/distracted_doggo.png" alt="Riley gettin' distracted">
		</section>

		<footer>
	    <div id="company_name">Latsko Machete Gang</div> <!-- these div tags feel wrong-->
	    <div id="company_location">Cleveland, OH</div>
	    <div id="company_email">og.lamaga@gmail.com</div>
    </footer>
	</body>

</html>