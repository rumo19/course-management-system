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
	


$id=$_SESSION['S_id'];


if(isset($_POST['plan'])&&isset($_POST['courseno'])&&isset($_POST['time']))
{
	
$comment=$_POST['plan'];
$courseno=$_POST['courseno'];
$time=$_POST['time'];
$batch=$_POST['batch'];

 

 


if($comment&&$courseno&&$time)
{
	
	include 'include/connect.php';
	
$insert=mysql_query("INSERT INTO assignment (T_id,batch,Course_No,Topics,deadline) VALUES ('$id','$batch','$courseno','$comment','$time');");
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
    
    <div id="content">
    	<div id="log">
        	<p id="title">Post Assignment Plan</p>
            <hr align="left" width="100%">
            <form action="assignment.php" method="post" name="v_rslt">
            
            <table id="tbl">
            
             <tr>
                	<td>Batch:</td>
                    <td>
                    	<select name="batch" class="cb">
                        	<?php
							//$id=$_SESSION['S_id'];	
							echo $id;
								$sql="SELECT DISTINCT batch FROM info;";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['batch'].'</option>';	
								}
							?>
                        </select>
                    </td>
                </tr>
            	
             <tr>
                	<td>Subject Code:</td>
                    <td>
                    	<select name="courseno" class="cb">
                        	<?php
							$id=$_SESSION['S_id'];	
							echo $id;
								$sql="SELECT DISTINCT CourseNo FROM schedule where T_Id='$id';";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['CourseNo'].'</option>';	
								}
							?>
                        </select>
                    </td>
                </tr>
                
            
           <tr>
                    	<td>Deadline:</td>
                        <td><input type="datetime"  name="time" value="" id=""  aria-label="yyyy-mm-dd hh:mm:ss" placeholder="yyyy-mm-dd hh:mm:ss"/></td>
                    </tr>
                
                
                <tr><td colspan="2">Topics: </td></tr>
<tr><td colspan="5"><textarea name="plan" rows="7" cols="30"></textarea></td></tr>
                
                
                
                
               
                
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

