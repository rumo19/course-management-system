<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUET RESULT</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">

<script type="text/Javascript">
var xmlHttp;
var xmlHttp1;
function shiva()
{
var str = cb1.value;
var str2 = cb_t.value;
//var st3=txt.value;



xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
{
alert ("Your browser does not support AJAX!");
return;
}
var url="include/shiva2.php"; //this is the page where city will be selected
url=url+"?q="+str+"&x="+str2;
url=url+"&sid="+Math.random();


xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);

xmlHttp.send(null);
function stateChanged()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
}
}
}

function shiva1()
{
	var xmlHttp1;

var st3=txt.value;



xmlHttp1=GetXmlHttpObject();
if (xmlHttp1==null)
{
alert ("Your browser does not support AJAX!");
return;
}

var url1="include/student.php"; //this is the page where city will be selected
url1=url1+"?q="+st3;
url1=url1+"&sid="+Math.random();

xmlHttp1.onreadystatechange=stateChanged;
xmlHttp1.open("GET",url1,true);

xmlHttp1.send(null);
function stateChanged()
{
if (xmlHttp1.readyState==4)
{
document.getElementById("txtHint").innerHTML=xmlHttp1.responseText;
}
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
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include 'include/connect.php';
		$roll=$_POST['roll'];
	
		$l=$_POST["level"];
		$t=$_POST["term"];
		$sen=$_POST['sen'];
		$sec=$_POST['sec'];
		$er=0;

		
		$sql="DELETE FROM rslt WHERE id='$roll'";
					mysql_query($sql);
		$sql="SELECT * FROM info WHERE id='$roll' AND type='s'";
		$result=mysql_query($sql);
		$i=mysql_num_rows($result);
		
		if ($i==0)
		{
			$er=1;
		}
		else
		{
			$sql="SELECT id FROM sub WHERE level='$l' and term=$t";
			$result=mysql_query($sql);
		
			while($row = mysql_fetch_array($result))
			{
				$sub=$row['id'];
				
				if (isset($_POST[$sub]))
				{
					
					$sql="INSERT INTO `hd`.`rslt` (`id` ,`sub` ,`sen`,`section`) VALUES ('$roll', '$sub', '$sen','$sec');";
					mysql_query($sql);
				}
			}
			header('Location: add_sem.php');
		}
	}
?>
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
        	<p id="title">Add Semister</p>
            <hr align="left" width="100%">
            
            <form method="post" action="add_sem.php" name="add_s2">
            	<table id="tbl">
                	<tr>
                    	<td>ID:</td>
                        <?php
							if($_SERVER['REQUEST_METHOD'] == 'POST'){
								if ($er==1){
									echo '<td><input type="text" name="roll"  value="'.$roll.'"id="txt2" /></td>';
								}
								else{
									echo '<td><input type="text" name="roll" value="'.$roll.'"id="txt" /></td>';
								}
							}
							else{
								echo '<td><input type="text" name="roll" value="" id="txt" /></td>';
							}
								
                        ?>
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
                    
                    <tr>
                    	<td id="vrt">Season:</td>
                        <td><input type="text" name="sen" value="" id="txt" onchange="shiva1();" class="cb"/></td>
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
                    	<td>
                        	Subjects:
                        </td>
                    </tr>
                    
                    <tr><td></td><td><script>
						shiva();
					</script>
              		<div id="txtHint"></div></td></tr>
                    <tr>
                    	<td>
                        	Students:
                        </td>
                    </tr>
                    
                    <tr><td></td><td><script>
						shiva1();
					</script>
              		<div id="txtHint"></div></td></tr>
                    
                     <tr>
            			<td colspan="2" style="padding-left:200px;"><a href="#" onclick="document.add_s2.submit()" class="myButton">Add</a></td>
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