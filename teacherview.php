<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUET Result</title>
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
    	
    </div>

<div id="content">
    	<div id="log" style="width:400px;">
        
        <p id="title">Current Course List</p>
                    <hr align="left" width="100%">
                    
  <?php
// Include database connection
include 'include/connect.php';
// SQL query to interact with info from our database
$sql = mysql_query("SELECT * from schedule"); 

// Establish the output variable

echo ' <table id="tt"><tr>
   <th>Teacher Id</th>
        <th>Teacher Name</th>
			<th>Course no</th>
			<th>Batch</th>';
								
while($row = mysql_fetch_array($sql))
{ 
    
    
     // if $i is divisible by our target number (in this case "3")
                               echo '<tr><td>';
							
							
							echo $row['T_Id'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['T_Name'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['CourseNo'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['Batch'];
							echo '</td>';
							//echo '<br/>';
   
    
}

?>
</body>
</html>


