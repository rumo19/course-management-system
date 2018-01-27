<?php
include 'blog.php';
$id=(int)$_GET['id'];
 
if(!isset($id))
{
	//header('location:index.php');
	echo 'there is no such entry';
	die();
	}
	delete($id);
	header('location:category_list.php');
	die();
	?>
	