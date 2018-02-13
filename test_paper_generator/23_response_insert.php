<?php

	include '../config.php';
	
	$uniq_id_get=$_GET['uniq_id_get']='7390';
	$qno=$_GET['qno']='0';
	$new_test_id=$_GET['new_test_id']='7295';
	$select_ans_wise=$_GET['select_ans_wise']='B';
	$type=$_GET['select_test_wise']='practise';
	
	$qno=$qno+1;
	
	$up_query=mysql_query("UPDATE adaptive_test_response SET response='$select_ans_wise' WHERE test_id='$new_test_id' AND Qno='$qno'");
	
	//echo "UPDATE adaptive_test_response SET response='$select_ans_wise' WHERE test_id='$new_test_id' AND Qno='$qno'";
	
	if($up_query)
	{
		echo "Successfully Insertted34";
	}
	else
	{
		echo "Failed Insertted";
	}
	include_once '../conn_close.php';
?>