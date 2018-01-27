

<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Answer</title>
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
    	
    </div>
    <div id="top_menu">
    	<?php include 'include/menu.php'; ?>
    </div>


<div id="content">
    	<div id="logd" style="width:600px;">
        
        <p id="title"><?php include 'include/connect.php'; $eid=$_GET['id']; $getquery=mysql_query("SELECT contents FROM posts where id='$eid'"); $rows=mysql_fetch_assoc($getquery); echo $rows['contents']; ?></p>
                    <hr align="left" width="100%"> 
                    

</head>


<?php
	include 'include/connect.php';
	


$id=$_SESSION['S_id'];
$name=$_SESSION['S_name'];
$qid= (int)$_GET['id'];

if(isset($_POST['comment']))
{
$comment=$_POST['comment'];
$submit=$_POST['submit'];
 
$dbLink = mysql_connect("localhost", "root", "");
    mysql_query("SET character_set_client=utf8", $dbLink);
    mysql_query("SET character_set_connection=utf8", $dbLink);
 
if($submit)
{
if($comment)
{
$insert=mysql_query("INSERT INTO comment (userid,name,comment,questionid) VALUES ('$id','$name','$comment','$qid')");
//echo "<meta HTTP-EQUIV='REFRESH' content='0; url=comment.php'>";
}
else
{
echo "please fill out all fields";
}
}
}
 /*?>



<?php */
include 'include/connect.php';
$dbLink = mysql_connect("localhost", "root", "");
    mysql_query("SET character_set_results=utf8", $dbLink);
    mb_language('uni');
    mb_internal_encoding('UTF-8');
 
$getquery=mysql_query("SELECT * FROM comment where questionid='$qid'");
while($rows=mysql_fetch_assoc($getquery))
{
$id=$rows['id'];
$uid=$rows['userid'];
$name=$rows['name'];
$comment=$rows['comment'];
//echo $name  . ':  ' . $comment  . '<br/>';
 echo "<a href=\"studentview.php?id=".$rows['userid']."\"> ".$name. " </a>";
 echo ':'.$comment. '<br/>';


}

?>
 
<body>
<center>
<form method="post" action="comment.php?id=<?php  $iid=$_GET['id']; echo $iid; ?>">
<table>

<tr><td colspan="2">Comment: </td></tr>
<tr><td colspan="5"><textarea name="comment" rows="10" cols="50"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Comment"></td></tr>
</table>
</form>
</body>
</html>



 
</center>
</body>
</html>