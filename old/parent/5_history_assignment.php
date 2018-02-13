<?php
	
	include '../config.php';
	session_start();
	
	$s5=$_SESSION['sid'];
	$dt=$_SESSION['today_dt_session'];
	
	$SQL = "SELECT t.mat_id AS id,DATE_FORMAT(t.submit,'%d %b %Y') AS due_date,
			DATE_FORMAT(t.submited,'%d %b %Y') AS submission,t.sub AS SUBJECT
			,t.diff AS STATUS,t.material_name AS assignment
			FROM(
			SELECT DISTINCT msd.mat_id,DATE(msd.submission_date) AS submit
			,DATE(o.create_date)=NULL AS submited,s.name AS sub,
			IF(DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)=NULL)=NULL,'1','Not Sumited')
			AS diff,m.material_name
			FROM material_submission_details msd, material m, SUBJECT s, omr_student_response o,per_material_mapping p
			WHERE mat_id IN (SELECT material_id FROM per_material_mapping WHERE student_id='$s5' AND material_id 
			IN(SELECT DISTINCT mca.material_id FROM material_correct_answers mca WHERE mca.material_id 
			NOT IN(SELECT material_id FROM omr_student_response WHERE student_id='$s5')))
			AND msd.mat_id = m.id AND m.subject_id = s.id AND p.student_id = '$s5'
			UNION ALL
			SELECT DISTINCT msd.mat_id,DATE(msd.submission_date) AS submit
			,DATE(o.create_date) AS submited,s.name AS sub,
			IF(DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)) = '0', 'On Time', IF(DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)) LIKE '-%', CONCAT('Late by ',SUBSTRING(DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)),2),' days'), CONCAT('Early by ',DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)),' days'))) AS diff,
			m.material_name FROM material_submission_details msd, material m, SUBJECT s, omr_student_response o
			WHERE mat_id IN (SELECT material_id FROM per_material_mapping WHERE student_id='$s5' AND material_id 
			IN(SELECT DISTINCT m.material_id FROM material_correct_answers m WHERE m.material_id 
			IN(SELECT material_id FROM omr_student_response WHERE student_id='$s5'))) AND msd.mat_id = m.id
			AND m.subject_id = s.id AND o.student_id = '$s5') t ORDER BY due_date";
			//AND DATE(nw_msd.submission_date) > '$dt' ORDER BY submission";
	
	$result=mysql_query($SQL) or die($SQL."<br/><br/>".mysql_error());
	
	echo "<tr>";
	echo "<th width='20%'>Due Date</th>";
	echo "<th width='20%'>Submission</th>";
	echo "<th width='20%'>Subject</th>";
	echo "<th width='20%'>Status</th>";
	echo "<th width='20%'>Assignment</th>";
	echo "</tr>";
	while($row=mysql_fetch_row($result))
	{	
		echo "<tr id='$row[7]'>";
			echo "<td align='left' style='width:10%'>".$row[1]."</td>";
			echo "<td align='left' style='width:10%'>".$row[2]."</td>";
			echo "<td align='left' style='width:10%'>".$row[3]."</td>";
			echo "<td align='left' style='width:20%'>".$row[4]."</td>";
			echo "<td align='left' style='width:20%'>".$row[5]."</td>";
		echo "</tr>";
	}
	include_once '../conn_close.php';
?>