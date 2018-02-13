<?php
	include '../config.php';
	
	$test_id=$_GET['test_id'];
	$uid=$_GET['uid'];
	
	$result_curr1=mysql_query("SELECT Test_submit,start_time,end_time,get_time_in_second 
								FROM `adaptive_learning_test` WHERE  test_id='$test_id' AND student_id='$uid'");
								
	$row_curr_1=mysql_fetch_array($result_curr1);
	
	$test_submit_1=$row_curr_1[0];
	$test_end_time=$row_curr_1[2];
	$test_start_time=$row_curr_1[1];
	
	//echo $test_submit_1."-".$test_end_time."-".$test_start_time;
	
	if($test_submit_1 == '0' && $test_end_time == "" && $test_start_time != "")
	{
		echo "1";
	}
	else if($test_submit_1 == '1' && $test_end_time != "" && $test_start_time != "")
	{
		echo "2";
	}
	include_once '../conn_close.php';
?>