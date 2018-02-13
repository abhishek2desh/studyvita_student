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
	$select_ran="";
	$select_que_str="";
	$i=1;
	$result_curr1=mysql_query("SELECT Test_submit,start_time,end_time,get_time_in_second 
								FROM `adaptive_learning_test` WHERE  test_id='$test_id' AND student_id='$uid'");
								
	$row_curr_1=mysql_fetch_array($result_curr1);
	
	$test_submit_1=$row_curr_1[0];
	$test_end_time=$row_curr_1[2];
	$test_start_time=$row_curr_1[1];
	
	if($test_submit_1 == '0' && $test_end_time == "" && $test_start_time != "")
	{
		
		$result_curr_time=mysql_query("SELECT LEFT(RIGHT(get_time_in_second , 21),20),start_time,TIMEDIFF(LEFT(RIGHT(get_time_in_second , 21),20),start_time) AS diff_time FROM adaptive_learning_test WHERE test_id='$test_id' AND student_id='$uid'");
		$row_curr_1time=mysql_fetch_array($result_curr_time);
		
		$diff_time=$row_curr_1time[0];
		$diff_time2=$row_curr_1time[2];
		//echo "dt1 : ".$diff_time2."<br/>";
		$string1_sec = substr($diff_time2, -2);
		$string_min = substr($diff_time2, 3,2);
		if($string1_sec >=31)
		{
			echo $t_t-($string_min+1);
		}
		else
		{
			echo $t_t-$string_min;
		}
		// echo floor($datediff/(60*60*24));
	}
	else if($test_submit_1 == "" && $test_end_time == "" && $test_start_time == "")
	{
		$insert_test=mysql_query("INSERT INTO adaptive_learning_test(`test_id`,`student_id`,`SUBJECT`,`noq`,`start_time`,`end_time`,`total_time`,`test_type`)
				   VALUES('$test_id','$uid','$sub','$req_que','$start_time','$end_time','$t_t','$type')");
				   
		if($insert_test)
		{
			//echo "Successfully Insertted..";
		}
		else
		{
			//echo "Failed";
		}
		$response='x';
		$result4=mysql_query("SELECT TestID,Uniqid,Qno FROM onlineuniqid WHERE TestID='$test_id' order by Qno");
		$rw=mysql_num_rows($result4);
		while($row35=mysql_fetch_array($result4))
		{
			$result_curr=mysql_query("SELECT CorrectAns FROM onlinequestionbank WHERE UniqId='$row35[1]'");
			$row_curr=mysql_fetch_array($result_curr);
			
			$get_ans=$row_curr[0];
		
			$insert_test_announce=mysql_query("INSERT INTO													adaptive_test_response(`test_id`,`Qno`,`Uniq_id`,`response`,`correct_ans`,`student_id`)
			VALUES('$test_id','$i','$row35[1]','$response','$get_ans','$uid')");
			
			if($insert_test_announce)
			{
				//echo "Successfully Insertted..34";
			}
			else
			{
				//echo "Failed";
			}
			$i++;
		}
		$update_query=mysql_query("UPDATE test_announce SET given_test = '1' WHERE que_paper_id IN(SELECT id FROM que_paper WHERE NAME='$test_id')
		AND user_id='$uid'");
		if($update_query)
		{
			//echo "Successfully Updated";
		}
		else
		{
			//echo "Failed";
		}
		echo $t_t;
	}
	include_once '../conn_close.php';
?>