<?php
	session_start();
	include_once '../config.php';
	
	$stud_id = $_SESSION['sid'];
	$mid = $_GET['material_id'];
	
	$sql_1 = "SELECT * FROM omr_student_response WHERE
			material_id = $mid AND student_id = $stud_id";
	$result_1 = mysql_query($sql_1);
	$row_1 = mysql_num_rows($result_1);
	
	if($row_1 == 0)
	{
		echo "Insert_Data";
	}
	else
	{
		echo "Data_Available";
	}
	include_once '../conn_close.php';
?>