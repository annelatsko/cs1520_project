<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: index.php");
	}
	include_once 'php/dbConnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
  
	  // clean user inputs to prevent sql injections
	  $name = trim($_POST['name']);
	  $name = strip_tags($name);
	  $name = htmlspecialchars($name);
	  
	  $email = trim($_POST['email']);
	  $email = strip_tags($email);
	  $email = htmlspecialchars($email);
	  
	  $pass = trim($_POST['pass']);
	  $pass = strip_tags($pass);
	  $pass = htmlspecialchars($pass);
  
		if (empty($name)) {
		 $error = true;
		 $nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
		 $error = true;
		 $nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		 $error = true;
		 $nameError = "Name must contain alphabets and space.";
		}
  
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			$query = "SELECT userEmail FROM uglyStinkers WHERE userEmail='$email'";
			$result = mysql_query($query);
			echo $result;
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
	  if (empty($pass)){
	   	$error = true;
	   	$passError = "Please enter password.";
	  } else if(strlen($pass) < 6) {
	   	$error = true;
	   	$passError = "Password must have atleast 6 characters.";
	  }
  	$password = hash('sha256', $pass);
  
  	if( !$error ) {
   
		  $query = "INSERT INTO uglyStinkers(userName,userEmail,userPass) VALUES('$name','$email','$password')";
		  $res = mysql_query($query);
    
	    if ($res) {
		    $errTyp = "success";
		    $errMSG = "Successfully registered, you may login now";
		    unset($name);
		    unset($email);
		    unset($pass);
	   	} else {
		    $errTyp = "danger";
		    $errMSG = "Something went wrong, try again later..."; 
   		} 
    
  	}
  }
?>

<!DOCTYPE html>

<html>
	<head>
		<link type="text/css" rel="stylesheet" href="css/main.css" />
		<nav>
			<ul>
				<li id="connect"><a class="active" href="#connect">Connect</a></li>
				<li id="connect"><a href="signin.php">Sign In</a></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="riley.html">Riley</a></li>
				<li><a href="lamaga.html">Latsko Machete Gang</a></li>
				<li><a href="https://natboehm.github.io/SteelHacks2017/">Pepe the Hypoallergenic Therapy Dog</a></li>
			</ul>
		</nav>
	</head>

	<body>

		<main>
			<div id="ugly_images">
				<img id="left" src="images/hotel_room.png" alt="Riley in a hotel room." >
			  <img id="right" src="images/like_the_ugliest.png" alt="Abomination 2.0.">
			  <img id="center" src="images/salty_reindeer.png" alt="Riley the deer.">
			</div>
				<h2>Interested in giving us your personal information for no real reason?</h2>
			<div class="container">

 			<div id="login-form">
    		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
     			<div class="col-md-12">
         		<div class="form-group">
             	<h2 class="">Sign Up.</h2>
            </div>
         		<div class="form-group">
             	<hr />
          	</div>
            
	        		<?php
	   						if ( isset($errMSG) ) {
	    				?>
	    					<div class="form-group">
	            		<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
	    							<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
	              	</div>
	            	</div>
	        		<?php
	   						}
	   					?>
	            
	        		<div class="form-group">
	          		<div class="input-group">
	            		<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
	            		<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
	           		</div>
	              <span class="text-danger"><?php echo $nameError; ?></span>
	            </div>
	            
	            <div class="form-group">
	             <div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
	             		<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
	              </div>
	              <span class="text-danger"><?php echo $emailError; ?></span>
	           	</div>

	            <div class="form-group">
	             	<div class="input-group">
	              	<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
	             		<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
	              </div>
	              <span class="text-danger"><?php echo $passError; ?></span>
	            </div>
	            
	            <div class="form-group">
	             <hr />
	            </div>
	            
	            <div class="form-group">
	             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
	            </div>
	            
	            <div class="form-group">
	             <hr />
	            </div>
	            
	            <div class="form-group">
	             <a href="index.php">Sign in Here...</a>
	            </div>
        
	        	</div>
	   
	    		</form>
	  		</div> 
			</div>
		</main>

		<footer>
    	<p id="company_name">Latsko Machete Gang</p> <!-- these div tags feel wrong but it also seems dumb to use headers, idk -->
    	<p id="company_location">Cleveland, OH</p>
    	<p id="company_email">lamaga@gmail.com</p>
    </footer>	
	</body>

</html>