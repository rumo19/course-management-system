
    <?php
	include 'include/autho.php';
		ob_start();
require('fpdf.php');

//Connect to your database
include 'include/connect.php';
$id=$_SESSION['S_id'];
	
		$sub=$_GET['courseno'];
		$sen=$_GET['sen'];
		
		$exm=$_GET['type'];
		$ty=$_SESSION['S_typ'];
		
		$sql="SELECT * FROM sub WHERE id='$sub'";
		$result=mysql_query($sql);
		$info = mysql_fetch_assoc($result);
		
		$sub_full=$info['name'];
		$credit=$info['credit'];

//Create new pdf file
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis = 60;

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',10);
//echo 'Subject:';
$y=25;
$h=6;
$pdf->SetY($y);
$pdf->SetX(25);
$y=$y+$h;
$pdf->Cell(25,5,'Subject Name:');
$pdf->Cell(10,5,$sub_full);
$pdf->SetY($y);
$pdf->SetX(25);
$y=$y+$h;
$pdf->Cell(25,5,'Subject Code:');
$pdf->Cell(10,5,$sub);
$pdf->SetY($y);
$pdf->SetX(25);
$y=$y+$h;

$pdf->Cell(25,5,'Credit:');
$pdf->Cell(10,5,$credit);
$pdf->SetY($y);
$pdf->SetX(25);
$y=$y+$h;

$pdf->Cell(25,5,'Batch:');
$pdf->Cell(10,5,$sen);
$pdf->SetY($y);
$pdf->SetX(25);
$y=$y+$h;
		if($exm=='Term Final')
		{
$pdf->Cell(25,5,'Exam Type:');		
$pdf->Cell(10,5,'Term Final');
$pdf->SetY($y);
$pdf->SetX(25);
$y=$y+$h;
		}
else
{
$pdf->Cell(25,5,'Exam Type:');	
$pdf->Cell(10,5,$exm);
$pdf->SetY($y);
$pdf->SetX(25);
$y=$y+$h;
}
$pdf->SetY($y_axis);
$pdf->SetX(25);
$sql="SELECT * FROM publish WHERE  CourseNo='$sub' AND Batch='$sen' AND Exam_Type='$exm'";
				$result=mysql_query($sql);
				$count=mysql_num_rows($result);
				//if($count1==1 && $ty=='s')
			
			
				
				//$sql="SELECT * FROM rslt WHERE id='$id' AND sub='$sub' AND sen='$sen'";
				//$result=mysql_query($sql);
				//$count=mysql_num_rows($result);
				
				if ($count==1 || $ty=='t' || $ty=='r')
				{
						$pdf->Cell(30,6,'ID',1,0,'C',1);
//$pdf->Cell(100,6,'NAME',1,0,'L',1);
                      $pdf->Cell(50,6,'Name',1,0,'C',1);
						if ($exm=='Term Final')
						{
							$pdf->Cell(30,6,'Grade',1,0,'C',1);
						}
						else
						{
							$pdf->Cell(30,6,'Marks',1,0,'C',1);
						}
				}
						
						$row_height = 6;

$y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file
$result=mysql_query("select * from rslt");
 //$K=mysql_num_rows($result);
// echo $K;

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;
							
						$sql="SELECT info.id, info.name, rslt.`$exm` as mark FROM info INNER JOIN rslt ON info.id=rslt.id WHERE rslt.sub='$sub' AND rslt.sen='$sen' ORDER BY info.id ASC;";
						
						if ($exm=='Term Final')
						{
							$sql="SELECT * FROM sub,info,rslt WHERE rslt.sub='$sub' AND rslt.sen='$sen' AND info.id=rslt.id AND rslt.sub=sub.id ORDER BY info.id ASC;";
						}
						$sql_exec = mysql_query($sql);
	
						while($row = mysql_fetch_array($sql_exec))
						{
	if ($i == $max)
	{
		$y_axis=20;
		$pdf->AddPage();
		echo 'Subject:';
$pdf->Cell(40,10,$sub_full);
echo 'Subject code:';
$pdf->Cell(40,10,$sub);
echo 'Credit:';
$pdf->Cell(40,10,$credit);
echo 'Session:';
$pdf->Cell(40,10,$sen);
		if($exm=='Term Final')
		
$pdf->Cell(40,10,'Term Final');
else
$pdf->Cell(40,10,$exm);

		//print column titles for the current page
		$pdf->SetY($y_axis);
		$pdf->SetX(25);
		if ($count==1 || $ty=='t' || $ty=='r')
				{
						$pdf->Cell(30,6,'ID',1,0,'C',1);
//$pdf->Cell(100,6,'NAME',1,0,'L',1);
                      $pdf->Cell(50,6,'Name',1,0,'C',1);
						if ($exm=='Term Final')
						{
							$pdf->Cell(30,6,'Grade',1,0,'C',1);
						}
						else
						{
							$pdf->Cell(30,6,'Marks',1,0,'C',1);
						} 
				}
		
		//Go to next row
		$y_axis = $y_axis + $row_height;
		
		//Set $i variable to 0 (first row)
		$i = 0;
	
	}
	$idd = $row['id'];
	$name1 = $row['name'];
	//$name = $row['Code'];

	$pdf->SetY($y_axis);
	$pdf->SetX(25);
	$pdf->Cell(30,6,$idd,1,0,'L',1);
	//$pdf->Cell(100,6,$name,1,0,'L',1);
	$pdf->Cell(50,6,$name1,1,0,'L',1);
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
								else if ($x>=75 && $x<80)
								{
									$y='A';
								}
								else if ($x>=70 && $x<75)
								{
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
								else 
								{
									$y='F';
								}
								
								$pdf->Cell(30,6,$y,1,0,'L',1);
							}
							else
							{
								if($row['mark']==null)
								$row['mark']=0;
								
								$pdf->Cell(30,6,$row['mark'],1,0,'C',1);
								
							}
							
							
							
						
						
				
	//$pdf->Output();

	//Go to next row
	$y_axis = $y_axis + $row_height;
	$i = $i + 1;
	}
ob_start();
$pdf->Output();
//ob_clean();  
//mysql_close();

//Send file

ob_end_flush(); 
?>

							
							
							
						
							
							
				
				
			
