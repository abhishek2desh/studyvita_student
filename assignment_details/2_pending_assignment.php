<?php
		include_once '../config.php';
		session_start();
		$s5 = $_SESSION['sid'];
		$dt = $_SESSION['today'];
		
		$result1=mysql_query("SELECT DISTINCT msd.mat_id AS id,DATE_FORMAT(DATE(msd.submission_date),'%d %b %Y') AS submission
		,DATE(o.create_date)=NULL AS submited
		,s.name AS SUBJECT,CONCAT(SUBSTRING(DATEDIFF(DATE(msd.submission_date),'$dt'),2),' days')
		AS difff,m.material_name AS assignment FROM material_submission_details msd, material m, 
		SUBJECT s, omr_student_response o,per_material_mapping p WHERE
		mat_id IN
		(SELECT material_id FROM per_material_mapping WHERE student_id='$s5' AND material_id 
		IN
		(SELECT DISTINCT mca.material_id FROM material_correct_answers mca WHERE mca.material_id 
		NOT IN
		(SELECT material_id FROM omr_student_response WHERE student_id='$s5')))
		AND msd.mat_id = m.id
		AND m.subject_id = s.id
		AND p.student_id = '$s5'");
		
		echo "<table style='border:solid 1px;width:594px;height:20px;'>";
		echo "<tr><th style='border:solid 1px;width:60px;'>Subject</th>
			  <th style='border:solid 1px;width:170px;'>Assignment</th>
			  <th style='border:solid 1px;width:70px;'>No. of Que.</th>
			  <th style='border:solid 1px;width:120px;'>Date of Submission</th>
			  <th style='border:solid 1px;width:80px;'>You are late by</th></tr>";
		while($row1=mysql_fetch_array($result1))
		{		
			echo "<tr>";
			echo "<td style='border:solid 1px;width:50px;'>".$row1[3]."</td>";
			echo "<td style='border:solid 1px;width:150px;'>".$row1[5]."</td>";
			echo "<td style='border:solid 1px;width:80px;'></td>";
			echo "<td style='border:solid 1px;width:100px;'>".$row1[1]."</td>";
			echo "<td style='border:solid 1px;width:50px;'>".$row1[4]."</td>";
			echo "</tr>";
		}

		echo "</table>";
		include_once '../conn_close.php';
?>