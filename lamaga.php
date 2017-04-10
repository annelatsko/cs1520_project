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
          	echo '<li style="color:#111; font-size:20px; float:left; display:block; padding: 8px 16px">Welcome, ' . $_SESSION['user'] . '!</li>';
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
				<img src="images/jonny_and_riley.png" alt="Jonny and Riley" id="jonny">
				<div class="details">
					<div class="text">JONNY</div>
				</div>
			</div>
			<div class="lamaga">
				<img src="images/annie_and_riley.png" alt="Annie and Riley" id="annie">
				 <div class="details">
					<div class="text">ANNIE</div>
				</div>
			</div>
			<div class="lamaga">
				<img src="images/ellen_and_riley.png" alt="Ellen and Riley" id="ellen">
				<div class="details">
					<div class="text">ELLEN</div>
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