<?php
		include_once '../config.php';
		session_start();
		$s5 = $_SESSION['sid'];
		$dt = $_SESSION['today'];
		
		$result1=mysql_query("SELECT nw_msd.mat_id AS id,
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
								AND DATE(nw_msd.submission_date) > '$dt'");
		
		echo "<table style='border:solid 1px;width:594px;height:20px;'>";
		echo "<tr><th style='border:solid 1px;width:60px;'>Subject</th>
			  <th style='border:solid 1px;width:170px;'>Assignment</th>
			  <th style='border:solid 1px;width:70px;'>No. of Que.</th>
			  <th style='border:solid 1px;width:120px;'>Date of Submission</th>
			  <th style='border:solid 1px;width:80px;'>Type</th></tr>";
		while($row1=mysql_fetch_array($result1))
		{		
			echo "<tr>";
			echo "<td style='border:solid 1px;width:50px;'>".$row1[5]."</td>";
			echo "<td style='border:solid 1px;width:150px;'>".$row1[3]."</td>";
			echo "<td style='border:solid 1px;width:80px;'></td>";
			echo "<td style='border:solid 1px;width:100px;'>".$row1[2]."</td>";
			echo "<td style='border:solid 1px;width:50px;'>".$row1[4]."</td>";
			echo "</tr>";
		}
		echo "</table>";
		include_once '../conn_close.php';
?>