<?php 
	include 'php/dbConnect.php'; 
	session_start();
	$imagePath="images/";
	$imageNames=array("can_u_like_not.png","chillin_under_bureau.png","looking_back.png","magical_girl.png","on_side.png","sleeping.png","sleeping2.png","hoodie_baby.png","wow_wtf.png","bandana.png","warp_tongue.png","distracted_doggo.png");
	$imageAlts=array("Riley looking salty af.","Riley hiding under a piece of furniture.","Riley looking behind her.","Riley with sparkles.","Riley laying on her side.","Riley dozing.","Riley dozing extra hard.","Riley in a hoodie.","Riley looking surprised and ugly.","Riley in a bandana.","Riley goin' fast.","Riley gettin' distracted");
	$imageAltCounter = 0;
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
					<?php if (!isset($_SESSION['user'])) { ?>
					<li class="session"><a href="signin.php">Sign In</a></li>
					<li class="session"><a href="register.php">Register</a></li>
					<?php } else if(isset($_SESSION['user'])!="") { 
						echo '<li style="color:#111; font-size:30px; float:left; display:block; padding: 8px 16px">Welcome, ' . $_SESSION['user'] . '!</li>';
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
			<?php 
				foreach ($imageNames as $image) {
			    echo '<image src="'. $imagePath . $image . '" alt="' . $imageAlts[$imageAltCounter] . '"/>'; 
				}
			?>
		</section>

		<footer>
	    <div id="company_name">Latsko Machete Gang</div> <!-- these div tags feel wrong-->
	    <div id="company_location">Cleveland, OH</div>
	    <div id="company_email">og.lamaga@gmail.com</div>
    </footer>
	</body>

</html>