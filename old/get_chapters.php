<?php
	include 'config.php';
	session_start();

	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	
	$offset = ($page-1)*$rows;
	$result = array();
	
	$rs=mysql_query("SELECT  wb.work_date, UCASE(wb.weekday) AS Weekday, wb.time as Time1, UCASE(sb.name) AS Subject, IF(Test=0,'-','TEST') AS Test
	FROM working_batches wb, student_details s, batch b,SUBJECT sb
	WHERE s.batch_id = b.id AND wb.batch_id=b.id AND wb.sub_id=sb.id AND s.edutech_student_id=".$s1."
	AND work_date between '".$date_range['first']."' and '".$date_range['last']."'");
	
	$items = array();
	$items_count=0;
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
		$items_count++;
	}
	$result["rows"] = $items;
	
	$result["total"] = $items_count;

	echo json_encode($result);
?>