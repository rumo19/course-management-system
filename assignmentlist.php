<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assignment list</title>
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
        
        <p id="title">Assignment List</p>
                    <hr align="left" width="100%">
                    
                   
<?php

    $t=$_SESSION['S_typ'];		
	$id=$_SESSION['S_id'];	
	$batch=$_SESSION['batch'];	
	$t=$_SESSION['S_typ'];
	
	include 'include/connect.php';
	//$sql="select DISTINCT CourseNo, name from rslt, schedule,sub where (schedule.CourseNO=sub.id and schedule.T_Id='$id')";
	
	if($t=='s')
	$sql="(select * from assignment where batch='$batch')";
	else
	$sql="(select * from assignment where T_id='$id')";
	
	
	$result=mysql_query($sql);
	$i=mysql_num_rows($result);
	if($t=='s')
	{
	
	 echo '<table id="tt">
			<tr><th>Assignment id</th>
			<th>Course no</th>
			<th>Topics</th>
			<th>Deadline</th>
			<th>Status</th>
		
			
			
			';
	}
	else
	 echo '<table id="tt">
			<tr><th>Assignment id</th>
			<th>Course no</th>
			<th>Topics</th>
			<th>Deadline</th>
			<th>Status</th>
			<th>Edit</th>
			
			
			';
								
	$t=$_SESSION['S_typ'];
	while($row = mysql_fetch_array($result))
						{
							$aid=$row['Id'];
							 echo "<tr>";
    
	   echo "<td>" . $row['Id'] . "</td>";
     
   
      echo "<td>" . $row['Course_No'] . "</td>";
	   
	    echo "<td>" . $row['Topics'] . "</td>";
		 echo "<td>" . $row['deadline'] . "</td>";
		
		 $date2 = $row['deadline'];
         $date1 = date('Y-m-d H:i:s');
		  
	 if($t=='s')
	 {
		 
		  $sql1="SELECT * FROM assignupload where (s_id='$id' and a_id='$aid')";
            $result1=mysql_query($sql1);
           
            $i1=mysql_num_rows($result1);
			
			
		 if($date2>$date1&&$i1<=0)
		 
	  echo "<td><a href=\"uploadassignment.php?id=".$row['Id']."\"> Upload Now </a></td>";
	else if($date2>$date1&&$i1>0)
	 echo '<td> Submitted </td>';
		  
	  else
	  echo '<td> Out of Time </td>';
	 
	
	 
	 
		 }
	 else
	 echo "<td><a href=\"downloadassignment.php?id=".$row['Id']."\"> Remark </a></td>";
	 if($t=='t')
		 echo "<td><a href=\"editassignment.php?id=".$row['Id']."\"> Edit </a></td>";
		 }
		 
		 
	 
      echo "</tr>";
      
						
						
						
						
						
    echo "</table>";
?>
  </div>
    </div>
    

</body>
</html>