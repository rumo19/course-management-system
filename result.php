<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUET Result</title>
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
    	<?php include 'include/menu.php'; ?>
    </div>
    
    <?php
		include 'include/connect.php';
		
				
		$id=$_SESSION['S_id'];
	
		$sub=$_GET['sub'];
		$sen=$_GET['sen'];
		
		$exm=$_GET['type'];
		$ty=$_SESSION['S_typ'];
		
		$sql="SELECT * FROM sub WHERE id='$sub'";
		$result=mysql_query($sql);
		$info = mysql_fetch_assoc($result);
		
		$sub_full=$info['name'];
		$credit=$info['credit'];
		
	?>
    
    <div id="content">
    	<div id="log" style="width:900px;">
        	<table id="tbl" style="width: auto">
            	<tr>
                	<td><b>Subject:</b></td>
                    <td><?php echo $sub_full; ?></td> 
                </tr>
                
                <tr>
                	<td><b>Sub Code:</b></td>
                    <td><?php echo $sub; ?></td>
                </tr>
                
                <tr>
                	<td><b>Credit:</b></td>
                    <td><?php echo $credit; ?></td>
                </tr>
                
                <tr>
                	<td><b>Session:</b></td>
                    <td><?php echo $sen; ?></td>
                </tr>
                
                <tr>
                	<td><b>Exam:</b></td>
                    <td><?php if ($exm=='seca'){
							echo 'Sec A';
					}
					else if ($exm=='secb'){
						echo 'Sec B';
					}
					else if ($exm=='Term Final'){
						echo 'Term final';
					}
					else{
						echo $exm;
					}?></td>
                </tr>
            </table>
            
            <?php
			$sql="SELECT * FROM publish WHERE  CourseNo='$sub' AND Batch='$sen' AND Exam_Type='$exm'";
				$result=mysql_query($sql);
				$count=mysql_num_rows($result);
				//if($count1==1 && $ty=='s')
			
			
				
				//$sql="SELECT * FROM rslt WHERE id='$id' AND sub='$sub' AND sen='$sen'";
				//$result=mysql_query($sql);
				//$count=mysql_num_rows($result);
				
				if ($count==1 || $ty=='t' || $ty=='r')
				{
						echo '
							<table id="tt">
								<tr><th>ID</th>
								<th>NAME</th>';
						if ($exm=='Term Final')
						{
							echo '<th>Grade</th>';
						}
						else{
							echo '<th>MARKS</th>';
						}
						
						echo '</tr>';
							
						$sql="SELECT info.id, info.name, rslt.`$exm` as mark FROM info INNER JOIN rslt ON info.id=rslt.id WHERE rslt.sub='$sub' AND rslt.sen='$sen' ORDER BY info.id ASC;";
						
						if ($exm=='Term Final')
						{
							$sql="SELECT * FROM sub,info,rslt WHERE rslt.sub='$sub' AND rslt.sen='$sen' AND info.id=rslt.id AND rslt.sub=sub.id ORDER BY info.id ASC;";
						}
						$sql_exec = mysql_query($sql);
	
						while($row = mysql_fetch_array($sql_exec))
						{
							if ($id==$row['id']){
								echo '<tr style="background-color: #75ACFF; font-weight:bold;"><td>';
							}
							else{
								echo '<tr><td>';
							}
							
							echo $row['id'];
							echo '</td>';
								
							echo '<td>';
							echo $row['name'];
							echo '</td>';
							
							echo '<td>';
							
							if ($exm=='Term Final')
							{
								$ct1=$row['CT-1'];
								$ct2=$row['CT-2'];
								$ct3=$row['CT-3'];
								$ct4=$row['CT-4'];
								$ct5=$row['CT-5'];
								$ct=array("$ct1","$ct2","$ct3","$ct4","$ct5");
								rsort($ct);
								$ctn=0;
		
								for($x=0;$x<=$row['credit']-1;$x++)
 	 							{
  									$ctn+=$ct[$x];
								}

								$atd=$row['atd'];
								$sa=$row['seca'];
								$sb=$row['secb'];
								$x=($sa+$sb+$atd+$ctn)/($row['credit']);
				
								if ($x>=80)
								{
									$y='A+';
								}
								else if ($x>=75 && $x<80){
									$y='A';
								}
								else if ($x>=70 && $x<75){
									$y='A-';
								}
								else if ($x>=65 && $x<70){
									$y='B+';
								}
								else if ($x>=60 && $x<65){
									$y='B';
								}
								else if ($x>=55 && $x<60){
									$y='B-';
								}
								else if ($x>=50 && $x<55){
									$y='C+';
								}
								else if ($x>=45 && $x<50){
									$y='C';
								}
								else if ($x>=40 && $x<45){
									$y='D';
								}
								else {
									$y='F';
								}
								
								echo $y;
							}
							else
							{
								if (($row['mark'])!=null)
								echo $row['mark'];
								else 
								echo '0';
							}
							
							echo '</td></tr>';
							
						}
						echo '</table>';
				}
				else{

					echo '<div id="error">';
					echo '<ul><li>Result is not yet been published!!!</li></ul>';
					echo '</div>';
				}
			?>	
        </div>
    </div>
    
    <div id="footer">
    	<?php include ('include/footer.php'); ?>
    </div>
    
</div>
</body>
</html>