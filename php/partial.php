<?php 
	ob_start();
	session_start();
	include_once 'dbConnect.php';
	if( isset($_SESSION['user'])!="" ){
		header("Location: ~/index.php");
		exit;
	}
	$error = false;
?>