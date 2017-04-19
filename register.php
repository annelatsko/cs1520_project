<!-- please see http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html for how I figured out how to protect against sql injections -->

<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: index.php");
	}
	include_once 'php/dbConnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
  
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
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "This email has already been registered.";
			}
		}
	  if (empty($pass)){
	   	$error = true;
	   	$passError = "Please enter password.";
	  } else if(strlen($pass) < 6) {
	   	$error = true;
	   	$passError = "Password must have at least 6 characters.";
	  }
  	$password = hash('sha256', $pass);
  
  	if( !$error ) {
   
		  $query = "INSERT INTO uglyStinkers(userName,userEmail,userPass) VALUES('$name','$email','$password')";
		  $res = mysql_query($query);
    
	    if ($res) {
		    $errTyp = "success";
		    $errMSG = "You registered! Go ahead and sign in.";
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
	</head>
		
	<body>
		<header>
			<nav>
				<ul>
					<?php if (!isset($_SESSION['user'])) { ?>
					<li class="session"><a href="signin.php">Sign In</a></li>
					<li class="session"><a class="active" href="#register">Register</a></li>
					<?php } else if(isset($_SESSION['user'])!="") { ?>
					<li class="session"><a href="logout.php?logout">Sign Out</a></li>
					<?php } ?>
					<li><a href="index.php">Home</a></li>
					<li><a href="riley.php">Riley</a></li>
					<li><a href="lamaga.php">Latsko Machete Gang</a></li>
					<li><a href="https://natboehm.github.io/SteelHacks2017/">Pepe the Hypoallergenic Therapy Dog</a></li>
				</ul>
			</nav>
		</header>

		<main>
			<div id="ugly_images">
				<img id="hotel" src="images/hotel_room.png" alt="Riley in a hotel room." >
			  
				<div class="container">

	 			<div id="registration-form">
	    		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
	     			<div class="col-md-12">
	         		<div class="form-group">
	             	<h2 class="">Give us your personal information for no real reason!!!!</h2>
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
		            <br>
		            <div class="form-group">
		             <div class="input-group">
		                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
		             		<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
		              </div>
		              <span class="text-danger"><?php echo $emailError; ?></span>
		           	</div>
		           	<br>
		            <div class="form-group">
		             	<div class="input-group">
		              	<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
		             		<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
		              </div>
		              <span class="text-danger"><?php echo $passError; ?></span>
		            </div>
		            <br>            
		            <div class="form-group">
		              <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
		            </div>
		            <div class="form-group">
		              <a href="signin.php">Go to Sign In</a>
		            </div>
	        
		        	</div>
		   
		    		</form>
		  		</div> 
				</div>
				<img id="reindeer" src="images/salty_reindeer.png" alt="Riley the deer.">
			</div>
		</main>

		<footer>
    	<p id="company_name">Latsko Machete Gang</p> <!-- these div tags feel wrong but it also seems dumb to use headers, idk -->
    	<p id="company_location">Cleveland, OH</p>
    	<p id="company_email">og.lamaga@gmail.com</p>
    </footer>	
	</body>

</html>