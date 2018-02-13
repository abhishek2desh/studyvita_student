<?php
	
	include '../config.php';
	session_start();
	
	$s5=$_SESSION['sid'];
	$dt=$_SESSION['today_dt_session'];
	
	$SQL = "SELECT nw_msd.mat_id AS id,
			DATE(nw_msd.upload_date) AS comming_date,
			DATE_FORMAT(DATE(nw_msd.submission_date),'%d %b %Y') AS submission,
			m.material_name AS assignment, d.name AS TYPE, s.name AS SUBJECT
			FROM material_submission_details nw_msd, material m, detail d, SUBJECT s
			WHERE nw_msd.id IN(
			SELECT DISTINCT msd.id
			FROM material_submission_details msd, material_correct_answers mca,per_material_mapping p
			WHERE msd.mat_id = p.material_id AND p.student_id='$s5'
			AND mca.material_id = msd.mat_id)
			AND nw_msd.mat_id = m.id
			AND m.material_type_id = d.id
			AND m.subject_id = s.id
			AND DATE(nw_msd.submission_date) > '$dt' ORDER BY submission";
			//AND DATE(nw_msd.submission_date) > '$dt' ORDER BY submission";
	
	$result=mysql_query($SQL) or die($SQL."<br/><br/>".mysql_error());
	
	echo "<tr>";
	echo "<th width='20%'>Subject</th>";
	echo "<th width='20%'>Assignment</th>";
	echo "<th>Date Of Submission</th>";
	echo "<th>Type</th>";
	echo "</tr>";
	while($row=mysql_fetch_row($result))
	{	
		echo "<tr id='$row[7]'>";
			echo "<td align='left' style='width:10%'>".$row[5]."</td>";
			echo "<td align='left' style='width:10%'>".$row[3]."</td>";
			echo "<td align='left' style='width:10%'>".$row[2]."</td>";
			echo "<td align='left' style='width:20%'>".$row[4]."</td>";
		echo "</tr>";
	}
	include_once '../conn_close.php';
?>