<?php
	//Start session
	//session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['S_id']);
	unset($_SESSION['S_name']);
	unset($_SESSION['S_dept']);
	unset($_SESSION['S_typ']);
	session_destroy();

	header("location: login.php");
?>