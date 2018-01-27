<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>



<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
{
$to = $_POST['to'];
$from = $_POST['from'];
$subject = $_POST['subject'];
$body = $_POST['message'];
mail($to,$subject,$body,$from);
$s=$_SESSION['S_typ'];
if($s=='s')
header("location:teacherlist.php");
else
header("location:batch.php");
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
    
    
    <?php
		
		$aid=$_GET['id'];
		
		//echo $id;
		
			$sql="SELECT * FROM info WHERE Id='$aid'";
			$result=mysql_query($sql);
			$info = mysql_fetch_assoc($result);
		
		?>
    
    <div id="content">
    	<div id="log">
        	<p id="title">Send mail</p>
            <hr align="left" width="100%">
            <form action="contact.php" method="post" name="v_rslt">
            
            <table id="tbl">
            <tr>
                    	<td><b>To:</b></td>
                    	<?php
				        echo '<td><input type="text" name="to" value="'.$info['email'].'" id="" /></td>';
						?>
                                
                    </tr>
                     <tr>
                    	<td><b>From:</b></td>
                    	<?php
						$iid=$_SESSION['S_id'];
						$sql1="SELECT * FROM info WHERE Id='$iid'";
			$result1=mysql_query($sql1);
			$info1 = mysql_fetch_assoc($result1);
						
				        echo '<td><input type="text" name="to" value="'.$info1['email'].'" id="" /></td>';
						?>
                                
                    </tr>
                    
            
             <tr>
             <td><b>Subject:</b> </td>
<td><input type="text" name="subject" /></td></tr>
               <tr><td colspan="2">Message: </td></tr>
<tr><td colspan="5"><textarea name="message" rows="3" cols="30"></textarea></td></tr>
</tr>
                
                
                
                
               
                
                 <tr>
            	<td colspan="4" style="padding-left:140px;"><a href="#" onclick="document.v_rslt.submit()" class="myButton"> Send mail </a></td>
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

