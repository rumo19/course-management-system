<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course plan</title>
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
    <div id="top_menu">
    	<?php include 'include/menu.php'; ?>
    </div>
    <div id="content">
    	<div id="log" style="width:800px;">
        
        <p id="title">Course plan</p>
                    <hr align="left" width="100%">


    
  <?php
// Include database connection
$id=$_GET['id'];
include 'include/connect.php';
// SQL query to interact with info from our database
$sql = mysql_query("SELECT * from courseplan where Course_No='$id'"); 

// Establish the output variable

echo ' <table id="tt"><tr>
 
   <th>Day</th>
        <th>Course Plan</th>
			
			<th>Posted on</th>';
								
while($row = mysql_fetch_array($sql))
{ 
    
    
     // if $i is divisible by our target number (in this case "3")
                               echo '<tr><td>';
							
							
							echo $row['Day_No'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['Course_plan'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['time'];
							echo '</td>';
							//echo '<br/>';
							
   
    
}

?>
</body>
</html>


