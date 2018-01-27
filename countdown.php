<!doctype html>
<html>
<head>
<title>PHP Countdown Timer</title>
<style>
.green{color:green;}

h1{
font-size:3em;
font-weight:bold;
font-family:Arial, Helvetica, sans-serif;
}

</style>
</head>
<body>
<?php
include 'include/connect.php';
$sql="select * from assignment";
$sql_exec = mysql_query($sql);
$row = mysql_fetch_array($sql_exec);

$date2 = $row['deadline'];
$date1=date("Y-m-d");


$diff = abs(strtotime($date2) - strtotime($date1));






$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$hour=floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24-$days*60*60*24)/ (60*60));




//$remaining = $date - date("Y-m-d");
//$days_remaining = floor($remaining / 86400);
//$hours_remaining = floor(($remaining % 86400) / 3600);
if($days>0)
{
	echo 'still have time';
}
else
echo 'no time';

?>
<h1>There are <span class="green"><?php echo $years?></span> years and <span class="green"> <?php echo $days?></span> days and <span class="green"> <?php echo $hour?></span> hour left</h1>



</body>
</html>


<?php

//Our dates

include 'include/connect.php';
$sql="select * from assignment";
$sql_exec = mysql_query($sql);
$row = mysql_fetch_array($sql_exec);

$date2 = $row['deadline'];
$date1 = date('Y-m-d H:i:s');

echo $date1;
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





echo $years.'yaers  '.$months.'month  '.$days.'days  '.$hour.'hours  '.$min.'minutes  '.$sec.'second  remaining';
}
else
{
	echo 'no longer exits';
	}

?>