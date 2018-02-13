<?php
	include 'config.php';
	
	$sid=$_GET['sid']='809719';
	$test_id=$_GET['test_id']='11601';
	$result=mysql_query("SELECT  DATE_FORMAT(ob.ExamDate,'%d-%m-%Y'),ob.`ExamDate`,ob.`StudentId`,ob.`QuePaperId`,ob.`Totalque`,ob.`TotalMarks`,ob.`ObtainedMarks`,ob.`Toppers_mark`,ob.`CorrectAnsStr`,ob.`ObtainedAnsStr`,ob.`subject`,sd.sname,u.enroll_id,ob.batch,u.username,u.password,u.id,sd.group_id,sd.user_id FROM `subjectiveevalution` ob,student_details sd,USER u WHERE ob.StudentId=sd.edutech_student_id AND sd.user_id=u.id AND ob.StudentId='$sid' AND ob.QuePaperId='$test_id'");
	
	
	$row=mysql_fetch_array($result);
	$total_no_que=0;
	$exam_date=$row[0];
	$exam_date_org=$row[1];
	$StudentId=$row[2];
	$QuePaperId=$row[3];
	$range=$row[4];
	$total_marks=$row[5];
	$ObtainedMarks=$row[6];
	$top_mark=$row[7];
	$correct_str=$row[8];
	$attempted_ans=$row[9];
	$subject=$row[10];
	$sname=$row[11];
	$enroll_id=$row[12];
	$batch=$row[13];
	$username=$row[14];
	$password=$row[15];
	$user_id=$row[16];
	$group_id=$row[17];
	$student_user_id=$row[18];
	$result_4=mysql_query("SELECT name  FROM `subject` WHERE id='$subject'");
	while($row4=mysql_fetch_array($result_4))
	{
	$sub_name=$row4[0];
	}
	$stu_per=($ObtainedMarks*100)/$total_marks;
	$stu_per=round($stu_per, 2);
?>
<html>
	<body>
		<div id="main_div" style="border:solid 1px;width:100%;">	
			<div style="border:solid 1px;width:100%;height:auto;">
				<table style="border:solid 0px;width:100%;height:auto;">
					<tr>
						<td style="border:solid 0px;width:30%;height:auto;">
							<center><div style='font-family:  Arial;font-size:20px;' >Diagnostic Test Report</div></center>
							<center><div style='font-family:  Arial;font-size:20px;' ><?php echo $sub_name; ?></div></center>
						</td>
					</tr>
				</table>
				<table style="border:solid 0px;width:100%;height:auto;">
				
					<tr>
						<td style='padding-left:30px;'>
							Batch : <?php echo $batch; ?>
						</td>
						<td style='padding-left:30px;'>
						</td>
					</tr>
					<tr>
						<td style='padding-left:30px;'>
							Student's Name : <?php echo $sname; ?>
						</td>
						<td style='padding-left:30px;'>
							Student's ID : <?php echo $StudentId; ?>
						</td>
					</tr>
					<tr>
						<td style='padding-left:30px;'>
							Date of Exam : <?php echo $exam_date; ?>
						</td>
						<td style='padding-left:30px;'>
							Question Code : <?php echo $QuePaperId; ?>
						</td>
					</tr>
					<tr>
						<td style='padding-left:30px;'>
							Topper's Mark : <?php echo $top_mark."/".$total_marks; ?>
						</td>
						<td style='padding-left:30px;'>
							Percentage of Marks Obtained: <?php echo $stu_per; ?>
						</td>
					</tr>
				</table>
				<br/>
			<?php
		
				$qno=1;
				$totalcol=0;
				$min_q=1;
				$max_q=0;
			
				echo "<table border='1' style='width:100%;'>";
				$lst = explode(",", $correct_str);
				$lst1 = explode(",", $attempted_ans);
				//echo $correct_str."<br/>";
				//echo $attempted_ans."<br/>";
				
				
				$range1=$range+1;
				if($range<=10)
				{
					//for question no
					echo "<tr>";
					echo "<td>Question No:</td>";
					for ($x = 1; $x <=$range; $x++) 
					{
						echo "<td>".$x."</td>";
					}
					echo "</tr>";
					//end question no
					//for max mark
					
					echo "<tr>";
					echo "<td>Maximum marks:</td>";
					foreach($lst as $item) 
					{
						if($item=="")
						{
						}
						else
						{
							echo "<td>".$item."</td>";
						}
					}
					echo "</tr>";
					//end max mark
					//for studentmark
					echo "<tr>";
					echo "<td>Marks obtained:</td>";
					foreach($lst1 as $item1) 
					{
						if($item1=="")
						{
						}
						else
						{
							echo "<td>".$item1."</td>";
						}
					}
					echo "</tr>";
						//end student mark
					echo "<tr><td colspan='$range1' align='right'>Makrs Obtained: $ObtainedMarks/$total_marks </td></tr>";
					$resultf=mysql_query("SELECT  DATE_FORMAT(ExamDate,'%d/%m'),QuePaperId,TotalMarks,ObtainedMarks FROM `subjectiveevalution`  WHERE StudentId='$sid' AND QuePaperId!='$test_id' and subject='$subject' and ExamDate<='$exam_date_org' order by ExamDate Desc");
				$rwf=mysql_num_rows($resultf);
				if($rwf>0)
				{
				$range2=$range-1;
					echo "<tr><td colspan='$range1' align='center'>  Marks(%) Obtained in the previous  Exams </td></tr>";
					echo "<tr>";
					echo "<td>Exam Date:</td>";
					$examdate_str="";
					$per_str="";
					$total_exam=0;
					while($rowf=mysql_fetch_array($resultf))
					{
					$stu_per_pre="";
						$stu_per_pre=($rowf[3]*100)/$rowf[2];
					$stu_per_pre=round($stu_per_pre,0);
				$examdate_str=$examdate_str.$rowf[0].",";
				$per_str=$per_str.$stu_per_pre.",";
					$total_exam=$total_exam+1;
					if($total_exam>45)
					{
					goto outexam1;
					}
					}
					outexam1:
					$qno=1;
				$totalcol=0;
				$min_q=1;
				$max_q=0;
					$totalq=0;
					$lst3 = explode(",", $examdate_str);
				$lst4 = explode(",", $per_str);
				foreach($lst3 as $item) 
				{
					if($item=="")
					{
					}
					else
					{
						
						if($totalcol==$range2)
						{
						echo "</tr>";
						echo "<tr>";
						echo "<td>Marks(%)</td>";
						for ($x = $min_q; $x <=$max_q; $x++) 
						{
						$stq=$x-1;
						echo "<td>".$lst4[$stq]."</td>";
						}
						echo "</tr>";
					
						$min_q=$max_q+1;
						echo "<tr>";
						echo "<td>Exam Date:</td>";
						echo "<td>".$item."</td>";
						$qno=$qno+1;
						$totalcol=0;
						
						}
						else
						{
							echo "<td>".$item."</td>";
							$qno=$qno+1;
							
						}
						$totalq=$totalq+1;
						$max_q=$max_q+1;
						//echo $totalq."-".$range."<br/>";
						if($totalq==$total_exam)
						{
						//echo $totalcol;
						$totalcol_new=$totalcol+2;
						
						for ($x = $totalcol_new; $x <=$range2; $x++) 
						{
							echo "<td></td>";
						}
						echo "</tr>";
						echo "<tr>";
						echo "<td>Marks(%)</td>";
						for ($x = $min_q; $x <=$max_q; $x++) 
						{
						$stq=$x-1;
						echo "<td>".$lst4[$stq]."</td>";
						}
						for ($x = $totalcol_new; $x <=$range2; $x++) 
						{
							echo "<td></td>";
						}
						echo "</tr>";
						
						}
						$totalcol=$totalcol+1;
					}
				}
				
				
					
				}
					
				
					echo "</table>";
				}
				else
				{
				//echo "in else";
				$totalq=0;
				echo "<tr>";
				echo "<td>Question No:</td>";
				foreach($lst as $item) 
				{
					if($item=="")
					{
					}
					else
					{
						
						if($totalcol==10)
						{
						echo "</tr>";
						echo "<tr>";
						echo "<td>Maximum marks:</td>";
						for ($x = $min_q; $x <=$max_q; $x++) 
						{
						$stq=$x-1;
						echo "<td>".$lst[$stq]."</td>";
						}
						echo "</tr>";
						echo "<tr>";
						echo "<td>Marks obtained::</td>";
						for ($x = $min_q; $x <=$max_q; $x++) 
						{
						$stq=$x-1;
						echo "<td>".$lst1[$stq]."</td>";
						}
						echo "</tr>";
						$min_q=$max_q+1;
						echo "<tr>";
						echo "<td>Question No:</td>";
						echo "<td>".$qno."</td>";
						$qno=$qno+1;
						$totalcol=0;
						
						}
						else
						{
							echo "<td>".$qno."</td>";
							$qno=$qno+1;
							
						}
						$totalq=$totalq+1;
						$max_q=$max_q+1;
						//echo $totalq."-".$range."<br/>";
						if($totalq==$range)
						{
						//echo $totalcol;
						$totalcol_new=$totalcol+2;
						
						for ($x = $totalcol_new; $x <=10; $x++) 
						{
							echo "<td></td>";
						}
						echo "</tr>";
						echo "<tr>";
						echo "<td>Maximum marks:</td>";
						for ($x = $min_q; $x <=$max_q; $x++) 
						{
						$stq=$x-1;
						echo "<td>".$lst[$stq]."</td>";
						}
						for ($x = $totalcol_new; $x <=10; $x++) 
						{
							echo "<td></td>";
						}
						echo "</tr>";
						echo "<tr>";
						echo "<td>Marks obtained::</td>";
						for ($x = $min_q; $x <=$max_q; $x++) 
						{
						$stq=$x-1;
						echo "<td>".$lst1[$stq]."</td>";
						}
						for ($x = $totalcol_new; $x <=10; $x++) 
						{
							echo "<td></td>";
						}
						echo "</tr>";
						}
						$totalcol=$totalcol+1;
					}
				}
				echo "<tr><td colspan='11' align='right'>Makrs Obtained: $ObtainedMarks/$total_marks </td></tr>";
				$resultf=mysql_query("SELECT  DATE_FORMAT(ExamDate,'%d/%m'),QuePaperId,TotalMarks,ObtainedMarks FROM `subjectiveevalution`  WHERE StudentId='$sid' AND QuePaperId!='$test_id' and subject='$subject' and ExamDate<='$exam_date_org' order by ExamDate Desc");
				$rwf=mysql_num_rows($resultf);
				if($rwf>0)
				{
					echo "<tr><td colspan='11' align='center'>  Marks(%) Obtained in the previous  Exams </td></tr>";
					echo "<tr>";
					echo "<td>Exam Date:</td>";
					$examdate_str="";
					$per_str="";
					$total_exam=0;
					while($rowf=mysql_fetch_array($resultf))
					{
					$stu_per_pre="";
						$stu_per_pre=($rowf[3]*100)/$rowf[2];
					$stu_per_pre=round($stu_per_pre,0);
				$examdate_str=$examdate_str.$rowf[0].",";
				$per_str=$per_str.$stu_per_pre.",";
					$total_exam=$total_exam+1;
					if($total_exam>45)
					{
					goto outexam;
					}
					}
					outexam:
					$qno=1;
				$totalcol=0;
				$min_q=1;
				$max_q=0;
					$totalq=0;
					$lst3 = explode(",", $examdate_str);
				$lst4 = explode(",", $per_str);
				foreach($lst3 as $item) 
				{
					if($item=="")
					{
					}
					else
					{
						
						if($totalcol==10)
						{
						echo "</tr>";
						echo "<tr>";
						echo "<td>Marks(%)</td>";
						for ($x = $min_q; $x <=$max_q; $x++) 
						{
						$stq=$x-1;
						echo "<td>".$lst4[$stq]."</td>";
						}
						echo "</tr>";
					
						$min_q=$max_q+1;
						echo "<tr>";
						echo "<td>Exam Date:</td>";
						echo "<td>".$item."</td>";
						$qno=$qno+1;
						$totalcol=0;
						
						}
						else
						{
							echo "<td>".$item."</td>";
							$qno=$qno+1;
							
						}
						$totalq=$totalq+1;
						$max_q=$max_q+1;
						//echo $totalq."-".$range."<br/>";
						if($totalq==$total_exam)
						{
						//echo $totalcol;
						$totalcol_new=$totalcol+2;
						
						for ($x = $totalcol_new; $x <=10; $x++) 
						{
							echo "<td></td>";
						}
						echo "</tr>";
						echo "<tr>";
						echo "<td>Marks(%)</td>";
						for ($x = $min_q; $x <=$max_q; $x++) 
						{
						$stq=$x-1;
						echo "<td>".$lst4[$stq]."</td>";
						}
						for ($x = $totalcol_new; $x <=10; $x++) 
						{
							echo "<td></td>";
						}
						echo "</tr>";
						
						}
						$totalcol=$totalcol+1;
					}
				}
				
				
					
				}
				echo "</table>";
				}
				
			?>			
			<br/><br/>
				<b><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GENERAL REMARKS</font></b>
				<br/></br/>	
				<?php
				$DoneWellQue="";
				$MinorMistakeQue="";
				$MoreEffortsQue="";
				$ReviceQue1="";
				//echo $correct_str."<br/>";
					//echo $attempted_ans."<br/>";
				$lst = explode(",", $correct_str);
				$lst1 = explode(",", $attempted_ans);
				$iq=0;
				$iq1=1;
				foreach($lst as $item) 
				{
					if($item=="")
					{
					}
					else
					{
					//echo "in else"."<br/>";
					//echo "user-".$item."mark-".$lst1[$iq]."<br/>";
						    If ($item == $lst1[$iq])
							{
							//echo "in if"."<br/>";
							 $DoneWellQue = $DoneWellQue.$iq1. ",";
							}
							else if($lst1[$iq]>((80/100)*$item))
							{
							//echo "in else if"."<br/>";
							 $MinorMistakeQue = $MinorMistakeQue.$iq1. ",";
							}
							else if($lst1[$iq] >= ((50 / 100) * $item) && $lst1[$iq]<=((80 / 100) * $item) )
							{
							//echo "in else if2"."<br/>";
							$ReviceQue1 = $ReviceQue1.$iq1. ",";
							}
							else if($lst1[$iq]<=((50 / 100) * $item))
							{
								//echo "in else if3"."<br/>";
							//echo "last".$item."iq-".$iq;
							$MoreEffortsQue = $MoreEffortsQue.$iq1. ",";
							}
							else
							{
							}
						
						
					}
					$iq++;
					$iq1++;
				}
				$numbering=1;
			
				if($DoneWellQue=="")
				{
				}
				else
				{
				echo "(".$numbering.") ".$sname." has done well in questions.<br/> ".$DoneWellQue."<br/>";
				$numbering++;
				}
				if($MinorMistakeQue=="")
				{
				}
				else
				{
				echo "(".$numbering.") Minor mistakes are observed in the following questions which might have happened due to lack of concentration.<br/> ".$MinorMistakeQue."<br/>".$sname." is advised to be calm, and concentrate while writing the answers."."<br/>";
				$numbering++;
				}
				$DifficultTopics="";
				$ReviseTopics="";
			
				$lst3= explode(",", $MoreEffortsQue);
		foreach($lst3 as $item) 
		{
			if($item=="")
			{
			}
			else
			{
				
					
				$result_concept=mysql_query("SELECT DISTINCT c.id,c.name FROM `onlineuniqid` ol,concept c,onlinequestionbank o WHERE ol.TestID='$test_id' AND  ol.Qno='$item' AND o.uniqid=ol.uniqid AND c.id=o.conceptid");
					while($row_concept=mysql_fetch_array($result_concept))
				{
				$DifficultTopics=$DifficultTopics.$row_concept[1].",";
				}
				
				}
			}
				//echo "diff-".$DifficultTopics;
				$lst4= explode(",", $ReviceQue1);
		foreach($lst4 as $item) 
		{
			if($item=="")
			{
			}
			else
			{
				
					
				$result_concept=mysql_query("SELECT DISTINCT c.id,c.name FROM `onlineuniqid` ol,concept c,onlinequestionbank o WHERE ol.TestID='$test_id' AND  ol.Qno='$item' AND o.uniqid=ol.uniqid AND c.id=o.conceptid");
					while($row_concept=mysql_fetch_array($result_concept))
				{
				$ReviseTopics=$ReviseTopics.$row_concept[1].",";
				}
				
				}
			}
			//echo "revise-".$ReviseTopics;
				if($ReviseTopics=="")
				{
				}
				else
				{
				echo "(".$numbering.") ".$sname."  needs to revise the topics.<br/> ".$ReviseTopics."<br/>";
				$numbering++;
				}
				if($DifficultTopics=="")
				{
				}
				else
				{
				echo "(".$numbering.") ".$sname."  is required to put more efforts in the following topics.<br/> ".$DifficultTopics."<br/>";
				$numbering++;
				}
				?>
				
			<br/>
				<table style="border:solid 0px;width:100%;height:auto;">
					<tr>
						<td style="border:solid 0px;width:30%;height:auto;">
							<div style='float:right;font-family:  Arial;font-size:20px;'>Academic Team</div>
						</td>
					</tr>
				</table>	
				
		</div>
		</div>
	</body>
</html>	

