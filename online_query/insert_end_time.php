<?php 
include_once '../config.php';

	$sid = $_GET['student_id'];
	$mid = $_GET['mat_id'];
	$e_time = $_GET['end_time'];

	$result=mysql_query("select id from online_test_student_time_duration where student_id=$sid
			and material_id=$mid");
	$row=mysql_fetch_array($result);
	$id = $row[0];
	
	$SQL = "UPDATE online_test_student_time_duration SET end_time='$e_time',Test_submit='1'
			WHERE id = '$id'";
	
	$result1 = mysql_query($SQL);
	if ($result1)
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}
	include_once '../conn_close.php';
?>