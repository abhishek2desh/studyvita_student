<?php

	include_once '../config.php';
	
	$uniq_id_get=$_GET['uniq_id_get'];
	$qno=$_GET['qno'];
	$new_test_id=$_GET['get_test_id1'];
	$select_ans_wise=$_GET['select_ans_wise']='x';
	
	$qno=$qno+1;
	
	$up_query=mysql_query("UPDATE adaptive_test_response SET response='$select_ans_wise' WHERE test_id='$new_test_id' AND Qno='$qno'");
	
	if($up_query)
	{
		echo "Successfully Insertted";
	}
	else
	{
		echo "Failed Insertted";
	}
	
?>