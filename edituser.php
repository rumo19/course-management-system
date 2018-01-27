<?php
include 'include/connect.php';
if(isset($_GET['d']))
{
	$id=$_GET['d'];
	$sql=mysql_query("delete from info where id='$id'");
	
}
if(isset($_GET['ds']))
{
	$idd=$_GET['ds'];
	$id=$_GET['id'];
	$sql=mysql_query("delete from schedule where sid='$idd'");
	header("location: view.php?id=$id");
	exit();
	
	
}
if(isset($_GET['u']))
{
	$id=$_GET['u'];
	$sql=mysql_query("Update info set isactive='1' where id='$id'");
}
if(isset($_GET['b']))
{
	$id=$_GET['b'];
	$sql=mysql_query("Update info set isactive='0' where id='$id'");
}

if(isset($_GET['t']))
header("location: updateinfo.php");
else
header("location: updateinfot.php");


?>