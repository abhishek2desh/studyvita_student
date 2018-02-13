<?php
	include_once '../config.php';
	$flg=0;
	$sub_id=$_GET['sub_id'];
	$course_id=$_GET['course_id'];
	$exam_type=$_GET['exam_type'];
	$uid=$_GET['uid'];
	$batch_id=$_GET['batch_id'];
	$datepickerVal45=$_GET['datepickerVal45'];
	$datepickerVal44=$_GET['datepickerVal44'];
	if($exam_type=="2" || $exam_type=="3")
	{
		$rs = mysql_query("SELECT  DISTINCT DATE_FORMAT(o.examdate,'%d-%m-%Y'),o.quepaperid,o.obtainedmarks,o.totalmarks,o.studentid FROM `objective_evolution` o,student_details s WHERE s.user_id='$uid' AND o.studentid=s.edutech_student_id AND o.examdate BETWEEN '$datepickerVal44' AND '$datepickerVal45'  and s.batch_id='$batch_id' ORDER BY o.examdate ");
		
		$rw = mysql_num_rows($rs);
		if($rw == 0)
		{
		}
		else
		{
			echo "<table style='width:100%;'>";
			echo "<tr>";
			echo "<td align='left'><b>Objective Test</b></td>";
			echo "</tr>";
			echo "</table>";
			echo "<table style='width:100%;'>";
			echo "<tr>";
			echo "<th style='border:solid 1px;width:25%;'>Exam Date</th>";
			echo "<th style='border:solid 1px;width:25%;'>Test ID</th>";
			echo "<th style='border:solid 1px;width:25%;'>Score</th>";
			echo "<th style='border:solid 1px;width:25%;'>Percentage</th>";
			echo "</tr>";
			while($row = mysql_fetch_array($rs))
			{
				$flg=1;
				echo "<tr>";
				echo "<td style='border:solid 1px;'>".$row[0]."</td>";
				echo "<td style='border:solid 1px;'>".$row[1]."</td>";
				echo "<td style='border:solid 1px;'>".$row[2]."/".$row[3]."</td>";
				$per=($row[2]*100)/$row[3];
				$per=round($per,2);
				echo "<td style='border:solid 1px;'>".$per."</td>";
				echo "</tr>";
				
			}
			echo "</table>";
		}
	}
	if($exam_type=="1" || $exam_type=="3")
	{
		$rs = mysql_query("SELECT  DISTINCT DATE_FORMAT(o.examdate,'%d-%m-%Y'),o.quepaperid,o.obtainedmarks,o.totalmarks,o.studentid FROM `subjectiveevalution` o,student_details s WHERE s.user_id='$uid' AND o.studentid=s.edutech_student_id AND o.examdate BETWEEN '$datepickerVal44' AND '$datepickerVal45'  and s.batch_id='$batch_id' ORDER BY o.examdate ");
		$rw = mysql_num_rows($rs);
		if($rw == 0)
		{
		}
		else
		{
			echo "<table style='width:100%;'>";
			echo "<tr>";
			echo "<td align='left'><b>Subjective Test</b></td>";
			echo "</tr>";
			echo "</table>";
			echo "<table style='width:100%;'>";
			echo "<tr>";
			echo "<th style='border:solid 1px;width:25%;'>Exam Date</th>";
			echo "<th style='border:solid 1px;width:25%;'>Test ID</th>";
			echo "<th style='border:solid 1px;width:25%;'>Score</th>";
			echo "<th style='border:solid 1px;width:25%;'>Percentage</th>";
			echo "</tr>";
			while($row = mysql_fetch_array($rs))
			{
				$flg=1;
				echo "<tr>";
				echo "<td style='border:solid 1px;'>".$row[0]."</td>";
				echo "<td style='border:solid 1px;'>".$row[1]."</td>";
				echo "<td style='border:solid 1px;'>".$row[2]."/".$row[3]."</td>";
				$per=($row[2]*100)/$row[3];
					$per=round($per,2);
				echo "<td style='border:solid 1px;'>".$per."</td>";
				echo "</tr>";
				
			}
			echo "</table>";
		}
	}
	if($flg=="0")
	{
	echo "No Data Available";
	}
?>