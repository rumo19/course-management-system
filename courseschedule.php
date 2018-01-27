<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course Schedule</title>
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
        
        <p id="title">Course Schedule</p>
                    <hr align="left" width="100%">



 <!--<p><a href="/cr/?by=A">A</a> | <a href="/cr/?by=B">B</a> | <a href="/cr/?by=K">K</a></p>  -->
<?php


$cname=$_GET['id'];

include 'include/connect.php';

//-query the database table
$sql="SELECT * FROM schedule WHERE CourseNo='$cname'";

//-run the query against the mysql query function
$result=mysql_query($sql);

//-count results

$numrows=mysql_num_rows($result);


//-create while loop and loop through result set

if($numrows>0)
{
echo '<table id="tt">
			<tr><th>Course no</th>
			<th>Level</th> <th>Term</th> <th>Batch</th> <th>Section</th><th>Day</th> <th>Room No</th> <th>Starting Time</th>';
    
	
while($row=mysql_fetch_array($result))
{

	$FirstName =$row['T_Id'];
	$LastName=$row['T_Name'];
	$ID=$row['S_Time'];
	$day=$row['Day'];
	
	echo '<tr><td>';
							
							
							echo $row['CourseNo'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['Level'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['Term'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['Batch'];
							echo '</td>';
							echo '<tc><td>';
							echo $row['Section'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['Day'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['RoomNo'];
							echo '</td>';
							//echo '<br/>';
							echo '<tc><td>';
							echo $row['S_Time'];
							echo '</td>';
							//echo '<br/>';
							
     
    
		
//-display the result of the array

//echo "<ul>\n"; 
//echo "<li>" . "<a href=\"search.php?id=$ID\">"  .$FirstName . " " . $LastName . ""  .$ID . ""  .$day . "</a></li>\n";
//echo "</ul>";
}
}
	






?>
 
   
    </div>

</body>
</html>


