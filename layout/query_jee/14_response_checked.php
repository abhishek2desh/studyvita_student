<?php

	include_once '../config.php';
	$uniq_id_get=$_GET['uniq_id_get'];
	$qno=$_GET['qno'];
	$qno=$qno+1;
	$result1=mysql_query("SELECT response FROM adaptive_test_response WHERE Qno='$qno' AND Uniq_id='$uniq_id_get'");
	$row1=mysql_fetch_array($result1);
	$get_ans=$row1[0];
	echo $get_ans;
	
?>