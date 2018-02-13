<?php
		include_once '../config.php';
		session_start();
		$s5 = $_SESSION['sid'];
		$dt = $_SESSION['today'];
		
		$result1=mysql_query("SELECT t.mat_id AS id,DATE_FORMAT(t.submit,'%d %b %Y') AS due_date,
		DATE_FORMAT(t.submited,'%d %b %Y') AS submission,t.sub AS SUBJECT
		,t.diff AS STATUS,t.material_name AS assignment
		FROM(SELECT DISTINCT msd.mat_id,DATE(msd.submission_date) AS submit
		,DATE(o.create_date)=NULL AS submited
		,s.name AS sub,IF(DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)=NULL)=NULL,'1','Not Sumited')
		AS diff,m.material_name FROM material_submission_details msd, material m, SUBJECT s, omr_student_response o,per_material_mapping p
		WHERE mat_id IN(SELECT material_id FROM per_material_mapping WHERE student_id='$s5' AND material_id 
		IN(SELECT DISTINCT mca.material_id FROM material_correct_answers mca WHERE mca.material_id 
		NOT IN(SELECT material_id FROM omr_student_response WHERE student_id='$s5')))
		AND msd.mat_id = m.id AND m.subject_id = s.id AND p.student_id = '$s5'
		UNION ALL
		SELECT DISTINCT msd.mat_id,DATE(msd.submission_date) AS submit
		,DATE(o.create_date) AS submited
		,s.name AS sub,
		IF(DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)) = '0', 'On Time', IF(DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)) LIKE '-%', CONCAT('Late by ',SUBSTRING(DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)),2),' days'), CONCAT('Early by ',DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)),' days'))) AS diff,
		m.material_name
		FROM material_submission_details msd, material m, SUBJECT s, omr_student_response o
		WHERE mat_id IN
		(SELECT material_id FROM per_material_mapping WHERE student_id='$s5' AND material_id 
		IN
		(SELECT DISTINCT m.material_id FROM material_correct_answers m WHERE m.material_id 
		IN
		(SELECT material_id FROM omr_student_response WHERE student_id='$s5')))
		AND msd.mat_id = m.id
		AND m.subject_id = s.id
		AND o.student_id = '$s5') t ORDER BY t.submit");
			
		echo "<table style='border:solid 1px;width:694px;height:20px;'>";
		echo "<tr><th style='border:solid 1px;width:60px;'>Subject</th>
			  <th style='border:solid 1px;width:170px;'>Assignment</th>
			  <th style='border:solid 1px;width:70px;'>No. of Que.</th>
			  <th style='border:solid 1px;width:120px;'>Due Date</th>
			  <th style='border:solid 1px;width:120px;'>Date of Submission</th>
			  <th style='border:solid 1px;width:80px;'>Status</th></tr>";

		while($row1=mysql_fetch_array($result1))
		{		
			echo "<tr>";
			echo "<td style='border:solid 1px;width:50px;'>".$row1[3]."</td>";
			echo "<td style='border:solid 1px;width:150px;'>".$row1[5]."</td>";
			echo "<td style='border:solid 1px;width:80px;'></td>";
			echo "<td style='border:solid 1px;width:100px;'>".$row1[1]."</td>";
			echo "<td style='border:solid 1px;width:50px;'>".$row1[2]."</td>";
			echo "<td style='border:solid 1px;width:50px;'>".$row1[4]."</td>";
			echo "</tr>";
		}
		echo "</table>";
		include_once '../conn_close.php';
?>