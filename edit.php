<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$npass=$_POST['np'];
		$opass=$_POST['op'];
		$err = array(0,0,0,0,0,0,0);
		$e=0;
		
		$id=$_SESSION['S_id'];
		
		include 'include/connect.php';
		$sql="SELECT * FROM info WHERE id='$id' AND pass=AES_ENCRYPT('$opass', '123')";
		$result=mysql_query($sql);
		$i=mysql_num_rows($result);
		
		if ($i==0)
		{
			$err[2]=1;
			$e=1;
		}
		
		if ($npass=='')
		{
			$err[3]=1;
			$e=1;
		}
		
		if (strlen($npass)<5)
		{
			$err[3]=1;
			$e=1;
		}
		
		
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email=='')
		{
			$err[1]=1;
			$e=1;
		}
		$sql="SELECT email FROM info WHERE email='$email' AND id!='$id'";
		$result=mysql_query($sql);
		$i=mysql_num_rows($result);
		
		if ($i!=0)
		{
			$err[1]=1;
			$e=1;
		}
		
		if (($opass=='' && $npass=='') && $err[1]==0)
		{
			$e=0;
		}
		
		if ($e==0)
		{
			if ($npass=='')
			{
				$sql="UPDATE info SET email='$email',phone='$phone' WHERE id='$id'";
			}
			else
			{
				$sql="UPDATE info SET email='$email',phone='$phone', pass=AES_ENCRYPT('$npass', '123') WHERE id='$id'";
			}
			mysql_query($sql);
			
			
			header('Location: index.php');
		}
			
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
        
        <?php
			$sql="SELECT * FROM info WHERE id='$id';";
			$result=mysql_query($sql);
			$info = mysql_fetch_assoc($result);
		?>
        
        <div id="log" style="float:left; margin-left:200px;">
        	<p id="title">Edit Profile</p>
            <hr align="left" width="100%">
            
            <form action="edit.php" method="post" name="sub">
            	<table id="tbl">
                	<tr>
                    	<td><b>Name:</b></td>
                        <td><?php echo $info['name'] ?></td>
                    </tr>
                    
                	<tr>
                    	<td><b>ID:</b></td>
                        <td><?php echo $info['id'] ?></td>
                    </tr>
                    
                    
                    
                    <tr>
                    	<td><b>Email:</b></td>
                    	<?php
							if($_SERVER['REQUEST_METHOD'] == 'POST'){
								if ($err[1]==1){
									echo '<td><input type="text" name="email" value="'.$email.'" id="txt2" /></td>';
								}
								else{
									echo '<td><input type="text" name="email" value="'.$email.'" id="txt" /></td>';
								}
							}
							else{
								$email=$info['email'];
								echo '<td><input type="text" name="email" value="'.$email.'" id="txt" /></td>';
							}
								
                        ?>
                                
                    </tr>
                    <tr>
                    	<td><b>Cell number:</b></td>
                    	<?php
							
								
								$phone=$info['phone'];
								echo '<td><input type="text" name="phone" value="'.$phone.'" id="txt" /></td>';
							
							
								
                        ?>
                                
                    </tr>
                    <tr>
                    	<td><b>Old Pass.:</b></td>
                    	 <?php
							if($_SERVER['REQUEST_METHOD'] == 'POST'){
								if ($err[2]==1){
									echo '<td><input type="password" name="op" value="'.$opass.'" id="txt2" /></td>';
								}
								else{
									echo '<td><input type="password" name="op" value="'.$opass.'" id="txt" /></td>';
								}
							}
							else{
								echo '<td><input type="password" name="op" value="" id="txt" /></td>';
							}
								
                        ?>
                    </tr>
                    
                    <tr>
                    	<td><b>New Pass.:</b></td>
                    	<?php
							if($_SERVER['REQUEST_METHOD'] == 'POST'){
								if ($err[3]==1){
									echo '<td><input type="password" name="np" value="'.$npass.'" id="txt2" /></td>';
								}
								else{
									echo '<td><input type="password" name="np" value="'.$npass.'" id="txt" /></td>';
								}
							}
							else{
								echo '<td><input type="password" name="np" value="" id="txt" /></td>';
							}
								
                        ?>
                    </tr>
                     
                    
                    <tr>
            			<td colspan="2" style="padding-left:200px;"><a href="#" onclick="document.sub.submit()" class="myButton">Update</a></td>
            		</tr>
                </table>
            </form>
        </div>
    </div>
    
    <div id="footer" style="float:left; width:1000px;">
    	<?php include ('include/footer.php'); ?>
    </div>
</div>
</body>
</html>