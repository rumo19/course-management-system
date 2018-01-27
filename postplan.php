<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post Plan</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>



<?php
	include 'include/connect.php';
	


$id=$_SESSION['S_id'];


if(isset($_POST['plan'])&&isset($_POST['courseno'])&&isset($_POST['day']))
{
$comment=$_POST['plan'];
$courseno=$_POST['courseno'];
$day=$_POST['day'];

 

 


if($comment&&$courseno&&$day)
{
	
	include 'include/connect.php';
	
$insert=mysql_query("INSERT INTO courseplan (T_id,Course_No,Day_No,Course_plan,time) VALUES ('$id','$courseno','$day','$comment', NOW());");
 //mysql_query("INSERT into courseplan set T_id='$id',Course_No='$courseno',Day_No='$day', Course_plan='$comment', contents='$contents', date_posted=NOW()");

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
        	<p id="title">Post Plan</p>
            <hr align="left" width="100%">
            <form action="postplan.php" method="post" name="v_rslt">
            
            <table id="tbl">
            	
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
                    	<td>Day:</td>
                        <td><input type="text" name="day" value="" id="txt" /></td>
                    </tr>
                
                
                <tr><td colspan="2">Course Plan: </td></tr>
<tr><td colspan="5"><textarea name="plan" rows="7" cols="30"></textarea></td></tr>
                
                
                
                
               
                
                 <tr>
            	<td colspan="4" style="padding-left:140px;"><a href="#" onclick="document.v_rslt.submit()" class="myButton">Done</a></td>
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

