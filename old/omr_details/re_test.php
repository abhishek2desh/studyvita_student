<?php
	session_start();
	include_once '../config.php';
	
	$stud_id = $_GET['stud_id'];
	$mid = $_GET['mat_id'];
	
	$sql_1 = "DELETE FROM omr_student_response 
			WHERE student_id = $stud_id
			AND material_id = $mid";
//	echo $sql_1;
	$result_1 = mysql_query($sql_1);
	if ($result_1)
	{
		echo "Test successfully reset.";
	}
	else
	{
		echo "Failed.";
	}
	include_once '../conn_close.php';
?>