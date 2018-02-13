<?php

	include '../config.php';
	
	$uniq_id_get=$_GET['uniq_id_get'];
	$qno=$_GET['qno'];
	$new_test_id=$_GET['new_test_id'];
	$select_ans_wise=$_GET['select_ans_wise'];
	$type=$_GET['select_test_wise'];
	
	$qno=$qno+1;
	
	$up_query=mysql_query("UPDATE adaptive_test_response SET response='$select_ans_wise' WHERE test_id='$new_test_id' AND Qno='$qno'");
	
	//echo "UPDATE adaptive_test_response SET response='$select_ans_wise' WHERE test_id='$new_test_id' AND Qno='$qno'";
	
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