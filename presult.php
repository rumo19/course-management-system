<?php
include 'include/autho.php'; 
include 'include/connect.php';
	$cname=$_POST['courseno'];
	
	$sen=$_POST['sen'];
	$etype=$_POST['type'];
	$sql="SELECT * FROM publish WHERE CourseNo='$cname' AND Batch='$sen' AND Exam_Type='$etype'";
			$result = mysql_query($sql);
			$i=mysql_num_rows($result);
			
			if ($i>0)
			{
				$sql="UPDATE publish SET sts='u',date=CURDATE(),time=CURTIME() WHERE  CourseNo='$cname' AND Batch='$sen' AND Exam_Type='$etype'";
				$result = mysql_query($sql);
			}
			else
			{
				$id=$_SESSION['S_id'];
				$sql="INSERT INTO publish VALUES('$id','$cname','$sen','$etype',CURDATE(),CURTIME(),'n')";
				$result = mysql_query($sql);
			}
	
	
//echo $cname.$etype.$sen;
	
	
	
	
	
	
	header('Location: publishresult.php?id='.$cname.'&t='.$etype.'');
?>