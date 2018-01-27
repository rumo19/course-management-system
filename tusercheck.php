<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Teacher</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>
 <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
 {
	$("#username").keyup(function (e) 
	{
	
		//removes spaces from username
		$(this).val($(this).val().replace(/\s/g, ''));
		
		var username = $(this).val();
		if(username.length < 7){$("#user-result").html('');return;}
		
		if(username.length >= 7)
		{
			$("#user-result").html('<img src="imgs/ajax-loader.gif" />');
			$.post('check_username.php', {'username':username}, function(data) {
			  $("#user-result").html(data);
			});
		}
	});	
});
</script>

    <style type="text/css">
#registration-form {
	background: #C6C;
	padding: 20px;
	margin-right: auto;
	margin-left: auto;border:2px solid #456879;
	border:2px solid #456879;
	border-radius:7px;
	height: 15px;
	width:250px;
}
</style>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include 'include/connect.php';
		$name=$_POST['name'];
		$roll2=$_POST['roll'];
		$roll=(int)$_POST['roll'];
	
		$designa=$_POST['designation'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$pass=$_POST['pass'];
		$rpass=$_POST['rpass'];
		$err = array(0,0,0,0,0,0,0);
		$e=0;
		
		
		$sql="SELECT id FROM info WHERE id='$roll'";
		$result=mysql_query($sql);
		
		$i=mysql_num_rows($result);

		if ($name==''){
			$err[1]=1;
			$e=1;
		}
		if (!is_int($roll) || $roll<1 || strlen($roll)!=7)
		{
			$err[2]=1;
			$e=1;
		}
			
		
		if ($i!=0){
			$err[2]=1;
			$e=1;
		}
		
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email=='')
		{
			$err[3]=1;
			$e=1;
		}
		
		$sql="SELECT email FROM info WHERE email='$email'";
		$result=mysql_query($sql);
		$i=mysql_num_rows($result);
		
		if ($i!=0)
		{
			$err[3]=1;
			$e=1;
		}
		
		if ($phone==''){
			$err[4]=1;
			$e=1;
		}
		if ($pass=='')
		{
			$err[5]=1;
			$e=1;
		}
		
		if ($rpass=='')
		{
			$err[6]=1;
			$e=1;
		}
		
		if (strlen($pass)<5 && strlen($pass)>0){
			$err[5]=1;
			$e=1;
		}
		
		if (strcmp($pass,$rpass)!=0 && strlen($rpass)>0)
		{
			$err[6]=1;
			$e=1;
		}
		
		if ($e=='0')
		{
			$sql="INSERT INTO info VALUES('$roll','$name','null','0','t',CURDATE(),CURTIME(),'$email','$phone',AES_ENCRYPT('$pass', '123'),'1');";
			$sql1="INSERT INTO teacher VALUES('$roll','$name','$designa');";
			mysql_query($sql);
			$ttt=mysql_query($sql1);
			move_uploaded_file($_FILES["file"]["tmp_name"],"images/pp/" . $roll.'.jpg');
			//header("location: addteacher.php");
			/*if (isset($_POST['name']))
			{
				$name=trim($_POST['name']);
			} */
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
    
    <div id="content">
 		<div id="log">
        <?php
				if(isset($ttt))
				{
					echo "$name is added!!";
					$name="";
					$email="";
					$roll="";
					$roll2="";
					$pass="";
					$rpass="";
					$phone="";
					
					
					
					}
				 ?>
        	<p id="title">Add Teacher</p>
            <hr align="left" width="100%">
            
            <form method="post" action="tusercheck.php" name="add_s" enctype="multipart/form-data">
            	<table id="tbl">
                	<tr>
                    	<td>Name:</td>
                        
                        <?php
							if($_SERVER['REQUEST_METHOD'] == 'POST')
							{
								if ($err[1]==1)
								{
									echo '<td><input type="text" name="name" id="txt2" /></td>';
								}
								else
								{
									echo '<td><input type="text" name="name" value="'.$name.'" id="txt" /></td>';
								}
							}
							else
							{
								echo '<td><input type="text" name="name" value="" id="txt" /></td>';
							}
								
                        ?>
          
                    </tr>
                    
                     <div id="registration-form">                      
  <label for="username">Teacher id :
  <input name="roll" type="text" id="username" maxlength="15">
  <span id="user-result"></span>
  </label>
  </div>
  
                    
                   
                    
                    <tr>
                    	<td>Designation:</td>
                        <td>
                        	<select id="txt" name="designation">
                        	  <option>Lecturer</option>
                        	  <option>Assistant Professor</option>
                        	  <option>Associate Professor</option>
                        	  <option>Professor</option>
                            	
                            </select>
                        </td>
                    </tr>
                    <tr>
                    	<td>Email:</td>
                        
                        <?php
							if($_SERVER['REQUEST_METHOD'] == 'POST')
							{
								if ($err[3]==1)
								{
									echo '<td><input type="text" name="email" value="'.$email.'" id="txt2" /></td>';
								}
								else
								{
									echo '<td><input type="text" name="email" value="'.$email.'" id="txt" /></td>';
								}
							}
							else
							{
								echo '<td><input type="text" name="email" value="" id="txt" /></td>';
							}
								
                        ?>
                    </tr>
                    
                     <tr>
                    	<td>Image:</td>
                        
                      	<td><input type="file" name="file" value="" id="txt" /></td>'
								
                    </tr>
                    
                    <tr>
                    	<td>Phone:</td>
                        <?php
							if($_SERVER['REQUEST_METHOD'] == 'POST')
							{
								if ($err[4]==1)
								{
									echo '<td><input type="text" name="phone" value="'.$phone.'" id="txt2" /></td>';
								}
								else
								{
									echo '<td><input type="text" name="phone" value="'.$phone.'" id="txt" /></td>';
								}
							}
							else
							{
								echo '<td><input type="text" name="phone" value="" id="txt" /></td>';
							}
								
                        ?>
                    </tr>
                    
                    <tr>
                    	<td>Password:</td>
                        <?php
							if($_SERVER['REQUEST_METHOD'] == 'POST')
							{
								if ($err[5]==1){
									echo '<td><input type="password" name="pass" value="'.$pass.'" id="txt2" /></td>';
								}
								else{
									echo '<td><input type="password" name="pass" value="'.$pass.'" id="txt" /></td>';
								}
							}
							else{
								echo '<td><input type="password" name="pass" value="" id="txt" /></td>';
							}
								
                        ?>
                    </tr>
                    
                    <tr>
                    	<td></td>
                        <td style="font-size:14px;">Minimum 5 charecter</td>
                    </tr>
                    
                    <tr>
                    	<td>Re-type:</td>
                         <?php
							if($_SERVER['REQUEST_METHOD'] == 'POST')
							{
								if ($err[6]==1)
								{
									echo '<td><input type="password" name="rpass" id="txt2" /></td>';
								}
								else
								{
									echo '<td><input type="password" name="rpass" value="'.$rpass.'" id="txt" /></td>';
								}
							}
							else
							{
								echo '<td><input type="password" name="rpass" value="" id="txt" /></td>';
							}
								
                        ?>
                    </tr>
                    
                    <tr>
            			<td colspan="2" style="padding-left:200px;"><a href="#" onclick="document.add_s.submit()" class="myButton">Add</a></td>
            		</tr>
                </table>
            </form>
         </div>
         

    </div>
    <div id="footer">
    	<?php include ('include/footer.php'); ?>
    </div>
</div>
</body>
</html>