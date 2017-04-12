<?php 
	include 'php/dbConnect.php'; 
	session_start();
?>
<!DOCTYPE html>

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
          <li><a href="index.php">Home</a></li>
          <li><a href="riley.php">Riley</a></li>
          <li><a class="active" href="#lamaga">Latsko Machete Gang</a></li>
          <li><a href="https://natboehm.github.io/SteelHacks2017/">Pepe the Hypoallergenic Therapy Dog</a></li>
        </ul>
      </nav>
    </header>
		
		<h1 style="float:right; font-size:90px; width:100%">Latsko Machete Gang</h1>
		<div class="container">
			<div class="lamaga">
				<img src="images/jonny_and_riley.png" alt="Jonny and Riley" id="jonny" class="image">
				<div class="details">
					<div class="name">JONNY</div>
					<div class="text">"Radical Communist. Reasonable guy. Hmu if u eff with my vision and want to connect and build"</div>
				</div>
			</div>
			<div class="lamaga">
				<img src="images/annie_and_riley.png" alt="Annie and Riley" id="annie" class="image">
				 <div class="details">
					<div class="name">ANNIE:</div>
					<div class="text" style="font-family:'Comic Sans MS', cursive, sans-serif">"Graphic design is my passion"</div>
				</div>
			</div>
			<div class="lamaga">
				<img src="images/ellen_and_riley.png" alt="Ellen and Riley" id="ellen" class="image">
				<div class="details">
					<div class="name">ELLEN:</div>
					<div class="text">"It's been a rough coupla 22 years || Chilling until proven otherwise."</div>
				</div>
			</div>
		</div>
		<footer>
	    <div id="company_name">Latsko Machete Gang</div> 
	    <div id="company_location">Cleveland, OH</div>
	    <div id="company_email">og.lamaga@gmail.com</div>
    </footer> 
	</body>
</html>