<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>category List</title>
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
        
        <p id="title">Category list</p>
                    <hr align="left" width="100%">
                    

    
	
    <?php
     
    // change the user_name and password
    include 'include/connect.php';
	$t=$_SESSION['S_typ'];
     
    // change the table_name
    $result = mysql_query("SELECT * FROM category");
     
    // change the display text in the table below 
   
    
   
	while($row = mysql_fetch_array($result))
      {
      
    // change the view.php to whatever page you will be creating dynamically 
    // through the link below as well as the row_name that you want the link to be 
    // from
	if($t=='s')
	{
      echo "<a href=\"category.php?id=".$row['id']."\"> ". $row['name'] ." </br> </a>";
	}
	else
	echo "<a href=\"category.php?id=".$row['id']."\"> ". $row['name'] ."  </a> <a href=\"delete_category.php?id=".$row['id']."\"> ". 'delete' ." </br> </a>";
	
     
    // add more rows and change the name of row_name2 to whatever row/rows you 
    // want to show in the main page
      
     
      }
    
    ?>
       </div>
    </div>
    

</body>
</html>
     


