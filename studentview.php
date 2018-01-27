<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUET RESULT</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>
<?php
$idd=$_GET['id'];
	
		
		include 'include/connect.php';
		$sql="SELECT * FROM info WHERE  id='$idd'";
		$result=mysql_query($sql);
		$i=mysql_num_rows($result);
		
		$row = mysql_fetch_array($result);
			$sid=$row['id'];
			$sname=$row['name'];
			$semail=$row['email'];
		$phone=$row['phone'];
		
		
	
		
		
?>
<body>
<div id="main">
	<div id="head">
		<img src="images/top.jpg" alt="" height="200" width=100% style="border-radius: 15px 15px 0 0">
    </div>
    

    <div id="top_menu">
    	<?php include 'include/menu.php'; ?>
    </div>
    <div id="content" style="float:left; width:960px;">
    	<div style="float:left">
    		<img src="images/pp/<?php echo $idd; ?>.jpg" alt="" height="250" width=200px>
        </div>
    
    <div id="content">
    	<div id="log" style="width:400px;">
        
        <p id="title">profile</p>
                    <hr align="left" width="100%">
                    
      
        	
            <p id="dr_info"><b>Name: </b><?php echo $sname; ?></p>
            
            <p id="dr_info"><b>ID: </b><?php echo $idd; ?></p>
            <p id="dr_info"><b>Email: </b><?php echo $semail; ?></p>
            <p id="dr_info"><b>Cell Number: </b><?php echo $phone; ?></p>
        </div>
        </div>
        
    <div id="footer" style="float:left; width:1000px;">
    	 <?php /* include ('include/footer.php'); */?>
       
    </div>
 </div> 
</body>
</html>