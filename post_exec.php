<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUET Result</title>
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
    	<?php
			include 'include/connect.php';

			if(!isset($_SESSION['sb']))
			{
				header("location: index.php");
				exit();
			}


			
			$sub=$_SESSION['sb'];
			$sen=$_SESSION['sen'];
		
			$exm=$_SESSION['ex'];
			
			$sql="SELECT info.id, info.name, rslt.`$exm` as mark FROM info INNER JOIN rslt ON info.id=rslt.id WHERE (rslt.sub='$sub' AND rslt.sen='$sen');";
			$sql_exec = mysql_query($sql);
			
			while($row = mysql_fetch_array($sql_exec))
			{
				$id=$row['id'];
				$m=$_POST[$id];
				$sql2="UPDATE rslt SET `$exm`='$m' WHERE id='$id' and sub='$sub'";
				mysql_query($sql2);
			}
			
			$sql="SELECT * FROM note WHERE sub='$sub' AND sen='$sen' AND exm='$exm'";
			$result = mysql_query($sql);
			$i=mysql_num_rows($result);
			
			if ($i>0)
			{
				$sql="UPDATE note SET sts='u',date=CURDATE(),time=CURTIME() WHERE  sub='$sub' AND sen='$sen' AND exm='$exm'";
				$result = mysql_query($sql);
			}
			else
			{
				$id=$_SESSION['S_id'];
				$sql="INSERT INTO note VALUES('$id','$sub','$sen','$exm',CURDATE(),CURTIME(),'n')";
				$result = mysql_query($sql);
			}
			
			echo '<a href="result.php?sub='.$sub.'&sen='.$sen.'&type='.$exm.'">View</a>';
			unset($_SESSION['sb']);
			unset($_SESSION['sen']);
			
			unset($_SESSION['ex']);
		?>
    </div>
    
    <div id="footer">
    	<?php include ('include/footer.php'); ?>
    </div>
</div>
</body>
</html>