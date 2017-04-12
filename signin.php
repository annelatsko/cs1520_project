<?php
  ob_start();
  session_start();
  require_once 'php/dbConnect.php';
 
  if ( isset($_SESSION['user'])!="" ) {
    header("Location: index.php");
    exit;
  }
 
  $error = false;
 
  if( isset($_POST['btn-login']) ) { 
  
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
  
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
  
    if(empty($email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }
    
    if(empty($pass)){
      $error = true;
      $passError = "Please enter your password.";
    }
    
    // if there's no error, continue to login
    if (!$error) {
      $password = hash('sha256', $pass); // password hashing using SHA256
    
      $res=mysql_query("SELECT userId, userName, userPass FROM uglyStinkers WHERE userEmail='$email'");
      $row=mysql_fetch_array($res);
      $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
     
      if( $count == 1 && $row['userPass']==$password ) {
        $_SESSION['user'] = $row['userName'];
        header("Location: index.php");
      } else {
        $errMSG = "Incorrect Credentials, Try again...";
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
        <li class="session"><a class="active" href="#signin">Sign In</a></li>
        <li class="session"><a href="register.php">Register</a></li>
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

  <div class="signup-block">
    <img style="position:relative;width:45%;top:70px"src="images/like_the_ugliest.png" alt="why." >

    <div class="container">
      <form style="float:right;position:relative;width:45%;top:-300px" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <div class="form-group">
          <h2 style="font-size:48px">Sign In.</h2>
        </div>
        
        <?php if ( isset($errMSG) ) { ?>
          <div class="form-group">
            <div class="alert alert-danger">
              <?php echo $errMSG; ?>
            </div>
          </div>
        <?php } ?>    
        <div class="form-group">
          <div class="input-group">
            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
          </div>
          <span class="text-danger"><?php echo $emailError; ?></span>
        </div>
        <br><br>
        <div class="form-group">
          <div class="input-group">
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
          </div>
          <span class="text-danger"><?php echo $passError; ?></span>
        </div>
        <br><br>
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
        </div>
        <div class="form-group">
          Need an account?
          <a href="register.php">Sign Up Here</a>
        </div>
      </form>
    </div>
  </div>
  </body>
</html>
<?php ob_end_flush(); ?>