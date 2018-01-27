<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUET Result</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/style2.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/table.css" rel="stylesheet" type="text/css">
<script type="text/Javascript">
var xmlHttp;
function chng()
{
var str = lvl.value;
var str2 = trm.value;


xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
{
alert ("Your browser does not support AJAX!");
return;
}
var url="include/shiva3.php"; //this is the page where city will be selected
url=url+"?q="+str+"&x="+str2;
url=url+"&sid="+Math.random();
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}
function stateChanged()
{
if (xmlHttp.readyState==4)
{
document.getElementById("info").innerHTML=xmlHttp.responseText;
}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
{
// Firefox, Opera 8.0+, Safari
xmlHttp=new XMLHttpRequest();
}
catch (e)
{
// Internet Explorer
try
{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp;
}
</script>
</head>

<body>
<div id="main">
	<div id="head">
		<img src="images/top.jpg" alt="" height="200" width=100% style="border-radius: 15px 15px 0 0">
    </div>
    
    <div id="top">
    	<?php include 'include/menu.php'; ?>
    </div>
    
    <div id="content" style="float:left">
    	<div id="dr" style="float:left">
        	<?php
				echo '<img src="images/pp/'.$id.'.jpg" alt="" height="250" width=200px><br />';
			?>
            <p id=""><b>Name: </b><?php echo $_SESSION['S_name']; ?></p>
            
            <p id=""><b>ID: </b><?php echo $_SESSION['S_id']; ?></p>
        </div>
        
 
    	<div id="res" style="float:left"> 
        	<select id="lvl" class="dr2" onchange="chng();">
            	<option value="1">Level - 1</option>
                <option value="2">Level - 2</option>
                <option value="3">Level - 3</option>
                <option value="4">Level - 4</option>
            </select>
            
            <select id="trm" class="dr2" onchange="chng();">
            	<option value="1">Term - 1</option>
                <option value="2">Term - 2</option>
            </select>
            
            <div id="info">
            	<script>
					chng();
				</script>
            </div>
        </div>
    </div>
    
    <div id="footer" style="float:left; width:1000px;">
    	<?php include ('include/footer.php'); ?>
    </div>
</div>
</body>
</html>