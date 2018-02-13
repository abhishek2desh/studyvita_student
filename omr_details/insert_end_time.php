<?php 
	include_once '../config.php';

	$id = $_GET['lt_id'];
	$end_time = $_GET['end_time'];

	$SQL = "UPDATE omr_student_score_history SET end_time='$end_time',Test_submit='1' WHERE id = '$id'";

	$result = mysql_query($SQL);
		
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