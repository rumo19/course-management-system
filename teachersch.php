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
<title>Routine</title>
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
    	<div id="log">
        <?php
		if(isset($_GET['name']))
		{
			$n=$_GET['name'];
			$s=$_GET['sub'];
			$b=$_GET['sen'];
			echo "Mr. $n is scheduled for batch $b and course $s";
		}
		 ?>
        	<p id="title">Assign Teacher</p>
            <hr align="left" width="100%">
            <form action="allot_exec.php" method="post" name="v_rslt">
            
            <table id="tbl">
            	<tr>
                	<td>Name:</td>
                    <td>
                    	<select name="name">
                        	<?php
								$sql="SELECT name FROM info WHERE type='t'";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['name'].'</option>';	
								}
							?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                	<td>Id:</td>
                    <td>
                    	<select name="id">
                        	<?php
								$sql="SELECT id FROM info where type='t'";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['id'].'</option>';	
								}
							?>
                        </select>
                    </td>
                </tr>
                
               
            
            <tr>
            	<td id="vrt">Level:</td>
                <td>
            		<select id="cb1" name="level" onChange="shiva();" class="cb">
 						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
                </td> 
            </tr>
            
            <tr>
            	<td id="vrt">Term:</td>
                <td>
            		<select id="cb_t" name="term" onchange="shiva();" class="cb">
 						<option>1</option>
						<option>2</option>
					</select>
                </td> 
            </tr>
            
            
            
            <script>
				shiva();
			</script>
            
            <tr>
            	<td id="vrt">Subject Code:</td>
                <td>
            		<div id="txtHint"></div>
                </td> 
            </tr>
            
            <tr>
                	<td>Session:</td>
                    <td>
                    	<select name="sen" class="cb">
                        	<?php
								$sql="SELECT DISTINCT sen FROM rslt ORDER BY sen;";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['sen'].'</option>';	
								}
							?>
                        </select>
                    </td>
                </tr>
                
                <tr>
            			<td id="vrt">Section:</td>
                		<td>
            				<select  name="sec"  class="cb">
 								<option>A</option>
								<option>B</option>
							</select>
                		</td> 
            		</tr>
                
                
                <tr>
                	<td>Room Select:</td>
                    <td>
                    	<select name="Rselect">
                        	<?php
								$sql="SELECT RoomName FROM room";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['RoomName'].'</option>';	
								}
							?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                	<td>Day:</td>
                    <td>
                    	<select name="dname">
                        	<?php
								$sql="SELECT DayName FROM day";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['DayName'].'</option>';	
								}
							?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                	<td>Starting Time:</td>
                    <td>
                    	<select name="stime">
                        	<?php
								$sql="SELECT Time FROM timestart";
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['Time'].'</option>';	
								}
							?>
                        </select>
                    </td>
                </tr>
                
                
                 <tr>
            	<td colspan="2" style="padding-left:140px;"><a href="#" onclick="document.v_rslt.submit()" class="myButton">Done</a></td>
            </tr>
            </table>
         	</form>
         </div>
    </div>
    
    <div id="footer">
    	<?php include ('include/footer.php'); ?>
    </div>
</div>
</body>
</html>