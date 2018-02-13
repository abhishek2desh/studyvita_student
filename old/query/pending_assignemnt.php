<?php
	include '../config.php';
	session_start();

	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	
	$subject = isset($_POST['subject']) ? mysql_real_escape_string($_POST['subject']) : '';	
	$assignment = isset($_POST['assignment']) ? mysql_real_escape_string($_POST['assignment']) : '';	
	$no_of_que = isset($_POST['no_of_que']) ? mysql_real_escape_string($_POST['no_of_que']) : '';	
	$submission = isset($_POST['submission']) ? mysql_real_escape_string($_POST['submission']) : '';
	$difff = isset($_POST['difff']) ? mysql_real_escape_string($_POST['difff']) : '';	
	
	$offset = ($page-1)*$rows;
	$result = array();
	
	$s5 = $_SESSION['sid'];
	$dt = $_SESSION['today'];
	
	$where = "mat_id IN
			(SELECT material_id FROM per_material_mapping WHERE student_id='$s5' AND material_id 
			IN
			(SELECT DISTINCT mca.material_id FROM material_correct_answers mca WHERE mca.material_id 
			NOT IN
			(SELECT material_id FROM omr_student_response WHERE student_id='$s5')))
			AND msd.mat_id = m.id
			AND m.subject_id = s.id
			AND p.student_id = '$s5'";
		
	$rs_q = "SELECT DISTINCT msd.mat_id AS id
			FROM material_submission_details msd, material m, SUBJECT s, omr_student_response o,per_material_mapping p
			WHERE $where";
	//echo $rs_q."<br/><br/><br/>";
	$rs = mysql_query($rs_q);
			
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	
		
	
	$rs_qq ="SELECT DISTINCT msd.mat_id AS id,DATE_FORMAT(DATE(msd.submission_date),'%d %b %Y') AS submission
			,DATE(o.create_date)=NULL AS submited
			,s.name AS subject,
			CONCAT(SUBSTRING(DATEDIFF(DATE(msd.submission_date),'$dt'),2),' days')
			 AS difff,
			m.material_name AS assignment
			FROM material_submission_details msd, material m, SUBJECT s, omr_student_response o,per_material_mapping p
			WHERE $where";
	
	//echo "<br/><br/>".$rs_qq."<br/><br/>";
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