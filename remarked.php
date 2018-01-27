<?php
	include 'include/connect.php';
	$id=$_GET['f'];
	$aid=$_GET['g'];
	$sql=mysql_query("Update assignupload set status='1' where s_id='$id' and a_id='$aid'");
	//header("location:downloadassignment.php");
	header("location:downloadassignment.php?id=$aid");
	
?>