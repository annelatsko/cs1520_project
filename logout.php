<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header("Location: index.php");
  } else if(isset($_SESSION['user'])!="") {
    header("Location: index.php");
  }
 
  if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
  	session_unset();
    echo "unsetting session";
  	session_destroy();
  	header("Location: index.php");
  	exit;
  }
?>