<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Result</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>

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
        	<p id="title">Insert or Update Marks</p>
            <hr align="left" width="100%">

            
            <form action="post.php" method="post" name="p_rslt">
            <table id="tbl">
            
          
            
            
            
            
            
           
           <tr>
                	<td>Session:</td>
                    <td>
                    	<select name="sen" class="cb">
                        	<?php
							$id=$_SESSION['S_id'];	
							
								$sql="SELECT DISTINCT Batch FROM schedule where T_Id='$id';";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['Batch'].'</option>';	
								}
							?>
                        </select>
                    </td>
                </tr>
            
           <tr>
                	<td>Subject Code:</td>
                    <td>
                    	<select name="sub" class="cb">
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
            	<td id="vrt">Exam:</td>
                <td>
            		<select class="cb" name="type">
                    	<option>CT-1</option>
                        <option>CT-2</option>
                        <option>CT-3</option>
                        <option>CT-4</option>
                        <option>CT-5</option>
                        <option>atd</option>
                        <option>seca</option>
                        <option>secb</option>
					</select>
                </td> 
            </tr>
            
            <tr>
            	<td colspan="2" style="padding-left:150px;"><a href="#" onclick="document.p_rslt.submit()" class="myButton">GO</a>
                </td>
            </tr>
            </table>
        </div>
    </div>
    
    <div id="footer">
    	<?php include ('include/footer.php'); ?>
    </div>
</div>
</body>
</html>