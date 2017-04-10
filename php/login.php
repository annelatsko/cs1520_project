<?php 
	include('config.php');
	$con=mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
	
	function login() 
	{ 
		session_start(); 
		if(!empty($_POST['user'])) 
		{ 
			$query = mysql_query("SELECT * FROM uglyStinkers where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error()); 
			$row = mysql_fetch_array($query) or die(mysql_error()); 
			if(!empty($row['userName']) AND !empty($row['pass'])) 
			{ 
				$_SESSION['userName'] = $row['pass']; echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
			} 
			else 
			{ 
				echo "SORRY... YOU ENTERED WRONG ID AND PASSWORD... PLEASE RETRY..."; 
			} 
		} 
	} 
	if(isset($_POST['submit'])) 
	{ 
		login(); 
	} 
?>