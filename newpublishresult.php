<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/Javascript">
var xmlHttp;
function shiva()
{
var str = session.value;



xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
{
alert ("Your browser does not support AJAX!");
return;
}
var url="include/dynamic.php"; //this is the page where city will be selected
url=url+"?q="+str;
//url=url+"&sid="+Math.random();
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
<title>CUET RESULT</title>
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
        	<p id="title">Publish Result</p>
            <hr align="left" width="100%">
            <?php
			
	if(isset($_GET['id']))
	{
		$cid=$_GET['id'];
		$et=$_GET['t'];
	
	
	echo "<h3>The $et of $cid is published</h3>";
	}
	
	 ?>
            <form action="presult.php" method="post" name="v_rslt">
            
            <table id="tbl">
            
              <tr>
                	<td id="vrt">Session:</td>
                    <td>
                    	<select id="session" name="sen" onChange="shiva();" class="cb">
                        	<?php
							$iid=$_SESSION['S_id'];	
							
								$sql="SELECT DISTINCT Batch FROM schedule where T_Id='$iid';";
								
								$sql_exec = mysql_query($sql);
	
								while($row = mysql_fetch_array($sql_exec))
								{
									echo '<option>'.$row['Batch'].'</option>';	
								}
							?>
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
            	<td id="vrt">Exam:</td>
                <td>
            		<select class="cb" name="type">
                    	<option>CT-1</option>
                        <option>CT-2</option>
                        <option>CT-3</option>
                        <option>CT-4</option>
                        <option>CT-5</option>
                        <option>atd</option>
                        <option>Term Final</option>
                        
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


