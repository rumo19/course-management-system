<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUET Result</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/table.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main">
	<div id="head">
		<img src="images/top.jpg" alt="" height="200" width=100% style="border-radius: 15px 15px 0 0">
    </div>
    
    <div id="top">
    	<?php include 'include/menu.php'; ?>
    </div>
    
    <?php
		include 'include/connect.php';

		$sub=$_POST['courseno'];
		$sen=$_POST['sen'];
	
		$exm=$_POST['type'];
		
	
		$_SESSION['sb']=$sub;
		$_SESSION['sen']=$sen;
		$_SESSION['ex']=$exm;
		
		$sql="SELECT * FROM sub WHERE id='$sub'";
		$result=mysql_query($sql);
		$info = mysql_fetch_assoc($result);
		
		$sub_full=$info['name'];
		$credit=$info['credit'];
			//$sql="SELECT info.id, info.name, rslt.`$exm` as mark FROM info INNER JOIN rslt ON info.id=rslt.id WHERE rslt.sub='$sub' AND rslt.sen='$sen' ORDER BY info.id ASC;";
						
		
		$sql="SELECT info.id, info.name, rslt.`$exm` as mark FROM info INNER JOIN rslt ON info.id=rslt.id WHERE rslt.sub='$sub' AND rslt.sen='$sen' ORDER BY info.id ASC;";
		$sql_exec = mysql_query($sql);
		
		
		
	?>
    <div id="content">
    	<div id="log" style="width:900px;">
        	<table id="tbl" style="width: auto">
            	<tr>
                	<td><b>Subject:</b></td>
                    <td><?php echo $sub_full; ?></td> 
                </tr>
                
                <tr>
                	<td><b>Sub Code:</b></td>
                    <td><?php echo $sub; ?></td>
                </tr>
                
                <tr>
                	<td><b>Credit:</b></td>
                    <td><?php echo $credit; ?></td>
                </tr>
                
                <tr>
                	<td><b>Session:</b></td>
                    <td><?php echo $sen; ?></td>
                </tr>
                
                <tr>
                	<td><b>Exam:</b></td>
                    <td><?php echo $exm; ?></td>
                </tr>
            </table>
            
            
    		<table id="tt">
        	<tr>
        		<th>ID</th>
            	<th>NAME</th>
            	<th>MARKS</th>
            </tr>
            
            <form method="post" action="post_exec.php" name="p_exe">
            	<?php
					while($row = mysql_fetch_array($sql_exec))
					{
						echo '<tr><td>';
						echo $row['id'];
						echo '</td>';
						
						echo '<td>';
						echo $row['name'];
						echo '</td>';
						
						echo '<td><input id="txt" style="text-align:right" value="'.$row['mark'].'" type="text" name="';
						echo $row['id'];
						echo '" />';
						echo '</td></tr>';
					}
					
					
				?>
                <tr><td colspan="3" align="right"><a href="#" class="myButton" onclick="document.p_exe.submit()">Post</a></td></tr>
            </form>
        </table>
    </div>
</div>
</body>
</html>