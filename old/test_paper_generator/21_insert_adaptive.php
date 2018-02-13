<?php

	include_once '../config.php';
	$total_que_str=$_GET['total_que_str'];
	$batch_id=$_GET['batch_id'];
	$sub=$_GET['sub'];
	$user_id=$_GET['user_id'];
	$req_que=$_GET['req_que'];
	$type=$_GET['select_test_wise'];
	$start_time=$_GET['date_time'];
	$end_time=$_GET['date_time2'];
	$t_t=$_GET['t_t'];
	$cp_value12=$_GET['cp_value12'];
	$get_val=0;
	/*$date_result1=mysql_query("SELECT NOW()");
	$date_row=mysql_fetch_array($date_result1);
	$get_date=$date_row[0];
	*/
	
	
	
	$result1=mysql_query("SELECT MAX(test_id) FROM testannounce_refid");
	$row1=mysql_fetch_array($result1);
	$max_id_test=$row1[0]+1;
	
	$insert_test_announce=mysql_query("INSERT INTO testannounce_refid(`test_id`)
					   VALUES('$max_id_test')");
	if($insert_test_announce)
	{
		//echo "Successfully Insertted34";
	}
	else
	{
		//echo "Failed";
	}
	
	$insert_test=mysql_query("INSERT INTO adaptive_learning_test(`test_id`,`student_id`,`SUBJECT`,`noq`,`start_time`,`end_time`,`total_time`,`test_type`,`chapter_id`,`batch_id`)VALUES('$max_id_test','$user_id','$sub','$req_que','$start_time','$end_time','$t_t','$type','$cp_value12','$batch_id')");
	
	if($insert_test)
	{
		//echo "Successfully Insertted35";
	}
	else
	{
		//echo "Failed";
	}
	$unatm="x";
	$lst = explode(",", $total_que_str);
	foreach($lst as $item) 
	{
		if($get_val == $req_que)
		{
			goto out;
		}
		$get_val++;
		
		$result_curr=mysql_query("SELECT CorrectAns FROM onlinequestionbank WHERE UniqId=$item");
		$row_curr=mysql_fetch_array($result_curr);
		
		$get_ans=$row_curr[0];
		
		
		$insert_test_announce=mysql_query("INSERT INTO													adaptive_test_response(`test_id`,`Qno`,`Uniq_id`,`response`,`correct_ans`,`student_id`)
		VALUES('$max_id_test','$get_val','$item','$unatm','$get_ans','$user_id')");
		
		
		if($insert_test_announce)
		{
			//echo "Successfully Insertted2";
		}
		else
		{
			//echo "Failed";
		}
	}
	out:
	echo $max_id_test;
	include_once '../conn_close.php';
?>