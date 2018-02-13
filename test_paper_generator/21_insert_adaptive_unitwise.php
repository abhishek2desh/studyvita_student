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
	
	$type="test";
	
	
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
	
	$insert_test=mysql_query("INSERT INTO adaptive_learning_test(`test_id`,`student_id`,`SUBJECT`,`noq`,`start_time`,`end_time`,`total_time`,`test_type`,`unit_id`,`batch_id`,unitwise_test)VALUES('$max_id_test','$user_id','$sub','$req_que','$start_time','$end_time','$t_t','$type','$cp_value12','$batch_id','1')");
	
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
	$combined_chapter="";
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
			$chap_id="";
	
		$result_curr1=mysql_query("SELECT cc.id FROM topic t,concept c,chapter cc,`onlinequestionbank` o WHERE o.uniqid='$item'  AND c.id=o.conceptid AND t.id=c.topic_id AND cc.id=t.chap_id ");
		$row_curr1=mysql_fetch_array($result_curr1);
		$chap_id=$row_curr1[0];
		$run2=",".$chap_id.",";
						$run1=",".$combined_chapter;
						if(strpos($run1,$run2) !== false)
						{
								//goto in1;
						}
						else
						{
							$combined_chapter=$combined_chapter.$chap_id.",";
						}
		}
		else
		{
			//echo "Failed";
		}
	}
	out:
	if($combined_chapter=="")
	{
	
	}
	else
	{
	$insert_test1=mysql_query("UPDATE adaptive_learning_test set combined_chapter='$combined_chapter' where test_id='$max_id_test' and student_id='$user_id'");
	
	if($insert_test1)
	{
		//echo "Successfully Insertted35";
	}
	else
	{
	echo "Failed";
	}
	}
	
	echo $max_id_test;
	include_once '../conn_close.php';
?>