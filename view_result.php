<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/Javascript">
var xmlHttp;
function shiva()
{
var str = cb1.value;
var str2 = cb_t.value;



xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
{
alert ("Your browser does not support AJAX!");
return;
}
var url="include/shiva.php"; //this is the page where city will be selected
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
document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUET Result</title>
<link href="style.css" rel="stylesheet" type="text/css">
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
    	<div id="log">
        	<p id="title">View Result</p>
            <hr align="left" width="100%">
            <form action="result.php" method="get" name="v_rslt">
            <table id="tbl">
            
            
            
           
           
            
            
            <tr>
                	<td>Session:</td>
                    <td>
                    	<select name="sen" class="cb">
                        	<?php
							$id=$_SESSION['S_id'];	
							$tt=$_SESSION['S_typ'];
							if($tt=='t')
							{
							
							
								$sql="SELECT DISTINCT Batch FROM schedule where T_Id='$id';";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['Batch'].'</option>';	
									
								}
							}
							else
							{
								$sql="SELECT DISTINCT batch FROM info where id='$id';";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['batch'].'</option>';	
								}
								
								}
							?>
                        </select>
                    </td>
                </tr>
            
           <tr>
                	<td>Subject Code:</td>
                    <td>
                    	<select name="sub" class="cb">
                        	<?php
							$id=$_SESSION['S_id'];	
							$tt=$_SESSION['S_typ'];
							if($tt=='t')
							{
								$sql="SELECT DISTINCT CourseNo FROM schedule where T_Id='$id';";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['CourseNo'].'</option>';	
								}
							}
							
							else
							{
								$sql="SELECT DISTINCT sub FROM rslt where id='$id';";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['sub'].'</option>';	
								}
								
								}
							?>
                        </select>
                    </td>
                </tr>
            
            <tr>
            	<td id="vrt">Exam:</td>
                <td>
            		<select name="type" class="cb">
                    	<option>CT-1</option>
                        <option>CT-2</option>
                        <option>CT-3</option>
                        <option>CT-4</option>
                        <option>CT-5</option>
                        <?php
							if ($t!='s'){
								echo '<option value="seca">Sec A</option>';
								echo '<option value="secb">Sec B</option>';
							}
						?>
                        <option value="Term Final">Term Final</option>
					</select>
                </td> 
            </tr>
            
            <tr>
            	<td colspan="2" style="padding-left:140px;"><a href="#" onclick="document.v_rslt.submit()" class="myButton">View</a></td>
            </tr>
            </table>
        </div>
    </div>
    
    <div id="footer">
    	<?php include ('include/footer.php'); ?>
    </div>
</div>
</body>
</html>