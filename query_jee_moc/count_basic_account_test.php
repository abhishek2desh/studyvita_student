<?php
	include '../config.php';
	
	$batch_id=$_GET['batch_id'];
	$uid=$_GET['uid'];
	$result=mysql_query("SELECT id FROM student_registered_course WHERE user_id='$uid' AND batch_id='$batch_id'");
		$rw=mysql_num_rows($result);
	if($rw==0)
	{
	$result1=mysql_query("SELECT id FROM adaptive_learning_test WHERE user_id='$uid' AND batch_id='$batch_id' and subject='20'");
	$rw1=mysql_num_rows($result1);
	if($rw1>0)
	{
	echo "You can't do Mock Test more in basic account.Upgrade yourself to premium account to get unlimited access";
	}
	}
	else
	{
	}	
	//$row_curr_1=mysql_fetch_array($result_curr1);
	
?>