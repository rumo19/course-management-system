<?php include 'include/autho.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course Detail</title>
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
        
        <p id="title">Course Detail</p>
                    <hr align="left" width="100%">
                    

    
	
	<?php
         include 'include/connect.php';

    $id =$_GET['id'];
     
    
    //$result = mysql_query("SELECT * FROM schedule WHERE T_Id=$id");
	    $result1 = mysql_query("SELECT * FROM sub WHERE id='$id'");
		$row1 = mysql_fetch_array($result1);

	 echo "Id: ".$row1["id"];
    echo "<br>Course Name: ".$row1["name"];
	    echo "<br>Level: ".$row1["level"];
		echo "<br>Term: ".$row1["term"];
		echo "<br>Credit: ".$row1["credit"];
		//echo "<br>Content: ".$row1["content"];

	echo '<table id="tt">
			<tr><th>Course Content</th>
			';
			//echo $row1['content'];
echo '</table>';
    
     
	 
    // make these any row in the table that you want to show for more detail on the 
    // items in the main tables page
	
							
							
							echo "<h3>".$row1['content']." </h3>"; 
						
							
							//echo '<br/>';
							
							
							
     
    
	 
     
    ?>
    
      </div>
    </div>
    

</body>
</html>
     

