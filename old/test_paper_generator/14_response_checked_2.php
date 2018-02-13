<?php

	include_once '../config.php';
	
	$check_id=$_GET['uniq_id_get'];
	$qno=$_GET['qno'];
	$test_id=$_GET['test_id'];
	$uid=$_GET['uid'];
	
	$uniq_id_get=$_GET['uniq_id_get'];
	$qno=$_GET['qno'];
	$result1=mysql_query("SELECT response FROM adaptive_test_response WHERE Qno='$qno' AND Uniq_id='$check_id' AND test_id='$test_id' AND student_id='$uid'");
	$row1=mysql_fetch_array($result1);
	$get_ans=$row1[0];
	echo $get_ans;
	include_once '../conn_close.php';
?>