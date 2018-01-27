<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Files</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="css/js-image-slider.js" type="text/javascript"></script>


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
    	<div id="log" style="width:400px;">
        
        <p id="title">Upload files</p>
                    <hr align="left" width="100%">

<?php
$id=$_GET['id'];
include 'include/connect.php';
$sql="select * from assignment where Id='$id'";
$sql_exec = mysql_query($sql);
$row = mysql_fetch_array($sql_exec);
date_default_timezone_set('Asia/Dhaka');
$date2 = $row['deadline'];
$cno=$row['Course_No'];
$date1 = date('Y-m-d H:i:s');
//echo $date1;


//Convert them to timestamps.
$date1Timestamp = strtotime($date1);
$date2Timestamp = strtotime($date2);

//Calculate the difference.
$difference = $date2Timestamp - $date1Timestamp;
if($difference>0)
{
$diff=$difference;
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$hour=floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24-$days*60*60*24)/ (60*60));
$min=floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24-$days*60*60*24-$hour*60*60)/60);
$sec=floor($diff - $years * 365*60*60*24 - $months*30*60*60*24-$days*60*60*24-$hour*60*60-$min*60);





echo "<h3>$months Month  $days Days $hour Hours $min Minutes  remaining</h3>";


  include 'include/connect.php';
$id=$_GET['id'];
$conn=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("hd",$conn) or die(mysql_error());
if(isset($_POST['submit'])!="")
{
$name=$_FILES['photo']['name'];
$size=$_FILES['photo']['size'];
$type=$_FILES['photo']['type'];
$temp=$_FILES['photo']['tmp_name'];
if(isset($_POST['caption']))
{
$caption1=$_POST['caption'];
$link=$_POST['link'];
}
move_uploaded_file($temp,"assignment/".$name);
$sid=$_SESSION['S_id'];
$insert=mysql_query("insert into assignupload(s_id,a_id,CourseNo, filename,time,status)values('$sid','$id','$cno','$name',NOW(),false)");
if($insert)
{
	header("location:assignmentlist.php");
//
}
else
{
die(mysql_error());
}


}
}
else
header("location:assignmentlist.php");

?>
<body>
<form enctype="multipart/form-data" action="" name="form" method="post">
<table border="0" cellspacing="0" cellpadding="5" id="table">
<tr>
<th >Chosse Files</th>
<td ><label for="photo"></label><input type="file" name="photo" id="photo" /></td>
</tr>
<tr>
<th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit" /></th>
</tr>
</table>
</form>
<br />
<br />

</div>
</body>
</html>