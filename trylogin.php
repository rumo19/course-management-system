<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log In</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/trystyle.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>
 <body background="images/bodytile.gif" bgcolor="#000000"> 

<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include 'include/connect.php';
		
		$id=$_POST['id'];
		$pass=$_POST['pass'];
		
		$sql="SELECT * FROM info WHERE (id='$id' OR email='$id') AND pass=AES_ENCRYPT('$pass', '123') AND isactive='1'";
		$result=mysql_query($sql);

		$count=mysql_num_rows($result);
		if($count==1)
		{
			session_regenerate_id();
			$info = mysql_fetch_assoc($result);
			$_SESSION['S_id'] = $info['id'];
			$_SESSION['S_name'] = $info['name'];
			
			$_SESSION['S_typ'] = $info['type'];
			$_SESSION['email'] = $info['email'];
			$_SESSION['sec'] = $info['section'];
			$_SESSION['batch'] = $info['batch'];
			$_SESSION['phone'] = $info['phone'];
			
			//echo $_SESSION['S_name'];
			header("location: profile.php");
			exit();
		}
		
	}
?>


<body>
<div id="main">
	<div id="head">
		<img src="images/top.jpg" alt="" height="200" width=100% style="border-radius: 15px 15px 0 0">
    </div>
    
    <div id="cssmenu">
    	
    </div>
    <div id="sidebar">
				<ul>
					<li>
						<h2>Aliquam tempus</h2>
						<p>Mauris vitae nisl nec metus placerat perdiet est. Phasellus dapibus semper consectetuer hendrerit.</p>
					</li>
					<li>
						<h2>Categories</h2>
						<ul>
							<li><a href="#">Aliquam libero</a></li>
							<li><a href="#">Consectetuer adipiscing elit</a></li>
							<li><a href="#">Metus aliquam pellentesque</a></li>
							<li><a href="#">Suspendisse iaculis mauris</a></li>
							<li><a href="#">Urnanet non molestie semper</a></li>
							<li><a href="#">Proin gravida orci porttitor</a></li>
						</ul>
					</li>
					<li>
						<h2>Blogroll</h2>
						<ul>
							<li><a href="#">Aliquam libero</a></li>
							<li><a href="#">Consectetuer adipiscing elit</a></li>
							<li><a href="#">Metus aliquam pellentesque</a></li>
							<li><a href="#">Suspendisse iaculis mauris</a></li>
							<li><a href="#">Urnanet non molestie semper</a></li>
							<li><a href="#">Proin gravida orci porttitor</a></li>
						</ul>
					</li>
					<li>
						<h2>Archives</h2>
						<ul>
							<li><a href="#">Aliquam libero</a></li>
							<li><a href="#">Consectetuer adipiscing elit</a></li>
							<li><a href="#">Metus aliquam pellentesque</a></li>
							<li><a href="#">Suspendisse iaculis mauris</a></li>
							<li><a href="#">Urnanet non molestie semper</a></li>
							<li><a href="#">Proin gravida orci porttitor</a></li>
						</ul>
					</li>
				</ul>
			</div>
            
    
    <div id="content">
 		<div id="log">
        	<p id="title">Log in</p>
            <hr align="left" width="100%">
        	<form action="login.php" method="post" name="log_frm">
            	<table id="tbl">
                	<tr>
                    	<td>ID/Email:</td>
                        <td><input type="text" name="id" id="txt" /></td>
                    </tr>
                    
                    <tr>
                    	<td>Password:</td>
                        <td><input type="password" name="pass" id="txt" /></td>
                    </tr>
                    
                    <tr>
                    	<td colspan="2" style="padding-left:183px;"><a href="#" onclick="document.log_frm.submit()" class="myButton">Log in</a>
                    </tr>
                </table>
            </form>
        </div>
        
        <div id="error" align="right">
    		<ul>
        		<?php
    				if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$id=$_POST['id'];
						$sql="SELECT * FROM info WHERE id='$id'";
		                 $result=mysql_query($sql);
						 $info = mysql_fetch_assoc($result);
						if($info['isactive']=='0')
						echo 'You are blocked';
						else
						echo '<li>*Wrong ID/Email or Passowrd</li>';
					}
				?>
        	</ul>
    	</div>
    </div>
        
    <div id="footer">
    	<?php include ('include/footer.php'); ?>
    </div>
</div>
</body>
</html>