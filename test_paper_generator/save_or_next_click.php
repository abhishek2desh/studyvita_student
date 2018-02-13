<?php

	include_once '../config.php';
	$select_ans_wise=$_GET['response'];
	$test_id=$_GET['test_id'];
	$check_id=$_GET['check_id'];
	$uid=$_GET['uid'];
	$qno=$_GET['qno'];
	$result=mysql_query("UPDATE `adaptive_test_response` SET response='$select_ans_wise' WHERE Qno='$qno' AND Uniq_id='$check_id' AND test_id='$test_id' AND student_id='$uid'");
	if($result)
	{
		echo "";
	}
	else
	{
		echo "failed";
	}
	include_once '../conn_close.php';
?>