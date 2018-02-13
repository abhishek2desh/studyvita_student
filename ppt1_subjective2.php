<?php
	include 'config.php';
	
	$sid=$_GET['sid']='809719';
	$test_id=$_GET['test_id']='11601';
	$result=mysql_query("SELECT  DATE_FORMAT(ob.ExamDate,'%d-%m-%Y'),ob.`ExamDate`,ob.`StudentId`,ob.`QuePaperId`,ob.`Totalque`,ob.`TotalMarks`,ob.`ObtainedMarks`,ob.`Toppers_mark`,ob.`CorrectAnsStr`,ob.`ObtainedAnsStr`,ob.`subject`,sd.sname,u.enroll_id,ob.batch,u.username,u.password,u.id,sd.group_id,sd.user_id FROM `subjectiveevalution` ob,student_details sd,USER u WHERE ob.StudentId=sd.edutech_student_id AND sd.user_id=u.id AND ob.StudentId='$sid' AND ob.QuePaperId='$test_id'");
	echo "SELECT  DATE_FORMAT(ob.ExamDate,'%d-%m-%Y'),ob.`ExamDate`,ob.`StudentId`,ob.`QuePaperId`,ob.`Totalque`,ob.`TotalMarks`,ob.`ObtainedMarks`,ob.`Toppers_mark`,ob.`CorrectAnsStr`,ob.`ObtainedAnsStr`,ob.`subject`,sd.sname,u.enroll_id,ob.batch,u.username,u.password,u.id,sd.group_id,sd.user_id FROM `subjectiveevalution` ob,student_details sd,USER u WHERE ob.StudentId=sd.edutech_student_id AND sd.user_id=u.id AND ob.StudentId='$sid' AND ob.QuePaperId='$test_id'";
	
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
	//$stu_per=($ObtainedMarks*100)/$total_marks;
	//$stu_per=round($stu_per, 2);
?>
<!--<html>
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
				$total_que=0;
				$qno=1;
				$flg=0;
				$totalrow=0;
				echo "<table>";
				
				$correct_str=$row[8];

				$lst = explode(",", $correct_str);
				$lst1 = explode(",", $attempted_ans);
				foreach($lst as $item) 
				{
					if($item=="")
					{
					}
					else
					{
						if($total_que==10)
						{
						echo "</tr>";
						echo "<tr>";
						}
						
						
					}
				}
				echo "</table>";
				?>
				<br/><br/>
				<b><font size="5">GENERAL REMARKS</font></b>
				<br/></br/>
				<?php
				$DoneWellQue="";
				$MinorMistakeQue="";
				$MoreEffortsQue="";
				$ReviceQue1="";
				$lst = explode(",", $correct_str);
				$lst1 = explode(",", $attempted_ans);
				$iq=0;
				$iq1=0;
				foreach($lst as $item) 
				{
					if($item=="")
					{
					}
					else
					{
						    If ($item == $lst1[$iq])
							{
							 $DoneWellQue = $DoneWellQue.$iq1. ",";
							}
							else if($lst1[$iq]>((80/100)*$item))
							{
							 $MinorMistakeQue = $MinorMistakeQue.$iq1. ",";
							}
							else if($lst1[$iq] >= ((50 / 100) * $item) && $lst1[$iq]<=((80 / 100) * $item) )
							{
							$ReviceQue1 = $ReviceQue1.$iq1. ",";
							}
							else if($lst1[$iq]<=((50 / 100) * $item))
							{
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
				echo "(".$numbering.") ".$sname." has done well in questions.<br/> ".$DoneWellQue;
				$numbering++;
				}
				if($MinorMistakeQue=="")
				{
				}
				else
				{
				echo "(".$numbering.") Minor mistakes are observed in the following questions which might have happened due to lack of concentration.<br/> ".$MinorMistakeQue."<br/>".$sname." is advised to be calm, and concentrate while writing the answers.";
				$numbering++;
				}
				$DifficultTopics="";
				$ReviseTopics="";
				//$MoreEffortsQue="";
				//$ReviceQue1="";
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
				if($ReviseTopics=="")
				{
				}
				else
				{
				echo "(".$numbering.") ".$sname."  needs to revise the topics.<br/> ".$ReviseTopics;
				$numbering++;
				}
				if($DifficultTopics=="")
				{
				}
				else
				{
				echo "(".$numbering.") ".$sname."  is required to put more efforts in the following topics.<br/> ".$DifficultTopics;
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
</html>-->