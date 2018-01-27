<?php
include 'include/connect.php';


$name=$_POST['name'];
$comment=$_POST['comment'];
$submit=$_POST['submit'];
 
$dbLink = mysql_connect("localhost", "root", "");
    mysql_query("SET character_set_client=utf8", $dbLink);
    mysql_query("SET character_set_connection=utf8", $dbLink);
 
if($submit)
{
if($name&&$comment)
{
$insert=mysql_query("INSERT INTO comment (name,comment) VALUES ('$name','$comment') ");
echo "<meta HTTP-EQUIV='REFRESH' content='0; url=comment.php'>";
}
else
{
echo "please fill out all fields";
}
}






$dbLink = mysql_connect("localhost", "root", "");
    mysql_query("SET character_set_results=utf8", $dbLink);
    mb_language('uni');
    mb_internal_encoding('UTF-8');
 
$getquery=mysql_query("SELECT * FROM comment ORDER BY id DESC");
while($rows=mysql_fetch_assoc($getquery))
{
$id=$rows['id'];
$name=$rows['name'];
$comment=$rows['comment'];
echo $name . ': ' . $comment .'<br/>' ;
}
//header ('location:comment.php');
?>
 
