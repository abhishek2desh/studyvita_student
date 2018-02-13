<?php

	include_once '../config.php';
	$uniq_id_get=$_GET['uniq_id_get'];
	$qno=$_GET['qno'];
	$uid=$_GET['uid'];
	$test_id=$_GET['test_id'];
	$qno=$qno+1;
	$result1=mysql_query("SELECT response FROM adaptive_test_response WHERE Uniq_id='$uniq_id_get' AND student_id='$uid' and test_id='$test_id' and stduent_id='$uid'");
	$row1=mysql_fetch_array($result1);
	$get_ans=$row1[0];
	echo $get_ans;
	include_once '../conn_close.php';
?>