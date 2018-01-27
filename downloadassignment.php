<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Download Files</title>
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
        
        <p id="title"> Uploaded Assignment</p>
                    <hr align="left" width="100%">


<table border="1" align="center" id="table1" cellpadding="0" cellspacing="0">
<tr>
  <td align="center">Student Id</td>
  <td align="center">Files</td>
  <td align="center">Uploaded on</td>
  <td align="center">Remarked</td>
</tr>

<?php
include 'include/connect.php';
$id=$_GET['id'];

$select=mysql_query("select * from assignupload where a_id='$id' and status='false'"); //order by id desc
$row2=mysql_num_rows($select);

if($row2<=0)
echo "Sorry there is no any uploaded assignment";



while($row1=mysql_fetch_array($select))
{
$name=$row1['filename'];
$sid=$row1['s_id'];
$td=$row1['time'];


?>
<tr>

  <td> <?php echo $sid; ?> </td>
  



<td>
<img src="images/d.jpg" width="14" height="14"><a href="adownload.php?f=<?php echo $name;?>"><?php echo $name ;?></a>
</td>
<td> <?php echo $td; ?> </td>
<td>
<a href="remarked.php?f=<?php echo $sid;?>&g=<?php echo $id;?>">YES</a>
</td>

</tr>
<?php }?>
</table>


</div>
</body>
</html>