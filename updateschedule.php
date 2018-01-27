<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Schedule</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>



<?php
	include 'include/connect.php';
	
//$aid=$_GET['id'];

$id=$_GET['id'];

if(isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['sid']))
{
	$iid=$_POST['id'];
	$sid=$_POST['sid'];
	
$name=$_POST['name'];
$level=$_POST['level'];
$term=$_POST['term'];
$courseno=$_POST['courseno'];
$room=$_POST['room'];

$time=$_POST['time'];
$batch=$_POST['batch'];
$day=$_POST['day'];
$section=$_POST['section'];

 

 



	
	include 'include/connect.php';
	//echo $comment.$courseno.$time.$batch;
$insert=mysql_query("Update schedule SET T_Name='$name', T_Id='$iid',Batch='$batch',CourseNo='$courseno',Level='$level',Term='$term',Day='$day',Section='$section',RoomNo='$room',S_Time='$time' where sid='$sid'");
 //mysql_query("INSERT into courseplan set T_id='$id',Course_No='$courseno',Day_No='$day', Course_plan='$comment', contents='$contents', date_posted=NOW()");
header("location:view.php?id=$iid");
//echo "<meta HTTP-EQUIV='REFRESH' content='0; url=comment.php'>";


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
		
		$aid=$_GET['ds'];
		
		//echo $id;
		
			$sql="SELECT * FROM schedule WHERE sid='$aid'";
			$result=mysql_query($sql);
			$info = mysql_fetch_assoc($result);
		
		?>
    
    <div id="content">
    	<div id="log">
        	<p id="title">Update Schedule</p>
            <hr align="left" width="100%">
            <form action="updateschedule.php" method="post" name="v_rslt">
            
            <table id="tbl">
             <tr>
                    	<td><b>Schedule id:</b></td>
                    	<?php
				        echo '<td><input type="text" name="sid" value="'.$info['sid'].'" id="" /></td>';
						?>
                                
                    </tr>
            <tr>
                    	<td><b>Name:</b></td>
                    	<?php
				        echo '<td><input type="text" name="name" value="'.$info['T_Name'].'" id="" /></td>';
						?>
                                
                    </tr>
                    <tr>
                    	<td><b>Id:</b></td>
                    	<?php
				        echo '<td><input type="text" name="id" value="'.$info['T_Id'].'" id="" /></td>';
						?>
                                
                    </tr>
                    <tr>
                    	<td><b>Level:</b></td>
                    	<?php
				        echo '<td><input type="text" name="level" value="'.$info['Level'].'" id="" /></td>';
						?>
                                
                    </tr>
                    <tr>
                    	<td><b>Term:</b></td>
                    	<?php
				        echo '<td><input type="text" name="term" value="'.$info['Term'].'" id="" /></td>';
						?>
                                
                    </tr>
                      <tr>
                    	<td><b>Subject code:</b></td>
                    	<?php
				        echo '<td><input type="text" name="courseno" value="'.$info['CourseNo'].'" id="" /></td>';
						?>
                                
                    </tr>
            
             <tr>
                    	<td><b>Batch:</b></td>
                    	<?php
				        echo '<td><input type="text" name="batch" value="'.$info['Batch'].'" id="" /></td>';
						?>
                                
                    </tr>
                      <tr>
                    	<td><b>Section:</b></td>
                    	<?php
				        echo '<td><input type="text" name="section" value="'.$info['Section'].'" id="" /></td>';
						?>
                                
                    </tr>
                      <tr>
                    	<td><b>Day:</b></td>
                    	<?php
				        echo '<td><input type="text" name="day" value="'.$info['Day'].'" id="" /></td>';
						?>
                                
                    </tr>
                    <tr>
                    	<td><b>Room:</b></td>
                    	<?php
				        echo '<td><input type="text" name="room" value="'.$info['RoomNo'].'" id="" /></td>';
						?>
                                
                    </tr>
                    <tr>
                    	<td><b>Time:</b></td>
                    	<?php
				        echo '<td><input type="text" name="time" value="'.$info['S_Time'].'" id="" /></td>';
						?>
                                
                    </tr>
                    
                    
                    
                    
            	
            
                
                
            
          
                
               
                
                 <tr>
            	<td colspan="4" style="padding-left:140px;"><a href="#" onclick="document.v_rslt.submit()" class="myButton"> Update schedule </a></td>
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

