<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Current Course List</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/table.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main">
	<div id="head">
		<img src="images/top.jpg" alt="" height="200" width=100% style="border-radius: 15px 15px 0 0">
    </div>
    
    <div id="top">
    	<?php include 'include/menu.php'; ?>
    </div>

<div id="content">
    	<div id="log" style="width:800px;">
        
        <p id="title">Current Course List</p>
                    <hr align="left" width="100%">
                    
                   
<?php

    $t=$_SESSION['S_typ'];		
	$id=$_SESSION['S_id'];	
	include 'include/connect.php';
	//$sql="select DISTINCT CourseNo, name from rslt, schedule,sub where (schedule.CourseNO=sub.id and schedule.T_Id='$id')";
	
	if($t=="t")
	{
	$sql="select Distinct CourseNo, name from schedule,sub where (schedule.CourseNO=sub.id and schedule.T_Id='$id');";
	}
	else
	$sql="select  sub.id, sub.name from rslt, sub where (rslt.sub=sub.id and rslt.id='$id')";
	
	//$sql="select  * from rslt, schedule,sub where (rslt.sub=sub.id and rslt.id='$id') OR (schedule.CourseNO=sub.id and schedule.T_Id='$id')";
	
	//$sql="select  id, name from rslt, schedule,sub where schedule.CourseNO=sub.id and schedule.T_Id='$id'";
	
	
	
	/* $sql="SELECT * FROM sub, allot,rslt WHERE sub.name=rslt.dept AND note.sub=rslt.sub AND note.id=info.id AND rslt.id='$id'"; */ 
	$result=mysql_query($sql);
	$i=mysql_num_rows($result);
	
	 echo '<table id="tt">
			<tr><th>Course no</th>
			<th>Course Name</th>
			<th>Course Resources</th>
			<th>Course schedule</th>
			<th>Course content</th>
			<th>Course plan</th>
			';
								
	
	while($row = mysql_fetch_array($result))
						{
							//$cid=$row['id'];
							
								echo '<tr><td>';
							
							if($t=='t')
							{
							echo $row['CourseNo'];
							echo "<td>".$row['name']." </td>";
							 echo "<td><a href=\"upload.php?id=".$row['CourseNo']."\"> uploading and downloading </a></td>";
							  echo "<td><a href=\"courseschedule.php?id=".$row['CourseNo']."\"> see the schedule</a></td>";
							  echo "<td><a href=\"coursecontent.php?id=".$row['CourseNo']."\"> see the content</a></td>";
							  echo "<td><a href=\"viewplan.php?id=".$row['CourseNo']."\"> see the course plan</a></td>";
							}
							else
							{
								echo $row['id'];
								echo "<td>".$row['name']." </td>";
							 echo "<td><a href=\"upload.php?id=".$row['id']."\"> uploading and downloading</a></td>";
							  echo "<td><a href=\"courseschedule.php?id=".$row['id']."\"> see the schedule </a></td>";
							  echo "<td><a href=\"coursecontent.php?id=".$row['id']."\"> see the content </a></td>";
							  echo "<td><a href=\"viewplan.php?id=".$row['id']."\"> see the course plan </a></td>";
							  //echo "<td><a href=\"upload.php?id=".$row['id']."\"> ". $row['name'] ." </a></td>";
							
							}
							
							 //echo "<td><a href=\"courseschedule.php?id=".$cid."\"> see the schedule </a></td>";
							
						  /* echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['name'];
							echo '</td>';
							//echo '<br/>'; */
							
							
								
						}
?>
  </div>
    </div>
    

</body>
</html>