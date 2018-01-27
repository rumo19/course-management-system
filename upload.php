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
        
        <p id="title">Upload and download files</p>
                    <hr align="left" width="100%">

<?php
  include 'include/connect.php';
$courseid=$_GET['id'];
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
move_uploaded_file($temp,"file/".$name);
$insert=mysql_query("insert into upload(name, courseno)values('$name','$courseid')");
if($insert)
{
//header("location:upload.php");
}
else{
die(mysql_error());
}
}
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
<table border="1" align="center" id="table1" cellpadding="0" cellspacing="0">
<tr><td align="center">Click to Download</td></tr>

<?php
$select=mysql_query("select * from upload where courseno='$courseid' "); //order by id desc
$row2=mysql_fetch_array($select);
if($row2<=0)
echo "sorry there is no file to download";
while($row1=mysql_fetch_array($select))
{
$name=$row1['name'];
?>
<tr>
<td width="300">
<img src="images/d.jpg" width="14" height="14"><a href="Download.php?f=<?php echo $name;?>"><?php echo $name ;?></a>
</td>
</tr>
<?php }?>
</table>
</div>
</body>
</html>