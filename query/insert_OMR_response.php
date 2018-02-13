<?php
	session_start();
	include_once '../config.php';
	
	$stud_id = $_SESSION['sid'];
	$mid = $_GET['material_id'];
	$qno = $_GET['qno'];
	$response = $_GET['response'];
	
	$sql = "INSERT INTO omr_student_response 
			(`student_id`,`material_id`,`que_no`,`response`)
			SELECT '$stud_id','$mid','$qno','$response' 
			FROM omr_student_response
			WHERE NOT EXISTS (SELECT * 
			FROM omr_student_response WHERE student_id='$stud_id' 
			AND material_id='$mid' AND que_no='$qno') LIMIT 1";

	$result = mysql_query($sql);
	if ($result)
	{
		echo "success...";
	}
	else
	{
		echo "failed...";
	}
	include_once '../conn_close.php';
?>