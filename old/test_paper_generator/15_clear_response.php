<?php

	include_once '../config.php';
	
	$check_id=$_GET['uniq_id_get'];
	$qno=$_GET['qno'];
	$test_id=$_GET['test_id'];
	$uid=$_GET['uid'];
	$select_ans_wise='x';
	
	$up_query=mysql_query("UPDATE adaptive_test_response SET response='$select_ans_wise' WHERE Qno='$qno' AND Uniq_id='$check_id' AND test_id='$test_id' AND student_id='$uid'");
	
	if($up_query)
	{
		echo "";
	}
	else
	{
		echo "Failed Insertted";
	}
	include_once '../conn_close.php';
?>