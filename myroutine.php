<?php include 'include/autho.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Routine</title>
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
                    

    
	
	<?php
         include 'include/connect.php';
  if(isset($_GET['id']))
  {
    $id = (int) $_GET['id'];
  }
  else
  {
  $id=$_SESSION['S_id'];
	$sec=$_SESSION['sec'];
	$t=$_SESSION['S_typ'];
	$batch=$_SESSION['batch'];
  }
	
     
    if($t=='t')
	{
    $result = mysql_query("SELECT * FROM schedule WHERE T_Id=$id");
	    $result1 = mysql_query("SELECT * FROM teacher WHERE Id=$id");
		$row1 = mysql_fetch_array($result1);

	 echo "Id: ".$row1["Id"];
    echo "<br>Teacher Name: ".$row1["T_Name"];
	    echo "<br>Designation: ".$row1["Designation"];
	}
	else
	{
		$result = mysql_query("SELECT * FROM schedule WHERE Section='$sec' and Batch='$batch'");
	}
	

	echo '<table id="tt">
			<tr><th>Course no</th>
			<th>Level</th> <th>Term</th> <th>Batch</th> <th>Section</th> <th>Day</th> <th>Room No</th> <th>Starting Time</th>';
    
     while($row = mysql_fetch_array($result))
	 {
    // make these any row in the table that you want to show for more detail on the 
    // items in the main tables page
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
							
     
    
	 }
     
    ?>
    
      </div>
    </div>
    

</body>
</html>
     

