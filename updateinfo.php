<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Info</title>
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
        
        <p id="title">Users</p>
                    <hr align="left" width="100%">
                    
                   
<?php

    
	
	include 'include/connect.php';
	//$sql="select DISTINCT CourseNo, name from rslt, schedule,sub where (schedule.CourseNO=sub.id and schedule.T_Id='$id')";
	
	
	$sql="(select * from info where type='s')";
	
	
	
	
	$result=mysql_query($sql);
	$i=mysql_num_rows($result);
	
	 echo '<table id="tt">
			<tr><th>User id</th>
			<th>User name</th>
			<th>Email</th>
			<th>Cell Number</th>
			<th>Status</th>
			<th>Delete</th>
			<th>Active</th>
			
			
			';
								
	$t=$_SESSION['S_typ'];
	while($row = mysql_fetch_array($result))
						{
							$aid=$row['id'];
							 echo "<tr>";
    
	   echo "<td>" . $row['id'] . "</td>";
     
   
      echo "<td>" . $row['name'] . "</td>";
	   
	    echo "<td>" . $row['email'] . "</td>";
		 echo "<td>" . $row['phone'] . "</td>";
		 if($row['isactive']=='1')
		 {
			  echo '<td>Active</td>';
			}
			else
			echo '<td>Blocked</td>';
		
		 
		  
	
	
		 echo "<td><a href=\"edituser.php?d=".$row['id']." &t='s'\"> Delete User </a></td>";
		 if($row['isactive']=='0')
		 {
		 
		 echo "<td><a href=\"edituser.php?u=".$row['id']."&t='s'\"> Unblock User </a></td>";
		 }
		 else
		 {
			 echo "<td><a href=\"edituser.php?b=".$row['id']."&t='s'\"> block User </a></td>";
			 }
		 }
		 
		 
	 
      echo "</tr>";
      
						
						
						
						
						
    echo "</table>";
?>
  </div>
    </div>
    

</body>
</html>