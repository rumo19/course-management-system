<?php
	$name=$_POST['name'];
	
	$lvl=$_POST['level'];
	$trm=$_POST['term'];
	$sub=$_POST['sub'];
	$sen=$_POST['sen'];
	$sec=$_POST['sec'];
	$id=$_POST['id'];
	$day=$_POST['dname'];
	$room=$_POST['Rselect'];
	$time=$_POST['stime'];
	
	
	include 'include/connect.php';
	/* $sql="INSERT INTO allot VALUEs('$name','$dept','$lvl','$trm','$sub','$sen');"; */
	$sql1="INSERT INTO schedule VALUEs('$name','$id','$sub','$lvl','$trm','$sen','$sec','$day','$room','$time');";
	/* mysql_query($sql); */
	$t=mysql_query($sql1);
	if(isset($t))
	{
	header('Location: teachersch.php?name='.$name.'&sen='.$sen.'&sub='.$sub.'');
	}
?>