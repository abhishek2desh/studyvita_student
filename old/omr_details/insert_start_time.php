<?php 
include_once '../config.php';

	$sid = $_GET['stud_id'];
	$mid = $_GET['mat_id'];
	$s_time = $_GET['st_time'];
	$lt = 0;

	$SQL = "INSERT INTO omr_student_score_history
		(`student_id`,`material_id`,`start_time`) VALUES
		('$sid','$mid','$s_time')";

	$result = mysql_query($SQL);
	
	$last_id = mysql_insert_id();
	
	if ($result)
	{
		echo $last_id;
	}
	else
	{
		echo $lt;
	}
	include_once '../conn_close.php';
?>