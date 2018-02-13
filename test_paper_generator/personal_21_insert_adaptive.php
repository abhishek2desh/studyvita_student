<?php

	include_once '../config.php';
	$uniq_id=$_GET['uniq_id'];
	$str1 = substr($uniq_id, 1);
	$total_que_str=substr($str1, 0, -1);
	$lst = explode(",", $total_que_str);
	$user_id=$_GET['user_id'];
	$start_time=$_GET['date_time'];
	$end_time=$_GET['date_time2'];
	$get_val=0;
	$test_id_new=$_GET['test_id_new'];
	$p_ass_id_uq=$_GET['p_ass_id_uq'];
	$i=1;
	$res="x";
	
	
	
	foreach($lst as $item) 
	{
	
		$result_curr=mysql_query("SELECT CorrectAns FROM onlinequestionbank WHERE UniqId=$item");
		$row_curr=mysql_fetch_array($result_curr);
		
		$get_ans=$row_curr[0];
		
		$insert_test_announce=mysql_query("INSERT INTO													personalassignment_response(`user_id`,`test_id`,`Qno`,`correct_ans`,`response`,`uniq_id`,`Assignment_id`)
		VALUES('$user_id','$test_id_new','$i','$get_ans','$res','$item','$p_ass_id_uq')");
		
		if($insert_test_announce)
		{
			echo "Successfully Insertted2";
		}
		else
		{
			echo "Failed";
		}
		$i++;
	}
	$up_query=mysql_query("UPDATE personalassignment_studentwise SET start_time='$start_time' WHERE Test_id='$test_id_new' AND Student_id='$user_id' AND id='$p_ass_id_uq'");
	
	if($up_query)
	{
		//echo "Successfully Insertted34";
	}
	else
	{
		//echo "Failed Insertted";
	}
	include_once '../conn_close.php';
?>