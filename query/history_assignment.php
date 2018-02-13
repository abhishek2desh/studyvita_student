<?php
	include '../config.php';
	session_start();

	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	
	$subject = isset($_POST['subject']) ? mysql_real_escape_string($_POST['subject']) : '';
	$subid = isset($_POST['subid']) ? mysql_real_escape_string($_POST['subid']) : '';  
	$assignment = isset($_POST['assignment']) ? mysql_real_escape_string($_POST['assignment']) : '';	
	$no_of_que = isset($_POST['no_of_que']) ? mysql_real_escape_string($_POST['no_of_que']) : '';	
	$submission = isset($_POST['submission']) ? mysql_real_escape_string($_POST['submission']) : '';
	$difff = isset($_POST['difff']) ? mysql_real_escape_string($_POST['difff']) : '';	
	
	$offset = ($page-1)*$rows;
	$result = array();
	
	$s5 = $_SESSION['sid'];
	$dt = $_SESSION['today'];
	
	$query1 = "SELECT DISTINCT msd.mat_id,DATE(msd.submission_date) AS submit
			,DATE(o.create_date)=NULL AS submited
			,s.name AS sub,
			IF(DATEDIFF(DATE(msd.submission_date),DATE(o.create_date)=NULL)=NULL,'1','Not Sumited')
			AS diff,
			m.material_name
			FROM material_submission_details msd, material m, SUBJECT s, omr_student_response o,per_material_mapping p
			WHERE mat_id IN
			(SELECT material_id FROM per_material_mapping WHERE student_id='$s5' AND material_id 
			IN
			(SELECT DISTINCT mca.material_id FROM material_correct_answers mca WHERE mca.material_id 
			NOT IN
			(SELECT material_id FROM omr_student_response WHERE student_id='$s5')))
			AND msd.mat_id = m.id
			AND m.subject_id = s.id
			AND p.student_id = '$s5'";
	
	$query2 = "SELECT DISTINCT msd.mat_id,DATE(msd.submission_date) AS submit
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
			AND o.student_id = '$s5'";
	
	$where1 = "t.sub like '$subid%'";
		
	$rs_q = "SELECT t.mat_id
			FROM(
			$query1
			UNION ALL
			$query2
			) t
			where " . $where1 . "ORDER BY t.submit";
						
	$rs = mysql_query($rs_q);
			
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	
	$rs_qq ="SELECT t.mat_id AS id,DATE_FORMAT(t.submit,'%d %b %Y') AS due_date,
			DATE_FORMAT(t.submited,'%d %b %Y') AS submission,t.sub AS subject
			,t.diff AS status,t.material_name AS assignment
			FROM(
			$query1
			UNION ALL
			$query2
			) t
			where " . $where1 . "ORDER BY t.submit";
	$rs = mysql_query($rs_qq);
	
	$items = array();
	$items_count=0;
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
		$items_count++;
	}
	$result["rows"] = $items;
	$result["total"] = $items_count;

	echo json_encode($result);
	include_once '../conn_close.php';
?>