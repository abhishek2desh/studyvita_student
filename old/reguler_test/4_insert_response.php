<?php

	include_once '../config.php';
	
	$uniq_id_get=$_GET['uniq_id_get'];
	$new_test_id=$_GET['new_test_id'];
	$user_id=$_GET['user_id'];
	$req_que=$_GET['req_que'];
	$type=$_GET['select_test_wise'];
	$start_time=$_GET['date_time'];
	$end_time=$_GET['date_time2'];
	$t_t=$_GET['t_t'];
	
	$insert_test=mysql_query("INSERT INTO adaptive_learning_test(`test_id`,`student_id`,`SUBJECT`,`noq`,`start_time`,`end_time`,`total_time`,`test_type`)
				   VALUES('$max_id_test','$user_id','$sub','$req_que','$start_time','$end_time','$t_t','$type')");
	if($insert_test)
	{
		//echo "Successfully Insertted35";
	}
	else
	{
		//echo "Failed";
	}
	
		$result_curr=mysql_query("SELECT CorrectAns FROM onlinequestionbank WHERE UniqId=$item");
		$row_curr=mysql_fetch_array($result_curr);
		
		$get_ans=$row_curr[0];
		
		$insert_test_announce=mysql_query("INSERT INTO													adaptive_test_response(`test_id`,`Qno`,`Uniq_id`,`response`,`correct_ans`)
		VALUES('$max_id_test','$get_val','$item','$unatm','$get_ans')");
		
		if($insert_test_announce)
		{
			echo "Successfully Insertted2";
		}
		else
		{
			echo "Failed";
		}
		include_once '../conn_close.php';
?>