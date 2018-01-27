<?php
	include 'include/autho.php';
	$id=$_SESSION['S_id'];	
	
	include 'include/connect.php';
	
	$sql="SELECT date,time FROM info WHERE id='$id'";
	$result=mysql_query($sql);
	$info = mysql_fetch_assoc($result);
	
	$d=$info['date'];
	$tm=$info['time'];
	
	if (!isset($_GET['page']) or !is_numeric($_GET['page']))
	{
  				$p = 1;
			}
			else 
			{
  				$p = (int)$_GET['page'];
			}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notification</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main">
	<div id="head">
		<img src="images/top.jpg" alt="" height="200" width=100% style="border-radius: 15px 15px 0 0">
    </div>
    
    <div id="top_menu">
    	<?php include 'include/menu.php'; ?>
    </div>
    
    <div id="content">
    	 
        <?php
		$idd=$_SESSION['S_id'];
		$sql="SELECT * FROM note,rslt,info,publish WHERE  publish.CourseNo=rslt.sub  AND publish.Id=info.id AND rslt.id='$idd'";
			
			//$sql="SELECT * FROM note,rslt,info WHERE  note.sub=rslt.sub AND note.id=info.id AND rslt.id='$idd'";
			$result=mysql_query($sql);
			$i=mysql_num_rows($result);
			
			$x=($p-1)*2;
			
			$sql="SELECT info.name,publish.Exam_Type,publish.date,publish.time,publish.sts,publish.CourseNo,publish.Batch FROM rslt,info,publish WHERE publish.CourseNo=rslt.sub  AND publish.Id=info.id AND rslt.id='$id' ORDER BY publish.date DESC,publish.time DESC LIMIT $x,2";
			$result=mysql_query($sql);
			
			while($y=mysql_fetch_array($result))
			{
				if ($y['date']>=$d && $y['time']>$tm)
				{
					echo '<div id="noti2"><span id="n_h">';
				}
				else
				{
					echo '<div id="noti"><span id="n_h">';
				}
				
				echo $y['name'];
				
				if ($y['sts']=='n')
				{
					echo ' published ';
				}
				else
				{
					echo ' updated ';
				}
				
				echo $y['CourseNo'].' '.$y['Exam_Type'].' result.';
				
				echo '<br/></span><span id="n_t">';
				
				$tmp = explode("-", $y['date']);
				$tmp2=explode(":",$y['time']);
				
				
				$tmp3=date("F j, Y   g:iA", mktime($tmp2[0], $tmp2[1], $tmp2[2], $tmp[1], $tmp[2],$tmp[0]));
				echo $tmp3;
				
				echo '<br /></span><a href="';
				echo 'result.php?sub='.$y['CourseNo'].'&type='.$y['Exam_Type'].'&sen='.$y['Batch'];
				echo '">View result</a></div>';
				
			}
			
			echo '<center>';
			
			if ($x!=0)
			{
				echo '<a href="notification.php?page='.($p-1).'">Previous</a>';
			}
			else
			{
					$sql="UPDATE info SET date=CURDATE(),time=CURTIME() WHERE id='$id'";
					$result=mysql_query($sql);
			}
			
			if (($x+2)<$i){
				echo '<a href="notification.php?page='.($p+1).'">Next</a>';
			}
			
			
		?>
    </div>
    <div id="footer">
    	<?php include ('include/footer.php'); ?>
    </div>
</div>
</body>
</html>