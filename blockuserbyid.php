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
 <body background="images/bodytile.gif" bgcolor="#000000"> 

<?php
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include 'include/connect.php';
		
		$id=$_POST['id'];
		
		
		$sql="update info set isactive='0' where id='$id'";
		$result=mysql_query($sql);

		
		
		
	}
?>


<body>
<div id="main">
	<div id="head">
		<img src="images/top.jpg" alt="" height="200" width=100% style="border-radius: 15px 15px 0 0">
    </div>
    
    
    
    <div id="top">
    	<?php include 'include/menu.php'; ?>
    </div>

    
    <div id="content">
 		<div id="log">
        <?php
		if(isset($_POST['id']))
		{
			$id=$_POST['id'];
		echo "$id blocked";
		}
		?>
        	<p id="title">Block user</p>
            <hr align="left" width="100%">
        	<form action="blockuserbyid.php" method="post" name="log_frm">
            	<table id="tbl">
                	<tr>
                    	<td>Enter id:</td>
                        <td><input type="text" name="id" id="txt" /></td>
                    </tr>
                    
                   
                    
                    <tr>
                    	<td colspan="2" style="padding-left:183px;"><a href="#" onclick="document.log_frm.submit()" class="myButton">Blocked</a>
                    </tr>
                </table>
            </form>
       
        
    
</div>
</body>
</html>