<?php include 'include/autho.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student List</title>
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
        
        <p id="title">Student list</p>
                    <hr align="left" width="100%">
                    

    
	
	<?php
         include 'include/connect.php';

    $bid = (int) $_GET['bid'];
     
    
    $result = mysql_query("SELECT  DISTINCT rslt.id, info.name  FROM info, rslt  WHERE rslt.sen=$bid and info.id=rslt.id order by rslt.id ASC");
	   // $result1 = mysql_query("SELECT * FROM teacher WHERE Id=$id");
		//$row1 = mysql_fetch_array($result1);

	 

	echo '<table id="tt">
			<tr><th>ID</th>
			<th>Name</th>
			<th>Contact</th>
			';
    
     while($row = mysql_fetch_array($result))
	 {
     echo "<tr>";
    // change the view.php to whatever page you will be creating dynamically 
    // through the link below as well as the row_name that you want the link to be 
    // from
      echo "<td><a href=\"studentview.php?id=".$row['id']."\"> ". $row['id'] ." </a></td>";
     
    // add more rows and change the name of row_name2 to whatever row/rows you 
    // want to show in the main page
      echo "<td>" . $row['name'] . "</td>";
	  echo "<td><a href=\"contact.php?id=".$row['id']."\"> Contact </a></td>";
      echo "</tr>";
      
   
    
	 }
	  echo "</table>";
     
    ?>
    
      </div>
    </div>
    

</body>
</html>
     

