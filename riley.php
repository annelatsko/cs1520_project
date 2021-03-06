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
          <li><a class="active" href="#riley">Riley</a></li>
          <li><a href="lamaga.php">Latsko Machete Gang</a></li>
          <li><a href="https://natboehm.github.io/SteelHacks2017/">Pepe the Hypoallergenic Therapy Dog</a></li>
        </ul>
      </nav>
    </header>
		<main>
			<h1>Riley: Not Too Skilled at Being a Dog</h1>
			<div class="flexcontainer">
			  <div>
			    <ul id="chaotic_good_list">
						<li>There's something wrong with Riley's back legs so she sits like a human child, with her legs sticking out straight in front of her. As a result, she's very unbalanced and will (with great effort) climb onto the couch next to you so she can lean all of her weight on you to avoid falling over. She will also sit in corners if there is no one to sit next to for support.</li>
						<li>She's allergic to normal dog food and has to eat hypoallergenic, extremely expensive dog food that's basically just styrofoam with added nutrients.</li>
						<li>I once was picking up after her and found an entire, undigested, unchewed baby carrot.</li>
						<li>Riley's incapable of finding another warm air vent to sleep next to and if the one she found is blocked, she'll just lay next to it.</li>
						<li>She gets so excited to meet people that she pees everywhere. If you don't want to get peed on, you have to ignore her for five minutes when you first come into my parents' house.</li>
						<li>Riley's farts wake her up when she's asleep and scare her.</li>
					</ul>
			  </div>
			  <div>
			    <img src="images/hoodie_baby.png" alt="Lookin' hood.">
			  </div>
			</div>
		</main>

		<footer>
    	<div id="company_name">Latsko Machete Gang</div> <!-- these div tags feel wrong but it also seems dumb to use headers, idk -->
    	<div id="company_location">Cleveland, OH</div>
    	<div id="company_email">lamaga@gmail.com</div>
    </footer>



	</body>
</html>