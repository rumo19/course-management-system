<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assignment Plan</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>



<?php
	include 'include/connect.php';
	
//$aid=$_GET['id'];

$id=$_SESSION['S_id'];


if(isset($_POST['plan'])&&isset($_POST['courseno'])&&isset($_POST['time']))
{
	$aid=$_POST['id'];
	
$comment=$_POST['plan'];
$courseno=$_POST['courseno'];
$time=$_POST['time'];
$batch=$_POST['batch'];

 

 


if($comment&&$courseno&&$time)
{
	
	include 'include/connect.php';
	//echo $comment.$courseno.$time.$batch;
$insert=mysql_query("Update assignment SET Id='$aid', T_id='$id',batch='$batch',Course_No='$courseno',Topics='$comment',deadline='$time' where Id='$aid'");
 //mysql_query("INSERT into courseplan set T_id='$id',Course_No='$courseno',Day_No='$day', Course_plan='$comment', contents='$contents', date_posted=NOW()");
header("location:assignmentlist.php");
//echo "<meta HTTP-EQUIV='REFRESH' content='0; url=comment.php'>";
}
else
{
echo "please fill out all fields";
}

}
 /*?>



<?php */


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
		
			$sql="SELECT * FROM assignment WHERE Id='$aid'";
			$result=mysql_query($sql);
			$info = mysql_fetch_assoc($result);
		
		?>
    
    <div id="content">
    	<div id="log">
        	<p id="title">Post Assignment Plan</p>
            <hr align="left" width="100%">
            <form action="editassignment.php" method="post" name="v_rslt">
            
            <table id="tbl">
            <tr>
                    	<td><b>Assignment Id:</b></td>
                    	<?php
				        echo '<td><input type="text" name="id" value="'.$info['Id'].'" id="" /></td>';
						?>
                                
                    </tr>
            
             <tr>
                	<td>Batch:</td>
                    <td>
                    	<select name="batch" class="cb">
                        	<?php
							//$id=$_SESSION['S_id'];	
							
									echo '<option>'.$info['batch'].'</option>';	
								
							?>
                        </select>
                    </td>
                </tr>
            	
             <tr>
                	<td>Subject Code:</td>
                    <td>
                    	<select name="courseno" class="cb">
                        	<?php
							
									echo '<option>'.$info['Course_No'].'</option>';	
								
							?>
                        </select>
                    </td>
                </tr>
                
            
           <tr>
                    	<td><b>Deadline:</b></td>
                    	<?php
				        echo '<td><input type="datetime" name="time" value="'.$info['deadline'].'" id="" /></td>';
						?>
                    </tr>
                
                
                <tr><td colspan="2">Topics: </td> </tr>
                <tr>

<?php
echo '<td colspan="5"> <textarea name="plan" rows="7" cols="30"  >'.$info['Topics'].' </textarea> </td>';
?>
</tr>
                
                
                
                
               
                
                 <tr>
            	<td colspan="4" style="padding-left:140px;"><a href="#" onclick="document.v_rslt.submit()" class="myButton"> Done </a></td>
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

