<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		
		$email=$_POST['email'];
		$npass=$_POST['np'];
		$opass=$_POST['op'];
		$sql="SELECT * FROM sub WHERE id='$sub'";
		$result=mysql_query($sql);
		$info = mysql_fetch_assoc($result);
		 
		$sub_full=$info['name'];
		$credit=$info['credit'];
		
		$err = array(0,0,0,0,0,0,0);
		$e=0;
		
		$id=$_SESSION['S_id'];
		
		include 'include/connect.php';
		$sql="SELECT * FROM info WHERE  id='$id' AND pass=AES_ENCRYPT('$opass', '123')";
		$result=mysql_query($sql);
		$i=mysql_num_rows($result);
	}
		
		
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
    		<img src="images/pp/<?php echo $id; ?>.jpg" alt="" height="250" width=200px>
        </div>
    
    <div id="content">
    	<div id="log" style="width:400px;">
        
        <p id="title">profile</p>
                    <hr align="left" width="100%">
                    
      
        	
            <p id="dr_info"><b>Name: </b><?php echo $_SESSION['S_name']; ?></p>
            
            <p id="dr_info"><b>ID: </b><?php echo $_SESSION['S_id']; ?></p>
            <p id="dr_info"><b>Email: </b><?php echo $_SESSION['email']; ?></p>
            <p id="dr_info"><b>Cell Number: </b><?php echo $_SESSION['phone']; ?></p>
        </div>
        </div>
        
    <div id="footer" style="float:left; width:1000px;">
    	 <?php /* include ('include/footer.php'); */?>
       
    </div>
 </div> 
</body>
</html>