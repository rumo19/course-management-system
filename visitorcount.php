<?php
session_start();
$session_path=session_save_path();
//echo $session_path;
$visitor=0;
$handle=opendir($session_path);
while(($file=readdir($handle))!=false)
{
	echo $file."<br/>";
	if($file!="ib7167.tmp"&&$file!="..")
	{
		echo $file;
		if(ereg("^sess",$file))
		$visitor++;
		}
	}
	echo "there is $visitor now"; 
?>