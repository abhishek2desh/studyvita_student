<?php

	include_once '../config.php';
	$test_id=$_GET['test_id'];
	$sub=$_GET['sub'];
	$uid=$_GET['uid'];
	$req_que=$_GET['req_que'];
	$type=$_GET['select_test_wise'];
	$start_time=$_GET['date_time'];
	$end_time=$_GET['date_time2'];
	$t_t=$_GET['t_t'];

	$result_curr1=mysql_query("SELECT Test_submit,start_time,end_time,get_time_in_second 
								FROM `adaptive_learning_test` WHERE  test_id='$test_id' AND student_id='$uid'");
								
	$row_curr_1=mysql_fetch_array($result_curr1);
	
	$test_submit_1=$row_curr_1[0];$test_end_time=$row_curr_1[2];$test_start_time=$row_curr_1[1];
	
	if($test_submit_1 == '0' && $test_end_time == "" && $test_start_time != "" )
	{
		
	}
	else
	{
		$insert_test=mysql_query("INSERT INTO adaptive_learning_test(`test_id`,`student_id`,`SUBJECT`,`noq`,`start_time`,`end_time`,`total_time`,`test_type`)
				   VALUES('$test_id','$uid','$sub','$req_que','$start_time','$end_time','$t_t','$type')");
				   
		if($insert_test)
		{
			echo "Successfully Insertted..";
		}
		else
		{
			echo "Failed";
		}
		$response='x';
		$result4=mysql_query("SELECT TestID,Uniqid,Qno FROM onlineuniqid WHERE TestID='$test_id'");
		$rw=mysql_num_rows($result4);
		
		while($row4=mysql_fetch_array($result4))
		{
		
			$result_curr=mysql_query("SELECT CorrectAns FROM onlinequestionbank WHERE UniqId=$row4[1]");
			$row_curr=mysql_fetch_array($result_curr);
			
			$get_ans=$row_curr[0];
		
			$insert_test_announce=mysql_query("INSERT INTO													adaptive_test_response(`test_id`,`Qno`,`Uniq_id`,`response`,`correct_ans`,`student_id`)
			VALUES('$test_id','$row4[2]','$row4[1]','$response','$get_ans','$uid')");
			
			if($insert_test_announce)
			{
				echo "Successfully Insertted..34";
			}
			else
			{
				echo "Failed";
			}
		}
		$update_query=mysql_query("UPDATE test_announce SET given_test = '1' WHERE que_paper_id IN(SELECT id FROM que_paper WHERE NAME='$test_id')
		AND user_id='$uid'");
			
		if($update_query)
		{
			echo "Successfully Updated";
		}
		else
		{
			echo "Failed";
		}
	}
	include_once '../conn_close.php';
?>